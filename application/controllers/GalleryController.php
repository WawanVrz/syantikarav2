<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_gallery');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['gallery'] = $this->m_gallery->tampil_data()->result();
		$cek = $this->m_gallery->cek_jumlah("gallery")->num_rows();
		$ceksampah = $this->m_gallery->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'gallery_jumlah' => $cek,
			'jumlah_sampah_gallery' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatagallery', $data);
  }

	public function viewbin()
  {
		$data['gallery'] = $this->m_gallery->tampil_data_bin()->result();
		$cek = $this->m_gallery->cek_jumlah("gallery")->num_rows();
		$ceksampah = $this->m_gallery->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'gallery_jumlah' => $cek,
			'jumlah_sampah_gallery' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatagalleryTrash', $data);
  }

	public function tambah_gallery()
  {
    $this->load->view('admin/adddatagallery');
  }

	public function tambah_aksi(){
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$nama = $this->input->post('nama');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		if ( !$this->upload->do_upload('image'))
		{
				redirect('dashboard/admin/data/gallery');
		}else{
				$data = array(
					'nama'				=> $nama,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date,
					'image'  			=> $this->upload->data('file_name')
					);
					$this->m_gallery->input_data($data,'gallery');
					redirect('dashboard/admin/data/gallery');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_gallery' => $id);
		$this->m_gallery->hapus_data($where,'gallery');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_gallery' => $id
		);
		$this->m_gallery->hapus_data_soft($where,$data,'gallery');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_gallery' => $id
		);
		$this->m_gallery->hapus_data_soft($where,$data,'gallery');

		echo 'succeed';
	}

	function edit_gallery($id){
		$where = array('id_gallery' => $id);
		$data['gallery'] = $this->m_gallery->edit_data($where,'gallery')->result();
		$this->load->view('admin/editdatagallery',$data);
	}

	function update(){
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|JPEG|JPG';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$images = $this->input->post('image');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$this->upload->do_upload('image');
		$imagepp = $this->upload->data('file_name');

		if($imagepp == "")
		{
			$data = array(
				'nama'				=> $nama,
				'updated_at'  => $date
			);
			$where = array(
				'id_gallery' => $id
			);
			$this->m_gallery->update_data($where,$data,'gallery');
			redirect('dashboard/admin/data/gallery');

		}else {
			$data = array(
				'nama'				=> $nama,
				'image'  			=> $this->upload->data('file_name'),
				'updated_at'  => $date
			);
			$where = array(
				'id_gallery' => $id
			);
			$this->m_gallery->update_data($where,$data,'gallery');
			redirect('dashboard/admin/data/gallery');
		}
	}
}
