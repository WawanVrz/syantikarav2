<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBeritaController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kategoriberita');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['kategori'] = $this->m_kategoriberita->tampil_data()->result();
		$cek = $this->m_kategoriberita->cek_jumlah("news_category")->num_rows();
		$ceksampah = $this->m_kategoriberita->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'kategori_jumlah' => $cek,
			'jumlah_sampah_kategori' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatakategoriberita', $data);
  }

	public function viewbin()
  {
		$data['kategori'] = $this->m_kategoriberita->tampil_data_bin()->result();
		$cek = $this->m_kategoriberita->cek_jumlah("news_category")->num_rows();
		$ceksampah = $this->m_kategoriberita->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'kategori_jumlah' => $cek,
			'jumlah_sampah_kategori' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatakategoriberitaTrash', $data);
  }

	public function tambah_kategori()
  {
    $this->load->view('admin/adddatakategoriberita');
  }

	public function tambah_aksi(){
		$nama = $this->input->post('namakategori');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'kategori'	=> $nama,
			'keterangan'  => $keterangan,
			'status'			=> 1,
			'created_at'  => $date,
			'updated_at'  => $date
			);
		$this->m_kategoriberita->input_data($data,'news_category');
		redirect('dashboard/admin/data/berita/kategori');
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_kategori' => $id);
		$this->m_kategoriberita->hapus_data($where,'news_category');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_kategori' => $id
		);
		$this->m_kategoriberita->hapus_data_soft($where,$data,'news_category');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_kategori' => $id
		);
		$this->m_kategoriberita->hapus_data_soft($where,$data,'news_category');

		echo 'succeed';
	}

	function edit_kategori($id){
		$where = array('id_kategori' => $id);
		$data['kategori'] = $this->m_kategoriberita->edit_data($where,'news_category')->result();
		$this->load->view('admin/editdatakategoriberita',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('namakategori');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'kategori'	=> $nama,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_kategori' => $id
		);

		$this->m_kategoriberita->update_data($where,$data,'news_category');
		redirect('dashboard/admin/data/berita/kategori');
	}
}
