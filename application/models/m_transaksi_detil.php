<?php

class M_Transaksi_Detil extends CI_Model
{
	function tampil_data()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.nama_pemesan, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar');
    $this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
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

	function getcountkamar($where) {
		//return $this->db->get_where('transaksi_detail',$where);
		$this->db->select('transaksi.id_transaksi, transaksi_detail.id_ruang, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.id_kamar');
    $this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where($where);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
    $query = $this->db->get();
		return $query;
	}

	function getTransaksikamardetil($where) {
		$this->db->select("nama_tamu,jenis_kelamin,id_ruang,id_kamar");
    $this->db->from("transaksi_detail");
		$this->db->where($where);
		$this->db->order_by("transaksi_detail.id_kamar", "desc");
    $query = $this->db->get();
		return $query;
	}
}
