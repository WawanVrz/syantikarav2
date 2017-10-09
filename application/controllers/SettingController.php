<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['setting'] = $this->m_kontenweb->tampil_data()->result();
		$cek = $this->m_kontenweb->cek_jumlah("setting")->num_rows();
		$ceksampah = $this->m_kontenweb->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'setting_jumlah' => $cek,
			'jumlah_sampah_setting' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatasetting', $data);
  }


	public function tambah_setting()
  {
    $this->load->view('admin/adddatasetting');
  }

	public function tambah_aksi(){
		$phone   = $this->input->post('phone');
		$email 	 = $this->input->post('email');
		$address = $this->input->post('address');
		$facebook = $this->input->post('fb');
		$twitter = $this->input->post('tw');
		$youtube = $this->input->post('ytb');
		$instagram = $this->input->post('ig');
		$google = $this->input->post('google');
		$tentang = $this->input->post('tentang');
		$tentangheader = $this->input->post('tentangheader');
		$tentangfooter = $this->input->post('tentangfooter');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

				$data = array(
					'about'				=> $tentang,
					'about_header' => $tentangheader,
					'about_footer' => $tentangfooter,
					'phone'       => $phone,
					'email'				=> $email,
					'address'     => $address,
					'fb'		  		=> $facebook,
					'tw' 				  => $twitter,
					'yt'		  		=> $youtube,
					'ig' 				  => $instagram,
					'google'			=> $google,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date
					);
					$this->m_kontenweb->input_data($data,'setting');
					redirect('dashboard/admin/data/setting');
	}

	function detail_setting($id){
		$data['detil_setting'] = $this->m_kontenweb->detail_data($id)->result();
		$this->load->view('admin/detilsetting',$data);
	}

	function edit_setting($id){
		$where = array('id_setting' => $id);
		$data['settings'] = $this->m_kontenweb->edit_data($where,'setting')->result();
		$this->load->view('admin/editdatasetting',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$phone   = $this->input->post('phone');
		$email 	 = $this->input->post('email');
		$address = $this->input->post('address');
		$facebook = $this->input->post('fb');
		$twitter = $this->input->post('tw');
		$youtube = $this->input->post('ytb');
		$instagram = $this->input->post('ig');
		$google = $this->input->post('google');
		$tentang = $this->input->post('tentang');
		$tentangheader = $this->input->post('tentangheader');
		$tentangfooter = $this->input->post('tentangfooter');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'about'				=> $tentang,
			'about_header' => $tentangheader,
			'about_footer' => $tentangfooter,
			'phone'       => $phone,
			'email'				=> $email,
			'address'     => $address,
			'fb'		  		=> $facebook,
			'tw' 				  => $twitter,
			'yt'		  		=> $youtube,
			'ig' 				  => $instagram,
			'google'			=> $google,
			'updated_at'  => $date
		);

		$where = array(
			'id_setting' => $id
		);

		$this->m_kontenweb->update_data($where,$data,'setting');
		redirect('dashboard/admin/data/setting');
	}
}
