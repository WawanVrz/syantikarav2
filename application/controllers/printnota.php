<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class printnota extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_ruang');
		$this->load->model('m_kamar');
		$this->load->model('m_transaksi');
		$this->load->model('m_transaksi_detil');
		$this->load->model('m_jenistamu');
		$this->load->model('m_jenistarif');
		$this->load->model('m_additional');
		$this->load->model('m_ruangan');
		$this->load->model('m_users');
		$this->load->model('m_transaksi_additional_detail');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

	public function index()
  {
    $this->load->view('admin/nota1');
  }

  public function notapembayaran($id)
	{
		date_default_timezone_set("Asia/Jakarta");
		$date = date('d-m-Y');

		$this->load->library('pdfgeneratornota');
    $data['detilreservasi'] = $this->m_transaksi->detail_data_print($id)->result();
		$data['detiljasa'] = $this->m_transaksi->getDetailPrint($id)->result();
		$data['detiljasakonsumsi'] = $this->m_transaksi->getDetailPrintkonsumsi($id)->result();
		$data['detiljasakontribusitempat'] = $this->m_transaksi->getDetailPrintkontribusitempat($id)->result();
		$data['detiljasakontribusiyayasan'] = $this->m_transaksi->getDetailPrintkontribusiyayasan($id)->result();
		$data['namapj'] = $this->m_users->tampilpenanggungjawab()->result();
	  $html = $this->load->view('admin/notaprint', $data, true);
	  $this->pdfgeneratornota->generate($html,'Nota Transaksi RPCB Syantikara - '.$date.'');
	}
}
