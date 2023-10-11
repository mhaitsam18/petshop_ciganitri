<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grooming extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Grooming_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Grooming";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, grooming.id AS idg');
		$this->db->join('user', 'user.id=grooming.id_user');
		$this->db->join('paket_grooming', 'paket_grooming.id=grooming.id_paket_grooming');
		$this->db->join('jadwal', 'jadwal.id=grooming.id_jadwal');
		$this->db->join('slot', 'slot.id=grooming.id_slot');
		$this->db->order_by('grooming.id', 'DESC');
		$data['grooming'] = $this->db->get('grooming')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('grooming/index', $data);
		$this->load->view('templates/footer');
	}

	public function updateStatusGrooming($id = null, $status = 'Booking')
	{
		if ($status == 'Proses') {
			$status = 'Proses Grooming';
		}
		$this->db->where('id', $id);
		$this->db->update('grooming', [
			'status' => $status
		]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Status Updated!
			</div>');
		redirect('Grooming/');
	}

	public function slot()
	{
		$data['title'] = "Slot";
		$data['slot'] = $this->db->get('slot')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('slot', 'Slot', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('grooming/slot', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('slot', [
				'slot' => $this->input->post('slot')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Slot Added!
				</div>');
			redirect('Grooming/slot');
		}

	}

	public function updateSlot()
	{
		$this->form_validation->set_rules('slot', 'Slot', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Grooming/slot');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('slot', [
				'slot' => $this->input->post('slot')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Slot Updated!
				</div>');
			redirect('Grooming/slot');
		}
	}

	public function deleteSlot($id)
	{
		$this->db->delete('slot', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Slot Deleted!
			</div>');
		redirect('Grooming/slot');
	}

	public function getUpdateSlot(){
		echo json_encode($this->db->get_where('slot',['id' => $this->input->post('id')])->row_array());
		// echo json_encode($this->Grooming_model->getSlotById($this->input->post('id')));
	}

	public function jadwal()
	{
		$data['title'] = "jadwal";
		$data['jadwal'] = $this->db->get('jadwal')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('jadwal', 'Schedule', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('grooming/jadwal', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('jadwal', [
				'jadwal' => $this->input->post('jadwal')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Schedule Added!
				</div>');
			redirect('Grooming/jadwal');
		}

	}

	public function updateJadwal()
	{
		$this->form_validation->set_rules('jadwal', 'Schedule', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Grooming/jadwal');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('jadwal', [
				'jadwal' => $this->input->post('jadwal')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Schedule Updated!
				</div>');
			redirect('Grooming/jadwal');
		}
	}

	public function deleteJadwal($id)
	{
		$this->db->delete('jadwal', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Schedule Deleted!
			</div>');
		redirect('Grooming/jadwal');
	}

	public function getUpdateJadwal(){
		echo json_encode($this->db->get_where('jadwal',['id' => $this->input->post('id')])->row_array());
		// echo json_encode($this->Grooming_model->getjadwalById($this->input->post('id')));
	}

}