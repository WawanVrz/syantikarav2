<?php

class M_Berita extends CI_Model
{
	function tampil_data()
	{
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("news.status_publish","Publish");
    $this->db->order_by("news.id_news", "desc");
    $query = $this->db->get();
    return $query;
	}

	function tampil_kategori($id)
	{
		$this->db->select("news_category.id_kategori, news_category.kategori");
		$this->db->from("news_sy");
		$this->db->join('news_category','news_category.id_kategori = news_sy.id_kategori');
		$this->db->where("news_sy.id_news",$id);
		$query = $this->db->get();
		return $query;
	}

	function tampil_kategori_public()
	{
		$this->db->select("news.id_news, news_category.id_kategori, news_category.kategori");
		$this->db->from("news");
		$this->db->join('news_sy','news_sy.id_news = news.id_news');
		$this->db->join('news_category','news_category.id_kategori = news_sy.id_kategori');
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_public()
	{
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name, users.image as imgpp");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("status_publish","Publish");
    $this->db->order_by("news.id_news", "desc");
    $query = $this->db->get();
    return $query;
	}

	function data($limit,$page)
	{
		$offset = ($page - 1) * $limit;

		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name, users.image as imgpp");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("status_publish","Publish");
    $this->db->order_by("news.id_news", "desc");
		$this->db->limit($limit,$offset);
		$query = $this->db->get()->result();
    return $query;
	}
	function jumlah_data(){
		return $this->db->get('news')->num_rows();
	}

	function data_kategori($id,$limit,$page)
	{
		$offset = ($page - 1) * $limit;

		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name, users.image as imgpp");
		$this->db->from("news");
		$this->db->join('news_sy','news_sy.id_news = news.id_news');
		$this->db->join('news_category','news_category.id_kategori = news_sy.id_kategori');
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("news.status_publish","Publish");
		$this->db->where("news_sy.id_kategori",$id );
    $this->db->order_by("news.id_news", "desc");
		$this->db->limit($limit,$offset);
		$query = $this->db->get()->result();
    return $query;
	}
	function jumlah_data_kategori($id){
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name, users.image as imgpp");
		$this->db->from("news");
		$this->db->join('news_sy','news_sy.id_news = news.id_news');
		$this->db->join('news_category','news_category.id_kategori = news_sy.id_kategori');
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("news.status_publish","Publish");
		$this->db->where("news_sy.id_kategori",$id );
    $this->db->order_by("news.id_news", "desc");
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function tampil_data_public_limit()
	{
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name, users.image as imgpp");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("status_publish","Publish");
    $this->db->order_by("news.id_news", "desc");
    $query = $this->db->limit(3);
    return $query;
	}

	function detail_data($id){
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish,  users.id_user, users.name, users.image as imgpp");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("news.status_publish","Publish");
		$this->db->where("news.id_news",$id );
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_bin()
	{
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("news.status_publish !=","Publish");
    $this->db->order_by("news.id_news", "desc");
    $query = $this->db->get();
    return $query;
	}

	function cek_jumlah($table){
		return $this->db->get($table);
	}

	function cek_jumlah_sampah(){
		$this->db->select("news.id_news,news.title,news.image,news.deskripsi_singkat,news.deskripsi_full,news.status_publish,news.tgl_publish, users.id_user, users.name");
		$this->db->from("news");
		$this->db->join('users','news.id_user = users.id_user');
		$this->db->where("news.status_publish !=","Publish");
    $query = $this->db->get();
    return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_data_soft($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function edit_data($where,$table){
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
