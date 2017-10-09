<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisTarifController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_jenistarif');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['jenis_tarif'] = $this->m_jenistarif->tampil_data()->result();
		$cek = $this->m_jenistarif->cek_jumlah("jenis_tarif")->num_rows();
		$ceksampah = $this->m_jenistarif->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_tarif_jumlah' => $cek,
			'jumlah_sampah_tarif' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatajenistarif', $data);
  }

	public function viewbin()
  {
		$data['jenis_tarif_bin'] = $this->m_jenistarif->tampil_data_bin()->result();
		$cek = $this->m_jenistarif->cek_jumlah("jenis_tarif")->num_rows();
		$ceksampah = $this->m_jenistarif->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_tarif_jumlah' => $cek,
			'jumlah_sampah_tarif' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatajenistarifTrash', $data);
  }

	public function tambah_jenistarif()
  {
    $this->load->view('admin/adddatajenistarif');
  }

	public function tambah_aksi(){
		$jenis = $this->input->post('jenistarif');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'jenistarif' => $jenis,
		);
		$cek = $this->m_jenistarif->cek_jenistarif("jenis_tarif",$where)->num_rows();

		if($cek > 0)
		{
			if($jenis != "" && $keterangan != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Ingat! Nama Jenis Tarif Tidak Boleh Sama </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/jenistarif/add");
			}else {
				redirect("dashboard/admin/data/jenistarif/add");
			}
		}else {
				$data = array(
					'jenistarif' 	=> $jenis,
					'keterangan'  => $keterangan,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date
					);
				$this->m_jenistarif->input_data($data,'jenis_tarif');
				redirect('dashboard/admin/data/jenistarif');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_jenistarif' => $id);
		$this->m_jenistarif->hapus_data($where,'jenis_tarif');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_jenistarif' => $id
		);
		$this->m_jenistarif->hapus_data_soft($where,$data,'jenis_tarif');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_jenistarif' => $id
		);
		$this->m_jenistarif->hapus_data_soft($where,$data,'jenis_tarif');

		echo 'succeed';
	}

	function edit_jenistarif($id){
		$where = array('id_jenistarif' => $id);
		$data['jenis_tarif'] = $this->m_jenistarif->edit_data($where,'jenis_tarif')->result();
		$this->load->view('admin/editdatajenistarif',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenistarif');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'jenistarif' 	=> $jenis,
			'keterangan'  => $keterangan
		);

		$where = array(
			'id_jenistarif' => $id
		);

		$this->m_jenistarif->update_data($where,$data,'jenis_tarif');
		redirect('dashboard/admin/data/jenistarif');
	}
}
