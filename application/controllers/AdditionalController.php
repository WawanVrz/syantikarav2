<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdditionalController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_additional');
		$this->load->model('m_jasa');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['jenis_additional'] = $this->m_additional->tampil_data()->result();
		$cek = $this->m_additional->cek_jumlah("additional")->num_rows();
		$ceksampah = $this->m_additional->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_additional_jumlah' => $cek,
			'jumlah_sampah_additional' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataadditional', $data);
  }

	public function viewbin()
  {
		$data['jenis_additional_bin'] = $this->m_additional->tampil_data_bin()->result();
		$cek = $this->m_additional->cek_jumlah("additional")->num_rows();
		$ceksampah = $this->m_additional->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_additional_jumlah' => $cek,
			'jumlah_sampah_additional' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataadditionalTrash', $data);
  }

	public function tambah_additional()
  {
		$data['idjasa'] = $this->m_jasa->tampil_data()->result();
    $this->load->view('admin/adddataadditional',$data);
  }

	public function tambah_aksi(){
		$jenis = $this->input->post('jenis');
		$idjasa = $this->input->post('idjasa');
		$harga = str_replace(".","",$this->input->post('harga'));
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'jenis_additional' => $jenis,
			);
		$cek = $this->m_additional->cek_additional("additional",$where)->num_rows();

		if($cek > 0)
		{
			if($jenis != "" && $keterangan != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Ingat! Nama Additional Tidak Boleh Sama </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/additional/add");
			}else {
				redirect("dashboard/admin/data/additional/add");
			}
		}else {
				$data = array(
					'jenis_additional'	=> $jenis,
					'id_jasa' 					=> $idjasa,
					'harga'				 	=> $harga,
					'keterangan'  => $keterangan,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date
					);
				$this->m_additional->input_data($data,'additional');
				redirect('dashboard/admin/data/additional');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_additional' => $id);
		$this->m_additional->hapus_data($where,'additional');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_additional' => $id
		);
		$this->m_additional->hapus_data_soft($where,$data,'additional');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_additional' => $id
		);
		$this->m_additional->hapus_data_soft($where,$data,'additional');

		echo 'succeed';
	}

	function edit_additional($id){
		$where = array('id_additional' => $id);
		$data['jenis_additional'] = $this->m_additional->edit_data($where,'additional')->result();
		$data['idjasa'] = $this->m_jasa->tampil_data()->result();
		$this->load->view('admin/editdataadditional',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$idjasa = $this->input->post('idjasa');
		$harga = str_replace(".","",$this->input->post('harga'));
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'jenis_additional'	=> $jenis,
			'id_jasa' 					=> $idjasa,
			'harga'				 	=> $harga,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_additional' => $id
		);

		$this->m_additional->update_data($where,$data,'additional');
		redirect('dashboard/admin/data/additional');
	}
}
