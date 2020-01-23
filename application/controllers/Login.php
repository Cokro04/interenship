<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login: Page'; //-----------------------------------------------------Dynamic Page Title 
			$this->load->view('login1', $data);
		} else {
			$username    = $this->input->post('username', TRUE);
			$password = $this->encryptIt($this->input->post('password', TRUE));
			$validasi = $this->login_model->validate($username, $password);
			if ($validasi->num_rows() > 0) {
				$data  = $validasi->row();
				$id	= $data->user_id;
				// $name  = $data->user_id;
				// $email = $data->user_id;
				$level = $data->user_level;
				$sesiondata = array(
					'id'  => $id,
					'level'     => $level,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sesiondata);

				if ($level === '1') {
					redirect('planner/planner');
				} elseif ($level === '2') {
					redirect('leader/leader');
				} elseif ($level === '3') {
					redirect('operator/operator');
				} elseif ($level === '4') {
					redirect('superadmin/superadmin');
				}
			} else {
				echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
				redirect('');
			}
		}
	}
	function logout()
	{
		$items = array('id', 'username', 'level', 'logged_in', 'email');
		$this->session->unset_userdata($items);
	}

	public function encryptIt($password)
	{
		$cryptKey  = '1212';
		$qEncoded      = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $password, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
		return ($qEncoded);
	}
}
