<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KamarController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kamar');
		$this->load->model('m_ruang');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['view_kamar'] = $this->m_kamar->tampil_data()->result();
		$cek = $this->m_kamar->cek_jumlah("kamar")->num_rows();
		$ceksampah = $this->m_kamar->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'kamar_jumlah' => $cek,
			'jumlah_sampah_kamar' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatakamar', $data);
  }

	public function viewbin()
  {
		$data['kamar_bin'] = $this->m_kamar->tampil_data_bin()->result();
		$cek = $this->m_kamar->cek_jumlah("kamar")->num_rows();
		$ceksampah = $this->m_kamar->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'kamar_jumlah' => $cek,
			'jumlah_sampah_kamar' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatakamarTrash', $data);
  }

	public function tambah_kamar()
  {
		$data['ruangan'] = $this->m_ruang->tampil_data()->result();
    $this->load->view('admin/adddatakamar', $data);
  }

	public function tambah_aksi(){
		$idruangan = $this->input->post('idruangan');
		$nama = $this->input->post('namakamar');
		$kapasitas = $this->input->post('kapasitas');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'id_ruang'			   	=> $idruangan,
			'nama_kamar' 			  => $nama,
			'kapasitas_kamar'		=> $kapasitas,
			'keterangan'  => $keterangan,
			'status'			=> 1,
			'created_at'  => $date,
			'updated_at'  => $date
			);
		$this->m_kamar->input_data($data,'kamar');
		redirect('dashboard/admin/data/kamar');
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_kamar' => $id);
		$this->m_kamar->hapus_data($where,'kamar');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_kamar' => $id
		);
		$this->m_kamar->hapus_data_soft($where,$data,'kamar');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_kamar' => $id
		);
		$this->m_kamar->hapus_data_soft($where,$data,'kamar');

		echo 'succeed';
	}

	function edit_kamar($id){
		$where = array('id_kamar' => $id);
		$data['ruangan'] = $this->m_ruang->tampil_data()->result();
		$data['kamaredit'] = $this->m_kamar->edit_data($where,'kamar')->result();
		$this->load->view('admin/editdatakamar',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$idruangan = $this->input->post('idruangan');
		$nama = $this->input->post('namakamar');
		$kapasitas = $this->input->post('kapasitas');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'id_ruang'			   	=> $idruangan,
			'nama_kamar' 			  => $nama,
			'kapasitas_kamar'		=> $kapasitas,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_kamar' => $id
		);

		$this->m_kamar->update_data($where,$data,'kamar');
		redirect('dashboard/admin/data/kamar');
	}
}
