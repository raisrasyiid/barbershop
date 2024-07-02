<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class gallery extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        $data['gallery']=$this->Madmin->get_all_data('tbl_gallery')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/gallery/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add(){
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
		$this->load->view('admin/gallery/formAdd');
		$this->load->view('admin/layout/footer');
    }

    public function save(){
        $idGallery = $this->input->post('idGallery');
        $idServices = $this->input->post('idServices');
        $Gnama = $this->input->post('Gnama');
        $Gdeskripsi = $this->input->post('Gdeskripsi');
        $config['upload_path'] = './assets/foto_gallery/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('Gfoto')){
            $data_file = $this->upload->data();
            $data_insert=array(
                               'idGallery' => $idGallery,
                               'idServices' => $idServices,
                               'Gnama' => $Gnama,
                               'Gfoto' => $data_file['file_name'],
                               'Gdeskripsi' => $Gdeskripsi);
            $this->Madmin->insert('tbl_gallery', $data_insert);
            redirect('gallery');
        } else {
            redirect('gallery/add');
        }
    }

    public function get_by_id($id){
        $data['idGallery'] = $id;
        $dataWhere = array('idgallery' => $id);
        $data['gallery'] = $this->Madmin->get_by_id('tbl_gallery', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
		$this->load->view('admin/gallery/formEdit', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit($idGallery){
        $data['gallery'] = $this->Madmin->get_by_id('tbl_gallery', array('idGallery' => $idGallery))->row();
        $idServices = $this->input->post('idServices');
        $Gnama = $this->input->post('Gnama');
        $Gdeskripsi = $this->input->post('Gdeskripsi');
        $config['upload_path'] = './assets/foto_gallery';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('Gfoto')){
            $data_file = $this->upload->data();
            $dataUpdate=array('idServices' => $idServices,
                              'Gnama' => $Gnama,
                              'Gfoto' => $data_file['file_name'],
                              'Gdeskripsi' => $Gdeskripsi);
            $this->Madmin->update('tbl_gallery', $dataUpdate, 'idGallery', $idGallery);
            redirect('gallery');
        }
        else{
            redirect('gallery/get_by_id/'.$idGallery);
        }
    }

    public function delete($id){
        $this->Madmin->delete('tbl_gallery', 'idGallery', $id);
		redirect('gallery');
    }

} 

?>