<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListReservasiController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiV1/m_listreservasi_api');
    $this->load->helper('apikeycheck_helper');
  }

  public function getListreservasi()
  {
    $usertoken = $this->input->get('token');
    if(apiKey($usertoken))
    {
        $dataku = $this->m_listreservasi_api->getListReservasiPublics()->result();
        if(count($dataku) > 0){
           $status       = true;
           $status_code  = 200;
           $message      = "data found";
           $data         = $dataku;
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

  public function getListreservasiDetail()
  {
    $usertoken = $this->input->get('token');
    $id = $this->input->get('id_reservasi');

    if(apiKey($usertoken))
    {
      $dataku = $this->m_listreservasi_api->getListReservasiDetailPublics($id)->result();

      if(count($dataku) > 0){
         $status       = true;
         $status_code  = 200;
         $message      = "data found";
         $data         = $dataku;
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
}
