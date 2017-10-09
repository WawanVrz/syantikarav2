<?php

class M_Tarif extends CI_Model
{
	function cek_tarif($table,$where){
		return $this->db->get_where($table,$where);
	}
	
	function tampil_data()
	{
		$this->db->select('tarif.id_tarif,tarif.id_jenistamu,tarif.id_jenistarif,tarif.tarif,tarif.keterangan as kettarif, tarif.status as sttarif, tarif.created_at as tglinput, jenis_tamu.jenistamu, jenis_tarif.jenistarif');
    $this->db->from("tarif");
		$this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = tarif.id_jenistamu');
		$this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = tarif.id_jenistarif');
		$this->db->where("tarif.status","1");
    $this->db->order_by("tarif.id_tarif", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select('tarif.id_tarif,tarif.id_jenistamu,tarif.id_jenistarif,tarif.tarif,tarif.keterangan as kettarif, tarif.status as sttarif, tarif.created_at as tglinput, jenis_tamu.jenistamu, jenis_tarif.jenistarif');
		$this->db->from("tarif");
		$this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = tarif.id_jenistamu');
		$this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = tarif.id_jenistarif');
		$this->db->where("tarif.status","0");
		$this->db->order_by("tarif.id_tarif", "desc");
		$query = $this->db->get();
		return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
    $this->db->from("tarif");
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

	function getTarif($where) {
		return $this->db->get_where('tarif',$where);
	}
}
