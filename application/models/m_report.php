<?php

class M_Report extends CI_Model
{
	function tampil_data($cariin, $cariout)
	{
		$query = $this->db->query("SELECT * FROM transaksi WHERE ((tgl_checkin BETWEEN '$cariin' AND '$cariout') AND (tgl_checkout BETWEEN '$cariin' AND '$cariout')) ORDER BY id_transaksi ASC");
		return $query->result();
	}

	function tampil_datatotal($cariin, $cariout)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE ((tgl_checkin BETWEEN '$cariin' AND '$cariout') OR (tgl_checkout BETWEEN '$cariin' AND '$cariout')) ORDER BY id_transaksi ASC");
		return $query->result();
	}

	function tampil_data_bulanan($caribulan,$caritahun)
	{
		$query = $this->db->query("SELECT * FROM transaksi WHERE MONTH(`tgl_checkin`)= '$caribulan' AND YEAR(`tgl_checkin`)= '$caritahun' ORDER BY id_transaksi ASC");
		return $query->result();
	}

	function tampil_data_bulanantotal($caribulan,$caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE MONTH(`tgl_checkin`)= '$caribulan' AND YEAR(`tgl_checkin`)= '$caritahun' ORDER BY id_transaksi ASC");
		return $query->result();
	}

	function tampil_data_tahunan($caritahun)
	{
		$query = $this->db->query("SELECT * FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' ORDER BY id_transaksi ASC");
		return $query->result();
	}

	//--------------------------------------- QUERY LAPORAN PERTAHUN DI BAGI PERBULAN ----------------------------------------------------------

	function tampil_data_tahunan1($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '1'");
		return $query->result();
	}
	function tampil_data_tahunan2($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '2'");
		return $query->result();
	}
	function tampil_data_tahunan3($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '3'");
		return $query->result();
	}
	function tampil_data_tahunan4($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '4'");
		return $query->result();
	}
	function tampil_data_tahunan5($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '5'");
		return $query->result();
	}
	function tampil_data_tahunan6($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '6'");
		return $query->result();
	}
	function tampil_data_tahunan7($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '7'");
		return $query->result();
	}
	function tampil_data_tahunan8($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '8'");
		return $query->result();
	}
	function tampil_data_tahunan9($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '9'");
		return $query->result();
	}
	function tampil_data_tahunan10($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '10'");
		return $query->result();
	}
	function tampil_data_tahunan11($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '11'");
		return $query->result();
	}
	function tampil_data_tahunan12($caritahun)
	{
		$query = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_checkin`) = '$caritahun' AND MONTH(`tgl_checkin`) = '12'");
		return $query->result();
	}

//-------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------QUERY LAPORAN TOTAL PERTAHUN DI BAGI PERBULAN-----------------------------------------------

	function tampil_data_tahunantotal1($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '1'");
		return $query->result();
	}

	function tampil_data_tahunantotal2($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '2'");
		return $query->result();
	}

	function tampil_data_tahunantotal3($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '3'");
		return $query->result();
	}

	function tampil_data_tahunantotal4($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '4'");
		return $query->result();
	}

	function tampil_data_tahunantotal5($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '5'");
		return $query->result();
	}

	function tampil_data_tahunantotal6($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '6'");
		return $query->result();
	}

	function tampil_data_tahunantotal7($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '7'");
		return $query->result();
	}

	function tampil_data_tahunantotal8($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '8'");
		return $query->result();
	}

	function tampil_data_tahunantotal9($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '9'");
		return $query->result();
	}

	function tampil_data_tahunantotal10($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '10'");
		return $query->result();
	}

	function tampil_data_tahunantotal11($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '11'");
		return $query->result();
	}

	function tampil_data_tahunantotal12($caritahun)
	{
		$query = $this->db->query("SELECT sum(jumlah_tamu) as jumlahpeserta FROM transaksi WHERE YEAR(`tgl_checkin`)= '$caritahun' AND MONTH(`tgl_checkin`) = '12'");
		return $query->result();
	}

//------------------------------------------------------------------------------------------------------------------------------------------------

	function view_data()
	{
		$this->db->select("*");
    $this->db->from("transaksi");
    $this->db->order_by("id_transaksi", "ASC");
    $query = $this->db->get();
    return $query->result();
	}

}
