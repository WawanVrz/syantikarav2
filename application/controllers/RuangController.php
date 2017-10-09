<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuangController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_ruang');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['jenis_ruang'] = $this->m_ruang->tampil_data()->result();
		$cek = $this->m_ruang->cek_jumlah("ruang")->num_rows();
		$ceksampah = $this->m_ruang->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_ruang_jumlah' => $cek,
			'jumlah_sampah_ruang' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataruang', $data);
  }

	public function viewbin()
  {
		$data['jenis_ruang_bin'] = $this->m_ruang->tampil_data_bin()->result();
		$cek = $this->m_ruang->cek_jumlah("ruang")->num_rows();
		$ceksampah = $this->m_ruang->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_ruang_jumlah' => $cek,
			'jumlah_sampah_ruang' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataruangTrash', $data);
  }

	public function tambah()
  {
    $this->load->view('admin/adddatajenisruang');
  }

	public function tambah_aksi(){
		$nama = $this->input->post('namaruang');
		$tipe = $this->input->post('tipe');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'nama_ruang' => $nama,
			);
		$cek = $this->m_ruang->cek_ruang("ruang",$where)->num_rows();

		if($cek > 0)
		{
			if($nama != "" && $keterangan != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Ingat! Nama Ruang Tidak Boleh Sama </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/ruang/add");
			}else {
				redirect("dashboard/admin/data/ruang/add");
			}
		}else {
				$data = array(
					'nama_ruang'	=> $nama,
					'type'				=> $tipe,
					'keterangan'  => $keterangan,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date
					);
				$this->m_ruang->input_data($data,'ruang');
				redirect('dashboard/admin/data/ruang');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id' => $id);
		$this->m_ruang->hapus_data($where,'ruang');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id' => $id
		);
		$this->m_ruang->hapus_data_soft($where,$data,'ruang');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id' => $id
		);
		$this->m_ruang->hapus_data_soft($where,$data,'ruang');

		echo 'succeed';
	}

	function edit($id){
		$where = array('id' => $id);
		$data['ruang_edit'] = $this->m_ruang->edit_data($where,'ruang')->result();
		$this->load->view('admin/editdatajenisruang',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('namaruang');
		$tipe = $this->input->post('tipe');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'nama_ruang'	=> $nama,
			'type'				=> $tipe,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id' => $id
		);

		$this->m_ruang->update_data($where,$data,'ruang');
		redirect('dashboard/admin/data/ruang');
	}
}
