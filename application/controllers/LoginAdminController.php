<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdminController extends CI_Controller {

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
	 		$this->load->model('user');
	 	}

	public function index()
	{
		$this->load->view('admin/loginadmin');
	}

	public function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->user->cek_login("users",$where)->num_rows();
		if($cek > 0)
		{
			$dataku = $this->user->cek_login("users",$where);
			foreach ($dataku->result() as $dat)
			{
					$ful = 	$dat->name;
					$tgl =  $dat->tgl_daftar;
					$posisi =  $dat->position;
					$lokasi =  $dat->location;
					$img =  $dat->image;
					$idku =  $dat->id_user;
					$role = $dat->type;
			}
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'fullname' => $ful,
				'membersince' => $tgl,
				'posisi' => $posisi,
				'lokasi' => $lokasi,
				'gambar' => $img,
				'id_user' => $idku,
				'type' => $role,
				);

			$this->session->set_userdata($data_session);
			redirect("dashboard/admin");

		}else{
				redirect("panel/admin");
		}
	}

	public function do_logout(){
		$this->session->sess_destroy();
		redirect('panel/admin');
	}
}
