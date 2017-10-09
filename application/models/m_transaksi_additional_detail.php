<?php

class m_transaksi_additional_detail extends CI_Model
{
	function tampil_data()
	{
		$this->db->select("*");
    $this->db->from("transaksi_detail_additional");
    $query = $this->db->get();
    return $query;
	}

	function detil_additionalruang($id)
	{
		$this->db->select("transaksi_detail_additional.transaksi_addt_id, transaksi_detail_additional.transaksi_id, transaksi_detail_additional.status, ruang.nama_ruang");
    $this->db->from("transaksi_detail_additional");
		$this->db->join('pertemuan', 'pertemuan.id_ruangpertemuan = transaksi_detail_additional.pertemuan_id');
		$this->db->join('ruang','ruang.id = pertemuan.ruang_id');
		$this->db->where("transaksi_detail_additional.status","1");
		$this->db->where("transaksi_detail_additional.transaksi_id",$id );
    $query = $this->db->get();
    return $query;
	}

	function detil_additionalruangyayasan($id)
	{
		$this->db->select("transaksi_detail_additional.transaksi_addt_id, transaksi_detail_additional.transaksi_id, transaksi_detail_additional.status, ruang.nama_ruang");
    $this->db->from("transaksi_detail_additional");
		$this->db->join('ruang','ruang.id = transaksi_detail_additional.ruangkantor_id');
		$this->db->where("transaksi_detail_additional.status","1");
		$this->db->where("transaksi_detail_additional.transaksi_id",$id );
    $query = $this->db->get();
    return $query;
	}

	function detil_additionalfasilitas($id)
	{
		$this->db->select("transaksi_detail_additional.transaksi_addt_id, transaksi_detail_additional.transaksi_id, transaksi_detail_additional.status, additional.jenis_additional");
		$this->db->from("transaksi_detail_additional");
		$this->db->join('additional','additional.id_additional = transaksi_detail_additional.additional_id');
		$this->db->where("transaksi_detail_additional.status","1");
		$this->db->where("transaksi_detail_additional.transaksi_id",$id );
		$query = $this->db->get();
		return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	// function edit_data($where,$table){
	// return $this->db->get_where($table,$where);
	// }
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function getAdditionalHarga($where) {
		return $this->db->get_where('additional',$where);
	}

	function tampilforruangrpcb($id)
	{
		$query = $this->db->query("SELECT TDA.`transaksi_addt_id`, TDA.`pertemuan_id`, R.`id`, R.`nama_ruang`, P.`harga`
		FROM `transaksi_detail_additional` TDA
		JOIN `pertemuan` P
		ON P.`id_ruangpertemuan` = TDA.`pertemuan_id`
		JOIN `ruang` R
		ON R.`id` = P.`ruang_id`
		WHERE TDA.`transaksi_id` = $id
		AND R.`type` = 'NK'");
		return $query;
	}

	function tampilforAddRRPCBtarray($id)
	{
		$query = $this->db->query("SELECT TDA.`transaksi_addt_id`
			FROM `transaksi_detail_additional` TDA
			JOIN `pertemuan` P
			ON P.`id_ruangpertemuan` = TDA.`pertemuan_id`
			JOIN `ruang` R
			ON R.`id` = P.`ruang_id`
			WHERE TDA.`transaksi_id` = $id
			AND R.`type` = 'NK'");
		return $query;
	}

	function tampilforruangmakan($id)
	{
		$query = $this->db->query("SELECT TDA.`transaksi_addt_id`, TDA.`pertemuan_id`, R.`id`, R.`nama_ruang`, P.`harga`
		FROM `transaksi_detail_additional` TDA
		JOIN `pertemuan` P
		ON P.`id_ruangpertemuan` = TDA.`pertemuan_id`
		JOIN `ruang` R
		ON R.`id` = P.`ruang_id`
		WHERE TDA.`transaksi_id` = $id
		AND R.`type` = 'RM'");
		return $query;
	}

	function tampilforAddt($id)
	{
		$query = $this->db->query("SELECT TDA.`transaksi_addt_id`, TDA.`additional_id`, A.`jenis_additional`, A.`harga`
		FROM `transaksi_detail_additional` TDA
		JOIN `additional` A
		ON A.`id_additional` = TDA.`additional_id`
		WHERE TDA.`transaksi_id` = $id");
		return $query;
	}

	function tampilforRyayasan($id)
	{
		$query = $this->db->query("SELECT TDA.`transaksi_addt_id`, TDA.`ruangkantor_id`, R.`nama_ruang`, TDA.`keterangan`, TDA.`tarifruangyayasan`
		FROM `transaksi_detail_additional` TDA
		JOIN `ruang` R
		ON R.`id` = TDA.`ruangkantor_id`
		WHERE TDA.`transaksi_id` = $id");
		return $query;
	}
}
