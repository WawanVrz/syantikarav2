<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarifController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_tarif');
		$this->load->model('m_jenistamu');
		$this->load->model('m_jenistarif');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect("panel/admin");
		}
	}

  public function index()
  {
		$data['tarif'] = $this->m_tarif->tampil_data()->result();
		$cek = $this->m_tarif->cek_jumlah("tarif")->num_rows();
		$ceksampah = $this->m_tarif->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_tarif_jumlah' => $cek,
			'jumlah_sampah_tarif' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatatarif', $data);
  }

	public function viewbin()
  {
		$data['tarif_bin'] = $this->m_tarif->tampil_data_bin()->result();
		$cek = $this->m_tarif->cek_jumlah("tarif")->num_rows();
		$ceksampah = $this->m_tarif->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'jenis_tarif_jumlah' => $cek,
			'jumlah_sampah_tarif' => $ceksampah
			);
		$this->session->set_userdata($data_session);
    $this->load->view('admin/viewdatatarifTrash', $data);
  }

	public function tambah_tarif()
  {
		$data['idjenistamu'] = $this->m_jenistamu->tampil_data()->result();
		$data['idjenistarif'] = $this->m_jenistarif->tampil_data()->result();
    $this->load->view('admin/adddatatarif',$data);
  }

	public function tambah_aksi(){
		$jenistamu = $this->input->post('idjenistamu');
		$jenisttarif = $this->input->post('idjenistarif');
		$harga = str_replace(".","",$this->input->post('harga'));
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$where = array(
			'id_jenistamu' => $jenistamu,
			'id_jenistarif' => $jenisttarif,
			);
		$cek = $this->m_tarif->cek_tarif("tarif",$where)->num_rows();

		if($cek > 0)
		{
			if($jenistamu != "" && $jenistamu != "" && $keterangan != "")
			{
				$data_session = array(
					'validasidata' => "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Ingat! Tarif Tidak Boleh Sama </div>",
					);
				$this->session->set_userdata($data_session);
				redirect("dashboard/admin/data/tarif/add");
			}else {
				redirect("dashboard/admin/data/tarif/add");
			}
		}else {
				$data = array(
					'id_jenistamu'	=> $jenistamu,
					'id_jenistarif' 	=> $jenisttarif,
					'tarif'				 	=> $harga,
					'keterangan'  => $keterangan,
					'status'			=> 1,
					'created_at'  => $date,
					'updated_at'  => $date
					);
				$this->m_tarif->input_data($data,'tarif');
				redirect('dashboard/admin/data/tarif');
			}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_tarif' => $id);
		$this->m_tarif->hapus_data($where,'tarif');

		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_tarif' => $id
		);
		$this->m_tarif->hapus_data_soft($where,$data,'tarif');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_tarif' => $id
		);
		$this->m_tarif->hapus_data_soft($where,$data,'tarif');

		echo 'succeed';
	}

	function edit_tarif($id){
		$where = array('id_tarif' => $id);
		$data['jenis_tarif'] = $this->m_tarif->edit_data($where,'tarif')->result();
		$data['idjenistamu'] = $this->m_jenistamu->tampil_data()->result();
		$data['idjenistarif'] = $this->m_jenistarif->tampil_data()->result();
		$this->load->view('admin/editdatatarif',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$jenistamu = $this->input->post('idjenistamu');
		$jenisttarif = $this->input->post('idjenistarif');
		$harga = str_replace(".","",$this->input->post('harga'));
		$keterangan = $this->input->post('keterangan');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		$data = array(
			'id_jenistamu'	=> $jenistamu,
			'id_jenistarif' 	=> $jenisttarif,
			'tarif'				 	=> $harga,
			'keterangan'  => $keterangan,
			'updated_at'  => $date
		);

		$where = array(
			'id_tarif' => $id
		);

		$this->m_tarif->update_data($where,$data,'tarif');
		redirect('dashboard/admin/data/tarif');
	}

	function getTarif()
	{
		$where = array(
			'id_jenistamu' => $this->input->get('id_jenistamu'),
			'id_jenistarif' => $this->input->get('id_jenistarif')
		);
		$output = $this->m_tarif->getTarif($where);

		echo json_encode($output->result()[0]);
	}
}
