<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReservationController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_ruang');
		$this->load->model('m_kamar');
		$this->load->model('m_transaksi');
		$this->load->model('m_transaksi_detil');
		$this->load->model('m_jenistamu');
		$this->load->model('m_jenistarif');
		$this->load->model('m_additional');
		$this->load->model('m_ruangan');
		$this->load->model('m_transaksi_additional_detail');
		$this->load->model('m_transaksi_rangedate_detail');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['reservasi'] = $this->m_transaksi->view_data()->result();
		$data['cancelreservasi'] = $this->m_transaksi->view_datacancel()->result();
    $this->load->view('admin/viewlistreservasi', $data);
  }

	public function payment()
  {
		$data['reservasi'] = $this->m_transaksi->view_data()->result();
    $this->load->view('admin/viewlistpembayaranreservasi', $data);
  }

	public function paymentbyID($id)
  {
		$data['reservasi'] = $this->m_transaksi->view_databyID($id)->result();
    $this->load->view('admin/viewlistpembayaranreservasi', $data);
  }

	public function reservation()
  {
		$data['idruang'] = $this->m_ruang->tampil_data()->result();
		$data['idruang1'] = $this->m_ruang->tampil_data_ruang_reservasi()->result();
		$data['idkamar'] = $this->m_kamar->tampil_data()->result();
		$data['kamar_dominikus'] = $this->m_kamar->tampil_data_denah_dominikus()->result();
		$data['transaksi_d'] = $this->m_transaksi->tampil_data()->result();
		$data['idjenistamu'] = $this->m_jenistamu->tampil_data()->result();
		$data['idjenistarif'] = $this->m_jenistarif->tampil_data()->result();
		$data['hitung'] = $this->m_transaksi->cek_jumlah()->result();
		$data['jenis_additional'] = $this->m_additional->tampil_data()->result();
		$data['ruangan_pertemuan'] = $this->m_ruangan->tampil_data_addict()->result();
		$data['ruangan_pertemuanyayasan'] = $this->m_ruangan->tampil_data_addict_yayasan()->result();
		$data['kamar_makan'] = $this->m_ruangan->tampil_data_addict_rm()->result();
    $this->load->view('admin/addreservasi', $data);
  }

	public function tambah_aksi(){
		$hasil = array(
			'error' => 'no',
		);

		$namapemesan = $this->input->post('namapemesan');
		$idjenistarif = $this->input->post('idjenistarif');
		$idjenistamu = $this->input->post('idjenistamu');
		$idjenistarif1 = $this->input->get('idjenistarif');
		$idjenistamu2 = $this->input->get('idjenistamu');
		$telp = $this->input->post('notelp');
		$jumlahtamu = $this->input->post('jmlhtamu');
		$cekin = $this->input->post('in');
		$time1 = strtotime($cekin);
		$newformat1 = date('Y-m-d',$time1);
		$cekout = $this->input->post('out');
		$time2 = strtotime($cekout);
		$newformat2 = date('Y-m-d',$time2);
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$cek = $this->input->post('ceked');
		$permint = $this->input->post('permintaankhusus');
		$instansi = $this->input->post('instansi');
		$kegiatan = $this->input->post('kegiatan');
		$dp = str_replace(".","",$this->input->post('dp'));
		$ruangmakan = $this->input->post('ruangmakan');
		$ruangpertemuan = $this->input->post('ruangpertemuan');
		$fasilitasplus = $this->input->post('fasilitasplus');
		$ruangpertemuanyayasan = $this->input->post('ruangpertemuanyayasan');
		$tarifRYayasan = str_replace(".","",$this->input->post('tarifruang'));

		$ruang = $this->input->post('ruang');
		$kamar = $this->input->post('kamar');
		$namatamu = $this->input->post('namatamu');
		$gender = $this->input->post('gender');
		$bayar = $this->input->post('bayar');
		$pembayaran = $this->input->post('pembayaran');

		$start_date = new DateTime($cekin);
		$end_date = new DateTime($cekout);
		$interval = $start_date->diff($end_date);
		$sel = $interval->days+1;
		$now = strtotime(date($cekin));


		if($cek == 'Ya')
		{
			$data = array(
				'instansi'				=> $instansi,
				'nama_pemesan'		=> $namapemesan,
				'id_jenistamu'		=> $idjenistamu,
				'id_jenistarif'  	=> $idjenistarif,
				'no_telp'  				=> $telp,
				'jumlah_tamu'			=> $jumlahtamu,
				'tgl_checkin' 	  => $newformat1,
				'tgl_checkout' 	  => $newformat2,
				'kegiatan'				=> $kegiatan,
				'dp'							=> $dp,
				'total_bayar'		 => $bayar,
				'total_bayar2'		 => $bayar,
				'status_pembayaran' => 'Belum Lunas',
				'status_order' 	 => 'Reserved',
				'permintaan_khusus' => $permint,
				'ac' 	 				 => 1,
				'created_at' 	 => $date,
				'updated_at' 	 => $date
				);
			$idx = $this->m_transaksi->input_data($data,'transaksi');
			$hasil['id_data'] = $idx;
			$last_insert_id = $this->db->insert_id();

			for($a=0;$a<$sel;$a++)
			{
				$tmbah = date('Y-m-d', strtotime('+'.$a.' day', $now));
				$datadate = array(
									'transaksi_id'	=> $idx,
									'date'					=> $tmbah
								);

				$this->m_transaksi_rangedate_detail->input_data($datadate,'transaksi_rangedate');
			}

			//============================================PROSES ADD RUANG PERTEMUAN 1=========================================================

			$temp =count($this->input->post('ruangpertemuan'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'transaksi_id'			=> $idx,
							'pertemuan_id'			=> $ruangpertemuan[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
					if($ruangpertemuan[$i] != 0)
					{
						 $this->m_transaksi_additional_detail->input_data($data2,'transaksi_detail_additional');
					}
			}

			//============================================PROSES ADD RUANG YAYASAN 1=========================================================

			$temp =count($this->input->post('ruangpertemuanyayasan'));
			for($i=0; $i<$temp;$i++){
				$data5 = array(
							'transaksi_id'			=> $idx,
							'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
							'keterangan'				=> 'Konstribusi Tempat',
							'tarifruangyayasan' => $tarifRYayasan[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				if($ruangpertemuanyayasan[$i] != 0)
				{
					 $this->m_transaksi_additional_detail->input_data($data5,'transaksi_detail_additional');
				}
			}

			//============================================PROSES ADD FASILITAS ADDTIONAL 1======================================================

			$temp =count($this->input->post('fasilitasplus'));
			for($i=0; $i<$temp;$i++){
				$data4 = array(
							'transaksi_id'			=> $idx,
							'additional_id'			=> $fasilitasplus[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				if($fasilitasplus[$i] != 0)
				{
						$this->m_transaksi_additional_detail->input_data($data4,'transaksi_detail_additional');
				}
			}
			//===================================================================================================================================
			echo json_encode($hasil);
		}else {
			$data = array(
				'instansi'				=> $instansi,
				'nama_pemesan'		=> $namapemesan,
				'id_jenistamu'		=> $idjenistamu,
				'id_jenistarif'  	=> $idjenistarif,
				'no_telp'  				=> $telp,
				'jumlah_tamu'			=> $jumlahtamu,
				'tgl_checkin' 	 => $newformat1,
				'tgl_checkout' 	 => $newformat2,
				'total_bayar'		 => $bayar,
				'kegiatan'				=> $kegiatan,
				'dp'							=> $dp,
				'status_pembayaran' => "Belum Lunas",
				'status_order' 	 => 'New Reservation',
				'permintaan_khusus' => $permint,
				'ac' 	 				 => 1,
				'created_at' 	 => $date,
				'updated_at' 	 => $date
				);
			$idx = $this->m_transaksi->input_data($data,'transaksi');
			$hasil['id_data'] = $idx;
			$last_insert_id = $this->db->insert_id();

			for($a=0;$a<$sel;$a++)
			{
				$tmbah = date('Y-m-d', strtotime('+'.$a.' day', $now));
				$datadate = array(
									'transaksi_id'	=> $idx,
									'date'					=> $tmbah
								);

				$this->m_transaksi_rangedate_detail->input_data($datadate,'transaksi_rangedate');
			}

			//============================================PROSES ADD RUANG PERTEMUAN 2=========================================================

			$temp =count($this->input->post('ruangpertemuan'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'transaksi_id'			=> $idx,
							'pertemuan_id'			=> $ruangpertemuan[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
					if($ruangpertemuan[$i] != 0)
					{
						 $this->m_transaksi_additional_detail->input_data($data2,'transaksi_detail_additional');
					}
			}

			//============================================PROSES ADD RUANG YAYASAN 2=========================================================

			$temp =count($this->input->post('ruangpertemuanyayasan'));
			for($i=0; $i<$temp;$i++){
				$data5 = array(
							'transaksi_id'			=> $idx,
							'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
							'keterangan'				=> 'Konstribusi Tempat',
							'tarifruangyayasan' => $tarifRYayasan[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				if($ruangpertemuanyayasan[$i] != 0)
				{
					 $this->m_transaksi_additional_detail->input_data($data5,'transaksi_detail_additional');
				}
			}

			//============================================PROSES ADD FASILITAS ADDTIONAL 2=========================================================

			$temp =count($this->input->post('fasilitasplus'));
			for($i=0; $i<$temp;$i++){
				$data4 = array(
							'transaksi_id'			=> $idx,
							'additional_id'			=> $fasilitasplus[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				if($fasilitasplus[$i] != 0)
				{
						$this->m_transaksi_additional_detail->input_data($data4,'transaksi_detail_additional');
				}
			}
			//=====================================================================================================================================
			echo json_encode($hasil);
		}
	}

	public function add_detailroom(){
		$hasil = array(
			'error' => 'no',
		);

		$IdTrx = $this->input->post('idtrx');
		$IdRuang = $this->input->post('idr');
		$IdKamar = $this->input->post('idk');
		$namatamu = $this->input->post('namatamu');
		$JenisKelamin = $this->input->post('JK');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

			$data = array(
				'transaksi_id'		=> $IdTrx,
				'nama_tamu'				=> $namatamu,
				'jenis_kelamin'  	=> $JenisKelamin,
				'id_ruang'  			=> $IdRuang,
				'id_kamar'				=> $IdKamar,
				'status' 					=> 1,
				'created_at' 	 		=> $date,
				'updated_at' 	 		=> $date
				);
			$idroom = $this->m_transaksi->input_data_room($data,'transaksi_detail');
			$hasil['id_room'] = $idroom;
			echo json_encode($hasil);
	}

	function cancel_reservasi(){
		$id = $_GET['id'];
		$status = 'Cancel Reservation';

		$data = array(
			'status_order' 	=> $status
		);

		$where = array(
			'id_transaksi' => $id
		);
		$this->m_transaksi->cancel_data($where,$data,'transaksi');
		echo 'succeed';
	}

	function payment_reservasi(){
		$hasil = array(
			'error' => 'no',
		);

		$Idtrx = $this->input->post('idtransaksi');
		$reduksi = str_replace(".","",$this->input->post('reduksi'));
		$piutang = str_replace(".","",$this->input->post('tunai'));
		$status1 = 'Lunas';
		$status2 = 'Belum Lunas';
		$terbayarkan = $this->input->post('totalall');
		$reduksiafter = $this->input->post('reduksiafter');
		$jumlahterbayar = 0;
		$jumlahreduksi = 0;
		$jumlapiutang = 0;
		$total1 = 0;
		$total2 = 0;
		$utang = ($terbayarkan - $piutang);

		$cekdata= $this->m_transaksi->cekdatatrx($Idtrx)->result();
		foreach ($cekdata as $cekdatavalue)
		{
			$jumlahterbayar = $cekdatavalue->Jumlah_Terbayarkan;
			$jumlahreduksi = $cekdatavalue->reduksi;
			$jumlapiutang = $cekdatavalue->piutang;
			$total1 = $cekdatavalue->total_bayar;
			$total2 = $cekdatavalue->total_bayar2;
		}

		if($total1 == $total2)
		{
				if($jumlahreduksi == 0)
				{
					if($piutang >= $terbayarkan)
					{
						$data = array(
							'reduksi'							=> $reduksi,
							'Jumlah_Terbayarkan'	=> $terbayarkan,
							'tunai'								=> $terbayarkan,
							'piutang'							=> 0,
							'status_pembayaran' 	=> $status1
							);
					}else {
						$data = array(
							'reduksi'							=> $reduksi,
							'Jumlah_Terbayarkan'	=> $terbayarkan,
							'tunai'								=> $piutang,
							'piutang'							=> $utang,
							'status_pembayaran' 	=> $status2
							);
					}
				}else {
					if($piutang >= $terbayarkan )
					{
						$data = array(
							'reduksi'							=> $reduksiafter,
							'tunai'								=> $terbayarkan,
							'piutang'							=> 0,
							'status_pembayaran' 	=> $status1
						);
					}else {
						$data = array(
							'reduksi'							=> $reduksiafter,
							'Jumlah_Terbayarkan'	=> $terbayarkan,
							'tunai'								=> $piutang,
							'piutang'							=> $utang,
							'status_pembayaran' 	=> $status2
							);
					}
				}
		}else {
			if($jumlahreduksi == 0)
			{
				if($piutang >= $terbayarkan )
				{
					$data = array(
						'reduksi'							=> $reduksi,
						'Jumlah_TerbayarkanAfter'	=> $terbayarkan,
						'tunai'								=> $terbayarkan,
						'piutang'							=> 0,
						'status_pembayaran' 	=> $status1
					);
				}else {
					$data = array(
						'reduksi'							=> $reduksi,
						'Jumlah_TerbayarkanAfter'	=> $terbayarkan,
						'tunai'								=> $piutang,
						'piutang'							=> $utang,
						'status_pembayaran' 	=> $status2
						);
				}
			}else {
				if($piutang >= $terbayarkan )
				{
					$data = array(
						'reduksi'							=> $reduksiafter,
						'Jumlah_TerbayarkanAfter'	=> $terbayarkan,
						'tunai'								=> $terbayarkan,
						'piutang'							=> 0,
						'status_pembayaran' 	=> $status1
					);
				}else {
					$data = array(
						'reduksi'							=> $reduksiafter,
						'Jumlah_TerbayarkanAfter'	=> $terbayarkan,
						'tunai'								=> $piutang,
						'piutang'							=> $utang,
						'status_pembayaran' 	=> $status2
						);
				}
			}
		}

		$where = array(
			'id_transaksi' => $Idtrx
		);
		$updidx = $this->m_transaksi->payment_data($where,$data,'transaksi');
		$hasil['id_data'] = $Idtrx;
		echo json_encode($hasil);
	}


	function detail_reservasi_checkin($id){
		//$where = array('id_transaksi' => $id);
		$data['detil_reservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['detil_tamu'] = $this->m_transaksi->detail_tamu($id)->result();
		$data['detil_additional'] = $this->m_transaksi_additional_detail->detil_additionalruang($id)->result();
		$data['detil_additionalruangyayasan'] = $this->m_transaksi_additional_detail->detil_additionalruangyayasan($id)->result();
		$data['detil_additionalfas'] = $this->m_transaksi_additional_detail->detil_additionalfasilitas($id)->result();
		$this->load->view('admin/detilreservasicheckin',$data);
	}

	function detail_reservasi_checkiout($id){
		//$where = array('id_transaksi' => $id);
		$data['detil_reservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['detil_tamu'] = $this->m_transaksi->detail_tamu($id)->result();
		$data['detil_additional'] = $this->m_transaksi_additional_detail->detil_additionalruang($id)->result();
		$data['detil_additionalruangyayasan'] = $this->m_transaksi_additional_detail->detil_additionalruangyayasan($id)->result();
		$data['detil_additionalfas'] = $this->m_transaksi_additional_detail->detil_additionalfasilitas($id)->result();
		$this->load->view('admin/detilreservasicheckout',$data);
	}

	function detail_reservasi($id){
		//$where = array('id_transaksi' => $id);
		$data['detil_reservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['detil_tamu'] = $this->m_transaksi->detail_tamu($id)->result();
		$data['detil_additional'] = $this->m_transaksi_additional_detail->detil_additionalruang($id)->result();
		$data['detil_additionalruangyayasan'] = $this->m_transaksi_additional_detail->detil_additionalruangyayasan($id)->result();
		$data['detil_additionalfas'] = $this->m_transaksi_additional_detail->detil_additionalfasilitas($id)->result();
		$this->load->view('admin/detilreservasi',$data);
	}

	function detail_ruangkamar($id){
		//$where = array('id_transaksi' => $id);
		$data['ruangankamar'] = $this->m_kamar->detail_kamar($id)->result();
		$this->load->view('admin/addreservasi',$data);
	}

	function update_reservasi($id){
		//$where = array('id_transaksi' => $id);
		$data['detil_reservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['detil_tamu'] = $this->m_transaksi->detail_tamu($id)->result();
		$data['idruang'] = $this->m_ruang->tampil_data()->result();
		$data['idruang1'] = $this->m_ruang->tampil_data_ruang_reservasi()->result();
		$data['idkamar'] = $this->m_kamar->tampil_data()->result();
		$data['kamar_dominikus'] = $this->m_kamar->tampil_data_denah_dominikus()->result();
		$data['transaksi_d'] = $this->m_transaksi->tampil_data()->result();
		$data['idjenistamu'] = $this->m_jenistamu->tampil_data()->result();
		$data['idjenistarif'] = $this->m_jenistarif->tampil_data()->result();
		$data['hitung'] = $this->m_transaksi->cek_jumlah()->result();
		$data['detil_additional'] = $this->m_transaksi_additional_detail->detil_additionalruang($id)->result();
		$data['detil_additionalfas'] = $this->m_transaksi_additional_detail->detil_additionalfasilitas($id)->result();
		$data['detil_additionalruangyayasan'] = $this->m_transaksi_additional_detail->detil_additionalruangyayasan($id)->result();
		$this->load->view('admin/updatereservasi',$data);
	}

	function edit_transaksi($id){
		$where = array('id_transaksi' => $id);
		$data['detil_reservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['transaksi_d'] = $this->m_transaksi->tampil_data()->result();
		$data['idjenistamu'] = $this->m_jenistamu->tampil_data()->result();
		$data['idjenistarif'] = $this->m_jenistarif->tampil_data()->result();
		$data['transaksitrx'] = $this->m_transaksi->edit_datatransaksi($where,'transaksi')->result();

		$data['detil_reservasi'] = $this->m_transaksi->detail_data($id)->result();
		$data['detil_tamu'] = $this->m_transaksi->detail_tamu($id)->result();
		$data['idruang'] = $this->m_ruang->tampil_data()->result();
		$data['idruang1'] = $this->m_ruang->tampil_data_ruang_reservasi()->result();
		$data['idkamar'] = $this->m_kamar->tampil_data()->result();
		$data['kamar_dominikus'] = $this->m_kamar->tampil_data_denah_dominikus()->result();
		$data['transaksi_d'] = $this->m_transaksi->tampil_data()->result();
		$data['idjenistamu'] = $this->m_jenistamu->tampil_data()->result();
		$data['idjenistarif'] = $this->m_jenistarif->tampil_data()->result();
		$data['hitung'] = $this->m_transaksi->cek_jumlah()->result();
		$data['jenis_additional'] = $this->m_additional->tampil_data()->result();
		$data['ruangan_pertemuan'] = $this->m_ruangan->tampil_data_addict()->result();
		$data['ruangan_pertemuanyayasan'] = $this->m_ruangan->tampil_data_addict_yayasan()->result();
		$data['kamar_makan'] = $this->m_ruangan->tampil_data_addict_rm()->result();

		$data['tampilForRuangRPCB'] = $this->m_transaksi_additional_detail->tampilforruangrpcb($id)->result();
		$data['tampilforAddRRPCBtarray'] = $this->m_transaksi_additional_detail->tampilforAddRRPCBtarray($id)->result();
		$data['tampilForRuangRPCBcount'] = $this->m_transaksi_additional_detail->tampilforruangrpcb($id)->num_rows();
		$data['tampilForRuangMakan'] = $this->m_transaksi_additional_detail->tampilforruangmakan($id)->result();
		$data['tampilForRuangMakancount'] = $this->m_transaksi_additional_detail->tampilforruangmakan($id)->num_rows();
		$data['tampilForAdditional'] = $this->m_transaksi_additional_detail->tampilforAddt($id)->result();
		$data['tampilForAdditionalcount'] = $this->m_transaksi_additional_detail->tampilforAddt($id)->num_rows();
		$data['tampilForRyayasan'] = $this->m_transaksi_additional_detail->tampilforRyayasan($id)->result();
		$data['tampilForRyayasancount'] = $this->m_transaksi_additional_detail->tampilforRyayasan($id)->num_rows();
		$this->load->view('admin/editdatatransaksi',$data);

	}

	function editing(){
		$hasil = array(
			'error' => 'no',
		);

		$id = $this->input->post('id');
		$namapemesan = $this->input->post('namapemesan');
		$idjenistarif = $this->input->post('idjenistarif');
		$idjenistamu = $this->input->post('idjenistamu');
		$idjenistarif1 = $this->input->get('idjenistarif');
		$idjenistamu2 = $this->input->get('idjenistamu');
		$telp = $this->input->post('notelp');
		$jumlahtamu = $this->input->post('jmlhtamu');
		$cekin = $this->input->post('in');
		$time1 = strtotime($cekin);
		$newformat1 = date('Y-m-d',$time1);
		$cekout = $this->input->post('out');
		$time2 = strtotime($cekout);
		$newformat2 = date('Y-m-d',$time2);
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$permint = $this->input->post('permintaankhusus');
		$bayar = $this->input->post('bayar');
		$pembayaran = $this->input->post('pembayaran');
		$order = $this->input->post('order');
		$pembayaranstatus = $this->input->post('pembayaranstatus');
		$tanggalin = $this->input->post('tglin');
		$tanggalout = $this->input->post('tglout');
		$instansi = $this->input->post('instansi');
		$kegiatan = $this->input->post('kegiatan');
		$dp = str_replace(".","",$this->input->post('dp'));

		$ruangpertemuanmakan = $this->input->post('ruangpertemuanmakan');
		$ruangpertemuan = $this->input->post('ruangpertemuan');
		$fasilitasplus = $this->input->post('fasilitasplus');
		$ruangpertemuanyayasan = $this->input->post('ruangpertemuanyayasan');
		$tarifRYayasan = str_replace(".","",$this->input->post('tarifruang'));
		$kodeAddDetil1 = $this->input->post('IDAddDetil1');
		$kodeAddDetil2 = $this->input->post('IDAddDetil2');
		$kodeAddDetil3 = $this->input->post('IDAddDetil3');
		$kodeAddDetil4 = $this->input->post('IDAddDetil4');

		$start_date = new DateTime($cekin);
		$end_date = new DateTime($cekout);
		$interval = $start_date->diff($end_date);
		$sel = $interval->days+1;
		$now = strtotime(date($cekin));

		if($tanggalin != $cekin)
		{
				$data = array(
					'instansi'				=> $instansi,
					'nama_pemesan'		=> $namapemesan,
					'id_jenistamu'		=> $idjenistamu,
					'id_jenistarif'  	=> $idjenistarif,
					'no_telp'  				=> $telp,
					'jumlah_tamu'			=> $jumlahtamu,
					'tgl_checkin' 	 => $newformat1,
					'tgl_checkout' 	 => $newformat2,
					'total_bayar2'		 => $bayar,
					'dp'						=> $dp,
					'kegiatan'			=> $kegiatan,
					'status_order'		=>$order,
					'status_pembayaran'		=>$pembayaranstatus,
					'permintaan_khusus' => $permint,
					'updated_at' 	 => $date
				);
				$where = array(
					'id_transaksi' => $id
				);
				$wheretrx = array(
					'transaksi_id' => $id
				);
				$idx1 =$this->m_transaksi->update_datatrx($where,$data,'transaksi');
				$idx2 = $this->m_transaksi->hapus_tamu($wheretrx,'transaksi_detail');
				$idx3 = $this->m_transaksi_rangedate_detail->hapus_data($wheretrx,'transaksi_rangedate');
				$hasil['id_data1'] = $idx1;
				$hasil['id_data2'] = $idx2;

				for($a=0;$a<$sel;$a++)
				{
					$tmbah = date('Y-m-d', strtotime('+'.$a.' day', $now));
					$datadate = array(
										'transaksi_id'	=> $id,
										'date'					=> $tmbah
									);

					$this->m_transaksi_rangedate_detail->input_data($datadate,'transaksi_rangedate');
				}

				//============================================PROSES RUANG MAKAN 2=========================================================
		 	 		//---------------------------UPDATE DATA----------------------------------
		 				 $temp =count($this->input->post('ruangpertemuanmakan'));
		 				 for($i=0; $i<$temp;$i++){
		 					 $data1 = array(
		 								 'pertemuan_id'			=> $ruangpertemuanmakan[$i],
		 								 'updated_at'  			=> $date
		 								 );
		 					 $where = array(
		 									 'transaksi_id'			=> $id,
		 									 'transaksi_addt_id' => $kodeAddDetil1[$i]
		 								 );
		 					 $this->m_transaksi_additional_detail->update_data($where,$data1,'transaksi_detail_additional');
		 				 }

		 			//---------------------------DELETE DATA----------------------------------
		 	 				$kodeAddDetildel1 = $this->input->post('IDAddDetil1del');
		 	 				$kodeAddDetildel1 = explode(" ", $kodeAddDetildel1);

		 	 				foreach ($kodeAddDetildel1 as $key => $value) {
		 	 					$where = array(
		 	 												'transaksi_id'			=> $id,
		 	 												'transaksi_addt_id' => $value
		 	 												);
		 	 					$this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
		 	 				}

		 			//------------------------------ADD DATA-------------------------------------
		 					$ruangpertemuanmakanv2 = $this->input->post('ruangpertemuanmakanv2');
		 					$temp =count($this->input->post('ruangpertemuanmakanv2'));
		 					for($i=0; $i<$temp;$i++){
		 						$data1 = array(
		 										'transaksi_id'			=> $id,
		 										'pertemuan_id'			=> $ruangpertemuanmakanv2[$i],
		 										'keterangan'				=> '-',
		 										'status'						=> 1,
		 										'created_at'  			=> $date,
		 										'updated_at'  			=> $date
		 									);
		 							if($ruangpertemuanmakanv2[$i] != 0)
		 							{
		 								 $this->m_transaksi_additional_detail->input_data($data1,'transaksi_detail_additional');
		 							}
		 					}

		 	 //============================================PROSES RUANG PERTEMUAN 1=========================================================
		 	 		//---------------------------UPDATE DATA----------------------------------
		 			 $temp =count($this->input->post('ruangpertemuan'));
		 			 for($i=0; $i<$temp;$i++){
		 					 $data2 = array(
		 								 'pertemuan_id'			=> $ruangpertemuan[$i],
		 								 'updated_at'  			=> $date
		 								 );
		 					 $where = array(
		 									 'transaksi_id'			=> $id,
		 									 'transaksi_addt_id' => $kodeAddDetil2[$i]
		 								 );
		 					 $this->m_transaksi_additional_detail->update_data($where,$data2,'transaksi_detail_additional');
		 				 }

		 			//---------------------------DELETE DATA----------------------------------
		 				$kodeAddDetildel2 = $this->input->post('IDAddDetil2del');
		 				$kodeAddDetildel2 = explode(" ", $kodeAddDetildel2);

		 				foreach ($kodeAddDetildel2 as $key => $value) {
		 					$where = array(
		 												'transaksi_id'			=> $id,
		 												'transaksi_addt_id' => $value
		 												);
		 					$this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
		 				}

		 			//------------------------------ADD DATA-------------------------------------
		 					$ruangpertemuanv2 = $this->input->post('ruangpertemuanv2');
		 					$temp =count($this->input->post('ruangpertemuanv2'));
		 					for($i=0; $i<$temp;$i++){
		 						$data2 = array(
		 										'transaksi_id'			=> $id,
		 										'pertemuan_id'			=> $ruangpertemuanv2[$i],
		 										'keterangan'				=> '-',
		 										'status'						=> 1,
		 										'created_at'  			=> $date,
		 										'updated_at'  			=> $date
		 									);
		 							if($ruangpertemuanv2[$i] != 0)
		 							{
		 								 $this->m_transaksi_additional_detail->input_data($data2,'transaksi_detail_additional');
		 							}
		 					}

		 		//============================================PROSES RUANG YAYASAN 1=========================================================
		 			//------------------------------UPDATE DATA-------------------------------------
		 				 $temp =count($this->input->post('ruangpertemuanyayasan'));
		 				 for($i=0; $i<$temp;$i++){
		 					 $data3 = array(
		 								 'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
		 								 'tarifruangyayasan' => $tarifRYayasan[$i],
		 								 'updated_at'  			=> $date
		 								 );
		 						$where = array(
		 									'transaksi_id'			=> $id,
		 									'transaksi_addt_id' => $kodeAddDetil3[$i]
		 								 );
		 					 $this->m_transaksi_additional_detail->update_data($where,$data3,'transaksi_detail_additional');
		 				 }

		 		 //---------------------------DELETE DATA----------------------------------
		 	 	 				$kodeAddDetildel3 = $this->input->post('IDAddDetil3del');
		 	 	 				$kodeAddDetildel3 = explode(" ", $kodeAddDetildel3);

		 	 	 				foreach ($kodeAddDetildel3 as $key => $value) {
		 	 	 					$where = array(
		 	 	 												'transaksi_id'			=> $id,
		 	 	 												'transaksi_addt_id' => $value
		 	 	 												);
		 	 	 					$this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
		 	 	 				}

		 			//------------------------------ADD DATA-------------------------------------
		 					$ruangpertemuanyayasanv2 = $this->input->post('ruangpertemuanyayasanv2');
		 					$tarifruangv2 = $this->input->post('tarifruangv2');
		 					$temp =count($this->input->post('ruangpertemuanyayasanv2'));
		 					for($i=0; $i<$temp;$i++){
		 						$data5 = array(
		 									'transaksi_id'			=> $id,
		 									'ruangkantor_id'		=> $ruangpertemuanyayasanv2[$i],
		 									'keterangan'				=> 'Konstribusi Tempat',
		 									'tarifruangyayasan' => $tarifruangv2[$i],
		 									'status'						=> 1,
		 									'created_at'  			=> $date,
		 									'updated_at'  			=> $date
		 									);
		 						if($ruangpertemuanyayasanv2[$i] != 0)
		 						{
		 							 $this->m_transaksi_additional_detail->input_data($data5,'transaksi_detail_additional');
		 						}
		 					}

		 		 //============================================PROSES FASILITAS ADDITIONAL 1======================================================
		 		 	 //------------------------------UPDATE DATA-------------------------------------
		 					 $temp =count($this->input->post('fasilitasplus'));
		 					 for($i=0; $i<$temp;$i++){
		 						 $data4 = array(
		 									 'additional_id'			=> $fasilitasplus[$i],
		 									 'updated_at'  			=> $date
		 									 );
		 							$where = array(
		 										'transaksi_id'			=> $id,
		 										'transaksi_addt_id' => $kodeAddDetil4[$i]
		 									 );
		 						 $this->m_transaksi_additional_detail->update_data($where,$data4,'transaksi_detail_additional');
		 					 }

		 			//---------------------------DELETE DATA----------------------------------
		 					 			 $kodeAddDetildel4 = $this->input->post('IDAddDetil4del');
		 					 			 $kodeAddDetildel4 = explode(" ", $kodeAddDetildel4);

		 					 			 foreach ($kodeAddDetildel4 as $key => $value) {
		 					 				 $where = array(
		 					 											 'transaksi_id'			=> $id,
		 					 											 'transaksi_addt_id' => $value
		 					 											 );
		 					 				 $this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
		 					 			 }

		 				//------------------------------ADD DATA-------------------------------------
		 	 					$fasilitasplusv2 = $this->input->post('fasilitasplusv2');
		 						$temp =count($this->input->post('fasilitasplusv2'));
		 						for($i=0; $i<$temp;$i++){
		 							$data4 = array(
		 										'transaksi_id'			=> $id,
		 										'additional_id'			=> $fasilitasplusv2[$i],
		 										'keterangan'				=> '-',
		 										'status'						=> 1,
		 										'created_at'  			=> $date,
		 										'updated_at'  			=> $date
		 										);
		 							if($fasilitasplusv2[$i] != 0)
		 							{
		 									$this->m_transaksi_additional_detail->input_data($data4,'transaksi_detail_additional');
		 							}
		 						}
		 		//===================================================================================================================================
	 			  echo json_encode($hasil);
		 }else {
			 $data = array(
				 'instansi'				=> $instansi,
				 'nama_pemesan'		=> $namapemesan,
				 'id_jenistamu'		=> $idjenistamu,
				 'id_jenistarif'  	=> $idjenistarif,
				 'no_telp'  				=> $telp,
				 'jumlah_tamu'			=> $jumlahtamu,
				 'tgl_checkin' 	 => $newformat1,
				 'tgl_checkout' 	 => $newformat2,
				 'total_bayar2'		 => $bayar,
				 'dp'						=> $dp,
				 'kegiatan'			=> $kegiatan,
				 'status_order'		=>$order,
				 'status_pembayaran'		=>$pembayaranstatus,
				 'permintaan_khusus' => $permint,
				 'updated_at' 	 => $date
			 );
			 $where = array(
				 'id_transaksi' => $id
			 );
			 $idx = $this->m_transaksi->update_datatrx($where,$data,'transaksi');
			 $hasil['id_data'] = $idx;

	 //============================================PROSES RUANG MAKAN 2=========================================================
	 		//---------------------------UPDATE DATA----------------------------------
				 $temp =count($this->input->post('ruangpertemuanmakan'));
				 for($i=0; $i<$temp;$i++){
					 $data1 = array(
								 'pertemuan_id'			=> $ruangpertemuanmakan[$i],
								 'updated_at'  			=> $date
								 );
					 $where = array(
									 'transaksi_id'			=> $id,
									 'transaksi_addt_id' => $kodeAddDetil1[$i]
								 );
					 $this->m_transaksi_additional_detail->update_data($where,$data1,'transaksi_detail_additional');
				 }

			//---------------------------DELETE DATA----------------------------------
	 				$kodeAddDetildel1 = $this->input->post('IDAddDetil1del');
	 				$kodeAddDetildel1 = explode(" ", $kodeAddDetildel1);

	 				foreach ($kodeAddDetildel1 as $key => $value) {
	 					$where = array(
	 												'transaksi_id'			=> $id,
	 												'transaksi_addt_id' => $value
	 												);
	 					$this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
	 				}

			//------------------------------ADD DATA-------------------------------------
					$ruangpertemuanmakanv2 = $this->input->post('ruangpertemuanmakanv2');
					$temp =count($this->input->post('ruangpertemuanmakanv2'));
					for($i=0; $i<$temp;$i++){
						$data1 = array(
										'transaksi_id'			=> $id,
										'pertemuan_id'			=> $ruangpertemuanmakanv2[$i],
										'keterangan'				=> '-',
										'status'						=> 1,
										'created_at'  			=> $date,
										'updated_at'  			=> $date
									);
							if($ruangpertemuanmakanv2[$i] != 0)
							{
								 $this->m_transaksi_additional_detail->input_data($data1,'transaksi_detail_additional');
							}
					}

	 //============================================PROSES RUANG PERTEMUAN 2=========================================================
	 		//---------------------------UPDATE DATA----------------------------------
			 $temp =count($this->input->post('ruangpertemuan'));
			 for($i=0; $i<$temp;$i++){
					 $data2 = array(
								 'pertemuan_id'			=> $ruangpertemuan[$i],
								 'updated_at'  			=> $date
								 );
					 $where = array(
									 'transaksi_id'			=> $id,
									 'transaksi_addt_id' => $kodeAddDetil2[$i]
								 );
					 $this->m_transaksi_additional_detail->update_data($where,$data2,'transaksi_detail_additional');
				 }

			//---------------------------DELETE DATA----------------------------------
				$kodeAddDetildel2 = $this->input->post('IDAddDetil2del');
				$kodeAddDetildel2 = explode(" ", $kodeAddDetildel2);

				foreach ($kodeAddDetildel2 as $key => $value) {
					$where = array(
												'transaksi_id'			=> $id,
												'transaksi_addt_id' => $value
												);
					$this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
				}

				// $data = $this->m_transaksi_additional_detail->tampilforAddRRPCBtarray($id)->result();
				// $temp1 =count($this->input->post('IDAddDetil2del'));
				// $temp2 =count($data);
			// $where = array(
			//  							'transaksi_id'			=> $id,
			//  							'transaksi_addt_id' => $kodeAddDetildel2
			//  							);
			// $this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
			// $count = 0;
			// for($i=0; $i<$temp1;$i++)
			// {
			//   for($j=0; $j<$temp2;$j++)
			//   {
			//     if($data[$j]->transaksi_addt_id == $kodeAddDetildel2[$i])
			//     {
			//       $count = 1;
			//     }
			//   }
			//   if($count > 0)
			//   {
			// 		$data2 = array(
			// 							 'pertemuan_id'			=> $ruangpertemuan[$i],
			// 							 'updated_at'  			=> $date
			// 							 );
			// 		$where = array(
			//  							'transaksi_id'			=> $id,
			//  							'transaksi_addt_id' => $kodeAddDetil2[$i]
			//  							);
			//     $this->m_transaksi_additional_detail->update_data($where,$data2,'transaksi_detail_additional');
			//   }else {
			// 		$where = array(
			//  							'transaksi_id'			=> $id,
			//  							'transaksi_addt_id' => $kodeAddDetildel2
			//  							);
			//     $this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
			//   }
			//       $count = 0;
			// }

			//------------------------------ADD DATA-------------------------------------
					$ruangpertemuanv2 = $this->input->post('ruangpertemuanv2');
					$temp =count($this->input->post('ruangpertemuanv2'));
					for($i=0; $i<$temp;$i++){
						$data2 = array(
										'transaksi_id'			=> $id,
										'pertemuan_id'			=> $ruangpertemuanv2[$i],
										'keterangan'				=> '-',
										'status'						=> 1,
										'created_at'  			=> $date,
										'updated_at'  			=> $date
									);
							if($ruangpertemuanv2[$i] != 0)
							{
								 $this->m_transaksi_additional_detail->input_data($data2,'transaksi_detail_additional');
							}
					}

		//============================================PROSES RUANG YAYASAN 2=========================================================
			//------------------------------UPDATE DATA-------------------------------------
				 $temp =count($this->input->post('ruangpertemuanyayasan'));
				 for($i=0; $i<$temp;$i++){
					 $data3 = array(
								 'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
								 'tarifruangyayasan' => $tarifRYayasan[$i],
								 'updated_at'  			=> $date
								 );
						$where = array(
									'transaksi_id'			=> $id,
									'transaksi_addt_id' => $kodeAddDetil3[$i]
								 );
					 $this->m_transaksi_additional_detail->update_data($where,$data3,'transaksi_detail_additional');
				 }

		 //---------------------------DELETE DATA----------------------------------
	 	 				$kodeAddDetildel3 = $this->input->post('IDAddDetil3del');
	 	 				$kodeAddDetildel3 = explode(" ", $kodeAddDetildel3);

	 	 				foreach ($kodeAddDetildel3 as $key => $value) {
	 	 					$where = array(
	 	 												'transaksi_id'			=> $id,
	 	 												'transaksi_addt_id' => $value
	 	 												);
	 	 					$this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
	 	 				}

			//------------------------------ADD DATA-------------------------------------
					$ruangpertemuanyayasanv2 = $this->input->post('ruangpertemuanyayasanv2');
					$tarifruangv2 = $this->input->post('tarifruangv2');
					$temp =count($this->input->post('ruangpertemuanyayasanv2'));
					for($i=0; $i<$temp;$i++){
						$data5 = array(
									'transaksi_id'			=> $id,
									'ruangkantor_id'		=> $ruangpertemuanyayasanv2[$i],
									'keterangan'				=> 'Konstribusi Tempat',
									'tarifruangyayasan' => $tarifruangv2[$i],
									'status'						=> 1,
									'created_at'  			=> $date,
									'updated_at'  			=> $date
									);
						if($ruangpertemuanyayasanv2[$i] != 0)
						{
							 $this->m_transaksi_additional_detail->input_data($data5,'transaksi_detail_additional');
						}
					}

		 //============================================PROSES FASILITAS ADDITIONAL 2======================================================
		 	 //------------------------------UPDATE DATA-------------------------------------
					 $temp =count($this->input->post('fasilitasplus'));
					 for($i=0; $i<$temp;$i++){
						 $data4 = array(
									 'additional_id'			=> $fasilitasplus[$i],
									 'updated_at'  			=> $date
									 );
							$where = array(
										'transaksi_id'			=> $id,
										'transaksi_addt_id' => $kodeAddDetil4[$i]
									 );
						 $this->m_transaksi_additional_detail->update_data($where,$data4,'transaksi_detail_additional');
					 }

			//---------------------------DELETE DATA----------------------------------
					 			 $kodeAddDetildel4 = $this->input->post('IDAddDetil4del');
					 			 $kodeAddDetildel4 = explode(" ", $kodeAddDetildel4);

					 			 foreach ($kodeAddDetildel4 as $key => $value) {
					 				 $where = array(
					 											 'transaksi_id'			=> $id,
					 											 'transaksi_addt_id' => $value
					 											 );
					 				 $this->m_transaksi_additional_detail->hapus_data($where,'transaksi_detail_additional');
					 			 }

				//------------------------------ADD DATA-------------------------------------
	 					$fasilitasplusv2 = $this->input->post('fasilitasplusv2');
						$temp =count($this->input->post('fasilitasplusv2'));
						for($i=0; $i<$temp;$i++){
							$data4 = array(
										'transaksi_id'			=> $id,
										'additional_id'			=> $fasilitasplusv2[$i],
										'keterangan'				=> '-',
										'status'						=> 1,
										'created_at'  			=> $date,
										'updated_at'  			=> $date
										);
							if($fasilitasplusv2[$i] != 0)
							{
									$this->m_transaksi_additional_detail->input_data($data4,'transaksi_detail_additional');
							}
						}
		//===================================================================================================================================
				 echo json_encode($hasil);
		 }
	}

	function getRuang()
	{
		$where = array(
			'id' => $this->input->get('id_ruang')
		);
		$output = $this->m_ruang->getRuang($where);

		echo json_encode($output->result()[0]);
	}

	function getHargaRuangPertemuan()
	{
		$where = array(
			'id_ruangpertemuan' => $this->input->get('id_ruangpertemuan')
		);
		$output = $this->m_ruangan->getRuangpertemuan($where);

		echo json_encode($output->result()[0]);
	}

	function getHargaAdditional()
	{
		$where = array(
			'id_additional' => $this->input->get('id_additional')
		);
		$output = $this->m_additional->getAdditionalHarga($where);

		echo json_encode($output->result()[0]);
	}

	function getCountKamar()
	{
		$where = array(
			'id_ruang' => $this->input->get('id_ruang'),
			'id_kamar' => $this->input->get('id_kamar')
		);
		$output = $this->m_transaksi_detil->getcountkamar($where);

		echo json_encode($output->result());
	}

	function GetRuangKamar()
	{
		$where =  array(
			'id_ruang' => $this->input->get('id_ruang')
		);
		$output =  $this->m_kamar->getKamar($where);
		echo json_encode($output->result());
	}

	function GetTransaksiKamar()
	{
		$where =  array(
			'id_ruang' => $this->input->get('id_ruang')
		);
		$output =  $this->m_transaksi_detil->getTransaksikamardetil($where);
		echo json_encode($output->result());
	}

	function GetIDTrx()
	{
		$output =  $this->m_transaksi->getTrx();
		echo json_encode($output->result()[0]);
	}

	function GetIDTrxUpdate()
	{
		$where =  array(
			'id_transaksi' => $this->input->get('id_transaksi')
		);

		$output =  $this->m_transaksi->getTrxupdate($where);
		echo json_encode($output->result()[0]);
	}

	function hapustamu(){
		$id = $_GET['id'];
		$where = array('id_transaksi_detil' => $id);
		$this->m_transaksi->hapus_tamu($where,'transaksi_detail');

		echo 'succeed';
	}

	function getTKamar()
	{
			$where =  array(
				'id_ruang' => $this->input->get('id_ruang'),
				'tgl_checkin' => $this->input->get('tgl_checkin'),
				'tgl_checkout' => $this->input->get('tgl_checkout')
			);

			$output = $this->m_transaksi->getTrxKamar($where);
			echo json_encode($output->result());
	}

	function getTDetKamar()
	{
			$where =  array(
				'id_ruang' => $this->input->get('id_ruang'),
				'id_kamar' => $this->input->get('id_kamar'),
				'tgl_checkin' => $this->input->get('tgl_checkin'),
				'tgl_checkout' => $this->input->get('tgl_checkout')
			);

			$output = $this->m_transaksi->getDetilKamar($where);
			echo json_encode($output->result());
	}

	function getTotalTransaksiKamar()
	{
			$where =  array(
				'transaksi_id' => $this->input->get('transaksi_id'),
				'tgl_checkin' => $this->input->get('tgl_checkin'),
				'tgl_checkout' => $this->input->get('tgl_checkout')
			);

			$output = $this->m_transaksi->getTotalTKamar($where);
			echo json_encode($output->result());
	}

	function getTransaksiPembayaran()
	{
			$where =  array(
				'id_transaksi' => $this->input->get('id_transaksi'),
			);

			$output = $this->m_transaksi->getTransaksiPembayaran($where);
			echo json_encode($output->result()[0]);
	}

	function GetRuangMakan()
	{
		$output =  $this->m_ruangan->getruangmakan();
		echo json_encode($output->result());
	}

	function GetRuangPertemuan1()
	{
		$output =  $this->m_ruangan->getruangpert();
		echo json_encode($output->result());
	}

	function GetRuangPertemuanyayasan()
	{
		$output =  $this->m_ruangan->getruangpertyayasan();
		echo json_encode($output->result());
	}
}
