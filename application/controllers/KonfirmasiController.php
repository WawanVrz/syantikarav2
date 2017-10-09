<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_transaksi');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

	public function checkin()
  {
		$cari=$this->input->get('cari');
		$beda['cari']=$this->m_transaksi->caridata($cari);
		$beda['cari_detail']=$this->m_transaksi->cari_detail_tamu($cari);
    $this->load->view('admin/checkinform', $beda);
  }

	function cekdetail(){
		$cari = $_GET['id'];
		$detil['cekdetil']=$this->m_transaksi->caridatadetil($cari);
	//	$beda['cekdetiltamu']=$this->m_transaksi->cari_detail_tamu($cari);
		$this->load->view('admin/checkinform', $detil);
		echo 'succeed';
	}

	public function checkout()
	{
		$cari=$this->input->get('cari');
		$beda['cari']=$this->m_transaksi->caridata($cari);
		$beda['cari_detail']=$this->m_transaksi->cari_detail_tamu($cari);
		$this->load->view('admin/checkoutform', $beda);
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_konsumsi' => $id
		);
		$this->m_konsumsi->hapus_data_soft($where,$data,'konsumsi');

		echo 'succeed';
	}

	function checkinproses(){
		$id = $_GET['id'];
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$status = 'Check In';

		$data = array(
			'status_order' 	=> $status,
			'updated_at' => $date
		);

		$where = array(
			'id_transaksi' => $id
		);
		$this->m_transaksi->checkin_proses($where,$data,'transaksi');
		echo 'succeed';
	}

	function checkoutproses(){
		$id = $_GET['id'];
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$status = 'Check Out';

		$data = array(
			'status_order' 	=> $status,
			'updated_at' => $date
		);

		$where = array(
			'id_transaksi' => $id
		);
		$this->m_transaksi->checkout_proses($where,$data,'transaksi');
		echo 'succeed';
	}

}
