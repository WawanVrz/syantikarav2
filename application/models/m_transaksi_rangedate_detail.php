<?php

class m_transaksi_rangedate_detail extends CI_Model
{

	function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}
