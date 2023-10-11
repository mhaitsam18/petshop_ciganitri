<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->model('User_model');
		$this->load->model('DataMaster_model');
		$this->load->model('Menu_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$transaksi_hari_ini = [
			'DATE(waktu_transaksi)' => date('Y-m-d')
		];
		$transaksi_bulan_ini = [
			'MONTH(waktu_transaksi)' => date('m'),
			'YEAR(waktu_transaksi)' => date('Y')
		];
		$transaksi_tahun_ini = [
			'YEAR(waktu_transaksi)' => date('Y')
		];
		$pemesanan_hari_ini = [
			'DATE(waktu_pemesanan)' => date('Y-m-d')
		];
		$pemesanan_bulan_ini = [
			'MONTH(waktu_pemesanan)' => date('m'),
			'YEAR(waktu_pemesanan)' => date('Y')
		];
		$pemesanan_tahun_ini = [
			'YEAR(waktu_pemesanan)' => date('Y')
		];
		$beban_hari_ini = [
			'DATE(tanggal)' => date('Y-m-d')
		];
		$beban_bulan_ini = [
			'MONTH(tanggal)' => date('m'),
			'YEAR(tanggal)' => date('Y')
		];
		$beban_tahun_ini = [
			'YEAR(tanggal)' => date('Y')
		];
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_beli_today'] = $this->db->get_where('pasokan', $transaksi_hari_ini)->row_array();
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_beli_month'] = $this->db->get_where('pasokan', $transaksi_bulan_ini)->row_array();
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_beli_year'] = $this->db->get_where('pasokan', $transaksi_tahun_ini)->row_array();
		
		$this->db->select('SUM(sub_total_harga) AS total, DATE(waktu_transaksi) AS hari');
		$this->db->group_by('DATE(waktu_transaksi)');
		$data['sum_beli_dayly'] = $this->db->get('pasokan')->result_array();
		$this->db->select('SUM(sub_total_harga) AS total, MONTH(waktu_transaksi) AS bulan, YEAR(waktu_transaksi) AS tahun, waktu_transaksi');
		$this->db->group_by('MONTH(waktu_transaksi)');
		$data['sum_beli_monthly'] = $this->db->get('pasokan')->result_array();
		$this->db->select('SUM(sub_total_harga) AS total, YEAR(waktu_transaksi) AS tahun');
		$this->db->group_by('YEAR(waktu_transaksi)');
		$data['sum_beli_annual'] = $this->db->get('pasokan')->result_array();


		$this->db->select('SUM(total_harga) AS total');
		$data['sum_jual_today'] = $this->db->get_where('checkout', $pemesanan_hari_ini)->row_array();
		$this->db->select('SUM(total_harga) AS total');
		$data['sum_jual_month'] = $this->db->get_where('checkout', $pemesanan_bulan_ini)->row_array();
		$this->db->select('SUM(total_harga) AS total');
		$data['sum_jual_year'] = $this->db->get_where('checkout', $pemesanan_tahun_ini)->row_array();
		
		$this->db->select('SUM(total_harga) AS total, DATE(waktu_pemesanan) AS hari');
		$this->db->group_by('DATE(waktu_pemesanan)');
		$data['sum_jual_dayly'] = $this->db->get('checkout')->result_array();
		$this->db->select('SUM(total_harga) AS total, MONTH(waktu_pemesanan) AS bulan, YEAR(waktu_pemesanan) AS tahun, waktu_pemesanan');
		$this->db->group_by('MONTH(waktu_pemesanan)');
		$data['sum_jual_monthly'] = $this->db->get('checkout')->result_array();
		$this->db->select('SUM(total_harga) AS total, YEAR(waktu_pemesanan) AS tahun');
		$this->db->group_by('YEAR(waktu_pemesanan)');
		$data['sum_jual_annual'] = $this->db->get('checkout')->result_array();


		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_jual_today_offline'] = $this->db->get_where('transaksi', $transaksi_hari_ini)->row_array();
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_jual_month_offline'] = $this->db->get_where('transaksi', $transaksi_bulan_ini)->row_array();
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_jual_year_offline'] = $this->db->get_where('transaksi', $transaksi_tahun_ini)->row_array();
		
		$this->db->select('SUM(sub_total_harga) AS total, DATE(waktu_transaksi) AS hari');
		$this->db->group_by('DATE(waktu_transaksi)');
		$data['sum_jual_dayly_offline'] = $this->db->get('transaksi')->result_array();
		$this->db->select('SUM(sub_total_harga) AS total, MONTH(waktu_transaksi) AS bulan, YEAR(waktu_transaksi) AS tahun, waktu_transaksi');
		$this->db->group_by('MONTH(waktu_transaksi)');
		$data['sum_jual_monthly_offline'] = $this->db->get('transaksi')->result_array();
		$this->db->select('SUM(sub_total_harga) AS total, YEAR(waktu_transaksi) AS tahun');
		$this->db->group_by('YEAR(waktu_transaksi)');
		$data['sum_jual_annual_offline'] = $this->db->get('transaksi')->result_array();

		$this->db->select('SUM(biaya_beban) AS total');
		$data['sum_beban_today'] = $this->db->get_where('beban', $beban_hari_ini)->row_array();
		$this->db->select('SUM(biaya_beban) AS total');
		$data['sum_beban_month'] = $this->db->get_where('beban', $beban_bulan_ini)->row_array();
		$this->db->select('SUM(biaya_beban) AS total');
		$data['sum_beban_year'] = $this->db->get_where('beban', $beban_tahun_ini)->row_array();
		
		$this->db->select('SUM(biaya_beban) AS total, DATE(tanggal) AS hari');
		$this->db->group_by('DATE(tanggal)');
		$data['sum_beban_dayly'] = $this->db->get('beban')->result_array();
		$this->db->select('SUM(biaya_beban) AS total, MONTH(tanggal) AS bulan, YEAR(tanggal) AS tahun, tanggal');
		$this->db->group_by('MONTH(tanggal)');
		$data['sum_beban_monthly'] = $this->db->get('beban')->result_array();
		$this->db->select('SUM(biaya_beban) AS total, YEAR(tanggal) AS tahun');
		$this->db->group_by('YEAR(tanggal)');
		$data['sum_beban_annual'] = $this->db->get('beban')->result_array();

		$this->db->select('SUM(sub_total_harga) AS total');
		$profit_offline = $this->db->get('transaksi')->row_array();

		$this->db->select('SUM(total_harga) AS total');
		$profit_online = $this->db->get('checkout')->row_array();

		$this->db->select('SUM(sub_total_harga) AS total');
		$loss_modal = $this->db->get('pasokan')->row_array();


		$this->db->select('SUM(biaya_beban) AS total');
		$loss_beban = $this->db->get('beban')->row_array();


		$profit = $profit_offline['total'] + $profit_online['total'];

		$hasil = $profit - $loss_modal['total'] - $loss_beban['total'];

		$data['persentase_hasil'] = $hasil/$loss_modal['total']*100;
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = "Role Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Role Added!
				</div>');
			redirect('admin/role');
		}
	}

	public function dataUser()
	{
		$data['title'] = "Data User";
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, user_role.id AS rid, user.id AS uid');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$data['user_data'] = $this->db->get()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/data-user', $data);
		$this->load->view('templates/footer');
	}

	public function setRole()
	{
		$this->db->set('role_id', $this->input->post('role_id'));
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user');
		// $input = array('role_id' => $this->input->post('role_id'));
		// $id = $this->input->post('id');
		// $this->User_model->update()
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Set User Role Successfull!
			</div>');
		redirect('admin/dataUser');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = "Role Access";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else{
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Access Changed!
			</div>');
	}

	public function getUpdateRole(){
		echo json_encode($this->Admin_model->getRoleById($this->input->post('id')));
	}
	public function getUserData(){
		echo json_encode($this->Admin_model->getUserById($this->input->post('id')));
	}
	public function updateRole(){
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('admin/role');
		} else{
			$data = array('role' => $this->input->post('role'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user_role', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Role Updated!
				</div>');
			redirect('admin/role');
		}
	}

	public function deleteRole($id)
	{
		$this->db->where('role_id', $id);
		$this->db->delete('user');

		$this->db->where('role_id', $id);
		$this->db->delete('user_access_menu');
		
		$this->db->where('id', $id);
		$this->db->delete('user_role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Role Deleted!
			</div>');
		redirect('admin/role');
	}

}