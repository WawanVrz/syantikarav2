<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('model_select');
		$this->load->model('m_kontenweb');
		$this->load->model('m_users');
		$this->load->helper('url');
		$this->load->helper('form');
	}

  public function index()
  {
				if($this->session->userdata('status') != "Login")
				{
					$data['provinsi']=$this->model_select->provinsi();
					$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();

				  $this->load->library(array('recaptcha', 'form_validation'));
	        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_get_response_captcha');
	        $this->form_validation->set_message('required', '%s harus diisi');
	        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	        if($this->form_validation->run() == TRUE)
	        {
	        	redirect('signin');
	        }
	        else
	        {
	        	$data['recaptcha_html'] = $this->recaptcha->render();
	        	$this->load->view('signup', $data);
	        }
				}
				else {
					redirect("/");
				}
  }

	public function mailtemp()
	{
			$this->load->view('mailtemplateregys');
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

	 public function tambah_aksi()
	 {
 		$config['upload_path'] = './assets/dashboard/dist/img/';
 		$config['allowed_types'] = 'gif|jpg|png';
 		$config['max_size']	= '10000'; //in kb
 		$this->upload->initialize($config);

 		$fname = $this->input->post('first');
		$lname = $this->input->post('last');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$add = $this->input->post('address');
		$prov= $this->input->post('prov');
		$city = $this->input->post('kota');
		$org = $this->input->post('org');
 		$username = $this->input->post('username');
 		$pass = md5($this->input->post('pass'));
 		date_default_timezone_set("Asia/Jakarta");
 		$date = date('Y-m-d H:i:s');
		$fullname = "$fname $lname";

		$this->load->library(array('recaptcha', 'form_validation'));
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_get_response_captcha');
		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_message('valid_email', 'Alamat %s tidak valid');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

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
    $this->email->subject('Selamat Datang di RPCB Syantikara');
		$data = array(
					   'Email'=> $email,
             'UserName'=> $username,
						 'Fullname'=> $fullname,
						 'DateRegister'=> $date
    );
		$body = $this->load->view('mailtemplateregys.php',$data,TRUE);
    $this->email->message($body);

		if($this->email->send())
		{
				if ( !$this->upload->do_upload('image'))
				{
					if($this->form_validation->run() == TRUE)
					{
						$data_user = array(
									'name'				=> $fullname,
									'username' 		=> $username,
									'password'		=> $pass,
									'type'  			=> "Member",
									'status'			=> 1,
									'position'  	=> "Member",
									'id_provinsi' => $prov,
									'id_city' 			=> $city,
									'address' 			=> $add,
									'phone'					=> $telp,
									'email'  			  => $email,
									'organization'	=> $org,
									'tgl_daftar'  => $date,
									'created_at'  => $date,
									'updated_at'  => $date,
									'image'  			=> 'nopp.jpg'
									);
						 $this->m_users->input_data($data_user,'users');
						 redirect('signin');
					 }
					 else {
						$data['recaptcha_html'] = $this->recaptcha->render();
						redirect('signup',$data);
					 }
				}
				else
				{
					if($this->form_validation->run() == TRUE)
					{
				 		$data_user = array(
				 					'name'				=> $fullname,
				 					'username' 		=> $username,
				 					'password'		=> $pass,
				 					'type'  			=> "Member",
				 					'status'			=> 1,
				 					'position'  	=> "Member",
									'id_provinsi' => $prov,
									'id_city' 			=> $city,
									'address' 			=> $add,
									'phone'					=> $telp,
									'email'  			  => $email,
									'organization'	=> $org,
				 					'tgl_daftar'  => $date,
				 					'created_at'  => $date,
				 					'updated_at'  => $date,
				 					'image'  			=> $this->upload->data('file_name')
				 					);
						 $this->m_users->input_data($data_user,'users');
						 redirect('signin');
					 }
					 else {
					 	$data['recaptcha_html'] = $this->recaptcha->render();
						redirect('signup',$data);
					 }
				}
			}
			else
			{
				show_error($this->email->print_debugger());
			}
 	}

	public function get_response_captcha($string)
  {
        $this->load->library('recaptcha');
        $response = $this->recaptcha->verifyResponse($string);
        if ($response['success'])
				{
            return true;
        } else {
            $this->form_validation->set_message('get_response_captcha', '%s harus diisi');
            return false;
        }
    }
}
