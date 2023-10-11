<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grooming_model extends CI_Model {

	public function getGroomingById($id)
	{
		return $this->db->get_where('grooming', ['id' => $id])->row_array();
	}
	public function getSlotById($id)
	{
		return $this->db->get_where('slot', ['id' => $id])->row_array();
	}
	public function getJadwalById($id)
	{
		return $this->db->get_where('jadwal', ['id' => $id])->row_array();
	}
	
}