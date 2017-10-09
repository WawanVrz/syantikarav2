<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyProfileUser extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->model('m_users');
		$this->load->helper('url');
		if($this->session->userdata('status') != "Login"){
			redirect("/");
		}
	}

  public function index()
  {
		$id = $this->session->userdata('id_user');

		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
		$data['userz'] = $this->m_users->tampil_data_member_detail($id)->result();
	  $this->load->view('main_profile_user', $data);
  }

	function update_profile(){
		$config['upload_path'] = './assets/dashboard/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$id = $this->input->post('id');
		$fulname = $this->input->post('fullname');
		$telp = $this->input->post('phone');
		$email = $this->input->post('email');
		$add = $this->input->post('address');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$this->upload->do_upload('image');
		$imagepp = $this->upload->data('file_name');

		if($imagepp == "")
		{
			$data = array(
				'name'				=> $fulname,
				'address' 			=> $add,
				'phone'					=> $telp,
				'email'  			  => $email,
				'updated_at'  => $date
			);
			$where = array(
				'id_user' => $id
			);
			$this->m_users->update_data($where,$data,'users');
			redirect('profile');
		}else{
			$data = array(
				'name'				=> $fulname,
				'address' 			=> $add,
				'phone'					=> $telp,
				'email'  			  => $email,
				'image'  			=> $this->upload->data('file_name'),
				'updated_at'  => $date
			);
			$where = array(
				'id_user' => $id
			);
			$this->m_users->update_data($where,$data,'users');
			redirect('profile');
		}
	}

	function updatePassword(){
		$id = $this->input->post('id');
		$newpass = $this->input->post('newpass');
		$newpassconfirm= $this->input->post('newpassconfirm');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		if($newpassconfirm == $newpass)
		{
			$data = array(
				'password'				=> md5($newpassconfirm),
				'updated_at'  		=> $date
			);
			$where = array(
				'id_user' => $id
			);
			$this->m_users->update_data($where,$data,'users');
			redirect('public/auth/logout');
		}else{
			redirect('profile');
		}
	}
}
