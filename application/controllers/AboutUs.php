<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->helper('url');
	}

  public function index()
  {
		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
    $this->load->view('main_about', $data);
  }
}
