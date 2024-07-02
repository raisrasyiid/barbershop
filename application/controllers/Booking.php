<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        $month = $this->input->get('month'); // Get the selected month
        if ($month) {
            $data['booking'] = $this->Madmin->get_booking_data_by_month($month);
        } else {
            $data['booking'] = $this->Madmin->get_all_booking_data();
        }
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/booking/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    
    public function ubah_status($id){
        $dataWhere = array('idBooking'=>$id);
        $result = $this->Madmin->get_by_id('tbl_booking', $dataWhere)->row_object();
        $status = $result->Bstatus;

        if ($status == 'Menunggu'){
            $dataUpdate = array('Bstatus'=>"Berhasil");
        } else if($status=="Berhasil"){
            $dataUpdate = array('Bstatus'=>"Dibatalkan");
        }else{
            $dataUpdate = array('Bstatus'=> "Menunggu");
        }

        $this->Madmin->update('tbl_booking', $dataUpdate, 'idBooking', $id);
        redirect('booking');
    }

    public function delete($id){
        $this->Madmin->delete('tbl_booking', 'idBooking', $id);
        redirect('booking');
    }

    public function bookingUser() {
        $Btanggal = $this->input->post('Btanggal');
        $Bjam = $this->input->post('Bjam');
        $barberId = $this->input->post('barber');
        $serviceId = $this->input->post('service');
        $userId = $this->session->userdata('Cnama'); 
        
        // Ambil data customer berdasarkan Cnama
        $customer = $this->db->get_where('tbl_customer', array('Cnama' => $userId))->row();
        
        // Pastikan data customer ditemukan
        if (!$customer) {
            show_error('Customer not found.', 404);
        }
        
        // Ambil data service berdasarkan serviceId
        $service = $this->db->get_where('tbl_services', array('idServices' => $serviceId))->row();
    
        // Pastikan data service ditemukan
        if (!$service) {
            show_error('Service not found.', 404);
        }
    
        // Siapkan data untuk disimpan ke tbl_booking
        $data = array(
            'idCustomer' => $customer->idCustomer,
            'idBarber' => $barberId,
            'idServices' => $service->idServices,
            'Btanggal' => $Btanggal,
            'Bjam' => $Bjam,
            'Bstatus' => 'Menunggu',
        );

        // Simpan data ke tbl_booking
        // $this->db->insert('tbl_booking', $data);
        // $this->session->set_flashdata('success_message', 'Booking berhasil disimpan.');
        // redirect('main/profile');

        // Simpan data ke tbl_booking
        if ($this->db->insert('tbl_booking', $data)) {
            $this->session->set_flashdata('success_message', 'Booking berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error_message', 'Terjadi kesalahan, booking gagal disimpan.');
        }
        
        // Debugging
        log_message('debug', 'Redirecting to main/profile with flashdata: ' . $this->session->flashdata('success_message'));

        redirect('main/profile');
    }
    
    
}
?>