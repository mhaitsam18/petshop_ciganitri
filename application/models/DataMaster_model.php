<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_model extends CI_Model {

	public function getAgamaById($id)
	{
		return $this->db->get_where('agama', ['id' => $id])->row_array();
	}
	public function getKontenById($id)
	{
		return $this->db->get_where('content', ['id' => $id])->row_array();
	}
	public function getkurirById($id)
	{
		return $this->db->get_where('kurir', ['id' => $id])->row_array();
	}
	public function getKategoriById($id)
	{
		return $this->db->get_where('kategori', ['id' => $id])->row_array();
	}
	public function getMetodeBayarById($id)
	{
		return $this->db->get_where('metode_bayar', ['id' => $id])->row_array();
	}
	public function getRekeningById($id)
	{
		return $this->db->get_where('rekening', ['id' => $id])->row_array();
	}
	public function getPaketGroomingById($id)
	{
		return $this->db->get_where('paket_grooming', ['id' => $id])->row_array();
	}
	public function getDetailPaketGroomingById($id)
	{
		return $this->db->get_where('detail_paket_grooming', ['id' => $id])->row_array();
	}
	
}