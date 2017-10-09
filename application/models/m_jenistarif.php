<?php

class M_JenisTarif extends CI_Model
{
	function cek_jenistarif($table,$where){
		return $this->db->get_where($table,$where);
	}

	function tampil_data()
	{
		$this->db->select("*");
    $this->db->from("jenis_tarif");
		$this->db->where("status","1");
    $this->db->order_by("id_jenistarif", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select("*");
		$this->db->from("jenis_tarif");
		$this->db->where("status","0");
		$this->db->order_by("id_jenistarif", "desc");
		$query = $this->db->get();
		return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
    $this->db->from("jenis_tarif");
		$this->db->where("status","0");
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
