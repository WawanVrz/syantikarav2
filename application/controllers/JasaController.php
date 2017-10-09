<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JasaController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_jasa');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['jenis_jasa'] = $this->m_jasa->tampil_data()->result();
		$cek = $this->m_jasa->cek_jumlah("jasa")->num_rows();
		$ceksampah = $this->m_jasa->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_jasa_jumlah' => $cek,
			'jumlah_sampah_jasa' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatajasa', $data);
  }

	public function viewbin()
  {
		$data['jenis_jasa_bin'] = $this->m_jasa->tampil_data_bin()->result();
		$cek = $this->m_jasa->cek_jumlah("jasa")->num_rows();
		$ceksampah = $this->m_jasa->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_jasa_jumlah' => $cek,
			'jumlah_sampah_jasa' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatajasaTrash', $data);
  }

	public function tambah_jasa()
  {
    $this->load->view('admin/adddatajasa');
  }

	public function tambah_aksi(){
		$jasa = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'nama_jasa' => $jasa,
			);
		$cek = $this->m_jasa->cek_jasa("jasa",$where)->num_rows();

		if($cek > 0)
		{
			if($jasa != "" && $keterangan != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Ingat! Nama Jasa Tidak Boleh Sama </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/jasa/add");
			}else {
				redirect("dashboard/admin/data/jasa/add");
			}
		}else {
				$data = array(
					'nama_jasa'		=> $jasa,
					'keterangan'  => $keterangan,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date
					);
				$this->m_jasa->input_data($data,'jasa');
				redirect('dashboard/admin/data/jasa');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_jasa' => $id);
		$this->m_jasa->hapus_data($where,'jasa');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_jasa' => $id
		);
		$this->m_jasa->hapus_data_soft($where,$data,'jasa');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_jasa' => $id
		);
		$this->m_jasa->hapus_data_soft($where,$data,'jasa');

		echo 'succeed';
	}

	function edit_jasa($id){
		$where = array('id_jasa' => $id);
		$data['jenis_jasa'] = $this->m_jasa->edit_data($where,'jasa')->result();
		$this->load->view('admin/editdatajasa',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$jasa = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'nama_jasa'	=> $jasa,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_jasa' => $id
		);

		$this->m_jasa->update_data($where,$data,'jasa');
		redirect('dashboard/admin/data/jasa');
	}
}
