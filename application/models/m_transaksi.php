<?php


class M_Transaksi extends CI_Model
{
	function cekdatatrx($Idtrx)
	{
		$this->db->select('*');
    $this->db->from("transaksi");
		$this->db->where("id_transaksi",$Idtrx);
    $query = $this->db->get();
    return $query;
	}

	function tampil_data()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
    $this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$this->db->order_by("transaksi.id_transaksi", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampilfordenah($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, t.`instansi`, td.`id_ruang`, td.`id_kamar` AS kamar, t.`tgl_checkin`, t.`tgl_checkout`, k.`id_kamar` AS kamarid, k.`nama_kamar`, k.`id_ruang` AS ruangid, t.`status_order`,td.`nama_tamu`, td.`jenis_kelamin`
		FROM transaksi t
		JOIN transaksi_detail td
		ON t.`id_transaksi` = td.`transaksi_id`
		JOIN kamar k
		ON k.`id_kamar` = td.`id_kamar`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."') OR (tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."'))
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY td.`nama_tamu`
		ORDER BY k.`id_kamar` DESC");
		return $query;
	}

	function tampilfordenahpertemuan($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, t.`instansi`, p.`ruang_id`, r.`type` ,t.`tgl_checkin`, t.`tgl_checkout`, t.`status_order`
		FROM `transaksi` t
		JOIN `transaksi_detail_additional` tda
		ON t.`id_transaksi` = tda.`transaksi_id`
		JOIN `pertemuan` p
		ON tda.`pertemuan_id` = p.`id_ruangpertemuan`
		JOIN `ruang` r
		ON r.`id` = p.`ruang_id`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."') OR (tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."'))
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY p.`ruang_id`
		ORDER BY p.`ruang_id` ASC");
		return $query;
	}

	function tampilfordenahpertemuanyayasan($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`,t.`instansi`, tda.`ruangkantor_id`, r.`type` ,t.`tgl_checkin`, t.`tgl_checkout`, t.`status_order`
		FROM `transaksi` t
		JOIN `transaksi_detail_additional` tda
		ON t.`id_transaksi` = tda.`transaksi_id`
		JOIN `ruang` r
		ON r.`id` = tda.`ruangkantor_id`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."') OR (tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."'))
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY tda.`ruangkantor_id`
		ORDER BY tda.`ruangkantor_id` ASC");
		return $query;
	}

	function tampil_data_xxx()
	{
		$this->db->select('id_kamar');
    $this->db->from("transaksi_detail");
    $query = $this->db->get();
    return $query;
	}

	function tampil_data_dominikus()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",5);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_fransiskus()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",6);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_antonius()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",4);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_yohanes()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",11);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_yoseph()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",10);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_elisabeth()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",12);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_sesilia()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",7);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_borromeus()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",8);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_carolus()
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi_detail.id_ruang",9);
		$this->db->where("transaksi.status_order !=","Check Out" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$query = $this->db->get();
		return $query;
	}

	function detail_data($id){
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.kegiatan, transaksi.dp,transaksi.total_bayar2, transaksi.nama_pemesan, transaksi.no_telp,jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.permintaan_khusus');
    $this->db->from("transaksi");
		$this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
		$this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi.id_transaksi",$id );
		$query = $this->db->get();
		return $query;
	}

	function detail_data_print($id){
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.kegiatan, transaksi.dp, transaksi.nama_pemesan, transaksi.no_telp,jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.permintaan_khusus, jasa.nama_jasa, transaksi.dp, transaksi.reduksi, transaksi.Jumlah_Terbayarkan, transaksi.total_bayar2, transaksi.tunai, transaksi.piutang, transaksi.Jumlah_TerbayarkanAfter');
    $this->db->from("transaksi");
		$this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
		$this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
		$this->db->join('jasa', 'jasa.id_jasa = jenis_tamu.id_jasa');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi.id_transaksi",$id );
		$query = $this->db->get();
		return $query;
	}

	function getDetailPrint($id)
	{
		$query = $this->db->query("SELECT T.`id_transaksi`, T.`instansi` ,J.`nama_jasa`, T.`jumlah_tamu`, T.`tgl_checkin`, T.`tgl_checkout`, DATEDIFF(T.`tgl_checkout`, T.`tgl_checkin`) AS selisihhari ,T.`id_jenistamu`, T.`id_jenistarif`, JT.`jenistamu` ,TF.`tarif`, JTR.`jenistarif`, (TF.`tarif` * DATEDIFF(T.`tgl_checkout`, T.`tgl_checkin`) * T.`jumlah_tamu`) AS Total, T.`total_bayar`
		FROM `transaksi` T
		JOIN `jenis_tamu` JT ON T.`id_jenistamu` = JT.`id_jenistamu`
		JOIN `jenis_tarif` JTR ON T.`id_jenistarif` = JTR.`id_jenistarif`
		JOIN `tarif` TF ON TF.`id_jenistamu` = JT.`id_jenistamu` AND TF.`id_jenistarif` = JTR.`id_jenistarif`
		JOIN `jasa` J ON J.`id_jasa` = JT.`id_jasa`
		WHERE T.`id_transaksi` = $id");
		return $query;
	}

	function getDetailPrintkonsumsi($id)
	{
		$query = $this->db->query("SELECT T.`id_transaksi`, J.`nama_jasa`, TDA.`additional_id`, A.`jenis_additional`,
		(SELECT harga FROM `additional` WHERE `id_additional` = TDA.`additional_id`) AS hargatarif,
		(SELECT COUNT(`additional_id`) FROM `transaksi_detail_additional` TD JOIN `additional` A ON A.`id_additional` =  TD.`additional_id` JOIN Jasa J ON J.`id_jasa` = A.`id_jasa` WHERE TD.`transaksi_id` = $id AND J.`id_jasa` = 2 AND A.`id_additional` = TDA.`additional_id`) AS Quantity,
		(SELECT (Quantity * hargatarif)) AS TotalJumlah
		FROM `transaksi` T
		JOIN `transaksi_detail_additional` TDA
		ON TDA.`transaksi_id` = T.`id_transaksi`
		LEFT JOIN `additional` A
		ON A.`id_additional` = TDA.`additional_id`
		LEFT JOIN `pertemuan` P
		ON P.`id_ruangpertemuan` = TDA.`pertemuan_id`
		LEFT JOIN `ruang` R
		ON R.`id` = TDA.`ruangkantor_id`
		LEFT JOIN  jasa J
		ON A.`id_jasa` = J.`id_jasa` OR P.`id_jasa` = J.`id_jasa`
		WHERE T.`id_transaksi` = $id
		AND J.`id_jasa` = 2
		GROUP BY TDA.`additional_id`");
		return $query;
	}

	function getDetailPrintkontribusitempat($id)
	{
		$query = $this->db->query("SELECT T.`id_transaksi`, J.`nama_jasa`, TDA.`pertemuan_id`, R.`nama_ruang`,
		(SELECT harga FROM `pertemuan` WHERE `id_ruangpertemuan` = TDA.`pertemuan_id`) AS hargatarif,
		(SELECT COUNT(`pertemuan_id`) FROM `transaksi_detail_additional` TD JOIN `pertemuan` P ON P.`id_ruangpertemuan` =  TD.`pertemuan_id` JOIN Jasa J ON J.`id_jasa` =P.`id_jasa` WHERE TD.`transaksi_id` = $id AND J.`id_jasa` = 3 AND P.`id_ruangpertemuan` = TDA.`pertemuan_id`) AS Quantity,
		(SELECT (Quantity * hargatarif)) AS TotalJumlah
		FROM `transaksi` T
		JOIN `transaksi_detail_additional` TDA
		ON TDA.`transaksi_id` = T.`id_transaksi`
		LEFT JOIN `pertemuan` P
		ON P.`id_ruangpertemuan` = TDA.`pertemuan_id`
		LEFT JOIN `ruang` R
		ON R.`id` = P.`ruang_id`
		LEFT JOIN  jasa J
		ON P.`id_jasa` = J.`id_jasa`
		WHERE T.`id_transaksi` = $id
		AND J.`id_jasa` = 3
		GROUP BY TDA.`pertemuan_id`");
		return $query;
	}

	// function xxxxxxxxxxxxV2($id)
	// {
	// 	$query = $this->db->query("SELECT R.`nama_ruang`
	// 	FROM `transaksi` T
	// 	JOIN `transaksi_detail_additional` TDA
	// 	ON TDA.`transaksi_id` = T.`id_transaksi`
	// 	LEFT JOIN `pertemuan` P
	// 	ON P.`id_ruangpertemuan` = TDA.`pertemuan_id`
	// 	LEFT JOIN `ruang` R
	// 	ON R.`id` = P.`ruang_id`
	// 	LEFT JOIN  jasa J
	// 	ON P.`id_jasa` = J.`id_jasa`
	// 	WHERE T.`id_transaksi` = 3
	// 	AND J.`id_jasa` = 3");
	// 	return $query;
	// }

	function getDetailPrintkontribusiyayasan($id)
	{
		$query = $this->db->query("SELECT T.`id_transaksi`, TDA.`keterangan`, TDA.`ruangkantor_id`, TDA.`tarifruangyayasan` AS hargatarif, R.`nama_ruang`,
		(SELECT COUNT(`ruangkantor_id`) FROM `transaksi_detail_additional` TD JOIN `ruang` R ON R.`id` =  TD.`ruangkantor_id` WHERE TD.`transaksi_id` = $id AND TDA.`keterangan` = 'Konstribusi Tempat' AND R.`id` = TDA.`ruangkantor_id`) AS Quantity,
		(SELECT (Quantity * hargatarif)) AS TotalJumlah
		FROM `transaksi` T
		LEFT JOIN `transaksi_detail_additional` TDA
		ON TDA.`transaksi_id` = T.`id_transaksi`
		LEFT JOIN `ruang` R
		ON R.`id` = TDA.`ruangkantor_id`
		WHERE T.`id_transaksi` = $id
		AND TDA.`keterangan` = 'Konstribusi Tempat'
		GROUP BY TDA.`ruangkantor_id`");
		return $query;
	}


	function detail_tamu($id){
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.kegiatan, transaksi.dp,  transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, ruang.nama_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, kamar.nama_kamar, transaksi.permintaan_khusus, transaksi_detail.id_transaksi_detil');
    $this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->join('ruang', 'transaksi_detail.id_ruang = ruang.id');
		$this->db->join('kamar', 'transaksi_detail.id_kamar = kamar.id_kamar');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi.id_transaksi",$id );
		$this->db->where("transaksi_detail.transaksi_id",$id );
		$query = $this->db->get();
		return $query;
	}

	public function caridata($cari)
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.kegiatan, transaksi.dp,  transaksi.nama_pemesan, transaksi.no_telp,jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.updated_at, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
		$this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
		$this->db->like('transaksi.nama_pemesan', $cari);
		$this->db->or_like('transaksi.instansi', $cari);
		$this->db->where("transaksi.status_order !=","New Reservation" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$cari = $this->db->get();
		return $cari->result();
	}

	public function caridatadetil($cari)
	{
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.kegiatan, transaksi.dp,  transaksi.nama_pemesan, transaksi.no_telp,jenis_tamu.jenistamu as jtamu, jenis_tarif.jenistarif as jtarif, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.updated_at, transaksi.permintaan_khusus');
		$this->db->from("transaksi");
		$this->db->join('jenis_tamu', 'jenis_tamu.id_jenistamu = transaksi.id_jenistamu');
		$this->db->join('jenis_tarif', 'jenis_tarif.id_jenistarif = transaksi.id_jenistarif');
		$this->db->where("transaksi.status_order !=","New Reservation" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$this->db->where("transaksi.id_transaksi",$cari );
		$cari = $this->db->get();
		return $cari->result();
	}

	function cari_detail_tamu($cari){
		$this->db->select('transaksi.id_transaksi, transaksi.instansi, transaksi.kegiatan, transaksi.dp,  transaksi.nama_pemesan, transaksi.no_telp, transaksi_detail.id_ruang, ruang.nama_ruang, transaksi.jumlah_tamu, transaksi.tgl_checkin, transaksi.tgl_checkout, transaksi.status_order, transaksi_detail.transaksi_id, transaksi_detail.nama_tamu, transaksi_detail.jenis_kelamin, transaksi_detail.id_kamar, kamar.nama_kamar, transaksi.permintaan_khusus');
    $this->db->from("transaksi");
		$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
		$this->db->join('ruang', 'transaksi_detail.id_ruang = ruang.id');
		$this->db->join('kamar', 'transaksi_detail.id_kamar = kamar.id_kamar');
		$this->db->where("transaksi.ac","1");
		$this->db->where("transaksi.status_order !=","New Reservation" );
		$this->db->where("transaksi.status_order !=","Cancel Reservation" );
		$this->db->where("transaksi.nama_pemesan",$cari );
		$cari = $this->db->get();
		return $cari->result();
	}

	function gettarif($ida,$idb){
		$this->db->select('*');
    $this->db->from("tarif");
		$this->db->where("id_jenistamu",$ida);
		$this->db->where("id_jenistarif",$idb);
		$query = $this->db->get();
		return $query->result();
	}

	function view_data()
	{
		$this->db->select('*');
    $this->db->from("transaksi");
		$this->db->where("ac","1");
		$this->db->where("status_order !=","Cancel Reservation");
		$this->db->order_by("id_transaksi", "desc");
    $query = $this->db->get();
    return $query;
	}

	function view_datacancel()
	{
		$this->db->select('*');
    $this->db->from("transaksi");
		$this->db->where("ac","1");
		$this->db->where("status_order","Cancel Reservation");
		$this->db->order_by("id_transaksi", "desc");
    $query = $this->db->get();
    return $query;
	}

	function view_databyID($id)
	{
		$this->db->select('*');
    $this->db->from("transaksi");
		$this->db->where("ac","1");
		$this->db->where("status_order !=","Cancel Reservation");
		$this->db->where("id_transaksi", $id);
		$this->db->order_by("id_transaksi", "desc");
    $query = $this->db->get();
    return $query;
	}

	function view_data_public($nama)
	{
		$this->db->select('*');
    $this->db->from("transaksi");
		$this->db->where("ac","1");
		$this->db->where("nama_pemesan", $nama);
		$this->db->order_by("id_transaksi", "desc");
    $query = $this->db->get();
    return $query;
	}

	function input_data($data,$table){
		//$this->db->insert($table,$data);
		$query = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function input_data_room($data,$table){
		//$this->db->insert($table,$data);
		$query = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_data_soft($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function cancel_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function payment_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function checkin_proses($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function checkout_proses($where,$data,$table){
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

	function cek_jumlah(){
		$this->db->select('id_transaksi');
    $this->db->from("transaksi");
		$this->db->where("ac","1");
		$this->db->order_by("id_transaksi", "desc");
		$this->db->limit(1);
    $query = $this->db->get();
    return $query;
	}

	function getTrx(){
		$this->db->select('id_transaksi');
    $this->db->from("transaksi");
		$this->db->where("ac","1");
		$this->db->order_by("id_transaksi", "desc");
    $query = $this->db->get();
    return $query;
	}

	function getTrxupdate($where) {
		return $this->db->get_where('transaksi',$where);
	}

	function getTransaksiPembayaran($where) {
		return $this->db->get_where('transaksi',$where);
	}

	function hapus_tamu($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_datatransaksi($where,$table){
	return $this->db->get_where($table,$where);
	}

	function update_datatrx($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// function getTrxKamar($id_ruang,$tgl_checkin,$tgl_checkout) {
	// 	$this->db->select('transaksi.id_transaksi, transaksi_detail.id_ruang, transaksi_detail.id_kamar, transaksi.tgl_checkin, transaksi.tgl_checkout');
	// 	$this->db->from("transaksi");
	// 	$this->db->join('transaksi_detail', 'transaksi_detail.transaksi_id = transaksi.id_transaksi');
	// 	$this->db->group_start();
	// 	$this->db->where("tgl_checkin BETWEEN $tgl_checkin AND $tgl_checkout");
	// 	$this->db->or_where("tgl_checkout BETWEEN $tgl_checkin AND $tgl_checkout");
	// 	$this->db->group_end();
	// 	$this->db->where("id_ruang",$id_ruang);
	// 	$this->db->where("status_order !=","Cancel Reservation");
	// 	$this->db->where("status_order !=","Check Out");
	// 	$this->db->order_by("transaksi.id_transaksi", "ASC");
  //   $query = $this->db->get();
	// 	return $query;
	// }

	function getTrxKamar($where) {
		// $query = $this->db->query("SELECT t.`id_transaksi`, td.`id_ruang`, td.`id_kamar` AS kamar, t.`tgl_checkin`, t.`tgl_checkout`, k.`id_kamar` AS kamarid, k.`nama_kamar`, k.`id_ruang` AS ruangid, t.`status_order`,td.`nama_tamu`, td.`jenis_kelamin`
		// FROM transaksi t
		// JOIN transaksi_detail td
		// ON t.`id_transaksi` = td.`transaksi_id`
		// JOIN kamar k
		// ON k.`id_kamar` = td.`id_kamar`
		// WHERE ((t.`tgl_checkin` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout'].") OR (t.`tgl_checkout` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout']."))
		// AND td.`id_ruang` =  ".$where['id_ruang']."
		// AND t.`status_order` != 'Cancel Reservation'
		// AND t.`status_order` != 'Check Out'
		// ORDER BY k.`id_kamar` DESC");
		// return $query;

		$query = $this->db->query("SELECT t.`id_transaksi`, td.`id_ruang`, td.`id_kamar` AS kamar, t.`tgl_checkin`, t.`tgl_checkout`, k.`id_kamar` AS kamarid, k.`nama_kamar`, k.`id_ruang` AS ruangid, t.`status_order`,td.`nama_tamu`, td.`jenis_kelamin`
		FROM transaksi t
		JOIN transaksi_detail td
		ON t.`id_transaksi` = td.`transaksi_id`
		JOIN kamar k
		ON k.`id_kamar` = td.`id_kamar`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout'].") OR (tr.`date` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout']."))
		AND td.`id_ruang` =  ".$where['id_ruang']."
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY k.`id_kamar`
		ORDER BY k.`id_kamar` DESC");
		return $query;
	}

	function getDetilKamar($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, t.`instansi`, td.`id_ruang`, td.`id_kamar` AS kamar, t.`tgl_checkin`, t.`tgl_checkout`, k.`id_kamar` AS kamarid, k.`nama_kamar`, k.`id_ruang` AS ruangid, t.`status_order`,td.`nama_tamu`, td.`jenis_kelamin`
		FROM transaksi t
		JOIN transaksi_detail td
		ON t.`id_transaksi` = td.`transaksi_id`
		JOIN kamar k
		ON k.`id_kamar` = td.`id_kamar`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout'].") OR (tr.`date` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout']."))
		AND td.`id_ruang` =  ".$where['id_ruang']."
		AND td.`id_kamar` =  ".$where['id_kamar']."
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY td.`nama_tamu`
		ORDER BY k.`id_kamar` DESC");
		return $query;
	}

	function getNamaRuangDenah($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, td.`id_ruang`, r.`nama_ruang` ,t.`tgl_checkin`, t.`tgl_checkout`
		FROM transaksi t
		JOIN transaksi_detail td
		ON t.`id_transaksi` = td.`transaksi_id`
		JOIN ruang r
		ON r.`id` = td.`id_ruang`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."') OR (tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."'))
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY r.`nama_ruang`");
		return $query;
	}

	function getNamaRuangDenahPertemuan($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, r.`nama_ruang`, t.`tgl_checkin`, t.`tgl_checkout`, p.`id_ruangpertemuan` AS edisionalruang, r.`id`
		FROM transaksi t
		JOIN `transaksi_detail_additional` tda
		ON t.`id_transaksi` = tda.`transaksi_id`
		JOIN `pertemuan` p
		ON tda.`pertemuan_id` = p.`id_ruangpertemuan`
		JOIN `ruang` r
		ON r.`id` = p.`ruang_id`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."') OR (tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."'))
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY r.`nama_ruang`");
		return $query;
	}

	function getNamaRuangDenahPertemuanyayasan($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, tda.`ruangkantor_id`, r.`nama_ruang`, t.`tgl_checkin`, t.`tgl_checkout`
		FROM transaksi t
		JOIN `transaksi_detail_additional` tda
		ON t.`id_transaksi` = tda.`transaksi_id`
		JOIN `ruang` r
		ON r.`id` = tda.`ruangkantor_id`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."') OR (tr.`date` BETWEEN '" . $where['tgl_checkin'] ."' AND '".$where['tgl_checkout']."'))
		AND t.`status_order` != 'Cancel Reservation'
		AND t.`status_order` != 'Check Out'
		GROUP BY r.`nama_ruang`");
		return $query;
	}

	function tampil_data_allruang1()
	{
		$this->db->select('id, nama_ruang, type');
		$this->db->from("ruang");
		$this->db->where("keterangan","Denah 1");
		$this->db->where("status","1");
		$this->db->order_by("id", "ASC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_allruang2()
	{
		$this->db->select('id, nama_ruang, type');
		$this->db->from("ruang");
		$this->db->where("keterangan","Denah 2");
		$this->db->where("status","1");
		$this->db->order_by("id", "ASC");
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_allruang3()
	{
		$this->db->select('id, nama_ruang, type');
		$this->db->from("ruang");
		$this->db->where("keterangan","Denah R.Pertemuan");
		$this->db->where("status","1");
		$this->db->order_by("id", "ASC");
		$query = $this->db->get();
		return $query;
	}

	function getTotalTKamar($where)
	{
		$query = $this->db->query("SELECT t.`id_transaksi`, td.`id_ruang`, td.`id_kamar` AS kamar, t.`tgl_checkin`, t.`tgl_checkout`, k.`id_kamar` AS kamarid, k.`nama_kamar`, k.`id_ruang` AS ruangid, t.`status_order`,td.`nama_tamu`, td.`jenis_kelamin`
		FROM transaksi t
		JOIN transaksi_detail td
		ON t.`id_transaksi` = td.`transaksi_id`
		JOIN kamar k
		ON k.`id_kamar` = td.`id_kamar`
		JOIN `transaksi_rangedate` tr
		ON t.`id_transaksi` = tr.`transaksi_id`
		WHERE ((tr.`date` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout'].") OR (tr.`date` BETWEEN " . $where['tgl_checkin'] ." AND ".$where['tgl_checkout']."))
		AND td.`transaksi_id` =  ".$where['transaksi_id']."
		GROUP BY td.`nama_tamu`
		ORDER BY k.`id_kamar` DESC");
		return $query;
	}
}
