<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Madmin');

    }

    public function index()
    {
        $data['barber'] = $this->Madmin->get_all_data('tbl_barber')->result();
        $data['gallery'] = $this->Madmin->get_all_data('tbl_gallery')->result();
        $data['services'] = $this->Madmin->get_all_data('tbl_services')->result();
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/menu', $data); // Mengirimkan data ke view menu
        $this->load->view('user/layout/footer');
    }

    public function viewLogin(){
        $this->load->view('user/login');
    }

    public function viewRegister(){
        $this->load->view('user/register');
    }

    public function login() {
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    
        // Set validation rules
        $this->form_validation->set_rules('Cnama', 'Username', 'required');
        $this->form_validation->set_rules('Cpassword', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login page with error messages
            $this->load->view('user/login');
        } else {
            $u = $this->input->post('Cnama');
            $p = $this->input->post('Cpassword');
    
            $cek = $this->Madmin->cek_login_user($u, $p)->num_rows();
    
            if ($cek > 0) {
                $data_session = array(
                    'idCustomer' => $idCustomer,
                    'Cnama' => $u,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                redirect('main');
            } else {
                $this->session->set_flashdata('error', 'Username or password is incorrect');
                redirect('main/viewLogin');
            }
        }
    }
    

    public function registerAccount() {
        // Load form validation library
        $this->load->library('form_validation');
    
        // Set validation rules
        $this->form_validation->set_rules('Cnama', 'Username', 'required|is_unique[tbl_customer.Cnama]');
        $this->form_validation->set_rules('Cemail', 'Email', 'required');
        $this->form_validation->set_rules('Cpassword', 'Password', 'required');
        $this->form_validation->set_rules('Ctlpn', 'Phone Number', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the registration page with error messages
            $data['validation_errors'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->load->view('user/register', $data);
        } else {
            $nama = $this->input->post('Cnama');
            $email = $this->input->post('Cemail');
            $password = $this->input->post('Cpassword');
            $tlpn = $this->input->post('Ctlpn');

            $data_input = array(
                'Cnama' => $nama,
                'Cemail' => $email,
                'Ctlpn' => $tlpn,
                'Cpassword' => $password,
            );
    
            // Insert data into database
            $this->Madmin->insert('tbl_customer', $data_input);
            redirect('main/viewLogin');
        }
    }
    
    //logout
	public function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}

    #profile
    public function profile(){
        // Mendapatkan ID pengguna dari sesi
    $idUser = $this->session->userdata('Cnama');

    // Query untuk mendapatkan data pengguna dari tabel tbl_customer
    $this->db->select('*');
    $this->db->from('tbl_customer');
    $this->db->where('Cnama', $idUser);
    $query = $this->db->get();
    $user = $query->row_array();
    $this->load->view('user/profile');
    }

    #editProfile
    public function viewEditProfile(){
        $this->load->view('user/editProfile');
    }

    public function saveEditProfile() {
        $id = $this->session->userdata('Cnama');
        if (empty($id)) {
            redirect('main');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Cnama', 'Username', 'required');
        $this->form_validation->set_rules('Cemail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('Ctlpn', 'No hp', 'required');
        $this->form_validation->set_rules('Cpassword', 'Password', 'required');
        $this->form_validation->set_rules('Cpassword_confirm', 'Password Konfirmasi', 'required|matches[Cpassword]');
    
        if ($this->form_validation->run() == false) {
            $data['customer'] = $this->Madmin->get_by_id('tbl_customer', array('idCustomer' => $id));
            $this->load->view('user/editProfile', $data);
        } else {
            $Cnama = $this->input->post('Cnama');
            $Cemail = $this->input->post('Cemail');
            $Ctlpn = $this->input->post('Ctlpn');
            $Cpassword = $this->input->post('Cpassword');
            $Cpassword_confirm = $this->input->post('Cpassword_confirm');
    
            // Cek apakah username sudah ada di database, kecuali username saat ini
            $existing_user = $this->Madmin->get_where('tbl_customer', array('Cnama' => $Cnama));
            if ($existing_user && $existing_user->Cnama != $id) {
                $this->session->set_flashdata('error', 'Username sudah digunakan.');
                redirect('main/viewEditProfile');
                return;
            }
    
            $data_input = array(
                'Cnama' => $Cnama,
                'Cemail' => $Cemail,
                'Ctlpn' => $Ctlpn,
                'Cpassword' => $Cpassword,
            );
    
            $this->Madmin->update('tbl_customer', $data_input, 'Cnama', $id);
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
            $this->session->sess_destroy();
            redirect('main/viewLogin');
        }
    }
    
    
}
?>
