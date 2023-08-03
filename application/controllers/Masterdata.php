<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Akun';

        $data['akun'] = $this->db->query("SELECT * FROM md_akun")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('masterdata/akun', $data);
		$this->load->view('template/footer', $data);
	}
    function tambah_akun() {
        
        $kd_akun = $this->input->post('kd_akun');
        $nm_akun = $this->input->post('nm_akun');
        $nm_akun_alias = $this->input->post('nm_akun_alias');
        $keterangan = $this->input->post('keterangan');

        $data['akun'] = $this->db->query("SELECT * FROM md_akun WHERE KD_AKUN = '$kd_akun'")->row_array();


        $data = [
            'KD_AKUN' => $kd_akun,
            'NM_AKUN' => $nm_akun,
            'NM_AKUN_ALIAS' => $nm_akun_alias,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->insert('md_akun', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Data Akun berhasil ditambahkan !
					  </div>');
		redirect('masterdata/index');

    }
    public function delete_akun($id)
	{
		
		$this->db->query("DELETE FROM md_akun WHERE md_akun.KD_AKUN = '$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Akun berhasil dihapus !
					  </div>');
		redirect('masterdata/index');
	}
    public function edit_akun(){
        $kd_akun = $this->input->post('kd_akun');
        $nm_akun = $this->input->post('nm_akun');
        $nm_akun_alias = $this->input->post('nm_akun_alias');
        $keterangan = $this->input->post('keterangan');
        $data = [
            'NM_AKUN' => $nm_akun,
            'NM_AKUN_ALIAS'=> $nm_akun_alias,
            'KETERANGAN'=> $keterangan,
        ];
        $this->db->where ('KD_AKUN',$kd_akun);
        $this->db->update('md_akun',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akun berhasil diedit !
          </div>');
        redirect('masterdata/index');

   
    }
public function kelompok()
{
    $data['title'] = 'Kelompok';

    $data['kelompok'] = $this->db->query("SELECT * FROM md_kelompok")->result_array();
    $data['akun'] = $this->db->query("SELECT * FROM md_akun")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/kelompok', $data);
    $this->load->view('template/footer', $data);
}
function tambah_kelompok() {
    $kd_akun = $this->input->post('kd_akun');
    $kd_kelompok = $this->input->post('kd_kelompok');
    $nm_kelompok = $this->input->post('nm_kelompok');
    $nm_kelompok_alias = $this->input->post('nm_kelompok_alias');
    $keterangan = $this->input->post('keterangan');

    $data['kelompok'] = $this->db->query("SELECT * FROM md_kelompok WHERE KD_KELOMPOK = '$kd_kelompok'")->row_array();


    $data = [
        'KD_AKUN' => $kd_akun,
        'KD_KELOMPOK' => $kd_kelompok,
        'NM_KELOMPOK' => $nm_kelompok,
        'NM_KELOMPOK_ALIAS' => $nm_kelompok_alias,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_kelompok', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data kelompok akun berhasil ditambahkan !
                  </div>');
    redirect('masterdata/kelompok');

}
public function delete_kelompok($id)
{
    
    $this->db->query("DELETE FROM md_kelompok WHERE md_kelompok.KD_KELOMPOK = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Kelompok berhasil dihapus !
                  </div>');
    redirect('masterdata/kelompok');
}
public function edit_kelompok(){
    $kd_akun = $this->input->post('kd_akun');
    $kd_kelompok = $this->input->post('kd_kelompok');
    $nm_kelompok = $this->input->post('nm_kelompok');
    $nm_kelompok_alias = $this->input->post('nm_kelompok_alias');
    $keterangan = $this->input->post('keterangan');
    $data = [
        'KD_KELOMPOK' => $kd_kelompok,
        'NM_KELOMPOK' => $nm_kelompok,
        'NM_KELOMPOK_ALIAS' => $nm_kelompok_alias,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_KELOMPOK',$kd_kelompok);
    $this->db->update('md_kelompok',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Kelompok akun berhasil diedit !
      </div>');
    redirect('masterdata/kelompok');

}

public function jenis()
{
    $data['title'] = 'Jenis';

    $data['kelompok'] = $this->db->query("SELECT * FROM md_kelompok")->result_array();
    $data['akun'] = $this->db->query("SELECT * FROM md_akun")->result_array();
    $data['jenis'] = $this->db->query("SELECT * FROM md_jenis")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/jenis', $data);
    $this->load->view('template/footer', $data);
}
function tambah_jenis() {
    $kd_akun = $this->input->post('kd_akun');
    $kd_kelompok = $this->input->post('kd_kelompok');
    $kd_jenis = $this->input->post('kd_jenis');
    $nm_jenis = $this->input->post('nm_jenis');
    $nm_jenis_alias = $this->input->post('nm_jenis_alias');
    $keterangan = $this->input->post('keterangan');

    $data['jenis'] = $this->db->query("SELECT * FROM md_jenis WHERE KD_JENIS= '$kd_jenis'")->row_array();


    $data = [
        'KD_AKUN' => $kd_akun,
        'KD_KELOMPOK' => $kd_kelompok,
        'KD_JENIS' => $kd_jenis,
        'NM_JENIS' => $nm_jenis,
        'NM_JENIS_ALIAS' => $nm_jenis_alias,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_jenis', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data jenis akun berhasil ditambahkan !
                  </div>');
    redirect('masterdata/jenis');

}
public function delete_jenis($id)
{
    
    $this->db->query("DELETE FROM md_jenis WHERE md_jenis.KD_JENIS = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jenis berhasil dihapus !
                  </div>');
    redirect('masterdata/jenis');
}
public function edit_jenis(){
    $kd_akun = $this->input->post('kd_akun');
    $kd_kelompok = $this->input->post('kd_kelompok');
    $kd_jenis = $this->input->post('kd_jenis');
    $nm_jenis = $this->input->post('nm_jenis');
    $nm_jenis_alias = $this->input->post('nm_jenis_alias');
    $keterangan = $this->input->post('keterangan');
    $data = [
        'KD_AKUN' => $kd_akun,
        'KD_KELOMPOK' => $kd_kelompok,
        'KD_JENIS' => $kd_jenis,
        'NM_JENIS' => $nm_jenis,
        'NM_JENIS_ALIAS' => $nm_jenis_alias,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_JENIS',$kd_jenis);
    $this->db->update('md_jenis',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   Jenis akun berhasil diedit !
      </div>');
    redirect('masterdata/jenis');

}
    public function obyek()
	{
		$data['title'] = 'Obyek';

        $data['obyek'] = $this->db->query("SELECT * FROM md_obyek")->result_array();
        $data['jen'] = $this->db->query("SELECT * FROM md_jenis")->result_array();
        $data['kel'] = $this->db->query("SELECT * FROM md_kelompok")->result_array();
        $data['akun'] = $this->db->query("SELECT * FROM md_akun")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('masterdata/obyek', $data);
		$this->load->view('template/footer', $data);
	}
    function tambah_obyek() {
        
        $kd_akun = $this->input->post('kd_akun');
        $kd_kelompok = $this->input->post('kd_kelompok');
        $kd_jenis = $this->input->post('kd_jenis');
        $kd_obyek = $this->input->post('kd_obyek');
        $nm_obyek = $this->input->post('nm_obyek');
        $nm_obyek_alias = $this->input->post('nm_obyek_alias');
        $keterangan = $this->input->post('keterangan');

        $kd_rekening = $kd_akun.$kd_kelompok.$kd_jenis.$kd_obyek;

        $data['obyek'] = $this->db->query("SELECT * FROM md_obyek WHERE KD_OBYEK = '$kd_obyek'")->row_array();


        $data = [
            'KD_REKENING' => $kd_rekening,
            'KD_AKUN' => $kd_akun,
            'KD_KELOMPOK' => $kd_kelompok,
            'KD_JENIS' => $kd_jenis,
            'KD_OBYEK' => $kd_obyek,
            'NM_OBYEK' => $nm_obyek,
            'NM_OBYEK_ALIAS' => $nm_obyek_alias,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->insert('md_obyek', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Data Obyek berhasil ditambahkan !
					  </div>');
		redirect('masterdata/obyek');

    }
    public function delete_obyek($id)
	{
		
		$this->db->query("DELETE FROM md_obyek WHERE md_obyek.KD_OBYEK = '$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Rekening berhasil dihapus !
					  </div>');
		redirect('masterdata/obyek');
	}
    public function edit_obyek(){
        $kd_akun = $this->input->post('kd_akun');
        $kd_kelompok = $this->input->post('kd_kelompok');
        $kd_jenis = $this->input->post('kd_jenis');
        $kd_obyek = $this->input->post('kd_obyek');
        $kd_rekening = $this->input->post('kd_rekening');
        $nm_obyek = $this->input->post('nm_obyek');
        $nm_obyek_alias = $this->input->post('nm_obyek_alias');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'KD_REKENING' => $kd_rekening,
            'KD_AKUN' => $kd_akun,
            'KD_KELOMPOK' => $kd_kelompok,
            'KD_JENIS' => $kd_jenis,
            'KD_OBYEK' => $kd_obyek,
            'NM_OBYEK' => $nm_obyek,
            'NM_OBYEK_ALIAS' => $nm_obyek_alias,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->where ('KD_REKENING',$kd_rekening);
        $this->db->update('md_obyek',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Rekening berhasil diedit !
          </div>');
        redirect('masterdata/obyek');

    }
    public function jntransaksi()
	{
		$data['title'] = 'Jntransaksi';

        $data['jntransaksi'] = $this->db->query("SELECT * FROM md_jntransaksi")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('masterdata/jntransaksi', $data);
		$this->load->view('template/footer', $data);
	}
    function tambah_jntransaksi() {
        
        $kd_jntransaksi = $this->input->post('kd_jntransaksi');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $keterangan = $this->input->post('keterangan');

        $data['jntransaksi'] = $this->db->query("SELECT * FROM md_jntransaksi WHERE KD_JNTRANSAKSI = '$kd_jntransaksi'")->row_array();


        $data = [
            'KD_JNTRANSAKSI' => $kd_jntransaksi,
            'JENIS_TRANSAKSI' => $jenis_transaksi,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->insert('md_jntransaksi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Data Jenis Transaksi berhasil ditambahkan !
					  </div>');
		redirect('masterdata/jntransaksi');

    }
    public function delete_jntransaksi($id)
	{
		
		$this->db->query("DELETE FROM md_jntransaksi WHERE md_jntransaksi.KD_JNTRANSAKSI = '$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Jenis Transaksi berhasil dihapus !
					  </div>');
		redirect('masterdata/jntransaksi');
	}
    public function edit_jntransaksi(){
        $kd_jntransaksi = $this->input->post('kd_jntransaksi');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $keterangan = $this->input->post('keterangan');
        $data = [
            'KD_JNTRANSAKSI' => $kd_jntransaksi,
            'JENIS_TRANSAKSI' => $jenis_transaksi,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->where ('KD_JNTRANSAKSI',$kd_jntransaksi);
        $this->db->update('md_jntransaksi',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jenis Transaksi berhasil diedit !
          </div>');
        redirect('masterdata/jntransaksi');

}

public function jnbayar()
{
    $data['title'] = 'Jnbayar';

    $data['jnbayar'] = $this->db->query("SELECT * FROM md_jnbayar")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/jnbayar', $data);
    $this->load->view('template/footer', $data);
}
function tambah_jnbayar() {
    
    $kd_jnbayar = $this->input->post('kd_jnbayar');
    $jenis_bayar = $this->input->post('jenis_bayar');
    $keterangan = $this->input->post('keterangan');

    $data['jnbayar'] = $this->db->query("SELECT * FROM md_jnbayar WHERE KD_JNBAYAR = '$kd_jnbayar'")->row_array();


    $data = [
        'KD_JNBAYAR' => $kd_jnbayar,
        'JENIS_BAYAR' => $jenis_bayar,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_jnbayar', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Jenis Bayar berhasil ditambahkan !
                  </div>');
    redirect('masterdata/jnbayar');

}
public function delete_jnbayar($id)
{
    
    $this->db->query("DELETE FROM md_jnbayar WHERE md_jnbayar.KD_JNBAYAR = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jenis Bayar berhasil dihapus !
                  </div>');
    redirect('masterdata/jnbayar');
}
public function edit_jnbayar(){
    $kd_jnbayar = $this->input->post('kd_jnbayar');
    $jenis_bayar = $this->input->post('jenis_bayar');
    $keterangan = $this->input->post('keterangan');
    $data = [
        'KD_JNBAYAR' => $kd_jnbayar,
        'JENIS_BAYAR' => $jenis_bayar,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_JNBAYAR',$kd_jnbayar);
    $this->db->update('md_jnbayar',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Jenis Bayar berhasil diedit !
      </div>');
    redirect('masterdata/jnbayar');

}
public function katproduk()
{
    $data['title'] = 'Katproduk';

    $data['katproduk'] = $this->db->query("SELECT * FROM md_katproduk")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/katproduk', $data);
    $this->load->view('template/footer', $data);
}
function tambah_katproduk() {
    
    $kd_katproduk = $this->input->post('kd_katproduk');
    $nm_kategori = $this->input->post('nm_kategori');
    $keterangan = $this->input->post('keterangan');

    $data['katproduk'] = $this->db->query("SELECT * FROM md_katproduk WHERE KD_KATPRODUK = '$kd_katproduk'")->row_array();


    $data = [
        'KD_KATPRODUK' => $kd_katproduk,
        'NM_KATEGORI' => $nm_kategori,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_katproduk', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Kategori Produk berhasil ditambahkan !
                  </div>');
    redirect('masterdata/katproduk');

}
public function delete_katproduk($id)
{
    
    $this->db->query("DELETE FROM md_katproduk WHERE md_katproduk.KD_KATPRODUK = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Kategori Produk berhasil dihapus !
                  </div>');
    redirect('masterdata/katproduk');
}
public function edit_katproduk(){
    $kd_katproduk = $this->input->post('kd_katproduk');
    $nm_kategori = $this->input->post('nm_kategori');
    $keterangan = $this->input->post('keterangan');

    $data = [
        'KD_KATPRODUK' => $kd_katproduk,
        'NM_KATEGORI' => $nm_kategori,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_KATPRODUK',$kd_katproduk);
    $this->db->update('md_katproduk',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Kategori Produk berhasil diedit !
      </div>');
    redirect('masterdata/katproduk');
}

public function produk()
{
    $data['title'] = 'Produk';

    $data['produk'] = $this->db->query("SELECT * FROM md_produk")->result_array();
    $data['katproduk'] = $this->db->query("SELECT * FROM md_katproduk")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/produk', $data);
    $this->load->view('template/footer', $data);
}
function tambah_produk() {
    $kd_katproduk = $this->input->post('kd_katproduk');
    $kd_produk= $this->input->post('kd_produk');
    $nm_produk = $this->input->post('nm_poduk');
    $jml_produk = $this->input->post('jml_poduk');
    $harga_jual = $this->input->post('harga_jual');
    $harga_beli = $this->input->post('harga_beli');
    $keterangan = $this->input->post('keterangan');

    $data['produk'] = $this->db->query("SELECT * FROM md_produk WHERE KD_PRODUK = '$kd_produk'")->row_array();


    $data = [
        'KD_KATPRODUK' => $kd_katproduk,
        'KD_PRODUK' => $kd_produk,
        'NM_PRODUK' => $nm_produk,
        'JML_PRODUK'=> $jml_produk,
        'HARGA_JUAL'=> $harga_jual,
        'HARGA_BELI'=> $harga_beli,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_produk', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Produk akun berhasil ditambahkan !
                  </div>');
    redirect('masterdata/produk');

}
public function delete_produk($id)
{
    
    $this->db->query("DELETE FROM md_produk WHERE md_produk.KD_PRODUK = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Produk berhasil dihapus !
                  </div>');
    redirect('masterdata/produk');
}
public function edit_produk(){
    $kd_katproduk = $this->input->post('kd_katproduk');
    $kd_produk= $this->input->post('kd_produk');
    $nm_produk = $this->input->post('nm_poduk');
    $jml_produk = $this->input->post('jml_poduk');
    $harga_jual = $this->input->post('harga_jual');
    $harga_beli = $this->input->post('harga_beli');
    $keterangan = $this->input->post('keterangan');

    $data = [
        'KD_KATPRODUK' => $kd_katproduk,
        'KD_PRODUK' => $kd_produk,
        'NM_PRODUK' => $nm_produk,
        'JML_PRODUK'=> $jml_produk,
        'HARGA_JUAL'=> $harga_jual,
        'HARGA_BELI'=> $harga_beli,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_PRODUK',$kd_produk);
    $this->db->update('md_produk',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Produk berhasil diedit !
      </div>');
    redirect('masterdata/produk');

}

public function pelanggan()
{
    $data['title'] = 'Pelanggan';

    $data['pelanggan'] = $this->db->query("SELECT * FROM md_pelanggan")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/pelanggan', $data);
    $this->load->view('template/footer', $data);
}
function tambah_pelanggan() {
    
    $kd_pelanggan = $this->input->post('kd_pelanggan');
    $nm_pelanggan = $this->input->post('nm_pelanggan');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $keterangan = $this->input->post('keterangan');

    $data['pelanggan'] = $this->db->query("SELECT * FROM md_pelanggan WHERE KD_PELANGGAN = '$kd_pelanggan'")->row_array();


    $data = [
        'KD_PELANGGAN' => $kd_pelanggan,
        'NM_PELANGGAN' => $nm_pelanggan,
        'NO_HP' => $no_hp,
        'ALAMAT' => $alamat,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_pelanggan', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Pelanggan berhasil ditambahkan !
                  </div>');
    redirect('masterdata/pelanggan');

}
public function delete_pelanggan($id)
{
    
    $this->db->query("DELETE FROM md_pelanggan WHERE md_pelanggan.KD_PELANGGAN = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Pelanggan berhasil dihapus !
                  </div>');
    redirect('masterdata/pelanggan');
}
public function edit_pelanggan(){
    $kd_pelanggan = $this->input->post('kd_pelanggan');
    $nm_pelanggan = $this->input->post('nm_pelanggan');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $keterangan = $this->input->post('keterangan');

    $data = [
        'KD_PELANGGAN' => $kd_pelanggan,
        'NM_PELANGGAN' => $nm_pelanggan,
        'NO_HP' => $no_hp,
        'ALAMAT' => $alamat,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_PELANGGAN',$kd_pelanggan);
    $this->db->update('md_pelanggan',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Pelanggan berhasil diedit !
      </div>');
    redirect('masterdata/pelanggan');
}

public function supplier()
{
    $data['title'] = 'Supplier';

    $data['supplier'] = $this->db->query("SELECT * FROM md_supplier")->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('masterdata/supplier', $data);
    $this->load->view('template/footer', $data);
}

function tambah_supplier() {
    
    $kd_supplier = $this->input->post('kd_supplier');
    $nm_supplier = $this->input->post('nm_supplier');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $keterangan = $this->input->post('keterangan');

    $data['supplier'] = $this->db->query("SELECT * FROM md_supplier WHERE KD_SUPPLIER = '$kd_supplier'")->row_array();


    $data = [
        'KD_SUPPLIER' => $kd_supplier,
        'NM_SUPPLIER' => $nm_supplier,
        'NO_HP' => $no_hp,
        'ALAMAT' => $alamat,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->insert('md_supplier', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Supplier berhasil ditambahkan !
                  </div>');
    redirect('masterdata/supplier');

}
public function delete_supplier($id)
{
    
    $this->db->query("DELETE FROM md_supplier WHERE md_supplier.KD_SUPPLIER = '$id'");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Supplier berhasil dihapus !
                  </div>');
    redirect('masterdata/supplier');
}
public function edit_supplier(){
    $kd_supplier = $this->input->post('kd_supplier');
    $nm_supplier = $this->input->post('nm_supplier');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $keterangan = $this->input->post('keterangan');

    $data = [
        'KD_SUPPLIER' => $kd_supplier,
        'NM_SUPPLIER' => $nm_supplier,
        'NO_HP' => $no_hp,
        'ALAMAT' => $alamat,
        'KETERANGAN' => $keterangan,
    ];
    $this->db->where ('KD_SUPPLIER',$kd_supplier);
    $this->db->update('md_supplier',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Supplier berhasil diedit !
      </div>');
    redirect('masterdata/supplier');
}

public function dokumen()
	{
		$data['title'] = 'Dokumen';

        $data['dokumen'] = $this->db->query("SELECT * FROM md_dokumen")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('masterdata/dokumen', $data);
		$this->load->view('template/footer', $data);
	}
    function tambah_dokumen() {
        
        $kd_dokumen = $this->input->post('kd_dokumen');
        $nm_dokumen = $this->input->post('nm_dokumen');
        $tipe_transaksi = $this->input->post('tipe_transaksi');
        $keterangan = $this->input->post('keterangan');

        $data['dokumen'] = $this->db->query("SELECT * FROM md_dokumen WHERE KD_DOKUMEN = '$kd_dokumen'")->row_array();


        $data = [
            'KD_DOKUMEN' => $kd_dokumen,
            'NM_DOKUMEN' => $nm_dokumen,
            'TIPE_TRANSAKSI' => $tipe_transaksi,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->insert('md_dokumen', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Data Dokumen berhasil ditambahkan !
					  </div>');
		redirect('masterdata/dokumen');

    }
    public function delete_dokumen($id)
	{
		
		$this->db->query("DELETE FROM md_dokumen WHERE md_dokumen.KD_DOKUMEN = '$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Dokumen berhasil dihapus !
					  </div>');
		redirect('masterdata/dokumen');
	}
    public function edit_dokumen(){
        
        $kd_dokumen = $this->input->post('kd_dokumen');
        $nm_dokumen = $this->input->post('nm_dokumen');
        $tipe_transaksi = $this->input->post('tipe_transaksi');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'KD_DOKUMEN' => $kd_dokumen,
            'NM_DOKUMEN' => $nm_dokumen,
            'TIPE_TRANSAKSI' => $tipe_transaksi,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->where ('KD_DOKUMEN',$kd_dokumen);
        $this->db->update('md_dokumen',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Dokumen berhasil diedit !
          </div>');
        redirect('masterdata/dokumen');

   
    }

   

  

}
