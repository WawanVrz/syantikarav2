<?php

class M_Users extends CI_Model
{

	function cek_datauser($table,$where){
		return $this->db->get_where($table,$where);
	}

	function tampil_data()
	{
		$this->db->select("u.id_user,u.name,u.username,u.password,u.type,u.status,u.position,u.address,u.phone,u.email,u.organization,u.image,u.tgl_daftar,u.created_at,mp.name as namaprovinsi, mc.name as namakota");
    $this->db->from("users u");
		$this->db->join('master_province mp', 'mp.id = u.id_provinsi');
		$this->db->join('master_city mc', 'mc.id = u.id_city');
		$this->db->where("u.status","1");
		$this->db->where("u.type !=","Super Admin");
		$this->db->where("u.type !=","Member");
    $this->db->order_by("u.id_user", "ASC");
    $query = $this->db->get();
    return $query;
	}

	function tampilpenanggungjawab()
	{
		$this->db->select("*");
    $this->db->from("users");
		$this->db->where("type","Penanggung Jawab");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_member()
	{
		$this->db->select("u.id_user,u.name,u.username,u.password,u.type,u.status,u.position,u.address,u.phone,u.email,u.organization,u.image,u.tgl_daftar,u.created_at,mp.name as namaprovinsi, mc.name as namakota");
    $this->db->from("users u");
		$this->db->join('master_province mp', 'mp.id = u.id_provinsi');
		$this->db->join('master_city mc', 'mc.id = u.id_city');
		$this->db->where("u.type !=","Super Admin");
		$this->db->where("u.type","Member");
    $this->db->order_by("u.id_user", "ASC");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_member_detail($id)
	{
		$this->db->select("u.id_user,u.name,u.username,u.password,u.type,u.status,u.position,u.address,u.phone,u.email,u.organization,u.image,u.tgl_daftar,u.created_at,mp.name as namaprovinsi, mc.name as namakota");
    $this->db->from("users u");
		$this->db->join('master_province mp', 'mp.id = u.id_provinsi');
		$this->db->join('master_city mc', 'mc.id = u.id_city');
		$this->db->where("u.id_user",$id);
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select("u.id_user,u.name,u.username,u.password,u.type,u.status,u.position,u.address,u.phone,u.email,u.organization,u.image,u.tgl_daftar,u.created_at,mp.name as namaprovinsi, mc.name as namakota");
		$this->db->from("users u");
		$this->db->join('master_province mp', 'mp.id = u.id_provinsi');
		$this->db->join('master_city mc', 'mc.id = u.id_city');
		$this->db->where("u.status","0");
		$this->db->where("u.type !=","Super Admin");
		$this->db->where("u.type !=","Member");
		$this->db->order_by("id_user", "desc");
		$query = $this->db->get();
		return $query;
	}

	function cek_jumlah($table){
		$this->db->select("*");
    $this->db->from("users");
		$this->db->where("type !=","member");
    $query = $this->db->get();
    return $query;
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
    $this->db->from("users");
		$this->db->where("status","0");
		$this->db->where("type !=","member");
    $query = $this->db->get();
    return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_data_soft($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function edit_data($where,$table){
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
