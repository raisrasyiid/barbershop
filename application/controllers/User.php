<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('pagination');
    }

    public function index(){
        $config = array();
        $config['base_url'] = site_url('user/index');
        $config['total_rows'] = $this->Madmin->get_count('tbl_customer');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        
        // Customizing pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);
        $page = (is_numeric($page) && $page > 0) ? (int)$page : 0;

        $data['links'] = $this->pagination->create_links();
        $data['user'] = $this->Madmin->get_data_per_page('tbl_customer', $config['per_page'], $page);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/user/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id){
        $this->Madmin->delete('tbl_customer', 'idCustomer', $id);
        redirect('user');
    }
}