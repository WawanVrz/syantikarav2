<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_fasilitas');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['fasilitas'] = $this->m_fasilitas->tampil_data()->result();
		$cek = $this->m_fasilitas->cek_jumlah("facilities")->num_rows();
		$ceksampah = $this->m_fasilitas->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'fasilitas_jumlah' => $cek,
			'jumlah_sampah_fasilitas' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatafasilitas', $data);
  }

	public function viewbin()
  {
		$data['fasilitas'] = $this->m_fasilitas->tampil_data_bin()->result();
		$cek = $this->m_fasilitas->cek_jumlah("facilities")->num_rows();
		$ceksampah = $this->m_fasilitas->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'fasilitas_jumlah' => $cek,
			'jumlah_sampah_fasilitas' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatafasilitasTrash', $data);
  }

	public function tambah_fasilitas()
  {
    $this->load->view('admin/adddatafasilitas');
  }

	public function tambah_aksi(){
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$nama = $this->input->post('namafasilitas');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		if ( !$this->upload->do_upload('image'))
		{
				redirect('dashboard/admin/data/fasilitas');
		}else{
				$data = array(
					'nama'				=> $nama,
					'keterangan'  => $keterangan,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date,
					'image'  			=> $this->upload->data('file_name')
					);
					$this->m_fasilitas->input_data($data,'facilities');
					redirect('dashboard/admin/data/fasilitas');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_fasilitas' => $id);
		$this->m_fasilitas->hapus_data($where,'facilities');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_fasilitas' => $id
		);
		$this->m_fasilitas->hapus_data_soft($where,$data,'facilities');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_fasilitas' => $id
		);
		$this->m_fasilitas->hapus_data_soft($where,$data,'facilities');

		echo 'succeed';
	}

	function edit_fasilitas($id){
		$where = array('id_fasilitas' => $id);
		$data['fasilitas'] = $this->m_fasilitas->edit_data($where,'facilities')->result();
		$this->load->view('admin/editdatafasilitas',$data);
	}

	function update(){
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$id = $this->input->post('id');
		$nama = $this->input->post('namafasilitas');
		$images = $this->input->post('image');
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$this->upload->do_upload('image');
		$imagepp = $this->upload->data('file_name');

		if($imagepp == "")
		{
			$data = array(
				'nama'				=> $nama,
				'keterangan'  => $keterangan,
				'updated_at'  => $date
			);
			$where = array(
				'id_fasilitas' => $id
			);
			$this->m_fasilitas->update_data($where,$data,'facilities');
			redirect('dashboard/admin/data/fasilitas');
		}
		else {
			$data = array(
				'nama'				=> $nama,
				'keterangan'  => $keterangan,
				'image'  			=> $this->upload->data('file_name'),
				'updated_at'  => $date
			);
			$where = array(
				'id_fasilitas' => $id
			);
			$this->m_fasilitas->update_data($where,$data,'facilities');
			redirect('dashboard/admin/data/fasilitas');
		}
	}
}
