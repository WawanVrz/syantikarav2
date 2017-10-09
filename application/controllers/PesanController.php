<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesanController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_pesan');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
			$data['pesan'] = $this->m_pesan->tampil_data_all()->result();
			$cek = $this->m_pesan->cek_jumlah("pesan")->num_rows();
			$ceksampah = $this->m_pesan->cek_jumlah_sampah()->num_rows();
			$data_session = array(
				'pesan_jumlah' => $cek,
				'jumlah_sampah_pesan' => $ceksampah
				);
			$this->session->set_userdata($data_session);
	    $this->load->view('admin/viewdatapesan', $data);
  }

	function getPesan()
	{
			$output = $this->m_pesan->tampil_data();
			echo json_encode($output->result());
	}

	public function viewbin()
  {
		$data['pesantrash'] = $this->m_pesan->tampil_data_bin()->result();
		$cek = $this->m_pesan->cek_jumlah("pesan")->num_rows();
		$ceksampah = $this->m_pesan->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'pesan_jumlah' => $cek,
			'jumlah_sampah_pesan' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatapesanTrash', $data);
  }

	public function detail($id)
	{
			$data['pesandetail'] = $this->m_pesan->tampil_data_detail($id)->result();
			$this->load->view('admin/viewdatapesandetail', $data);
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_pesan' => $id);
		$this->m_pesan->hapus_data($where,'pesan');
		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'ac' 	=> $status
		);

		$where = array(
			'id_pesan' => $id
		);
		$this->m_pesan->hapus_data_soft($where,$data,'pesan');
		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'ac' 	=> $status
		);

		$where = array(
			'id_pesan' => $id
		);
		$this->m_pesan->hapus_data_soft($where,$data,'pesan');
		echo 'succeed';
	}

	function prosesstatus(){
		$id = $_GET['id'];
		$status = "read";

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_pesan' => $id
		);
		$this->m_pesan->proses_status($where,$data,'pesan');
		echo 'succeed';
	}
}
