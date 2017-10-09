<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiV1/m_user_api');
    $this->load->helper('apikeycheck_helper','url');
  }

  public function loginAccounts()
  {
    $username = $this->input->post('username');
		$password = $this->input->post('password');
    $passwd = MD5($password);
    date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

    function generateRandomString($length = 50)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
        {
           	$randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       return $randomString;
    }

    if($username != null && $password != null){
      $datauser = $this->m_user_api->cek_login($username,$passwd)->result();

      if(count($datauser) != 0)
      {
        $userid = $datauser[0]->id_user;
        $name = $datauser[0]->name;
        $type = $datauser[0]->type;
        $username = $datauser[0]->username;
        $created_at = $datauser[0]->created_at;
        $tkn = generateRandomString(50);

        $data = array(
    			'user_id' 	  => $userid,
    			'token'       => $tkn,
    			'created_at'  => $date,
    			'updated_at'  => $date,
    			);
    		$this->m_user_api->input_data($data,'syantikara_token');

        $retdata = array(
          'id_user' 	 => $userid,
    			'name'       => $name,
    			'username'   => $date,
          'type' 	      => $type,
    			'token'       => $tkn,
    			'created_at'  => $date,
        );

         $status       = true;
         $status_code  = 200;
         $message      = "login success";
         $data         = $retdata;
      }else {
         $status       = false;
         $status_code  = 404;
         $message      = "login failed, username or password wrong";
         $data         = null;
      }

    }else {
        $status       = false;
        $status_code  = 404;
        $message      = "login failed, parameter could not be empty";
        $data         = null;
    }

    $response = array(
                    'status'      => $status,
                    'status_code' => $status_code,
                    'message'     => $message,
                    'data'        => $data);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function getProfileDetail()
  {
    $usertoken = $this->input->get('token');
    $id = $this->input->get('id_user');

    if(apiKey($usertoken))
    {
        $dataku = $this->m_user_api->getprofileuser($id)->result();
        $datauser = array(
                    'id_user' => $dataku[0]->id_user,
                    'name' => $dataku[0]->name,
                    'username' => $dataku[0]->username,
                    'type' => $dataku[0]->type,
                    'position' => $dataku[0]->position,
                    'address' => $dataku[0]->address,
                    'phone' => $dataku[0]->phone,
                    'email' => $dataku[0]->email,
                    'organization' => $dataku[0]->organization,
                    'status' => $dataku[0]->status,
                    'tgl_daftar' => $dataku[0]->tgl_daftar,
                    'image' => "http://localhost:8081/syantikaraweb/assets/dashboard/dist/img/".$dataku[0]->image
                  );

        if(count($dataku) > 0){
           $status       = true;
           $status_code  = 200;
           $message      = "data found";
           $data         = $datauser;
        }else {
           $status       = false;
           $status_code  = 404;
           $message      = "data not found";
           $data         = null;
        }
    }else {
        $status       = false;
        $status_code  = 404;
        $message      = "invalid token";
        $data         = null;
    }

    $response = array(
                    'status'      => $status,
                    'status_code' => $status_code,
                    'message'     => $message,
                    'data'        => $data);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function UpdateProfileDetail()
  {
    $config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb
		$this->upload->initialize($config);

    $usertoken = $this->input->get('token');
    $id = $this->input->get('id_user');

    if(apiKey($usertoken))
    {
        $dataku = $this->m_user_api->getprofileuser($id)->result();
        if(count($dataku) > 0)
        {
          if (!$this->upload->do_upload('image'))
      		{
          		$name = $this->input->post('name');
          		$username = $this->input->post('username');
          		$address = $this->input->post('address');
              $phone = $this->input->post('phone');
          		$email = $this->input->post('email');
          		$organization = $this->input->post('organization');
              $image = 'nophoto.jpg';

          		$data = array(
          			'name' 	=> $name,
          			'username' 		=> $username,
          			'address'  => $address,
                'phone' 	=> $phone,
          			'email' 		=> $email,
          			'organization'  => $organization,
                'image' 	=> $image
          		);
          		$where = array(
          			'id_user' => $id
          		);
          		$this->m_user_api->update_data($where,$data,'users');
            }
            else {
              $name = $this->input->post('name');
          		$username = $this->input->post('username');
          		$address = $this->input->post('address');
              $phone = $this->input->post('phone');
          		$email = $this->input->post('email');
          		$organization = $this->input->post('organization');
              $image = $this->upload->data('file_name');

          		$data = array(
          			'name' 	=> $name,
          			'username' 		=> $username,
          			'address'  => $address,
                'phone' 	=> $phone,
          			'email' 		=> $email,
          			'organization'  => $organization,
                'image' 	=> $image
          		);
          		$where = array(
          			'id_user' => $id
          		);
          		$this->m_user_api->update_data($where,$data,'users');
            }

          $datauser = array(
                      'id_user' => $id,
                      'name' => $name,
                      'username' => $username,
                      'address' => $address,
                      'phone' => $phone,
                      'email' => $email,
                      'organization' => $organization,
                      'image' => "http://localhost:8081/syantikaraweb/assets/dashboard/dist/img/" .$image
                    );

           $status       = true;
           $status_code  = 200;
           $message      = "data success updated";
           $data         = $datauser;
        }else {
           $status       = false;
           $status_code  = 404;
           $message      = "data not found";
           $data         = null;
        }
    }else {
        $status       = false;
        $status_code  = 404;
        $message      = "invalid token";
        $data         = null;
    }

    $response = array(
                    'status'      => $status,
                    'status_code' => $status_code,
                    'message'     => $message,
                    'data'        => $data);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function logoutAccounts()
  {
    $usertoken = $this->input->get('token');
    $iduser = $this->input->post('id_user');
    date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

    if(apiKey($usertoken))
    {
      $datauser = $this->m_user_api->cek_logout($iduser)->result();

      if(count($datauser) > 0){
        $data = array(
    			'deleted_at'  => $date
    		);
    		$where = array(
    			'user_id' => $iduser,
          'token'   => $usertoken
    		);
    		$this->m_user_api->update_data($where,$data,'syantikara_token');

        $retdata = array(
          'id_user' 	 => $iduser,
    			'token'       => $usertoken,
    			'deleted_at'  => $date,
        );

         $status       = true;
         $status_code  = 200;
         $message      = "logout success";
         $data         = $retdata;
      }else {
         $status       = false;
         $status_code  = 404;
         $message      = "user not found";
         $data         = null;
      }
    }else {
        $status       = false;
        $status_code  = 404;
        $message      = "invalid token";
        $data         = null;
    }

    $response = array(
                    'status'      => $status,
                    'status_code' => $status_code,
                    'message'     => $message,
                    'data'        => $data);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function resetpassword()
  {
    $email = $this->input->post('email');
    date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
    $pass = '1234567809';
    $newpass = md5($pass);

    if($email != null)
    {
      $datauser = $this->m_user_api->cek_resetpass($email)->result();
      $userid = $datauser[0]->id_user;
      $name = $datauser[0]->name;
      $type = $datauser[0]->type;
      $username = $datauser[0]->username;
      $created_at = $datauser[0]->created_at;

      if(count($datauser) > 0)
      {
      //  $url = $_SERVER['HTTP_REFERER'];
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
		    $this->email->subject('Reset Password Staff Syantikara');
				$data = array(
								 'Fullname'=> $name,
							   'Email'=> $email,
		             'UserName'=> $username,
								 'Password'=> $pass,
								 'DateReset'=> $date
		    );
				$body = $this->load->view('mailtemplateregysresetmobile.php',$data,TRUE);
		    $this->email->message($body);

        if($this->email->send())
        {
            $data = array(
              'password' => $newpass,
        			'updated_at'  => $date
        		);
        		$where = array(
        			'id_user' => $userid,
              'email'   => $email
        		);
        		$this->m_user_api->update_data($where,$data,'users');

            $retdata = array(
              'id_user' 	 => $userid,
              'email' 	    => $email,
        			'updated_at'  => $date,
            );
          }
  				else
  				{
  					show_error($this->email->print_debugger());
  				}

         $status       = true;
         $status_code  = 200;
         $message      = "reset password success";
         $data         = $retdata;
      }else {
         $status       = false;
         $status_code  = 404;
         $message      = "user not found";
         $data         = null;
      }
    }else {
        $status       = false;
        $status_code  = 404;
        $message      = "reset failed parameter could not be empty";
        $data         = null;
    }

    $response = array(
                    'status'      => $status,
                    'status_code' => $status_code,
                    'message'     => $message,
                    'data'        => $data);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;


  }
}
