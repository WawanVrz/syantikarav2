<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyReservation extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->model('m_transaksi');
		$this->load->model('m_transaksi_detil');
		$this->load->helper('url');
		if($this->session->userdata('status') != "Login"){
			redirect("/");
		}
	}

  public function index()
  {
		$nama = $this->session->userdata('fullname');

		$data['reservasi'] = $this->m_transaksi->view_data_public($nama)->result();
		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
	  $this->load->view('main_List_Reservation', $data);
  }

	public function detail($id)
  {
		$data['detailreservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['detil_tamu'] = $this->m_transaksi->detail_tamu($id)->result();
		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
	  $this->load->view('main_List_Reservation_Detail', $data);
  }
}
