<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
	var $API = "";
	public function __construct()
	{
		parent::__construct();
		$this->API = "http://localhost/spk_rest/index.php";
		$this->load->library('curl');
		$this->load->model('M_Operator');
		$this->load->model('M_Planner');
		$this->load->model('M_Superadmin');
	}

	public function index()
	{
		$where = $this->session->userdata('id');
		$get_data = $this->M_Operator->get_operator($where);
		if ($get_data->num_rows() > 0) {
			$data = $get_data->row();
			$id_operator = $data->id_operator;
			$nama = $data->nama_lengkap;
			$id_user = $data->id_user;
			$id_workcenter = $data->id_workcenter;
			$id_operasi = $data->id_operasi;
			$setdata = array(
				'id_operator' => $id_operator,
				'nama' => $nama,
				'id_user' => $id_user,
				'id_workcenter' => $id_workcenter,
				'id_operasi' => $id_operasi,
			);
			$this->session->set_userdata($setdata);
		}

		$arrayName = array(
			'data' => $this->M_Operator->get_join($this->session->userdata('id_user')),
			// 'data1' => $this->M_Operator->get_join1($this->session->userdata('id_user')),
			'id_workcenter' => $this->session->userdata('id_workcenter'),
		);
		$this->load->view('operator/index', $arrayName);
	}
	public function status()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id_operator'       =>  $this->input->post('id_operator'),
				'nama_lengkap'      =>  $this->input->post('nama_lengkap'),
				'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
				'id_user'       =>  $this->input->post('id_user'),
				'id_workcenter'      =>  $this->input->post('id_workcenter'),
				'id_operasi' =>  $this->input->post('id_operasi'),
				'keterangan' =>  $this->input->post('submit'),
				'laporan' =>  $this->input->post('laporan'),
			);
			$update =  $this->curl->simple_put($this->API . '/operator', $data, array(CURLOPT_BUFFERSIZE => 10));
			if ($update) {
				$this->session->set_flashdata('berhasil', 'Mengirim Pesan Berhasil');
			} else {
				$this->session->set_flashdata('gagal', 'Mengirim Pesan Gagal');
			}
			redirect('operator/operator');
		} else {
			$arrayName = array(
				'data' => $this->M_Operator->get_join($this->session->userdata('id_user')),
				// 'data1' => $this->M_Operator->get_join1($this->session->userdata('id_user')),
				'id_workcenter' => $this->session->userdata('id_workcenter'),
			);
			$this->load->view('operator/index', $arrayName);
		}
	}
	public function laporan()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id_operator'       =>  $this->input->post('id_operator'),
				'nama_lengkap'      =>  $this->input->post('nama_lengkap'),
				'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
				'id_user'       =>  $this->input->post('id_user'),
				'id_workcenter'      =>  $this->input->post('id_workcenter'),
				'id_operasi' =>  $this->input->post('id_operasi'),
				'keterangan' =>  $this->input->post('keterangan'),
				'laporan' =>  $this->input->post('laporan'),
			);
			$update =  $this->curl->simple_put($this->API . '/operator', $data, array(CURLOPT_BUFFERSIZE => 10));
			if ($update) {
				$this->session->set_flashdata('berhasil', 'Mengirim Pesan Berhasil');
			} else {
				$this->session->set_flashdata('gagal', 'Mengirim Pesan Gagal');
			}
			redirect('operator/operator');
		} else {
			$arrayName = array(
				'data' => $this->M_Operator->get_join($this->session->userdata('id_user')),
				// 'data1' => $this->M_Operator->get_join1($this->session->userdata('id_user')),
				'id_workcenter' => $this->session->userdata('id_workcenter'),
			);
			$this->load->view('operator/index', $arrayName);
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
