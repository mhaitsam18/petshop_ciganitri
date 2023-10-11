<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('DataMaster_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Data Master";
		$data['dataMaster'] = $this->db->get_where('user_sub_menu',['menu_id' => 14])->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('data-master/index', $data);
		$this->load->view('templates/footer');
	}

	public function agama()
	{
		$data['title'] = "Data Agama";
		$data['agama'] = $this->db->get('agama')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('agama', 'Religion Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-agama', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('agama', [
				'agama' => $this->input->post('agama')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Religion Added!
				</div>');
			redirect('DataMaster/agama');
		}
	}

	public function kurir()
	{
		$data['title'] = "Data Kurir";
		$data['kurir'] = $this->db->get('kurir')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kurir', 'Shipper', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kurir', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kurir', [
				'kurir' => $this->input->post('kurir')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Shipper Added!
				</div>');
			redirect('DataMaster/kurir');
		}
	}

	public function kategori()
	{
		$data['title'] = "Data Kategori";
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kategori', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kategori', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kategori', [
				'kategori' => $this->input->post('kategori')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Category Added!
				</div>');
			redirect('DataMaster/kategori');
		}
	}

	public function rekening()
	{
		$data['title'] = "Data Rekening";
		$data['rekening'] = $this->db->get('rekening')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('no_rekening', 'Account', 'trim|required');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('atas_nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-rekening', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('rekening', [
				'no_rekening' => $this->input->post('no_rekening'),
				'bank' => $this->input->post('bank'),
				'atas_nama' => $this->input->post('atas_nama'),
				'email' => $this->input->post('email')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Bank Account Added!
				</div>');
			redirect('DataMaster/rekening');
		}
	}

	public function metodeBayar()
	{
		$data['title'] = "Data Metode Bayar";
		$data['metodeBayar'] = $this->db->get('metode_bayar')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('metode_bayar', 'Payment Method', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-metode-bayar', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('metode_bayar', [
				'metode_bayar' => $this->input->post('metode_bayar')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Payment Method Added!
				</div>');
			redirect('DataMaster/metodeBayar/');
		}
	}

	public function konten()
	{
		$data['title'] = "Data Konten";
		$data['content'] = $this->db->get('content')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('header', 'Header', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-konten', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('content', [
				'header' => $this->input->post('header'),
				'content' => $this->input->post('content'),
				'footer' => $this->input->post('footer'),
				'last_updated' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Content Added!
				</div>');
			redirect('DataMaster/konten');
		}
	}

	public function paketGrooming()
	{
		$data['title'] = "Data Paket Grooming";
		$data['paket_grooming'] = $this->db->get('paket_grooming')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('paket_grooming', 'The Kind of Grooming', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-paket-grooming', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('paket_grooming', [
				'paket_grooming' => $this->input->post('paket_grooming'),
				'harga' => $this->input->post('harga')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Grooming Added!
				</div>');
			redirect('DataMaster/paketGrooming');
		}
	}

	public function detailPaketGrooming($id_paket_grooming = null)
	{
		$data['title'] = "Detail Paket Grooming";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, detail_paket_grooming.id AS idpg');
		$this->db->join('paket_grooming', 'paket_grooming.id=detail_paket_grooming.id_paket_grooming');
		$data['detail_paket_grooming'] = $this->db->get_where('detail_paket_grooming', ['id_paket_grooming' => $id_paket_grooming])->result_array();
		$data['id_paket_grooming'] = $id_paket_grooming;
		$this->form_validation->set_rules('jasa', 'Service', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-detail-paket-grooming', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('detail_paket_grooming', [
				'id_paket_grooming' => $this->input->post('id_paket_grooming'),
				'jasa' => $this->input->post('jasa')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Service Added!
				</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function deleteAgama($id)
	{
		$this->db->delete('agama', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Religion Deleted!
			</div>');
		redirect('DataMaster/agama');
	}

	public function deleteKurir($id)
	{
		$this->db->delete('kurir', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Shipper Deleted!
			</div>');
		redirect('DataMaster/kurir');
	}

	public function deleteKategori($id)
	{
		$this->db->delete('kategori', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Category Deleted!
			</div>');
		redirect('DataMaster/kategori');
	}

	public function deleteRekening($id)
	{
		$this->db->delete('rekening', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Bank Account Deleted!
			</div>');
		redirect('DataMaster/rekening');
	}

	public function deleteMetodeBayar($id)
	{
		$this->db->delete('metode_bayar', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Payment Method Deleted!
			</div>');
		redirect('DataMaster/metodeBayar');
	}

	public function deleteKonten($id)
	{
		$this->db->delete('content', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Content Deleted!
			</div>');
		redirect('DataMaster/konten');
	}

	public function deletePaketGrooming($id)
	{
		$this->db->delete('paket_grooming', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Grooming Deleted!
			</div>');
		redirect('DataMaster/paketGrooming');
	}

	public function deleteDetailPaketGrooming($id)
	{
		$this->db->delete('detail_paket_grooming', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Service Deleted!
			</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function updateAgama()
	{
		$this->form_validation->set_rules('agama', 'Religion Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/agama');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('agama', [
				'agama' => $this->input->post('agama')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Religion Updated!
				</div>');
			redirect('DataMaster/agama');
		}
	}
	
	public function updateKurir()
	{
		$this->form_validation->set_rules('kurir', 'Shipper', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kurir');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kurir', [
				'kurir' => $this->input->post('kurir')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Shipper Updated!
				</div>');
			redirect('DataMaster/kurir');
		}
	}
	
	public function updateKategori()
	{
		$this->form_validation->set_rules('kategori', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kategori');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kategori', [
				'kategori' => $this->input->post('kategori')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Category Updated!
				</div>');
			redirect('DataMaster/kategori');
		}
	}
	
	public function updateRekening()
	{
		$this->form_validation->set_rules('no_rekening', 'Account', 'trim|required');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('atas_nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/rekening');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('rekening', [
				'no_rekening' => $this->input->post('no_rekening'),
				'bank' => $this->input->post('bank'),
				'atas_nama' => $this->input->post('atas_nama'),
				'email' => $this->input->post('email')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Bank Account Updated!
				</div>');
			redirect('DataMaster/rekening');
		}
	}
	
	public function updateMetodeBayar()
	{
		$this->form_validation->set_rules('metode_bayar', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/metodeBayar');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('metode_bayar', [
				'metode_bayar' => $this->input->post('metode_bayar')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Payment Method Updated!
				</div>');
			redirect('DataMaster/metodeBayar');
		}
	}
	
	public function updateKonten()
	{
		$this->form_validation->set_rules('header', 'Header', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/konten');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('content', [
				'header' => $this->input->post('header'),
				'content' => $this->input->post('content'),
				'footer' => $this->input->post('footer'),
				'last_updated' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Content Updated!
				</div>');
			redirect('DataMaster/konten');
		}
	}
	
	public function updatePaketGrooming()
	{
		$this->form_validation->set_rules('paket_grooming', 'Grooming', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/paketGrooming');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('paket_grooming', [
				'paket_grooming' => $this->input->post('paket_grooming'),
				'harga' => $this->input->post('harga')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Grooming Updated!
				</div>');
			redirect('DataMaster/paketGrooming');
		}
	}
	
	public function updateDetailPaketGrooming()
	{
		$this->form_validation->set_rules('jasa', 'Service', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect($_SERVER['HTTP_REFERER']);
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('detail_paket_grooming', [
				'jasa' => $this->input->post('jasa')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Service Updated!
				</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function dashboard()
	{
		$data['title'] = "Data Dashboard";
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('header', 'Header', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		$this->form_validation->set_rules('footer', 'Footer', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-dashboard', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard', [
				'header' => $this->input->post('header'),
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'footer' => $this->input->post('footer'),
				'icon' => $this->input->post('icon')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Content Updated!
				</div>');
			redirect('DataMaster/dashboard');
		}
	}
	
	public function getUpdateAgama(){
		echo json_encode($this->DataMaster_model->getAgamaById($this->input->post('id')));
	}
	public function getUpdateKonten(){
		echo json_encode($this->DataMaster_model->getKontenById($this->input->post('id')));
	}
	public function getUpdateKurir(){
		echo json_encode($this->DataMaster_model->getKurirById($this->input->post('id')));
	}
	public function getUpdateKategori(){
		echo json_encode($this->DataMaster_model->getKategoriById($this->input->post('id')));
	}
	public function getUpdateMetodeBayar(){
		echo json_encode($this->DataMaster_model->getMetodeBayarById($this->input->post('id')));
	}
	public function getUpdateRekening(){
		echo json_encode($this->DataMaster_model->getRekeningById($this->input->post('id')));
	}
	public function getUpdatePaketGrooming(){
		echo json_encode($this->DataMaster_model->getPaketGroomingById($this->input->post('id')));
	}
	public function getUpdateDetailPaketGrooming(){
		echo json_encode($this->DataMaster_model->getDetailPaketGroomingById($this->input->post('id')));
	}
	
}