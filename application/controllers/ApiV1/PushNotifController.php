<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PushNotifController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiV1/m_listreservasi_api');
    $this->load->model('ApiV1/m_user_api');
    $this->load->helper('apikeycheck_helper');
  }

  //================ FUNGSI PUSH NOTIFICATION  =====================//
    public function pushnotiffcm()
    {
      $usertoken = $this->input->get('token');
      $fcmtoken = $this->input->get('fcmtoken');
      $click_action = $this->input->get('CLICKACTION');
      date_default_timezone_set("Asia/Jakarta");
  		$date = date('Y-m-d');

      if(apiKey($usertoken))
      {
        $dataku = $this->m_listreservasi_api->getListReservNotif($date)->result();
        if(count($dataku) > 0)
        {
          $id = $dataku[0]->id_transaksi;
          $promo = "Tamu Sebentar Lagi Check in";
        }

        $headers = array(
                  'Authorization: key= AIzaSyCc4SD0bI2Ke3hfz1WddtZHM4qHVGBKMqU' ,
                  'Content-Type: application/json'
        );

            $notif = array(
                  "body" => $promo,
                  "title" => "RPCB Syantikara Notification",
                  "sound" => "default",
                  "badge" => "5",
                  "color" => "#5599aa",
                  "click_action" => $click_action);

            $dataku = array(
              "id"=> $id,
              "promo"=> $promo
              );

              $url = 'https://fcm.googleapis.com/fcm/send';

              // Open connection
              $ch = curl_init();

              // Set the url, number of POST vars, POST data
              curl_setopt($ch, CURLOPT_URL, $url);

              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              // Disabling SSL Certificate support temporarly
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

              curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("to"=> $fcmtoken,"notification"=>$notif,"data"=>$dataku)));

              // Execute post
              $result = curl_exec($ch);
              if ($result === FALSE) {
                  die('Curl failed: ' . curl_error($ch));
              }

              // Close connection
              curl_close($ch);
              //echo $result;
              $resp = array("to"=> $fcmtoken,"notification"=>$notif,"data"=>$dataku, "result"=>$result);

              $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($resp, JSON_PRETTY_PRINT))
                ->_display();
                exit;


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
