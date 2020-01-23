<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader extends CI_Controller
{
	var $API = "";
	public function __construct()
	{
		parent::__construct();
		$this->API = "http://localhost/spk_rest/index.php";
		$this->load->library('curl');
		$this->load->model('M_Leader');
		$this->load->model('M_Planner');
		$this->load->model('M_Superadmin');
	}

	public function index()
	{
		$where = $this->session->userdata('id');
		$get_data = $this->M_Leader->get_leader($where);
		if ($get_data->num_rows() > 0) {
			$data = $get_data->row();
			$id_workcenter = $data->id_workcenter;
			$nama = $data->nama_lengkap;
			$setdata = array(
				'id_workcenter' => $id_workcenter,
				'nama' => $nama,
			);
			$this->session->set_userdata($setdata);
		}

		$arrayName = array(
			'data' => $this->M_Leader->get_rangking($this->session->userdata('id_workcenter')),
			'id_workcenter' => $this->session->userdata('id_workcenter'),
		);
		$this->load->view('leader/index', $arrayName);
	}

	public function operator($id)
	{
		$where = $this->session->userdata('id_workcenter');
		$data = array(
			'operator' => $this->M_Leader->get_operator($where),
			'id_operasi' => $id,
		);
		$this->load->view('leader/pilih_operator', $data);
	}

	public function detail_operator($id)
	{
		$where = $id;
		$id = $this->session->userdata('id');
		$data = array(
			'operator' => $this->M_Leader->get_operator_all($where),
			'laporan' => json_decode($this->curl->simple_get($this->API . '/laporan', array('id_user' => $id), array(CURLOPT_BUFFERSIZE => 10))),
		);
		$this->load->view('leader/data_operator', $data);
	}

	public function edit()
	{
		$data = array(
			"id_operasi" => $_POST['id_operasi'],
		);
		$this->db->where('id_operator', $_POST['id_operator']);
		$this->db->update('tbl_operator', $data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
