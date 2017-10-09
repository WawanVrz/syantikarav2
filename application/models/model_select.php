<?php

Class Model_select extends CI_Model
{
  function __construct(){
  parent::__construct();
}


  function provinsi()
  {
    $this->db->order_by('name','ASC');
    $provinces= $this->db->get('master_province');

    return $provinces->result_array();
  }

  function kabupatenkota()
  {
    $this->db->order_by('name','ASC');
    $city = $this->db->get('master_city');

    return $city->result_array();
  }

  function kabupaten($provId){
    $this->db->order_by('name','ASC');
    $kab= $this->db->get_where('master_city',array('master_province_id'=>$provId));
    foreach ($kab->result_array() as $data )
    {
      $kabupaten.= "<option value='$data[id]'>$data[name]</option>";
    }
    return $kabupaten;
  }
}
