<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
{
    parent::__construct();
    $this->load->library('session');
}

	public function index()
	{
        $data['title'] = 'User Manajemen';


		// $data['beli'] = $this->db->query("SELECT beli.NO_NOTA, beli.TANGGAL, beli.DISKON, beli.JUMLAH, beli.TOTAL, beli.GRAND_TOTAL, beli.KETERANGAN as ket, md_produk.*, md_supplier.* FROM beli,md_produk,md_supplier WHERE beli.KD_PRODUK = md_produk.KD_PRODUK AND beli.KD_SUPPLIER = md_supplier.KD_SUPPLIER")->result_array();
        $data['user'] = $this->db->query("SELECT * FROM user")->result_array();
        // $data['supplier'] = $this->db->query("SELECT * FROM md_supplier")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('auth/user', $data);
		$this->load->view('template/footer', $data);
    }

    function tambah_user() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $role = $this->input->post('role');
        $password = $this->input->post('password');
    
        // Meng-hash password menggunakan password_hash()
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $hashedPassword, // Menggunakan hashedPassword yang telah di-hash
            'role' => $role,
            'is_active' => '1',
        ];
    
        $this->session->set_userdata($data);
        $this->db->insert('user', $data);
    
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data User berhasil ditambahkan !
                  </div>');
     redirect('user/index');

    }

    public function edit_user()
    {

        $kd_user = $this->input->post('kd_user');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $role = $this->input->post('role');
        $is_active = $this->input->post('is_active');
       
    
        $data = [

            'kd_user' => $kd_user,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'is_active' => $is_active,
                   ];

        $this->db->where ('kd_user',$kd_user);
        $this->db->update('user',$data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					data berhasil di ubah !
					  </div>');
     redirect('user/index');

    }

    public function delete_user($id)
{
    
    $this->db->query("DELETE FROM user WHERE user.kd_user = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jenis berhasil dihapus !
                  </div>');
                  redirect('user/index');

}
    
}