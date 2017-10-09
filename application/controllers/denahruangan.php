<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class denahruangan extends CI_Controller {

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
		$data = array(
			'tglcheckin' => $this->input->get('tgl_checkin'),
			'tglcheckout' => $this->input->get('tgl_checkout'),
		);

		$data['kamar_dominikus'] = $this->m_kamar->tampil_data_denah_dominikus()->result();
		$data['kamar_fransiskus'] = $this->m_kamar->tampil_data_denah_fransiskus()->result();
		$data['kamar_antonius'] = $this->m_kamar->tampil_data_denah_antonius()->result();
		$data['kamar_yohanes'] = $this->m_kamar->tampil_data_denah_yohanes()->result();
		$data['kamar_yoseph'] = $this->m_kamar->tampil_data_denah_yoseph()->result();
		$data['kamar_elisabeth'] = $this->m_kamar->tampil_data_denah_eli()->result();
		$data['kamar_borromeus'] = $this->m_kamar->tampil_data_denah_boromeus()->result();
		$data['kamar_sesilia'] = $this->m_kamar->tampil_data_denah_sesi()->result();
		$data['kamar_carolus'] = $this->m_kamar->tampil_data_denah_carol()->result();
		$data['paulus'] = $this->m_kamar->tampil_data_denah_paulus()->result();
		$data['sidangkecil'] = $this->m_kamar->tampil_data_denah_sidang()->result();
		$data['konsultasi'] = $this->m_kamar->tampil_data_denah_konsultasi()->result();
		$data['transit'] = $this->m_kamar->tampil_data_denah_transit()->result();
		$data['rmakanbesar'] = $this->m_kamar->tampil_data_denah_rmbesar()->result();
		$data['rmakankecil'] = $this->m_kamar->tampil_data_denah_rmkecil()->result();
		$data['aula'] = $this->m_kamar->tampil_data_denah_aula()->result();
		$data['mensa'] = $this->m_kamar->tampil_data_denah_mensa()->result();
		$data['rapat'] = $this->m_kamar->tampil_data_denah_rapat()->result();
		$data['lobby'] = $this->m_kamar->tampil_data_denah_lobby()->result();

		$where =  array(
			'tgl_checkin' => $this->input->get('tgl_checkin'),
			'tgl_checkout' => $this->input->get('tgl_checkout')
		);
		$data['transaksi_d'] = $this->m_transaksi->tampilfordenah($where)->result();
		$data['transaksi_pertemuan'] = $this->m_transaksi->tampilfordenahpertemuan($where)->result();
		$data['transaksi_pertemuanyayasan'] = $this->m_transaksi->tampilfordenahpertemuanyayasan($where)->result();
		$data['ruangdenah'] = $this->m_transaksi->getNamaRuangDenah($where)->result();
		$data['ruangdenahpertemuan'] = $this->m_transaksi->getNamaRuangDenahPertemuan($where)->result();
		$data['ruangdenahpertemuanyayasan'] = $this->m_transaksi->getNamaRuangDenahPertemuanyayasan($where)->result();
		$data['allruangd1'] = $this->m_transaksi->tampil_data_allruang1()->result();
		$data['allruangd2'] = $this->m_transaksi->tampil_data_allruang2()->result();
		$data['allruangd3'] = $this->m_transaksi->tampil_data_allruang3()->result();
		$this->load->view('admin/denahruangan',$data);
	}

	function denah()
	{
		$data = array(
			'error' => 'no',
			'tglcheckin' => $this->input->get('tgl_checkin'),
			'tglcheckout' => $this->input->get('tgl_checkout'),
		);

		$data['kamar_dominikus'] = $this->m_kamar->tampil_data_denah_dominikus()->result();
		$data['kamar_fransiskus'] = $this->m_kamar->tampil_data_denah_fransiskus()->result();
		$data['kamar_antonius'] = $this->m_kamar->tampil_data_denah_antonius()->result();
		$data['kamar_yohanes'] = $this->m_kamar->tampil_data_denah_yohanes()->result();
		$data['kamar_yoseph'] = $this->m_kamar->tampil_data_denah_yoseph()->result();
		$data['kamar_elisabeth'] = $this->m_kamar->tampil_data_denah_eli()->result();
		$data['kamar_borromeus'] = $this->m_kamar->tampil_data_denah_boromeus()->result();
		$data['kamar_sesilia'] = $this->m_kamar->tampil_data_denah_sesi()->result();
		$data['kamar_carolus'] = $this->m_kamar->tampil_data_denah_carol()->result();
		$data['paulus'] = $this->m_kamar->tampil_data_denah_paulus()->result();
		$data['sidangkecil'] = $this->m_kamar->tampil_data_denah_sidang()->result();
		$data['konsultasi'] = $this->m_kamar->tampil_data_denah_konsultasi()->result();
		$data['transit'] = $this->m_kamar->tampil_data_denah_transit()->result();
		$data['rmakanbesar'] = $this->m_kamar->tampil_data_denah_rmbesar()->result();
		$data['rmakankecil'] = $this->m_kamar->tampil_data_denah_rmkecil()->result();
		$data['aula'] = $this->m_kamar->tampil_data_denah_aula()->result();
		$data['mensa'] = $this->m_kamar->tampil_data_denah_mensa()->result();
		$data['rapat'] = $this->m_kamar->tampil_data_denah_rapat()->result();
		$data['lobby'] = $this->m_kamar->tampil_data_denah_lobby()->result();

		$where =  array(
			'tgl_checkin' => $this->input->get('tgl_checkin'),
			'tgl_checkout' => $this->input->get('tgl_checkout')
		);
		$data['transaksi_d'] = $this->m_transaksi->tampilfordenah($where)->result();
		$data['transaksi_pertemuan'] = $this->m_transaksi->tampilfordenahpertemuan($where)->result();
		$data['transaksi_pertemuanyayasan'] = $this->m_transaksi->tampilfordenahpertemuanyayasan($where)->result();
		$data['ruangdenah'] = $this->m_transaksi->getNamaRuangDenah($where)->result();
		$data['ruangdenahpertemuan'] = $this->m_transaksi->getNamaRuangDenahPertemuan($where)->result();
		$data['ruangdenahpertemuanyayasan'] = $this->m_transaksi->getNamaRuangDenahPertemuanyayasan($where)->result();
		$data['allruangd1'] = $this->m_transaksi->tampil_data_allruang1()->result();
		$data['allruangd2'] = $this->m_transaksi->tampil_data_allruang2()->result();
		$data['allruangd3'] = $this->m_transaksi->tampil_data_allruang3()->result();
		$this->load->view('admin/denahruangan',$data);
		// echo json_encode($hasil);
	}
}
