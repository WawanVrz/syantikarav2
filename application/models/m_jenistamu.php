<?php

class M_JenisTamu extends CI_Model
{
	function cek_jenistamu($table,$where){
		return $this->db->get_where($table,$where);
	}
	
	function tampil_data()
	{
		$this->db->select("jenis_tamu.id_jenistamu, jenis_tamu.jenistamu, jenis_tamu.keterangan, jenis_tamu.created_at, jasa.nama_jasa");
    $this->db->from("jenis_tamu");
		$this->db->join('jasa','jasa.id_jasa = jenis_tamu.id_jasa');
		$this->db->where("jenis_tamu.status","1");
    $this->db->order_by("jenis_tamu.id_jenistamu", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select("jenis_tamu.id_jenistamu, jenis_tamu.jenistamu, jenis_tamu.keterangan, jenis_tamu.created_at, jasa.nama_jasa");
    $this->db->from("jenis_tamu");
		$this->db->join('jasa','jasa.id_jasa = jenis_tamu.id_jasa');
		$this->db->where("jenis_tamu.status","0");
    $this->db->order_by("jenis_tamu.id_jenistamu", "desc");
		$query = $this->db->get();
		return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
    $this->db->from("jenis_tamu");
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
