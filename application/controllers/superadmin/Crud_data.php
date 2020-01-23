<?php
class Crud_data extends CI_Controller
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/spk_rest/index.php";
        $this->load->library('curl');
        $this->load->model('M_Superadmin');
        $this->load->model('M_Planner');
        $this->load->model('M_Criteria');
    }

    public function index()
    {
        if ($this->session->userdata('level') === '1') {
            $data = array(
                'workcenter' => json_decode($this->curl->simple_get($this->API . '/workcenter')),
                'workorder' =>  json_decode($this->curl->simple_get($this->API . '/workorder'))
            );
            $this->load->view('planner/workcenter', $data);
        } elseif ($this->session->userdata('level') === '4') {
            $data['workcenter'] = json_decode($this->curl->simple_get($this->API . '/workcenter'));
            $this->load->view('superadmin/workcenter', $data);
        }
    }

    public function cari_workcenter()
    {
        if ($this->session->userdata('level') === '1') {
            $data['work_center'] = json_decode($this->curl->simple_get($this->API . '/workcenter'));
            $this->load->view('planner/cari_workcenter', $data);
        } elseif ($this->session->userdata('level') === '4') {
            $data['work_center'] = json_decode($this->curl->simple_get($this->API . '/workcenter'));
            $this->load->view('superadmin/cari_workcenter', $data);
        }
    }

    function where()
    {
        $d = $this->input->post('id');
        if ($this->session->userdata('level') === '1') {
            $data['workcenter'] = json_decode($this->curl->simple_get($this->API . '/workcenter', array('id_workcenter' => $d), array(CURLOPT_BUFFERSIZE => 10)));
            $this->load->view('planner/workcenter', $data);
        } elseif ($this->session->userdata('level') === '4') {
            $data['workcenter'] = json_decode($this->curl->simple_get($this->API . '/workcenter', array('id_workcenter' => $d), array(CURLOPT_BUFFERSIZE => 10)));
            $this->load->view('superadmin/workcenter', $data);
        }
    }

    public function create_aksi()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_workcenter'       =>  $this->input->post('id_workcenter'),
                'Nama_Work_Center'      =>  $this->input->post('Nama_Work_Center')
            );
            $insert =  $this->curl->simple_post($this->API . '/workcenter', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('berhasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Insert Data Gagal');
            }
            redirect('superadmin/crud_data');
        } else {
            $data['workcenter'] = json_decode($this->curl->simple_get($this->API . '/workcenter'));
            $this->load->view('planner/workcenter', $data);
        }
    }

    public function update_aksi()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_workcenter'       =>  $this->input->post('id_workcenter'),
                'Nama_Work_Center'      =>  $this->input->post('Nama_Work_Center')
            );
            $update =  $this->curl->simple_put($this->API . '/workcenter', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('berhasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Update Data Gagal');
            }
            redirect('superadmin/crud_data');
        } else {
            $data['workcenter'] = json_decode($this->curl->simple_get($this->API . '/workcenter'));
            $this->load->view('planner/workcenter', $data);
        }
    }
    public function delete($id)
    {
        if (empty($id)) {
            redirect('superadmin/crud_data');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/workcenter', array('id_workcenter' => $id), array(CURLOPT_BUFFERSIZE => 10));

            if ($delete) {
                $this->session->set_flashdata('berhasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Delete Data Gagal');
            }
            redirect('superadmin/crud_data');
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
        $this->load->view('superadmin/hasil_input_kriteria', $data);
    }
    // fungsi untuk work order di superadmin
    public function workorder()
    {
        if ($this->session->userdata('level') === '1') {
            $data['workorder'] = json_decode($this->curl->simple_get($this->API . '/workorder'));
            $this->load->view('planner/workcenter', $data);
        } elseif ($this->session->userdata('level') === '4') {
            $data['workorder'] = json_decode($this->curl->simple_get($this->API . '/workorder'));
            $this->load->view('superadmin/workorder', $data);
        }
    }

    public function create_workorder()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_wo'           => $this->input->post('id_wo'),
                'Part_Number'          => $this->input->post('Part_Number'),
                'Part_Number_Desk'      => $this->input->post('Part_Number_Desk'),
                'Qty'                   => $this->input->post('Qty'),
                'Standar_time'          => $this->input->post('Standar_time'),
                'Setup_time'            => $this->input->post('Setup_time'),
                'Satuan'            => $this->input->post('Satuan')
            );
            $insert =  $this->curl->simple_post($this->API . '/workorder', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('berhasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Insert Data Gagal');
            }
            if ($this->session->userdata('level') === '1') {
                redirect('superadmin/crud_data');
            } elseif ($this->session->userdata('level') === '4') {
                redirect('superadmin/crud_data/workorder');
            }
        } else {
            $data['workorder'] = json_decode($this->curl->simple_get($this->API . '/workorder'));
            $this->load->view('planner/workorder', $data);
        }
    }

    public function update_workorder()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_wo'           => $this->input->post('id_wo'),
                'Part_Number'          => $this->input->post('Part_Number'),
                'Part_Number_Desk'      => $this->input->post('Part_Number_Desk'),
                'Qty'                   => $this->input->post('Qty'),
                'Standar_time'          => $this->input->post('Standar_time'),
                'Setup_time'            => $this->input->post('Setup_time'),
                'Satuan'            => $this->input->post('Satuan')
            );
            $update =  $this->curl->simple_put($this->API . '/workorder', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('berhasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Update Data Gagal');
            }
            if ($this->session->userdata('level') === '1') {
                redirect('superadmin/crud_data');
            } elseif ($this->session->userdata('level') === '4') {
                redirect('superadmin/crud_data/workorder');
            }
        } else {
            $data['workorder'] = json_decode($this->curl->simple_get($this->API . '/workorder'));
            $this->load->view('planner/workcenter', $data);
        }
    }
    public function delete_workorder($id)
    {
        if (empty($id)) {
            if ($this->session->userdata('level') === '1') {
                redirect('superadmin/crud_data');
            } elseif ($this->session->userdata('level') === '4') {
                redirect('superadmin/crud_data/workorder');
            }
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/workorder', array('id_wo' => $id), array(CURLOPT_BUFFERSIZE => 10));

            if ($delete) {
                $this->session->set_flashdata('berhasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Delete Data Gagal');
            }
            if ($this->session->userdata('level') === '1') {
                redirect('superadmin/crud_data');
            } elseif ($this->session->userdata('level') === '4') {
                redirect('superadmin/crud_data/workorder');
            }
        }
    }

    public function tambah_criteria($a)
    {
        $data = array(
            'id_workcenter' => $a,
            'workorder' => json_decode($this->curl->simple_get($this->API . '/workorder'))
        );
        if ($this->session->userdata('level') === '1') {
            $this->load->view('planner/input_criteria', $data);
        } elseif ($this->session->userdata('level') === '4') {
            $this->load->view('superadmin/input_criteria', $data);
        }
    }

    public function listWorkorder()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $id_workorder = $this->input->post('id_workorder');
        $workorder = json_decode($this->curl->simple_get($this->API . '/workorder', array('id_wo' => $id_workorder), array(CURLOPT_BUFFERSIZE => 10)));
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        // $lists = "<option value=''>Pilih</option>";
        foreach ($workorder as $data) {
            $lists = "<option value='" . $data->Qty . "'>" . $data->Qty . "</option>"; // Tambahkan tag option ke variabel $lists
            $lists2 = "<option value='" . $data->Standar_time . "'>" . $data->Standar_time . "</option>";
            $lists3 = "<option value='" . $data->Setup_time . "'>" . $data->Setup_time . "</option>";
        }
        $callback = array(
            'list_qty' => $lists,
            'list_standard_time' => $lists2,
            'list_setup_time' => $lists3
        ); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function create_kriteria()
    {
        $id = $this->input->post('id');
        $nama_operasi = $this->input->post('nama_operasi');
        $urgensi = $this->input->post('urgensi');
        $psd = $this->input->post('psd');
        $qty = $this->input->post('qty');
        $standard_time = $this->input->post('standard_time');
        $setup_time = $this->input->post('setup_time');
        $id_workcenter = $this->input->post('id_workcenter');
        $id_workorder = $this->input->post('id_workorder');
        $date1 = strtotime($urgensi);
        $a = date('Y-m-d H:i:s', $date1);
        $b = date("Y-m-d H:i:s");
        $date2 = strtotime($b);
        $interval = $date1 - $date2;
        $seconds = $interval % 60;
        $minutes = floor(($interval % 3600) / 60);
        $hours = floor($interval / 3600);
        // echo $hours . ":" . $minutes . ":" . $seconds;
        $q = 168;
        $w = 336;
        $e = 504;
        $r = 672;
        if ($hours <= $q) {
            $go = '5';
        } elseif ($hours <= $w) {
            $go = '4';
        } elseif ($hours <= $e) {
            $go = '3';
        } elseif ($hours <= $r) {
            $go = '2';
        } elseif ($hours > $r) {
            $go = '1';
        }
        $date_psd = strtotime($psd);
        $a = date('Y-m-d H:i:s', $date_psd);
        $c = date("Y-m-d H:i:s");
        $now = strtotime($c);
        $interval = $date_psd - $now;
        $seconds = $interval % 60;
        $minutes = floor(($interval % 3600) / 60);
        $hours1 = floor($interval / 3600);
        // echo $hours . ":" . $minutes . ":" . $seconds;
        $q = 168;
        $w = 336;
        $e = 504;
        $r = 672;
        if ($hours1 <= $q) {
            $go1 = '5';
        } elseif ($hours1 <= $w) {
            $go1 = '4';
        } elseif ($hours1 <= $e) {
            $go1 = '3';
        } elseif ($hours1 <= $r) {
            $go1 = '2';
        } elseif ($hours1 > $r) {
            $go1 = '1';
        }
        // $data['horee'] = $go;
        $data = array(
            'id' => $id,
            'nama_operasi' => $nama_operasi,
            'tgl_kirim' => $urgensi,
            'plan_start_date' => $psd,
            'urgensi' => $go,
            'psd' => $go1,
            'qty' => $qty,
            'standard_time' => $standard_time,
            'setup_time' => $setup_time,
            'id_workcenter' => $id_workcenter,
            'id_workorder' => $id_workorder
        );

        // $this->M_Criteria->insert_data($data, 'tbl_criteria');
        $this->curl->simple_post($this->API . '/criteria', $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($this->session->userdata('level') === '1') {
            redirect('planner/planner/view/' . $id_workcenter);
        } elseif ($this->session->userdata('level') === '4') {
            redirect('superadmin/crud_data/view/' . $id_workcenter);
        }
    }

    function edit_criteria($d)
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $nama_operasi = $this->input->post('nama_operasi');
            $urgensi = $this->input->post('urgensi');
            $psd = $this->input->post('psd');
            $qty = $this->input->post('qty');
            $standard_time = $this->input->post('standard_time');
            $setup_time = $this->input->post('setup_time');
            $id_workcenter = $this->input->post('id_workcenter');
            $id_workorder = $this->input->post('id_workorder');
            $date1 = strtotime($urgensi);
            $a = date('Y-m-d H:i:s', $date1);
            $b = date("Y-m-d H:i:s");
            $date2 = strtotime($b);
            $interval = $date1 - $date2;
            $seconds = $interval % 60;
            $minutes = floor(($interval % 3600) / 60);
            $hours = floor($interval / 3600);
            // echo $hours . ":" . $minutes . ":" . $seconds;
            $q = 168;
            $w = 336;
            $e = 504;
            $r = 672;
            if ($hours <= $q) {
                $go = '5';
            } elseif ($hours <= $w) {
                $go = '4';
            } elseif ($hours <= $e) {
                $go = '3';
            } elseif ($hours <= $r) {
                $go = '2';
            } elseif ($hours > $r) {
                $go = '1';
            }
            $date_psd = strtotime($psd);
            $a = date('Y-m-d H:i:s', $date_psd);
            $c = date("Y-m-d H:i:s");
            $now = strtotime($c);
            $interval = $date_psd - $now;
            $seconds = $interval % 60;
            $minutes = floor(($interval % 3600) / 60);
            $hours1 = floor($interval / 3600);
            // echo $hours . ":" . $minutes . ":" . $seconds;
            $q = 168;
            $w = 336;
            $e = 504;
            $r = 672;
            if ($hours1 <= $q) {
                $go1 = '5';
            } elseif ($hours1 <= $w) {
                $go1 = '4';
            } elseif ($hours1 <= $e) {
                $go1 = '3';
            } elseif ($hours1 <= $r) {
                $go1 = '2';
            } elseif ($hours1 > $r) {
                $go1 = '1';
            }
            // $data['horee'] = $go;
            $data = array(
                'id' => $id,
                'nama_operasi' => $nama_operasi,
                'tgl_kirim' => $urgensi,
                'plan_start_date' => $psd,
                'urgensi' => $go,
                'psd' => $go1,
                'qty' => $qty,
                'standard_time' => $standard_time,
                'setup_time' => $setup_time,
                'id_workcenter' => $id_workcenter,
                'id_workorder' => $id_workorder
            );
            $update =  $this->curl->simple_put($this->API . '/criteria', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            if ($this->session->userdata('level') === '1') {
                redirect('planner/planner/view/' . $id_workcenter);
            } elseif ($this->session->userdata('level') === '4') {
                redirect('superadmin/crud_data/view/' . $id_workcenter);
            }
        } else {
            $data = array(
                'data' => json_decode($this->curl->simple_get($this->API . '/criteria', array('id' => $d), array(CURLOPT_BUFFERSIZE => 10))),
                'workorder' => json_decode($this->curl->simple_get($this->API . '/workorder'))
            );
            if ($this->session->userdata('level') === '1') {
                $this->load->view('planner/edit_criteria', $data);
            } elseif ($this->session->userdata('level') === '4') {
                $this->load->view('superadmin/edit_criteria', $data);
            }
        }
    }

    function delete_criteria()
    {
        $id = $this->input->post('id');
        $id_workcenter = $this->input->post('id_workcenter');
        $delete =  $this->curl->simple_delete($this->API . '/criteria', array('id' => $id), array(CURLOPT_BUFFERSIZE => 10));
        if ($delete) {
            $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Delete Data Gagal');
        }
        if ($this->session->userdata('level') === '1') {
            redirect('planner/planner/view/' . $id_workcenter);
        } elseif ($this->session->userdata('level') === '4') {
            redirect('superadmin/crud_data/view/' . $id_workcenter);
        }
    }

    // fungsi fungsi untuk membuat user 
    public function user()
    {
        $get_pass = json_decode($this->curl->simple_get($this->API . '/user_pass'));

        $data = array(
            'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
            'data_planner' => json_decode($this->curl->simple_get($this->API . '/planner')),
            'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            'data_user' => json_decode($this->curl->simple_get($this->API . '/user')),
            'join_leader' => json_decode($this->curl->simple_get($this->API . '/user_join')),
            'join_planner' => json_decode($this->curl->simple_get($this->API . '/user_join_p')),
            'join_operator' => json_decode($this->curl->simple_get($this->API . '/user_join_o')),

        );
        $this->load->view('superadmin/user', $data);
    }

    public function create_leader()
    {
        if (isset($_POST['submit'])) {
            $user_id = $this->input->post('user_id');
            $data = array(
                'user_id'        => $user_id,
                'user_name'      => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => $this->encryptIt($this->input->post('user_password')),
                'user_level'     => $this->input->post('user_level'),
                'status'         => $this->input->post('status')
            );

            $data1 = array(
                'id_leader'       => $this->input->post('id_leader'),
                'nama_lengkap'      => $this->input->post('user_name'),
                'jenis_kelamin'     => 0,
                'id_user'           => $user_id
            );

            $insert =  $this->curl->simple_post($this->API . '/user', $data, array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_post($this->API . '/leader', $data1, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('berhasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Insert Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        } else {
            $data = array(
                'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
                'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            );
            $this->load->view('superadmin/user', $data);
        }
    }

    public function update_leader()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'user_id'        => $this->input->post('user_id'),
                'user_name'      => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => $this->encryptIt($this->input->post('user_password')),
                'user_level'     => $this->input->post('user_level'),
                'status'         => $this->input->post('status')
            );

            $data1 = array(
                'id_leader'       => $this->input->post('id_leader'),
                'nama_lengkap'      => $this->input->post('user_name'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'id_user'           => $this->input->post('user_id')
            );
            $update =  $this->curl->simple_put($this->API . '/user', $data, array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_put($this->API . '/leader', $data1, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('berhasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Update Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        } else {
            $data = array(
                'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
                'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            );
            $this->load->view('superadmin/user', $data);
        }
    }

    public function create_operator()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'user_id'        => $this->input->post('user_id'),
                'user_name'      => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => $this->encryptIt($this->input->post('user_password')),
                'user_level'     => $this->input->post('user_level'),
                'status'         => $this->input->post('status')
            );

            $data1 = array(
                'id_operator'       => $this->input->post('id_operator'),
                'nama_lengkap'      => $this->input->post('user_name'),
                'jenis_kelamin'     => 0,
                'id_user'           => $this->input->post('user_id'),
                'id_workcenter'     => 0,
                'id_operasi'        => 0,
                'keterangan'        => 0,
                'laporan'        => 0
            );

            $insert =  $this->curl->simple_post($this->API . '/user', $data, array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_post($this->API . '/operator', $data1, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('berhasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Insert Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        } else {
            $data = array(
                'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
                'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            );
            $this->load->view('superadmin/user', $data);
        }
    }

    public function update_operator()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'user_id'        => $this->input->post('user_id'),
                'user_name'      => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => $this->encryptIt($this->input->post('user_password')),
                'user_level'     => $this->input->post('user_level'),
                'status'         => $this->input->post('status')
            );

            $data1 = array(
                'id_operator'       => $this->input->post('id_operator'),
                'nama_lengkap'      => $this->input->post('user_name'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'id_user'           => $this->input->post('user_id'),
                'id_workcenter'     => $this->input->post('id_workcenter'),
                'id_operasi'        => $this->input->post('id_operasi'),
                'keterangan'        => $this->input->post('keterangan'),
                'laporan'        => $this->input->post('laporan')
            );
            $update =  $this->curl->simple_put($this->API . '/user', $data, array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_put($this->API . '/operator', $data1, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('berhasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Update Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        } else {
            $data = array(
                'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
                'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            );
            $this->load->view('superadmin/user', $data);
        }
    }

    public function create_planner()
    {
        if (isset($_POST['submit'])) {
            $user_id = $this->input->post('user_id');
            $data = array(
                'user_id'        => $user_id,
                'user_name'      => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => $this->encryptIt($this->input->post('user_password')),
                'user_level'     => $this->input->post('user_level'),
                'status'         => $this->input->post('status')
            );

            $data1 = array(
                'id_planner'       => $this->input->post('id_planner'),
                'nama_lengkap'      => $this->input->post('user_name'),
                'jenis_kelamin'     => 0,
                'id_user'           => $user_id
            );

            $insert =  $this->curl->simple_post($this->API . '/user', $data, array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_post($this->API . '/planner', $data1, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('berhasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Insert Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        } else {
            $data = array(
                'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
                'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            );
            $this->load->view('superadmin/user', $data);
        }
    }

    public function update_planner()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'user_id'        => $this->input->post('user_id'),
                'user_name'      => $this->input->post('user_name'),
                'user_email'     => $this->input->post('user_email'),
                'user_password'  => $this->encryptIt($this->input->post('user_password')),
                'user_level'     => $this->input->post('user_level'),
                'status'         => $this->input->post('status')
            );

            $data1 = array(
                'id_planner'       => $this->input->post('id_planner'),
                'nama_lengkap'      => $this->input->post('user_name'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'id_user'           => $this->input->post('user_id')
            );
            $update =  $this->curl->simple_put($this->API . '/user', $data, array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_put($this->API . '/planner', $data1, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('berhasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Update Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        } else {
            $data = array(
                'data_operator' => json_decode($this->curl->simple_get($this->API . '/operator')),
                'data_leader' => json_decode($this->curl->simple_get($this->API . '/leader')),
            );
            $this->load->view('superadmin/user', $data);
        }
    }

    public function delete_leader($id)
    {
        if (empty($id)) {
            redirect('superadmin/crud_data/user');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/leader', array('id_user' => $id), array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_delete($this->API . '/user', array('user_id' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Delete Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        }
    }

    public function delete_operator($id)
    {
        if (empty($id)) {
            redirect('superadmin/crud_data/user');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/operator', array('id_user' => $id), array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_delete($this->API . '/user', array('user_id' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Delete Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        }
    }

    public function delete_planner($id)
    {
        if (empty($id)) {
            redirect('superadmin/crud_data/user');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/planner', array('id_user' => $id), array(CURLOPT_BUFFERSIZE => 10));
            $this->curl->simple_delete($this->API . '/user', array('user_id' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('gagal', 'Delete Data Gagal');
            }
            redirect('superadmin/crud_data/user');
        }
    }
    public function encryptIt($q)
    {
        $cryptKey  = '1212';
        $qEncoded      = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    public function decryptIt($q)
    {
        $cryptKey  = '1212';
        $qDecoded      = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($qDecoded);
    }
}
