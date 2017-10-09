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

			$temp =count($this->input->post('ruangpertemuan'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'transaksi_id'			=> $last_insert_id,
							'pertemuan_id'			=> $ruangpertemuan[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_transaksi_additional_detail->input_data($data2,'transaksi_detail_additional');
			}

			$temp =count($this->input->post('ruangpertemuanyayasan'));
			for($i=0; $i<$temp;$i++){
				$data5 = array(
							'transaksi_id'			=> $last_insert_id,
							'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
							'keterangan'				=> 'Konstribusi Tempat',
							'tarifruangyayasan' => $tarifRYayasan[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_transaksi_additional_detail->input_data($data5,'transaksi_detail_additional');
			}

			$temp =count($this->input->post('fasilitasplus'));
			for($i=0; $i<$temp;$i++){
				$data4 = array(
							'transaksi_id'			=> $last_insert_id,
							'additional_id'			=> $fasilitasplus[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_transaksi_additional_detail->input_data($data4,'transaksi_detail_additional');
			}
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

			$temp =count($this->input->post('ruangpertemuan'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'transaksi_id'			=> $last_insert_id,
							// 'additional_id'			=> $ruangpertemuan[$i],
							'pertemuan_id'			=> $ruangpertemuan[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_transaksi_additional_detail->input_data($data2,'transaksi_detail_additional');
			}

			$temp =count($this->input->post('ruangpertemuanyayasan'));
			for($i=0; $i<$temp;$i++){
				$data5 = array(
							'transaksi_id'			=> $last_insert_id,
							'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
							'keterangan'				=> 'Konstribusi Tempat',
							'tarifruangyayasan' => $tarifRYayasan[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_transaksi_additional_detail->input_data($data5,'transaksi_detail_additional');
			}

			$temp =count($this->input->post('fasilitasplus'));
			for($i=0; $i<$temp;$i++){
				$data4 = array(
							'transaksi_id'			=> $last_insert_id,
							'additional_id'			=> $fasilitasplus[$i],
							'keterangan'				=> '-',
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_transaksi_additional_detail->input_data($data4,'transaksi_detail_additional');
			}
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
		$status = 'Lunas';
		$terbayarkan = $this->input->post('totalall');

		$data = array(
			'reduksi'							=> $reduksi,
			'Jumlah_Terbayarkan'	=> $terbayarkan,
			'status_pembayaran' 	=> $status
		);

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
		$data['tampilForRuangMakan'] = $this->m_transaksi_additional_detail->tampilforruangmakan($id)->result();
		$data['tampilForAdditional'] = $this->m_transaksi_additional_detail->tampilforAddt($id)->result();
		$data['tampilForRyayasan'] = $this->m_transaksi_additional_detail->tampilforRyayasan($id)->result();
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
		$cek = $this->input->post('ceked');
		$permint = $this->input->post('permintaankhusus');
		$bayar = $this->input->post('bayar');
		$pembayaran = $this->input->post('pembayaran');
		$order = $this->input->post('order');
		$tanggalin = $this->input->post('tglin');
		$tanggalout = $this->input->post('tglout');
		$instansi = $this->input->post('instansi');
		$kegiatan = $this->input->post('kegiatan');
		$dp = str_replace(".","",$this->input->post('dp'));
		$ruangmakan = $this->input->post('ruangmakan');
		$ruangpertemuan = $this->input->post('ruangpertemuan');
		$fasilitasplus = $this->input->post('fasilitasplus');
		$ruangpertemuanyayasan = $this->input->post('ruangpertemuanyayasan');
		$tarifRYayasan = str_replace(".","",$this->input->post('tarifruang'));

		if($tanggalin != $cekin)
		{
			if($cek == 'ya')
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
							'total_bayar'		 => $bayar,
							'dp'						=> $dp,
							'kegiatan'			=> $kegiatan,
							'status_order'		=>$order,
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
						$hasil['id_data1'] = $idx1;
						$hasil['id_data2'] = $idx2;

						$temp =count($this->input->post('ruangpertemuan'));
						for($i=0; $i<$temp;$i++){
							$data2 = array(
										'pertemuan_id'			=> $ruangpertemuan[$i],
										'updated_at'  			=> $date
										);
							 $where = array(
											'transaksi_id' => $id
										);
							$this->m_transaksi_additional_detail->update_data($where,$data2,'transaksi_detail_additional');
						}

						$temp =count($this->input->post('ruangpertemuanyayasan'));
						for($i=0; $i<$temp;$i++){
							$data5 = array(
										'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
										'tarifruangyayasan' => $tarifRYayasan[$i],
										'updated_at'  			=> $date
										);
							 $where = array(
											'transaksi_id' => $id
										);
							$this->m_transaksi_additional_detail->update_data($where,$data5,'transaksi_detail_additional');
						}

						$temp =count($this->input->post('fasilitasplus'));
						for($i=0; $i<$temp;$i++){
							$data4 = array(
										'additional_id'			=> $fasilitasplus[$i],
										'updated_at'  			=> $date
										);
							 $where = array(
		 									'transaksi_id' => $id
		 								);
							$this->m_transaksi_additional_detail->update_data($where,$data4,'transaksi_detail_additional');
						}
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
							'dp'						=> $dp,
							'kegiatan'			=> $kegiatan,
							'status_order'		=>$order,
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
						$hasil['id_data1'] = $idx1;
						$hasil['id_data2'] = $idx2;
						echo json_encode($hasil);
			}
		}else {
			if($cek == 'ya')
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
						'total_bayar'		 => $bayar,
						'dp'						=> $dp,
						'kegiatan'			=> $kegiatan,
						'status_order'		=>$order,
						'permintaan_khusus' => $permint,
						'updated_at' 	 => $date
					);
					$where = array(
						'id_transaksi' => $id
					);
					$idx = $this->m_transaksi->update_datatrx($where,$data,'transaksi');
	 			  $hasil['id_data'] = $idx;

					$temp =count($this->input->post('ruangpertemuan'));
					for($i=0; $i<$temp;$i++){
						$data2 = array(
									'pertemuan_id'			=> $ruangpertemuan[$i],
									'updated_at'  			=> $date
									);
						 $where = array(
										'transaksi_id' => $id
									);
						$this->m_transaksi_additional_detail->update_data($where,$data2,'transaksi_detail_additional');
					}

					$temp =count($this->input->post('ruangpertemuanyayasan'));
					for($i=0; $i<$temp;$i++){
						$data5 = array(
									'ruangkantor_id'		=> $ruangpertemuanyayasan[$i],
									'tarifruangyayasan' => $tarifRYayasan[$i],
									'updated_at'  			=> $date
									);
						 $where = array(
										'transaksi_id' => $id
									);
						$this->m_transaksi_additional_detail->update_data($where,$data5,'transaksi_detail_additional');
					}

					$temp =count($this->input->post('fasilitasplus'));
					for($i=0; $i<$temp;$i++){
						$data4 = array(
									'additional_id'			=> $fasilitasplus[$i],
									'updated_at'  			=> $date
									);
						 $where = array(
										'transaksi_id' => $id
									);
						$this->m_transaksi_additional_detail->update_data($where,$data4,'transaksi_detail_additional');
					}
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
							'dp'						=> $dp,
							'kegiatan'			=> $kegiatan,
							'status_order'		=>$order,
							'permintaan_khusus' => $permint,
							'updated_at' 	 => $date
						);
						$where = array(
							'id_transaksi' => $id
						);
						$idx = $this->m_transaksi->update_datatrx($where,$data,'transaksi');
						$hasil['id_data'] = $idx;
						echo json_encode($hasil);
			}
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
