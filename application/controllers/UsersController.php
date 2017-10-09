<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_users');
		$this->load->model('model_select');
		$this->load->helper(array('form', 'url'));

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['userss'] = $this->m_users->tampil_data()->result();
		$cek = $this->m_users->cek_jumlah("users")->num_rows();
		$ceksampah = $this->m_users->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'user_jumlah' => $cek,
			'jumlah_sampah_user' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatauser', $data);
  }

	public function viewbin()
  {
		$data['userss_bin'] = $this->m_users->tampil_data_bin()->result();
		$cek = $this->m_users->cek_jumlah("users")->num_rows();
		$ceksampah = $this->m_users->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'user_jumlah' => $cek,
			'jumlah_sampah_user' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatauserTrash', $data);
  }

	public function tambah_user()
  {
		$data['provinsi']=$this->model_select->provinsi();
    $this->load->view('admin/adddatauser',$data);
  }

	public function ambil_data()
	{
			$modul=$this->input->post('modul');
			$id=$this->input->post('id');
			if($modul=="kabupaten")
			{
				echo $this->model_select->kabupaten($id);
			}
			else if($modul=="kecamatan"){

			}
			else if($modul=="kelurahan"){

			}
	 }

	public function tambah_aksi(){
		$config['upload_path'] = './assets/dashboard/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);
		$fulname = $this->input->post('fulname');
		$username = $this->input->post('username');
		$pass = md5($this->input->post('pass'));
		$role = $this->input->post('role');
		$posisi = $this->input->post('posisi');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$add = $this->input->post('address');
		$prov= $this->input->post('prov');
		$city = $this->input->post('kota');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'username' => $username,
			);
		$cek = $this->m_users->cek_datauser("users",$where)->num_rows();

		if($cek > 0)
		{
			if($fulname != "" && $username != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Username Sudah Ada Yang Menggunakan </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/user/add");
			}else {
				redirect("dashboard/admin/data/user/add");
			}
		}else {
				if ( !$this->upload->do_upload('image'))
				{
					$data_user = array(
						'name'				=> $fulname,
						'username' 		=> $username,
						'password'		=> $pass,
						'type'  			=> $role,
						'status'			=> 1,
						'position'  	=> $posisi,
						'id_provinsi' => $prov,
						'id_city' 			=> $city,
						'address' 			=> $add,
						'phone'					=> $telp,
						'email'  			  => $email,
						'organization'	=> "Syantikara",
						'tgl_daftar'  => $date,
						'created_at'  => $date,
						'updated_at'  => $date,
						'image'  			=> 'nopp.jpg'
						);
					$this->m_users->input_data($data_user,'users');
					redirect('dashboard/admin/data/user');
				}else{
						$data_user = array(
							'name'				=> $fulname,
							'username' 		=> $username,
							'password'		=> $pass,
							'type'  			=> $role,
							'status'			=> 1,
							'position'  	=> $posisi,
							'id_provinsi' => $prov,
							'id_city' 			=> $city,
							'address' 			=> $add,
							'phone'					=> $telp,
							'email'  			  => $email,
							'organization'	=> "Syantikara",
							'tgl_daftar'  => $date,
							'created_at'  => $date,
							'updated_at'  => $date,
							'image'  			=> $this->upload->data('file_name')
							);
						$this->m_users->input_data($data_user,'users');
						redirect('dashboard/admin/data/user');
					}
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_user' => $id);
		$this->m_users->hapus_data($where,'users');
		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_user' => $id
		);
		$this->m_users->hapus_data_soft($where,$data,'users');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_user' => $id
		);
		$this->m_users->hapus_data_soft($where,$data,'users');

		echo 'succeed';
	}

	function edit_user($id){
		$where = array('id_user' => $id);
		$data['edit_user'] = $this->m_users->edit_data($where,'users')->result();
		$data['provinsi']=$this->model_select->provinsi();
		$data['kota']=$this->model_select->kabupatenkota();
		$this->load->view('admin/editdatauser',$data);
	}

	function update(){
		$config['upload_path'] = './assets/dashboard/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$id = $this->input->post('id');
		$fulname = $this->input->post('fulname');
		$username = $this->input->post('username');
		$posisi = $this->input->post('posisi');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$add = $this->input->post('address');
		$prov= $this->input->post('prov');
		$city = $this->input->post('kota');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$this->upload->do_upload('image');
		$imagepp = $this->upload->data('file_name');

		if($imagepp == "")
		{
			$data = array(
				'name'				=> $fulname,
				'username'		=> $username,
				'position'  	=> $posisi,
				'id_provinsi' => $prov,
				'id_city' 			=> $city,
				'address' 			=> $add,
				'phone'					=> $telp,
				'email'  			  => $email,
				'updated_at'  => $date
			);
			$where = array(
				'id_user' => $id
			);
			$this->m_users->update_data($where,$data,'users');
			redirect('dashboard/admin/data/user');
		}else{
			$data = array(
				'name'				=> $fulname,
				'username'		=> $username,
				'position'  	=> $posisi,
				'id_provinsi' => $prov,
				'id_city' 			=> $city,
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
			redirect('dashboard/admin/data/user');
		}
	}
}
