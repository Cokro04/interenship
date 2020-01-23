<?php
class Superadmin extends CI_Controller
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/spk_rest/index.php";
        $this->load->library('curl');
        $this->load->model('M_Superadmin');
    }

    public function index()
    {
        $this->load->view('superadmin/index');
    }

    public function edit_operator()
    {
        $id = $this->input->post('id');
        $data['workcenter'] = json_decode($this->curl->simple_get($this->API . '/workcenter', array('id_workcenter' => $id), array(CURLOPT_BUFFERSIZE => 10)));
        $this->load->view('planner/workcenter', $data);
    }


    public function operator($id)
    {
        $data = array(
            'operator' => $this->M_Superadmin->get_operator1(),
            'id_workcenter' => $id,
        );
        $this->load->view('superadmin/pilih_operator', $data);
    }

    public function leader($id)
    {
        $data = array(
            'leader' => $this->M_Superadmin->get_leader(),
            'id_workcenter' => $id,
        );
        $this->load->view('superadmin/pilih_leader', $data);
    }

    public function edit()
    {
        $data = array(
            "id_workcenter" => $this->input->post('id_workcenter'),
        );
        $this->db->where('id_operator', $_POST['id_operator']);
        $this->db->update('tbl_operator', $data);
        redirect('superadmin/crud_data/index');
    }

    public function pilih_leader()
    {
        $data = array(
            "id_workcenter" => $this->input->post('id_workcenter'),
        );
        $this->db->where('id_leader', $_POST['id_leader']);
        $this->db->update('tbl_leader', $data);
        redirect('superadmin/crud_data/index');
    }

    // public function encryptIt($q)
    // {
    //     $cryptKey  = '1212';
    //     $qEncoded      = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    //     return ($qEncoded);
    // }

    // public function decryptIt($q)
    // {
    //     $cryptKey  = '1212';
    //     $qDecoded      = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    //     return ($qDecoded);
    // }
}
