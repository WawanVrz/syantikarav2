<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DenahRuanganController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct(){
		parent::__construct();

		$this->load->model('m_ruang');
		$this->load->model('m_kamar');
		$this->load->model('m_transaksi');
		$this->load->model('m_transaksi_detil');
		$this->load->model('m_ruangan');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

	public function index()
	{
		// $data['kamar_dominikus'] = $this->m_kamar->tampil_data_denah_dominikus()->result();
		// $data['kamar_fransiskus'] = $this->m_kamar->tampil_data_denah_fransiskus()->result();
		// $data['kamar_antonius'] = $this->m_kamar->tampil_data_denah_antonius()->result();
		// $data['kamar_yohanes'] = $this->m_kamar->tampil_data_denah_yohanes()->result();
		// $data['kamar_yoseph'] = $this->m_kamar->tampil_data_denah_yoseph()->result();
		// $data['kamar_elisabeth'] = $this->m_kamar->tampil_data_denah_eli()->result();
		// $data['kamar_borromeus'] = $this->m_kamar->tampil_data_denah_boromeus()->result();
		// $data['kamar_sesilia'] = $this->m_kamar->tampil_data_denah_sesi()->result();
		// $data['kamar_carolus'] = $this->m_kamar->tampil_data_denah_carol()->result();
		// $data['transaksi_d'] = $this->m_transaksi->tampil_data()->result();
		// $data['ruang_d'] = $this->m_transaksi->tampil_data_dominikus()->result();
		// $data['ruang_f'] = $this->m_transaksi->tampil_data_fransiskus()->result();
		// $data['ruang_a'] = $this->m_transaksi->tampil_data_antonius()->result();
		// $data['ruang_ysp'] = $this->m_transaksi->tampil_data_yoseph()->result();
		// $data['ruang_yoh'] = $this->m_transaksi->tampil_data_yohanes()->result();
		// $data['ruang_e'] = $this->m_transaksi->tampil_data_elisabeth()->result();
		// $data['ruang_s'] = $this->m_transaksi->tampil_data_sesilia()->result();
		// $data['ruang_b'] = $this->m_transaksi->tampil_data_borromeus()->result();
		// $data['ruang_c'] = $this->m_transaksi->tampil_data_carolus()->result();
		$where =  array(
			'tgl_checkin' => $this->input->get('tgl_checkin'),
			'tgl_checkout' => $this->input->get('tgl_checkout')
		);

		$data['ruangdenah'] = $this->m_transaksi->getNamaRuangDenah($where)->result();
		$data['allruangd1'] = $this->m_transaksi->tampil_data_allruang1()->result();
		$data['allruangd2'] = $this->m_transaksi->tampil_data_allruang2()->result();
		$this->load->view('admin/denahruangan',$data);
	}

	function getTRuang()
	{
		$where =  array(
			'tgl_checkin' => $this->input->get('tgl_checkin'),
			'tgl_checkout' => $this->input->get('tgl_checkout')
		);

		$data['ruangdenah'] = $this->m_transaksi->getNamaRuangDenah($where)->result();
		$data['allruangd1'] = $this->m_transaksi->tampil_data_allruang1()->result();
		$data['allruangd2'] = $this->m_transaksi->tampil_data_allruang2()->result();
		$this->load->view('admin/denahruangan',$data);
	}
}
