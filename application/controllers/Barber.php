<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class barber extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        $data['barber']=$this->Madmin->get_all_data('tbl_barber')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/barber/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add(){
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
		$this->load->view('admin/barber/formAdd');
		$this->load->view('admin/layout/footer');
    }

    public function save(){
        $idBarber = $this->input->post('idBarber');
        $Bbnama = $this->input->post('Bbnama');
        $Bbdeskripsi = $this->input->post('Bbdeskripsi');
        $config['upload_path'] = './assets/foto_barber/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('Bbfoto')){
            $data_file = $this->upload->data();
            $data_insert=array(
                               'idBarber' => $idBarber,
                               'Bbnama' => $Bbnama,
                               'Bbfoto' => $data_file['file_name'],
                               'Bbdeskripsi' => $Bbdeskripsi);
            $this->Madmin->insert('tbl_barber', $data_insert);
            redirect('barber');
        } else {
            redirect('barber/add');
        }
    }

    public function get_by_id($id){
        $data['idBarber'] = $id;
        $dataWhere = array('idBarber' => $id);
        $data['barber'] = $this->Madmin->get_by_id('tbl_barber', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
		$this->load->view('admin/barber/formEdit', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit($idBarber){
        $data['barber'] = $this->Madmin->get_by_id('tbl_barber', array('idBarber' => $idBarber))->row();
        $Bbnama = $this->input->post('Bbnama');
        $Bbdeskripsi = $this->input->post('Bbdeskripsi');
        $config['upload_path'] = './assets/foto_barber';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('Bbfoto')){
            $data_file = $this->upload->data();
            $dataUpdate=array('Bbnama' => $Bbnama,
                              'Bbfoto' => $data_file['file_name'],
                              'Bbdeskripsi' => $Bbdeskripsi);
            $this->Madmin->update('tbl_barber', $dataUpdate, 'idBarber', $idBarber);
            redirect('barber');
        }
        else{
            redirect('barber/get_by_id/'.$idBarber);
        }
    }

    public function delete($id){
        $this->Madmin->delete('tbl_barber', 'idBarber', $id);
		redirect('barber');
    }

} 

?>