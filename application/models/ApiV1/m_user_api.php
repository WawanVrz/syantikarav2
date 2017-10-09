<?php

class m_user_api extends CI_Model{

	function cek_login($username,$passwd){
    $this->db->select('id_user, name, username, type, position, address, phone, email, organization, image, status, tgl_daftar, created_at');
    $this->db->from("users");
    $this->db->where("username",$username);
    $this->db->where("password",$passwd);
    $this->db->where("type","staff");
    $query = $this->db->get();
    return $query;
	}

	function cek_resetpass($email){
    $this->db->select('id_user, name, username, type, position, address, phone, email, organization, image, status, tgl_daftar, created_at');
    $this->db->from("users");
    $this->db->where("email",$email);
    $this->db->where("type","staff");
    $query = $this->db->get();
    return $query;
	}

	function cek_logout($id_user){
    $this->db->select('*');
    $this->db->from("syantikara_token");
    $this->db->where("user_id",$id_user);
    $query = $this->db->get();
    return $query;
	}

  function getprofileuser($id){
    $this->db->select('id_user, name, username, type, position, address, phone, email, organization, image, status, tgl_daftar, created_at');
    $this->db->from("users");
    $this->db->where("id_user",$id);
    $query = $this->db->get();
    return $query;
	}

  function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
