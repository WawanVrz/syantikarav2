<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_listreservasi_api extends CI_Model {

  public function getCountListReservasi()
  {
      return $this->db->count_all_results('transaksi', FALSE);
  }

  public function getListReservasiPublics()
  {
    $this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi.kegiatan, jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.created_at');
    $this->db->from("transaksi");
    $this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
    $this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
    $this->db->where("transaksi.ac","1");
    $query = $this->db->get();
    return $query;
  }

  public function getListReservasiDetailPublics($id)
  {
    $this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi.kegiatan, jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.created_at');
    $this->db->from("transaksi");
    $this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
    $this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
    $this->db->where("transaksi.ac","1");
    $this->db->where("transaksi.id_transaksi",$id );
    $query = $this->db->get();
    return $query;
  }

  public function getListReservNotif($date)
  {
    $this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi.kegiatan, jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.created_at');
    $this->db->from("transaksi");
    $this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
    $this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
    $this->db->where("transaksi.ac","1");
    $this->db->where("transaksi.tgl_checkin",$date );
    $query = $this->db->get();
    return $query;
  }
}
