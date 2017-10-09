<?php


class M_Kamar extends CI_Model
{
	function tampil_data()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
    $this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
    $this->db->order_by("kamar.id_kamar", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_kamar_makan()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
    $this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","14");
    $this->db->order_by("kamar.id_kamar", "ASC");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_denah_paulus()
	{
		$this->db->select('*');
		$this->db->from("ruang");
		$this->db->where("id","1");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_sidang()
	{
		$this->db->select('*');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("pertemuan.ruang_id","2");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_transit()
	{
		$this->db->select('*');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("pertemuan.ruang_id","13");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_rmbesar()
	{
		$this->db->select('*');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("pertemuan.ruang_id","14");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_rmkecil()
	{
		$this->db->select('*');
		$this->db->from("pertemuan");
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("pertemuan.ruang_id","15");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_aula()
	{
		$this->db->select('*');
		$this->db->from("ruang");
		$this->db->where("id","17");
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_mensa()
	{
		$this->db->select('*');
		$this->db->from("ruang");
		$this->db->where("id","18");
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_rapat()
	{
		$this->db->select('*');
		$this->db->from("ruang");
		$this->db->where("id","19");
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_lobby()
	{
		$this->db->select('*');
		$this->db->from("ruang");
		$this->db->where("id","20");
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_konsultasi()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","3");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_dominikus()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","5");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_fransiskus()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","6");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_antonius()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","4");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_yohanes()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","11");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_yoseph()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","10");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_boromeus()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","8");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_eli()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","12");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_sesi()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","7");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_denah_carol()
	{
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang","9");
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function detail_kamar($id){
		$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
		$this->db->from("kamar");
		$this->db->join('ruang','ruang.id = kamar.id_ruang');
		$this->db->where("kamar.status","1");
		$this->db->where("kamar.id_ruang",$id);
		$this->db->order_by("kamar.id_kamar", "DESC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_bin()
	{
			$this->db->select('kamar.id_kamar, kamar.id_ruang, kamar.nama_kamar,kamar.kapasitas_kamar, kamar.keterangan, kamar.status, kamar.created_at, ruang.nama_ruang ');
	    $this->db->from("kamar");
			$this->db->join('ruang','ruang.id = kamar.id_ruang');
			$this->db->where("kamar.status","0");
	    $this->db->order_by("kamar.id_kamar", "desc");
		$query = $this->db->get();
		return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("*");
    $this->db->from("kamar");
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

	function getKamar($where) {
		$this->db->select("id_kamar,nama_kamar,id_ruang");
    $this->db->from("kamar");
		$this->db->where($where);
		$this->db->order_by("id_kamar", "desc");
    $query = $this->db->get();
		return $query;
	}
}
