<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgetPassword extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->model('user');
		$this->load->model('m_users');
		$this->load->helper('url');
	}

  public function index()
  {
		if($this->session->userdata('status') != "Login")
		{
			$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
	    $this->load->view('forgetpassword', $data);
		}
		else {
			redirect("/");
		}
  }

	public function reset()
  {
		if($this->session->userdata('status') != "Login")
		{
			$email = $this->input->post('email');
			date_default_timezone_set("Asia/Jakarta");
			$date = date('Y-m-d H:i:s');
			$where = array(
				'email' => $email
				);
			$cek = $this->user->cek_reset("users",$where)->num_rows();
			if($cek > 0)
			{
				$dataku = $this->user->cek_reset("users",$where);
				foreach ($dataku->result() as $dat)
				{
						$ful = 	$dat->username;
						$fulname = 	$dat->name;
						$id = 	$dat->id_user;
				}
				function generateRandomString($length = 10) {
         	      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
           	    $charactersLength = strlen($characters);
           	    $randomString = '';
           	    for ($i = 0; $i < $length; $i++) {
           	        $randomString .= $characters[rand(0, $charactersLength - 1)];
           	    }
           	    return $randomString;
        }
				$password =  generateRandomString(10);
				$url = $_SERVER['HTTP_REFERER'];
		    $config = Array(
		      'protocol' => 'smtp',
		      'smtp_host' => 'ssl://smtp.googlemail.com',
		      'smtp_port' => 465,
		      'smtp_user' => 'info.syantikara@gmail.com',
		      'smtp_pass' => 'adminsyantikara',
		      'mailtype' => 'html',
		      'charset' => 'iso-8859-1',
		      'wordwrap' => TRUE
		    );
				$this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from('info.syantikara@gmail.com', 'RPCB Syantikara');
		    $this->email->to($email); //email tujuan. Isikan dengan emailmu!
				$this->email->cc('info.syantikara@gmail.com', 'RPCB Syantikara');
		    $this->email->subject('Reset Password Member Syantikara');
				$data = array(
								 'Fullname'=> $fulname,
							   'Email'=> $email,
		             'UserName'=> $ful,
								 'Password'=> $password,
								 'DateRegister'=> $date
		    );
				$body = $this->load->view('mailtemplateregysreset.php',$data,TRUE);
		    $this->email->message($body);

				if($this->email->send())
				{
					$data = array(
						'password'	=> md5($password),
						'updated_at'  => $date
					);
					$where = array(
						'id_user' => $id
					);
					$this->m_users->update_data($where,$data,'users');
					redirect('signin');
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}
			else {
				redirect("forget/password");
			}
		}
		else {
			redirect("/");
		}
  }

	function update_password(){
		$id = $this->input->post('id');
		$nama = $this->input->post('namakategori');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'kategori'	=> $nama,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_kategori' => $id
		);

		$this->m_kategoriberita->update_data($where,$data,'news_category');
		redirect('dashboard/admin/data/berita/kategori');
	}
}
