<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function __construct()
    {
        parent::__construct();// you have missed this line.
        $this->load->library('form_validation');
    }  
public function index(){

    $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password','trim|required');

    if ($this->form_validation->run() == false) {
        $this->load->view('auth/login');
    }else{
        $this->_login();    
    }
}

private function _login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    
    if ($user ) {

       if ($user['is_active'] == 1 ) {
        // cek  password
        if (password_verify($password, $user['password'])) {
            $data = [
                'email' =>$user['email'],
                'name' =>$user['name'],
                'role' =>$user['role'],
            ];
            $this->session->set_userdata($data);
            redirect('admin');
        } else {
            $this->session->set_flashdata('msg', 'Password anda salah.');
            redirect()->load->view('login');
        }
        
       } else {

        $this->session->set_flashdata('msg', 'Email Tidak Aktif.');
        redirect()->load->view('login');
       }
       
    }else{

        $this->session->set_flashdata('msg', 'Email Tidak Terdaftar.');
        redirect()->load->view('login');
    }
}

public function logout(){
    
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('role');

    $this->session->set_flashdata('msg', 'selamat anda berhasil logout.');
    redirect()->load->view('login');

}

}
