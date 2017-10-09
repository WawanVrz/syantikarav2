<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->model('m_berita');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
		$data['berita'] = $this->m_berita->tampil_data_public_limit()->get()->result();
		$this->load->view('welcome', $data);
	}
}
