<?php

use Dompdf\Dompdf;
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Pembelian';
        $this->db->select('detail_pembelian.*, md_produk.*, md_supplier.*, beli.KD_BELI, beli.KETERANGAN as ket,BELI.HARGA_BELI,beli.
        DISKON,beli.JUMLAH,beli.TOTAL,beli.GRAND_TOTAL,beli.TANGGAL,beli.NO_NOTA');
        $this->db->from('detail_pembelian');
        $this->db->join('md_produk', 'detail_pembelian.kd_produk = md_produk.KD_PRODUK');
        $this->db->join('md_supplier', 'detail_pembelian.kd_supplier = md_supplier.KD_SUPPLIER');
        $this->db->join('beli', 'detail_pembelian.KD_BELI = beli.KD_BELI'); // Join dengan tabel "beli"
        $query = $this->db->get();
        $data['detail_pembelian'] = $query->result_array();

        $data['produk'] = $this->db->query("SELECT * FROM md_produk")->result_array();
        $data['supplier'] = $this->db->query("SELECT * FROM md_supplier")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer', $data);
	}
    // function tambah_pembelian() {
        
    //     $no_nota = $this->input->post('no_nota');
    //     $diskon = $this->input->post('diskon');
    //     $jumlah = $this->input->post('jumlah');
    //     $produk = $this->input->post('produk');
    //     $supplier = $this->input->post('supplier');
    //     $keterangan = $this->input->post('keterangan');

    //     $data['produk'] = $this->db->query("SELECT * FROM md_produk WHERE KD_PRODUK = '$produk'")->row_array();

    //     $harga_beli = $data['produk']['HARGA_BELI'];
    //     $total = $harga_beli * $jumlah;
    //     $grand_total = $total * ($diskon/100);

    //     $data = [
    //         'NO_NOTA' => $no_nota,
    //         'TANGGAL' => date('Y-m-d'),
    //         'KD_PRODUK' => $produk,
    //         'KD_SUPPLIER' => $supplier,
    //         'DISKON' => $diskon,
    //         'HARGA_BELI' => $harga_beli,
    //         'JUMLAH' => $jumlah,
    //         'TOTAL' => $total,
    //         'GRAND_TOTAL' => $grand_total,
    //         'KETERANGAN' => $keterangan,
    //     ];
    //     $this->db->insert('beli', $data);

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	// 				Pembelian berhasil ditambahkan !
	// 				  </div>');
	// 	redirect('admin/index');

    // }



    public function tambah_pembelian()
    {
        $no_nota = $this->input->post('no_nota');
        $diskon = (float) $this->input->post('diskon');
        $produk = $this->input->post('produk');
        $jumlah_produk = $this->input->post('jumlah');
        $suppliers = $this->input->post('supplier');
    
        // Simpan data pembelian ke dalam tabel pembelian
        $data_pembelian = array(
            'NO_NOTA' => $no_nota,
            'TANGGAL' => date('Y-m-d'), // Tanggal sekarang
            'DISKON' => $diskon,
            'KETERANGAN' => $this->input->post('keterangan'),
            'GRAND_TOTAL' => 0, // Nantinya akan diisi setelah perhitungan
        );
    
        $this->db->insert('beli', $data_pembelian);
        $pembelian_id = $this->db->insert_id(); // Ambil ID pembelian yang baru saja dimasukkan
    
        $total_sebelum_diskon = 0;
    
        // Simpan data detail pembelian ke dalam tabel detail_pembelian
        foreach ($produk as $key => $value) {
            if (is_array($produk) && array_key_exists($key, $jumlah_produk) && array_key_exists($key, $suppliers)) {
                $data_detail_pembelian = array(
                    'KD_BELI' => $pembelian_id,
                    'KD_PRODUK' => $value,
                    'jumlah' => (int) $jumlah_produk[$key], // Ubah tipe data menjadi integer
                    'KD_SUPPLIER' => $suppliers[$key],
                );
    
                // Simpan data detail pembelian ke dalam tabel detail_pembelian
                $this->db->insert('detail_pembelian', $data_detail_pembelian);
    
                // Tambahkan data jumlah ke dalam array $produk sehingga dapat ditampilkan di view
                $produk[$key]['jumlah'] = $data_detail_pembelian['jumlah'];
    
                // Ambil harga produk dari tabel md_produk berdasarkan KD_PRODUK
                $data_produk = $this->db->query("SELECT * FROM md_produk WHERE KD_PRODUK = '$value'")->row_array();
                $harga_beli = (float) $data_produk['HARGA_BELI'];
    
                // Hitung total harga sebelum diskon untuk setiap produk
                $total_sebelum_diskon += $harga_beli * (float) $jumlah_produk[$key];
            }
        }
    
        // Hitung GRAND_TOTAL setelah diskon
        $grand_total = $total_sebelum_diskon - ($total_sebelum_diskon * ($diskon / 100));
    
        // Update GRAND_TOTAL dalam data pembelian
        $this->db->where('KD_BELI', $pembelian_id);
        $this->db->update('beli', array('GRAND_TOTAL' => $grand_total));
    
        // Redirect atau berikan pesan sukses
        $this->session->set_flashdata('message', 'Data pembelian berhasil disimpan.');
        redirect('admin/index');
    }
    
    

    
    



    public function penjualan()
	{
		$data['title'] = 'Penjualan';


		$data['jual'] = $this->db->query("SELECT jual.NO_NOTA, jual.TANGGAL, jual.DISKON, jual.JUMLAH, jual.TOTAL, jual.GRAND_TOTAL, jual.KETERANGAN as ket, md_produk.*, md_pelanggan.* FROM jual,md_produk,md_pelanggan WHERE jual.KD_PRODUK = md_produk.KD_PRODUK AND jual.KD_PELANGGAN = md_pelanggan.KD_PELANGGAN")->result_array();
        $data['produk'] = $this->db->query("SELECT * FROM md_produk")->result_array();
        $data['pelanggan'] = $this->db->query("SELECT * FROM md_pelanggan")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/penjualan', $data);
		$this->load->view('template/footer', $data);
	}
    function tambah_penjualan() {
        
        $no_nota = $this->input->post('no_nota');
        $diskon = $this->input->post('diskon');
        $jumlah = $this->input->post('jumlah');
        $produk = $this->input->post('produk');
        $supplier = $this->input->post('pelanggan');
        $keterangan = $this->input->post('keterangan');

        $data['produk'] = $this->db->query("SELECT * FROM md_produk WHERE KD_PRODUK = '$produk'")->row_array();

        $harga_jual = $data['produk']['HARGA_JUAL'];
        $total = $harga_jual * $jumlah;
        $grand_total = $total * ($diskon/100);

        $data = [
            'NO_NOTA' => $no_nota,
            'TANGGAL' => date('Y-m-d'),
            'KD_PRODUK' => $produk,
            'KD_PELANGGAN' => $supplier,
            'DISKON' => $diskon,
            'HARGA_JUAL' => $harga_jual,
            'JUMLAH' => $jumlah,
            'TOTAL' => $total,
            'GRAND_TOTAL' => $grand_total,
            'KETERANGAN' => $keterangan,
        ];
        $this->db->insert('jual', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Penjualan berhasil ditambahkan !
					  </div>');
		redirect('admin/penjualan');
        
    }
    public function editpenjualan()
    {
        $data = [
    
            'no_nota' => $this->input->post('no_nota'),
            'diskon' => $this->input->post('diskon'),
            'jumlah' => $this->input->post('jumlah'),
            'produk' => $this->input->post('produk'),
            'pelanggan' => $this->input->post('pelanggan'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->db->where('no_nota', $this->input->post('no_nota'));
        $this->db->update('jual', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					data berhasil di ubah !
					  </div>');
        redirect('admin/penjualan');
    }

    public function hapus_jual($id)
    {
        $this->db->delete('jual', array('no_nota' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data berhasil di hapus !
          </div>');
        redirect('admin/penjualan');
    }
    public function transaksi()
	{
		$data['title'] = 'Transaksi';


		$data['transaksi'] = $this->db->query("SELECT transaksi.KD_TRANSAKSI, transaksi.NO_TRANSAKSI, transaksi.TGL_TRANSAKSI, transaksi.TOTAL, transaksi.KEPERLUAN, transaksi.KETERANGAN as ket, md_jntransaksi.*, md_jnbayar.*, md_dokumen.* FROM transaksi,md_jntransaksi,md_jnbayar,md_dokumen WHERE transaksi.KD_JNTRANSAKSI = md_jntransaksi.KD_JNTRANSAKSI AND transaksi.KD_JNBAYAR = md_jnbayar.KD_JNBAYAR AND transaksi.KD_DOKUMEN = md_dokumen.KD_DOKUMEN")->result_array();
        $data['jntransaksi'] = $this->db->query("SELECT * FROM md_jntransaksi")->result_array();
        $data['jnbayar'] = $this->db->query("SELECT * FROM md_jnbayar")->result_array();
        $data['dokumen'] = $this->db->query("SELECT * FROM md_dokumen")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('template/footer', $data);
	}
    function tambah_transaksi() {
        
        $kd_transaksi = $this->input->post('kd_transaksi');
        $jntransaksi = $this->input->post('jntransaksi');
        $jnbayar = $this->input->post('jnbayar');
        $dokumen = $this->input->post('dokumen');
        $no_transaksi= $this->input->post('no_transaksi');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $total = $this->input->post('total');
        $keperluan = $this->input->post('keperluan');
        $keterangan = $this->input->post('keterangan');


        $data = [
            'KD_TRANSAKSI' => $kd_transaksi,
            'KD_JNTRANSAKSI' => $jntransaksi,
            'KD_JNBAYAR' => $jnbayar,
            'KD_DOKUMEN' => $dokumen,
            'NO_TRANSAKSI' => $no_transaksi,
            'TGL_TRANSAKSI' => date('Y-m-d'),
            'TOTAL' => $total,
            'KEPERLUAN' => $keperluan,
            'KETERANGAN' => $keterangan,
        ];
    
        $this->db->insert('transaksi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Transaksi berhasil ditambahkan !
					  </div>');
		redirect('admin/transaksi');
        
    }
    public function edittransaksi()
    {
        $data = [
    
            'KD_TRANSAKSI' =>  $this->input->post('kd_transaksi'),
            'KD_JNTRANSAKSI' => $this->input->post('jntransaksi'),
            'KD_BAYAR' =>  $this->input->post('jnbayar'),
            'KD_DOKUMEN' => $this->input->post('dokumen'),
            'NO_TRANSAKSI' => $this->input->post('no_transaksi'),
            'TOTAL' => $this->input->post('total'),
            'KEPERLUAN' => $this->input->post('keperluan'),
            'KETERANGAN' => $this->input->post('keterangan'),
        ];

        $this->db->where('kd_transaksi', $this->input->post('kd_transaksi'));
        $this->db->update('transaksi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					data berhasil di ubah !
					  </div>');
        redirect('admin/transaksi');
    }

    public function hapus_transaksi($id)
    {
        $this->db->delete('transaksi', array('kd_transaksi' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data berhasil di hapus !
          </div>');
        redirect('admin/transaksi');
    }

    public function jurnal()
	{
		$data['title'] = 'Jurnal';


		$data['jurnal'] = $this->db->query("SELECT jurnal.KD_JURNAL, jurnal.`DEBET`, jurnal.`KREDIT`, jurnal.`KETERANGAN` AS ket, md_obyek.*, transaksi.* FROM jurnal,transaksi,md_obyek WHERE transaksi.KD_TRANSAKSI = jurnal.KD_TRANSAKSI AND jurnal.`KD_REKENING` = md_obyek.`KD_REKENING`")->result_array();
        $data['rekening'] = $this->db->query("SELECT * FROM md_obyek")->result_array();
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/jurnal', $data);
		$this->load->view('template/footer', $data);
	}
    public function tambah_jurnal()
    {
        // Ambil data dari form
        $kd_jurnal = $this->input->post('kd_jurnal');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $kd_rekening = $this->input->post('kd_rekening');
        $kd_transaksi = $this->input->post('kd_transaksi');
        $debet = $this->input->post('debet');
        $kredit = $this->input->post('kredit');
        $keterangan = $this->input->post('keterangan');

        // Lakukan validasi data jika diperlukan
        // ...

        // Lakukan proses penyimpanan data ke database
        $data = array(
            'KD_JURNAL' => $kd_jurnal,
            'TGL_TRANSAKSI' => $tgl_transaksi,
            'KD_REKENING' => $kd_rekening,
            'KD_TRANSAKSI' => $kd_transaksi,
            'DEBET' => $debet,
            'KREDIT' => $kredit,
            'KETERANGAN' => $keterangan
        );

        // Load library database
        $this->load->database();

        // Lakukan penyimpanan data ke dalam tabel database yang sesuai
        // Misalnya, jika tabel bernama 'tbl_jurnal', maka gunakan kode berikut:
        $this->db->insert('jurnal', $data);

        // Gantilah 'tbl_jurnal' dengan nama tabel yang sesuai dengan struktur database Anda.

        // Setelah data berhasil disimpan, redirect ke halaman yang diinginkan
        redirect('admin/jurnal');
    }
    public function editjurnal()
    {
        $data = [
    
            'KD_JURNAL' => $this->input->post('kd_jurnal'),
            'KD_REKENING' => $this->input->post('rekening'),
            'KD_TRANSAKSI' =>  $this->input->post('transaksi'),
            'DEBET' => $this->input->post('debet'),
            'KREDIT' => $this->input->post('kredit'),
            'KETERANGAN' => $this->input->post('keterangan'),
        ];

        $this->db->where('kd_jurnal', $this->input->post('kd_jurnal'));
        $this->db->update('jurnal', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					data berhasil di ubah !
					  </div>');
        redirect('admin/jurnal');
    }

    public function hapus_jurnal($id)
    {
        $this->db->delete('jurnal', array('kd_jurnal' => $id));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data berhasil di hapus !
          </div>');
        redirect('admin/jurnal');
    }

    public function laba_rugi(){

        $data['title'] = 'Jurnal';


		$data['jurnal'] = $this->db->query("SELECT jurnal.KD_JURNAL, jurnal.`DEBET`, jurnal.`KREDIT`, jurnal.`KETERANGAN` AS ket, md_obyek.*, transaksi.* FROM jurnal,transaksi,md_obyek WHERE transaksi.KD_TRANSAKSI = jurnal.KD_TRANSAKSI AND jurnal.`KD_REKENING` = md_obyek.`KD_REKENING`")->result_array();
        $data['obyek'] = $this->db->query("SELECT * FROM md_obyek")->result_array();
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/laba_rugi', $data);
		$this->load->view('template/footer', $data);

    }

}
