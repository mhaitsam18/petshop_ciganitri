<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Lainnya_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Fitur Lainnya";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/index', $data);
		$this->load->view('templates/footer');
	}

	public function tentang()
	{
		$data['title'] = "Tentang Aplikasi";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/tentang', $data);
		$this->load->view('templates/footer');
	}

	public function pengaturan()
	{
		$data['title'] = "Pengaturan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/pengaturan', $data);
		$this->load->view('templates/footer');
	}

	public function hubungi()
	{
		$data['title'] = "Hubungi Kami";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/hubungi-kami', $data);
		$this->load->view('templates/footer');
	}

	public function bantuan()
	{
		$data['title'] = "Bantuan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/bantuan', $data);
		$this->load->view('templates/footer');
	}

	public function faq()
	{
		$data['title'] = "FAQ";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/faq', $data);
		$this->load->view('templates/footer');
	}

	
}