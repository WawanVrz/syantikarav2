<?php

class M_Ruangan extends CI_Model
{
	function tampil_data()
	{
		$this->db->select('pertemuan.id_ruangpertemuan, pertemuan.ruang_id,pertemuan.kapasitas, pertemuan.fasilitas, pertemuan.harga, pertemuan.keterangan, pertemuan.status, pertemuan.created_at, ruang.nama_ruang, jasa.nama_jasa ');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->join('jasa','jasa.id_jasa = pertemuan.id_jasa');
		$this->db->where("pertemuan.status","1");
		$this->db->order_by("pertemuan.id_ruangpertemuan", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_addict()
	{
		$this->db->select('pertemuan.id_ruangpertemuan, pertemuan.ruang_id,pertemuan.kapasitas, pertemuan.fasilitas, pertemuan.harga, pertemuan.keterangan, pertemuan.status, pertemuan.created_at, ruang.nama_ruang, jasa.nama_jasa ');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->join('jasa','jasa.id_jasa = pertemuan.id_jasa');
		$this->db->where("pertemuan.status","1");
		$this->db->where("ruang.type","NK");
		$this->db->order_by("pertemuan.id_ruangpertemuan", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_addict_yayasan()
	{
		$this->db->select('*');
		$this->db->from("ruang");
		$this->db->where("ruang.status","1");
		$this->db->where("ruang.type","KNT");
		$this->db->order_by("ruang.id", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_addict_rm()
	{
		$this->db->select('pertemuan.id_ruangpertemuan, pertemuan.ruang_id,pertemuan.kapasitas, pertemuan.fasilitas, pertemuan.harga, pertemuan.keterangan, pertemuan.status, pertemuan.created_at, ruang.nama_ruang, jasa.nama_jasa ');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->join('jasa','jasa.id_jasa = pertemuan.id_jasa');
		$this->db->where("pertemuan.status","1");
		$this->db->where("ruang.type","RM");
		$this->db->order_by("pertemuan.id_ruangpertemuan", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select('pertemuan.id_ruangpertemuan, pertemuan.ruang_id,pertemuan.kapasitas, pertemuan.fasilitas, pertemuan.harga, pertemuan.keterangan, pertemuan.status, pertemuan.created_at, ruang.nama_ruang, jasa.nama_jasa ');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->join('jasa','jasa.id_jasa = pertemuan.id_jasa');
		$this->db->where("pertemuan.status","0");
		$this->db->order_by("pertemuan.id_ruangpertemuan", "desc");
    $query = $this->db->get();
		return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
    $this->db->from("pertemuan");
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

	function getRuangpertemuan($where) {
		return $this->db->get_where('pertemuan',$where);
	}

	function getruangmakan() {
		$this->db->select("pertemuan.id_ruangpertemuan");
    $this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("ruang.type","RM");
    $query = $this->db->get();
    return $query;
	}

	function getruangpert() {
		$this->db->select("pertemuan.id_ruangpertemuan");
    $this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("ruang.type","NK");
    $query = $this->db->get();
    return $query;
	}

	function getruangpertyayasan() {
		$this->db->select("*");
    $this->db->from("ruang");
		$this->db->where("ruang.type","KNT");
    $query = $this->db->get();
    return $query;
	}
}
