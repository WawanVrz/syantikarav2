<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdminController extends CI_Controller {

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
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

	public function index()
	{
		$this->load->view('admin/dashboardadmin');
	}

	public function profileuser()
	{
		$this->load->view('admin/ProfileUser');
	}

	public function editprofileuser()
	{
		$this->load->view('admin/EditProfileUser');
	}

	public function ubahpassword($id)
	{
		$where = array('id_user' => $id);
		$data['user_data'] = $this->user->edit_data($where,'users')->result();
		$this->load->view('admin/changepassword',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$pass1 = $this->input->post('newpass');
		$pass2 = $this->input->post('confirm');

		if($pass1 == $pass2)
		{
			$data = array(
				'password' 	=> md5($pass1)
			);

			$where = array(
				'id_user' => $id
			);

			$this->user->update_data($where,$data,'users');
			redirect('panel/admin');
		}else {
				redirect('dashboard/admin/profile');
		}
	}
}
