<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planner extends CI_Controller
{
	var $API = "";
	public function __construct()
	{
		parent::__construct();
		$this->API = "http://localhost/spk_rest/index.php";
		$this->load->library('curl');
		$this->load->library('pdf');
		$this->load->model('M_Planner');
	}

	public function index()
	{

		if ($this->session->userdata('level') === '1') {
			$data['rangking'] = $this->M_Planner->data_rangking();
			$this->load->view('planner/index', $data);
		} elseif ($this->session->userdata('level') === '4') {
			$data['rangking'] = $this->M_Planner->data_rangking();
			$this->load->view('superadmin/hasil_rangking', $data);
		}
	}

	function where()
	{
		if ($this->session->userdata('level') === '1') {
			$date = $this->input->post('date');
			$data['rangking'] = $this->M_Planner->cetak_rangking($date);
			$this->load->view('planner/index', $data);
		} elseif ($this->session->userdata('level') === '4') {
			$date = $this->input->post('date');
			$data['rangking'] = $this->M_Planner->cetak_rangking($date);
			$this->load->view('superadmin/hasil_rangking', $data);
		}
	}

	public function view($id)
	{
		$where = $id;
		$data = array(
			'data' => $this->M_Planner->get_criteria($where),
			'data_sum' => $this->M_Planner->sumdata($where),
			'id_workcenter' => $where
		);
		$this->load->view('planner/hasil_input', $data);
	}

	public function form_input()
	{
		$this->load->view('planner/input_parameter');
	}

	public function hasil_input()
	{
		$data = array(
			'data' => $this->M_Planner->getdata(),
			'data_sum' => $this->M_Planner->sumdata11(),
		);
		$this->load->view('planner/hasil_input', $data);
	}

	public function proses_entropy()
	{
		$where = $this->input->post('coba');
		$data = array(
			// 'data' => $this->M_Planner->getdata(),
			'data' => $this->M_Planner->get_criteria($where),
			// 'sum_ln' => $this->M_Planner->sum_ln(),
			'C1' => $this->input->post('C1'),
			'C2' => $this->input->post('C2'),
			'C3' => $this->input->post('C3'),
			'C4' => $this->input->post('C4'),
			'C5' => $this->input->post('C5'),

		);
		if ($this->session->userdata('level') === '1') {
			$this->load->view('planner/proses_entropy', $data);
		} elseif ($this->session->userdata('level') === '4') {
			$this->load->view('superadmin/proses_entropy', $data);
		}
	}

	// public function insert_bobot_db()
	// {
	// 	$data = array(
	// 		'urgensi' => $this->input->post('W1'),
	// 		'psd' => $this->input->post('W2'),
	// 		'qty' => $this->input->post('W3'),
	// 		'standard_time' => $this->input->post('W4'),
	// 		'setup_time' => $this->input->post('W5')
	// 	);
	// 	$this->db->insert('tbl_bobot', $data);
	// }

	public function proses_promethee()
	{
		$where = $this->input->post('coba');
		$data = array(
			'data' => $this->M_Planner->get_criteria($where),
			'datacoba' => $this->M_Planner->get_criteria($where),
			'data_maxmin' => $this->M_Planner->maxmindata($where),
			'datakurang' => $this->M_Planner->penguranganmaxmin($where),
			'id_workcenter' => $where,
			'W1' => $this->input->post('W1'),
			'W2' => $this->input->post('W2'),
			'W3' => $this->input->post('W3'),
			'W4' => $this->input->post('W4'),
			'W5' => $this->input->post('W5'),
		);
		if ($this->session->userdata('level') === '1') {
			$this->load->view('planner/proses_promethee', $data);
		} elseif ($this->session->userdata('level') === '4') {
			$this->load->view('superadmin/proses_promethee', $data);
		}
	}

	// public function proses_promethee()
	// {
	// 	$where = 111603;
	// 	$data = array(
	// 		'data' => $this->M_Planner->get_criteria($where),
	// 		'datacoba' => $this->M_Planner->get_criteria($where),
	// 		'data_maxmin' => $this->M_Planner->maxmindata(),
	// 		'datakurang' => $this->M_Planner->penguranganmaxmin(),
	// 	);

	// 	if ($this->input->post('W1') != "") {
	// 		$this->session->set_userdata('entropy', $this->input->post());
	// 		unset($_SESSION['submit']);
	// 		redirect('planner/planner/proses_promethee');
	// 	}
	// 	if (isset($_SESSION['entropy'])) {
	// 		$data['entropy'] = $_SESSION['entropy'];
	// 		$this->load->view('planner/proses_promethee', $data);
	// 	} else {
	// 		redirect('planner/planner/hasil_input');
	// 	}

	// 	//echo $data['entropy']['W1'];

	// }
	// public function hapus_sess_entropy()
	// {
	// 	$this->session->unset_userdata('entropy');
	// 	redirect('');
	// }

	public function save_rangking()
	{
		// Ambil data yang dikirim dari form
		$urutan = $_POST['urutan']; // Ambil data nis dan masukkan ke variabel nis
		$id_operasi = $_POST['id_operasi']; // Ambil data nama dan masukkan ke variabel nama
		$id_workcenter = $_POST['id_workcenter']; // Ambil data telp dan masukkan ke variabel telp
		$date = $_POST['date'];
		$data = array();
		$index = 0; // Set index array awal dengan 0
		foreach ($urutan as $dataurut) { // Kita buat perulangan berdasarkan nis sampai data terakhir
			array_push($data, array(
				'urutan' => $dataurut,
				'id_operasi' => $id_operasi[$index],  // Ambil dan set data nama sesuai index array dari $index
				'id_workcenter' => $id_workcenter[$index],
				'date' => $date[$index],  // Ambil dan set data telepon sesuai index array dari $index
				// Ambil dan set data alamat sesuai index array dari $index
			));
			$index++;
		}
		$this->M_Planner->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
		redirect('planner/planner');
	}

	public function cetak_rangking()
	{
		$pdf = new FPDF('P', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 16);
		// mencetak string 
		$pdf->Cell(190, 7, 'HASIL PERANGKINGAN OPERASI', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(190, 7, 'DATA RANGKING', 0, 1, 'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(20, 6, 'urutan', 1, 0, 'C');
		$pdf->Cell(85, 6, 'id operasi', 1, 0);
		$pdf->Cell(27, 6, 'work center', 1, 0);
		$pdf->Cell(25, 6, 'TANGGAL', 1, 1);

		$pdf->SetFont('Arial', '', 10);
		$rangking = json_decode($this->curl->simple_get($this->API . '/rangking'));
		foreach ($rangking as $row) {
			$pdf->Cell(20, 6, $row->urutan, 1, 0);
			$pdf->Cell(85, 6, $row->id_operasi, 1, 0);
			$pdf->Cell(27, 6, $row->id_workcenter, 1, 0);
			$pdf->Cell(25, 6, $row->date, 1, 1);
		}
		$pdf->Output();
	}

	public function cetak_rangking_where()
	{
		$pdf = new FPDF('P', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 16);
		// mencetak string 
		$pdf->Cell(190, 7, 'HASIL PERANGKINGAN OPERASI', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(190, 7, 'DATA RANGKING', 0, 1, 'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(20, 6, 'urutan', 1, 0, 'C');
		$pdf->Cell(30, 6, 'id operasi', 1, 0);
		$pdf->Cell(35, 6, 'nama operasi', 1, 0);
		$pdf->Cell(35, 6, 'work center', 1, 0);
		$pdf->Cell(35, 6, 'work order', 1, 0);
		$pdf->Cell(34, 6, 'tanggal', 1, 1);

		$pdf->SetFont('Arial', '', 10);
		$date = $this->input->post('date');
		$rangking = $this->M_Planner->cetak_rangking($date);
		foreach ($rangking as $row) {
			$pdf->Cell(20, 6, $row->urutan, 1, 0);
			$pdf->Cell(30, 6, $row->id_operasi, 1, 0);
			$pdf->Cell(35, 6, $row->nama_operasi, 1, 0);
			$pdf->Cell(35, 6, $row->id_workcenter, 1, 0);
			$pdf->Cell(35, 6, $row->id_workorder, 1, 0);
			$pdf->Cell(34, 6, $row->date, 1, 1);
		}
		$pdf->Output();
	}




	function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
