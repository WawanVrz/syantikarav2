<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisTamuController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_jenistamu');
		$this->load->model('m_jasa');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['jenis_tamu'] = $this->m_jenistamu->tampil_data()->result();
		$cek = $this->m_jenistamu->cek_jumlah("jenis_tamu")->num_rows();
		$ceksampah = $this->m_jenistamu->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_tamu_jumlah' => $cek,
			'jumlah_sampah' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatajenistamu', $data);
  }

	public function viewbin()
  {
		$data['jenis_tamu_bin'] = $this->m_jenistamu->tampil_data_bin()->result();
		$cek = $this->m_jenistamu->cek_jumlah("jenis_tamu")->num_rows();
		$ceksampah = $this->m_jenistamu->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_tamu_jumlah' => $cek,
			'jumlah_sampah' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatajenistamuTrash', $data);
  }

	public function tambah_jenistamu()
  {
		$data['idjasa'] = $this->m_jasa->tampil_data()->result();
    $this->load->view('admin/adddatajenistamu',$data);
  }

	public function tambah_aksi(){
		$jenis = $this->input->post('jenistamu');
		$idjasa = $this->input->post('idjasa');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'jenistamu' => $jenis,
		);
		$cek = $this->m_jenistamu->cek_jenistamu("jenis_tamu",$where)->num_rows();

		if($cek > 0)
		{
			if($jenis != "" && $keterangan != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Ingat! Nama Jenis Tamu Tidak Boleh Sama </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/jenistamu/add");
			}else {
				redirect("dashboard/admin/data/jenistamu/add");
			}
		}else {
			$data = array(
				'jenistamu' 	=> $jenis,
				'id_jasa' 		=> $idjasa,
				'keterangan'  => $keterangan,
				'status'			=> 1,
				'created_at'  => $date,
				'updated_at'  => $date
				);
			$this->m_jenistamu->input_data($data,'jenis_tamu');
			redirect('dashboard/admin/data/jenistamu');
		}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_jenistamu' => $id);
		$this->m_jenistamu->hapus_data($where,'jenis_tamu');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_jenistamu' => $id
		);
		$this->m_jenistamu->hapus_data_soft($where,$data,'jenis_tamu');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_jenistamu' => $id
		);
		$this->m_jenistamu->hapus_data_soft($where,$data,'jenis_tamu');

		echo 'succeed';
	}

	function edit_jenistamu($id){
		$where = array('id_jenistamu' => $id);
		$data['jenis_tamu'] = $this->m_jenistamu->edit_data($where,'jenis_tamu')->result();
		$data['idjasa'] = $this->m_jasa->tampil_data()->result();
		$this->load->view('admin/editdatajenistamu',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenistamu');
		$idjasa = $this->input->post('idjasa');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'jenistamu' 	=> $jenis,
			'id_jasa' 		=> $idjasa,
			'keterangan'  => $keterangan
		);

		$where = array(
			'id_jenistamu' => $id
		);

		$this->m_jenistamu->update_data($where,$data,'jenis_tamu');
		redirect('dashboard/admin/data/jenistamu');
	}
}
