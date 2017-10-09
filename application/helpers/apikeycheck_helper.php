<?php

$CI =& get_instance();

function apikey($apikey) {
  global $CI;
  $CI->db->select('*');
  $CI->db->from('syantikara_token');
  $CI->db->where('token', $apikey);
  $CI->db->where('deleted_at',null);
  $data = $CI->db->get()->result_array();
  if(count($data) == 1) {
    return true;
  } else {
    return false;
  }
}
