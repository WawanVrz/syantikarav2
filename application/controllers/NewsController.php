<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_berita');
		$this->load->model('m_beritabridge');
		$this->load->model('m_kategoriberita');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['beritas'] = $this->m_berita->tampil_data()->result();
		$cek = $this->m_berita->cek_jumlah("news")->num_rows();
		$ceksampah = $this->m_berita->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'berita_jumlah' => $cek,
			'jumlah_sampah_berita' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataberita', $data);
  }

	function detail_berita($id){
		$data['kategori'] = $this->m_berita->tampil_kategori($id)->result();
		$data['detil_berita'] = $this->m_berita->detail_data($id)->result();
		$this->load->view('admin/detilberita',$data);
	}

	public function viewbin()
  {
		$data['beritas'] = $this->m_berita->tampil_data_bin()->result();
		$cek = $this->m_berita->cek_jumlah("news")->num_rows();
		$ceksampah = $this->m_berita->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'berita_jumlah' => $cek,
			'jumlah_sampah_berita' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdataberitaTrash', $data);
  }

	public function tambah_berita()
  {
		$data['kategori'] = $this->m_kategoriberita->tampil_data()->result();
    $this->load->view('admin/adddataberita', $data);
  }

	public function tambah_aksi(){
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb

		$this->upload->initialize($config);

		$title = $this->input->post('title');
		$idkategori = $this->input->post('idkategori');
		$desshort = $this->input->post('desshort');
		$desfull = $this->input->post('desfull');
		$stpublish = $this->input->post('stpublish');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$datez = date('Y-m-d');
		$idusr = $this->session->userdata('id_user');

		if (!$this->upload->do_upload('image'))
		{
			$data1 = array(
						'title'							=> $title,
						'id_user'						=> $idusr,
						'deskripsi_singkat'	=> $desshort,
						'deskripsi_full'  	=> $desfull,
						'status_publish'		=> $stpublish,
						'tgl_publish'  			=> $datez,
						'created_at'  			=> $date,
						'updated_at'  			=> $date,
						'image'  						=> 'nophoto.jpg'
						);
			$this->m_berita->input_data($data1,'news');
			$last_insert_id = $this->db->insert_id();

			$temp =count($this->input->post('idkategori'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'id_news'						=> $last_insert_id,
							'id_kategori'				=> $idkategori[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);
				$this->m_beritabridge->input_data($data2,'news_sy');
			}
			redirect('dashboard/admin/data/berita');
		}else{
				$data1 = array(
							'title'							=> $title,
							'id_user'						=> $idusr,
							'deskripsi_singkat'	=> $desshort,
							'deskripsi_full'  	=> $desfull,
							'status_publish'		=> $stpublish,
							'tgl_publish'  			=> $datez,
							'created_at'  			=> $date,
							'updated_at'  			=> $date,
							'image'  						=> $this->upload->data('file_name')
							);
				$this->m_berita->input_data($data1,'news');
				$last_insert_id = $this->db->insert_id();

				$temp =count($this->input->post('idkategori'));
				for($i=0; $i<$temp;$i++){
					$data2 = array(
								'id_news'						=> $last_insert_id,
								'id_kategori'				=> $idkategori[$i],
								'status'						=> 1,
								'created_at'  			=> $date,
								'updated_at'  			=> $date
								);
					$this->m_beritabridge->input_data($data2,'news_sy');
				}
				redirect('dashboard/admin/data/berita');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_news' => $id);
		$this->m_berita->hapus_data($where,'news');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = "Non Aktif";

		$data = array(
			'status_publish' 	=> $status
		);

		$where = array(
			'id_news' => $id
		);
		$this->m_berita->hapus_data_soft($where,$data,'news');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = "Publish";

		$data = array(
			'status_publish' 	=> $status
		);

		$where = array(
			'id_news' => $id
		);
		$this->m_berita->hapus_data_soft($where,$data,'news');
		echo 'succeed';
	}

	function edit_berita($id){
		$where = array('id_news' => $id);
		$data['beritas'] = $this->m_berita->edit_data($where,'news')->result();
		$data['kategori'] = $this->m_kategoriberita->tampil_data()->result();
		$data['kategoridetil'] = $this->m_berita->tampil_kategori($id)->result();
		$this->load->view('admin/editdataberita',$data);
	}

	function update(){
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
		$config['max_size']	= '10000'; //in kb
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$idkategori = $this->input->post('idkategori');
		$desshort = $this->input->post('desshort');
		$desfull = $this->input->post('desfull');
		$stpublish = $this->input->post('stpublish');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$datez = date('Y-m-d');
		$idusr = $this->session->userdata('id_user');

		$this->upload->do_upload('image');
		$imagepp = $this->upload->data('file_name');

		if($imagepp == "")
		{
			$data = array(
				'title'							=> $title,
				'id_user'						=> $idusr,
				'deskripsi_singkat'	=> $desshort,
				'deskripsi_full'  	=> $desfull,
				'status_publish'		=> $stpublish,
				'updated_at'  			=> $date
			);
			$where = array(
				'id_news' => $id
			);
			$this->m_berita->update_data($where,$data,'news');

			$temp =count($this->input->post('idkategori'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'id_news'						=> $id,
							'id_kategori'				=> $idkategori[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);

				 $where = array(
								'id_news' => $id
							);
				$this->m_beritabridge->update_data($where,$data2,'news_sy');
			}
			redirect('dashboard/admin/data/berita');
		}else {
			$data = array(
				'title'							=> $title,
				'id_user'						=> $idusr,
				'deskripsi_singkat'	=> $desshort,
				'deskripsi_full'  	=> $desfull,
				'status_publish'		=> $stpublish,
				'updated_at'  			=> $date,
				'image'  						=> $this->upload->data('file_name')
			);
			$where = array(
				'id_news' => $id
			);
			$this->m_berita->update_data($where,$data,'news');

			$temp =count($this->input->post('idkategori'));
			for($i=0; $i<$temp;$i++){
				$data2 = array(
							'id_news'						=> $id,
							'id_kategori'				=> $idkategori[$i],
							'status'						=> 1,
							'created_at'  			=> $date,
							'updated_at'  			=> $date
							);

				 $where = array(
								'id_news' => $id
							);
				$this->m_beritabridge->update_data($where,$data2,'news_sy');
			}
			redirect('dashboard/admin/data/berita');
		}
	}
}
