<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class services extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        $data['services']=$this->Madmin->get_all_data('tbl_services')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/services/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add(){
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
		$this->load->view('admin/services/formAdd');
		$this->load->view('admin/layout/footer');
    }

    public function save(){
        $idServices = $this->input->post('idServices');
        $Snama = $this->input->post('Snama');
        $Sdeskripsi = $this->input->post('Sdeskripsi');
        $Sharga = $this->input->post('Sharga');
        $config['upload_path'] = './assets/foto_services/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('Sfoto')){
            $data_file = $this->upload->data();
            $data_insert=array(
                               'idServices' => $idServices,
                               'Snama' => $Snama,
                               'Sfoto' => $data_file['file_name'],
                               'Sdeskripsi' => $Sdeskripsi,
                               'Sharga' => $Sharga);
            $this->Madmin->insert('tbl_services', $data_insert);
            redirect('services');
        } else {
            redirect('services/add');
        }
    }

    public function get_by_id($id){
        $data['idServices'] = $id;
        $dataWhere = array('idServices' => $id);
        $data['services'] = $this->Madmin->get_by_id('tbl_services', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
		$this->load->view('admin/services/formEdit', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit($idServices){
        $data['services'] = $this->Madmin->get_by_id('tbl_services', array('idServices' => $idServices))->row();
        $Snama = $this->input->post('Snama');
        $Sdeskripsi = $this->input->post('Sdeskripsi');
        $Sharga = $this->input->post('Sharga');
        $config['upload_path'] = './assets/foto_services';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('Sfoto')){
            $data_file = $this->upload->data();
            $dataUpdate=array('Snama' => $Snama,
                              'Sfoto' => $data_file['file_name'],
                              'Sdeskripsi' => $Sdeskripsi,
                              'Sharga' => $Sharga);
            $this->Madmin->update('tbl_services', $dataUpdate, 'idServices', $idServices);
            redirect('services');
        }
        else{
            redirect('services/get_by_id/'.$idServices);
        }
    }

    public function delete($id){
        $this->Madmin->delete('tbl_services', 'idServices', $id);
		redirect('services');
    }

} 

?>