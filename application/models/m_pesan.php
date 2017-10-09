<?php

class M_Pesan extends CI_Model
{
	function tampil_data()
	{
		$this->db->select("*");
    $this->db->from("pesan");
		$this->db->where("ac","1");
		$this->db->where("status","unread");
    $this->db->order_by("id_pesan", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_detail($id)
	{
		$this->db->select("*");
    $this->db->from("pesan");
		$this->db->where("id_pesan", $id);
		$this->db->where("status","unread");
    $this->db->order_by("id_pesan", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_jumlah()
	{
		$this->db->select("*");
    $this->db->from("pesan");
		$this->db->where("ac","1");
		$this->db->where("status","unread");
    $this->db->order_by("id_pesan", "desc");
    $query = $this->db->count_all_results();
    return $query;
	}

	function tampil_data_all()
	{
		$this->db->select("*");
    $this->db->from("pesan");
		$this->db->where("ac","1");
    $this->db->order_by("id_pesan", "desc");
    $query = $this->db->get();
		return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select("*");
    $this->db->from("pesan");
		$this->db->where("ac","0");
    $this->db->order_by("id_pesan", "desc");
    $query = $this->db->get();
    return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
		$this->db->from("pesan");
		$this->db->where("ac","0");
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

	function proses_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
