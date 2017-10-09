<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->model('m_gallery');
		$this->load->helper('url');
		$this->load->library('pagination');
	}

  public function index($page = 1)
  {
			 //hitung total data
			 $total = $this->m_gallery->jumlah_data();
			 //ambil data
			 $limit  = 6; //menentukan limit/jumlah data yang akan ditampilkan per page
			 $result = $this->m_gallery->data($limit, $page);
			 //menentukan url pagination
			 $url = site_url('Galleries/index/');
        //config library pagination dengan style twitter bootstrap css
        $config['base_url']         = $url;
        $config['total_rows']       = $total;
        $config['per_page']         = $limit;
        $config['use_page_numbers'] = true;
        $config['num_links']        = 5;
				$config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='gallery'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link']='< Pertama ';
        $config['last_link']='Terakhir > ';
        $config['next_link']='&raquo;';
        $config['prev_link']='&laquo;';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['result']     = $result;
				$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
				// $data['gallery'] = $this->m_gallery->tampil_data_public()->result();
		    $this->load->view('main_gallery', $data);
  }
}
