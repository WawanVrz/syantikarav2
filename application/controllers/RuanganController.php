<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuanganController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_ruangan');
		$this->load->model('m_ruang');
		$this->load->model('m_jasa');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['ruangan'] = $this->m_ruangan->tampil_data()->result();
		$cek = $this->m_ruangan->cek_jumlah("pertemuan")->num_rows();
		$ceksampah = $this->m_ruangan->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'ruangan_jumlah' => $cek,
			'jumlah_sampah_ruangan' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataruangan', $data);
  }

	public function viewbin()
  {
		$data['ruangan_bin'] = $this->m_ruangan->tampil_data_bin()->result();
		$cek = $this->m_ruangan->cek_jumlah("pertemuan")->num_rows();
		$ceksampah = $this->m_ruangan->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'ruangan_jumlah' => $cek,
			'jumlah_sampah_ruangan' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataruanganTrash', $data);
  }

	public function tambah_ruangan()
  {
		$data['jenisruangan'] = $this->m_ruang->tampil_data()->result();
		$data['idjasa'] = $this->m_jasa->tampil_data()->result();
    $this->load->view('admin/adddataruangan', $data);
  }

	public function tambah_aksi(){
		$nama = $this->input->post('idruangan');
		$idjasa = $this->input->post('idjasa');
		$kapasitas = $this->input->post('kapasitas');
		$fasilitas = $this->input->post('fasilitas');
		$harga = str_replace(".","",$this->input->post('harga'));
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'ruang_id'		=> $nama,
			'id_jasa' 		=> $idjasa,
			'kapasitas' 	=> $kapasitas,
			'fasilitas'		=> $fasilitas,
			'harga'  			=> $harga,
			'keterangan'  => $keterangan,
			'status'			=> 1,
			'created_at'  => $date,
			'updated_at'  => $date
			);
		$this->m_ruangan->input_data($data,'pertemuan');
		redirect('dashboard/admin/data/ruangan');
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_ruangpertemuan' => $id);
		$this->m_ruangan->hapus_data($where,'pertemuan');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_ruangpertemuan' => $id
		);
		$this->m_ruangan->hapus_data_soft($where,$data,'pertemuan');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_ruangpertemuan' => $id
		);
		$this->m_ruangan->hapus_data_soft($where,$data,'pertemuan');

		echo 'succeed';
	}

	function edit_ruang($id){
		$where = array('id_ruangpertemuan' => $id);
		$data['jenisruangan'] = $this->m_ruang->tampil_data()->result();
		$data['ruangan'] = $this->m_ruangan->edit_data($where,'pertemuan')->result();
		$data['idjasa'] = $this->m_jasa->tampil_data()->result();
		$this->load->view('admin/editdataruangan',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$idjasa = $this->input->post('idjasa');
		$nama = $this->input->post('idruangan');
		$kapasitas = $this->input->post('kapasitas');
		$fasilitas = $this->input->post('fasilitas');
		$harga = str_replace(".","",$this->input->post('harga'));
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'ruang_id'		=> $nama,
			'id_jasa' 		=> $idjasa,
			'kapasitas' 	=> $kapasitas,
			'fasilitas'		=> $fasilitas,
			'harga'  			=> $harga,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_ruangpertemuan' => $id
		);

		$this->m_ruangan->update_data($where,$data,'pertemuan');
		redirect('dashboard/admin/data/ruangan');
	}
}
