<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_report');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

	public function index()
  {
		$beda = array(
			'tglcheckin' => $this->input->get('tgl_checkin'),
			'tglcheckout' => $this->input->get('tgl_checkout'),
		);
		$cariin = $this->input->get('tgl_checkin');
		$cariout = $this->input->get('tgl_checkout');
		$beda['cari']=$this->m_report->tampil_data($cariin, $cariout);
		$beda['caritotalhari']=$this->m_report->tampil_datatotal($cariin, $cariout);
    $this->load->view('admin/reportingview', $beda);
  }

	public function indexbulanan()
  {
		$beda = array(
			'bln' => $this->input->get('laporanbulanan'),
			'thn' => $this->input->get('laporantahunan'),
			'bulanku' => ""
		);
		$caribulan = $this->input->get('laporanbulanan');
		$caritahun = $this->input->get('laporantahunan');
		$beda['cari']=$this->m_report->tampil_data_bulanan($caribulan,$caritahun);
		$beda['caritotal']=$this->m_report->tampil_data_bulanantotal($caribulan,$caritahun);
    $this->load->view('admin/reportingviewbulanan', $beda);
  }

	public function indextahunan()
  {
		$beda = array(
			'thn' => $this->input->get('laporantahunan')
		);
		$caritahun = $this->input->get('laporantahunan');
		$beda['cari']=$this->m_report->tampil_data_tahunan($caritahun);
		$beda['cari1']=$this->m_report->tampil_data_tahunan1($caritahun);
		$beda['cari2']=$this->m_report->tampil_data_tahunan2($caritahun);
		$beda['cari3']=$this->m_report->tampil_data_tahunan3($caritahun);
		$beda['cari4']=$this->m_report->tampil_data_tahunan4($caritahun);
		$beda['cari5']=$this->m_report->tampil_data_tahunan5($caritahun);
		$beda['cari6']=$this->m_report->tampil_data_tahunan6($caritahun);
		$beda['cari7']=$this->m_report->tampil_data_tahunan7($caritahun);
		$beda['cari8']=$this->m_report->tampil_data_tahunan8($caritahun);
		$beda['cari9']=$this->m_report->tampil_data_tahunan9($caritahun);
		$beda['cari10']=$this->m_report->tampil_data_tahunan10($caritahun);
		$beda['cari11']=$this->m_report->tampil_data_tahunan11($caritahun);
		$beda['cari12']=$this->m_report->tampil_data_tahunan12($caritahun);

		$beda['caritotaltahun1']=$this->m_report->tampil_data_tahunantotal1($caritahun);
		$beda['caritotaltahun2']=$this->m_report->tampil_data_tahunantotal2($caritahun);
		$beda['caritotaltahun3']=$this->m_report->tampil_data_tahunantotal3($caritahun);
		$beda['caritotaltahun4']=$this->m_report->tampil_data_tahunantotal4($caritahun);
		$beda['caritotaltahun5']=$this->m_report->tampil_data_tahunantotal5($caritahun);
		$beda['caritotaltahun6']=$this->m_report->tampil_data_tahunantotal6($caritahun);
		$beda['caritotaltahun7']=$this->m_report->tampil_data_tahunantotal7($caritahun);
		$beda['caritotaltahun8']=$this->m_report->tampil_data_tahunantotal8($caritahun);
		$beda['caritotaltahun9']=$this->m_report->tampil_data_tahunantotal9($caritahun);
		$beda['caritotaltahun10']=$this->m_report->tampil_data_tahunantotal10($caritahun);
		$beda['caritotaltahun11']=$this->m_report->tampil_data_tahunantotal11($caritahun);
		$beda['caritotaltahun12']=$this->m_report->tampil_data_tahunantotal12($caritahun);

    $this->load->view('admin/reportingviewtahunan', $beda);
  }

	public function ReportHarianPdf()
	{
		$this->load->library('pdfgenerator');
		$cariin = $this->input->get('checkin');
		$cariout = $this->input->get('checkout');
		$data['carihari']=$this->m_report->tampil_data($cariin, $cariout);
		$data['caritotalhari']=$this->m_report->tampil_datatotal($cariin, $cariout);
		$data['awal'] = $cariin;
		$data['akhir'] = $cariout;
	  $html = $this->load->view('admin/reportingviewprint', $data, true);
	  $this->pdfgenerator->generate($html,'Transaksi Reservasi RPCB Syantikara');
	}

	public function ReportBulananPdf()
	{
		$this->load->library('pdfgenerator');
		$caribulan = $this->input->get('bulananku');
		$caritahun = $this->input->get('tahunku');
		$caribulankarakter = $this->input->get('bulanankarakter');
		$data['cari']=$this->m_report->tampil_data_bulanan($caribulan,$caritahun);
		$data['caritotal']=$this->m_report->tampil_data_bulanantotal($caribulan,$caritahun);
		$data['bulan'] = $caribulankarakter;
		$data['tahun'] = $caritahun;
	  $html = $this->load->view('admin/reportingviewbulananprint', $data, true);
	  $this->pdfgenerator->generate($html,'Transaksi Reservasi RPCB Syantikara');
	}

	public function ReportTahunanPdf()
	{
		$this->load->library('pdfgenerator');

		$caritahun = $this->input->get('laporantahun');

		$data['cari1']=$this->m_report->tampil_data_tahunan1($caritahun);
		$data['cari2']=$this->m_report->tampil_data_tahunan2($caritahun);
		$data['cari3']=$this->m_report->tampil_data_tahunan3($caritahun);
		$data['cari4']=$this->m_report->tampil_data_tahunan4($caritahun);
		$data['cari5']=$this->m_report->tampil_data_tahunan5($caritahun);
		$data['cari6']=$this->m_report->tampil_data_tahunan6($caritahun);
		$data['cari7']=$this->m_report->tampil_data_tahunan7($caritahun);
		$data['cari8']=$this->m_report->tampil_data_tahunan8($caritahun);
		$data['cari9']=$this->m_report->tampil_data_tahunan9($caritahun);
		$data['cari10']=$this->m_report->tampil_data_tahunan10($caritahun);
		$data['cari11']=$this->m_report->tampil_data_tahunan11($caritahun);
		$data['cari12']=$this->m_report->tampil_data_tahunan12($caritahun);

		$data['caritotaltahun1']=$this->m_report->tampil_data_tahunantotal1($caritahun);
		$data['caritotaltahun2']=$this->m_report->tampil_data_tahunantotal2($caritahun);
		$data['caritotaltahun3']=$this->m_report->tampil_data_tahunantotal3($caritahun);
		$data['caritotaltahun4']=$this->m_report->tampil_data_tahunantotal4($caritahun);
		$data['caritotaltahun5']=$this->m_report->tampil_data_tahunantotal5($caritahun);
		$data['caritotaltahun6']=$this->m_report->tampil_data_tahunantotal6($caritahun);
		$data['caritotaltahun7']=$this->m_report->tampil_data_tahunantotal7($caritahun);
		$data['caritotaltahun8']=$this->m_report->tampil_data_tahunantotal8($caritahun);
		$data['caritotaltahun9']=$this->m_report->tampil_data_tahunantotal9($caritahun);
		$data['caritotaltahun10']=$this->m_report->tampil_data_tahunantotal10($caritahun);
		$data['caritotaltahun11']=$this->m_report->tampil_data_tahunantotal11($caritahun);
		$data['caritotaltahun12']=$this->m_report->tampil_data_tahunantotal12($caritahun);

		$data['tahunan'] = $caritahun;
	  $html = $this->load->view('admin/reportingviewtahunanprint', $data, true);
	  $this->pdfgenerator->generate($html,'Transaksi Reservasi RPCB Syantikara');
	}

}
