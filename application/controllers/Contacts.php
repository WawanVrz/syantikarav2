<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kontenweb');
		$this->load->model('m_pesan');
		$this->load->helper('url');
	}

  public function index()
  {
		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
    $this->load->view('main_contact',$data);
  }

	public function sukses()
  {
		$data['setting'] = $this->m_kontenweb->tampil_data_public()->result();
    $this->load->view('success',$data);
  }

	public function email()
	{
		$email = $this->input->post('email');
		$fnama = $this->input->post('fname');
		$lnama = $this->input->post('lname');
		$subjek = $this->input->post('subject');
		$pesan = $this->input->post('message');
		$result = "$fnama $lnama";
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$time = date('H:i:s');

    $url = $_SERVER['HTTP_REFERER'];
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'wawan.rahmawan16@gmail.com',
      'smtp_pass' => 'wawansullivan13',
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($email, $result);
    $this->email->to('info.syantikara@gmail.com'); //email tujuan. Isikan dengan emailmu!
    $this->email->subject($subjek);
		$data = array(
					   'Email'=> $email,
             'userName'=> $result,
						 'Subjek'=> $subjek,
						 'Pesan'=> $pesan
    );
		$body = $this->load->view('mailtemplate.php',$data,TRUE);
    $this->email->message($body);
    // $this->email->message($pesan);

    if($this->email->send())
    {
			$data = array(
				'fullname'	=> $result,
				'email'  		=> $email,
				'subject'  	=> $subjek,
				'message'  	=> $pesan,
				'status'  	=> "unread",
				'ac'  			=> 1,
				'waktu'			=> $time,
				'created_at'  => $date,
				'updated_at'  => $date
				);
			$this->m_pesan->input_data($data,'pesan');

			redirect('contact/success/sendmail');
    }
    else
    {
      show_error($this->email->print_debugger());
    }
	}
}
