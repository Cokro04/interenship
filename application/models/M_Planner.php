<?php
class M_Planner extends CI_Model
{

    public function getdata()
    {
        $query = $this->db->get('tbl_criteria')->result();
        return $query;
    }

    public function get_workcenter()
    {
        $query = $this->db->get('work_center');
        return $query->result();
    }

    public function rangking_where($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('tbl_rangking', array('date' => $a));
        return $query->result();
    }

    public function get_criteria($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('tbl_criteria', array('id_workcenter' => $a));
        return $query->result();
    }

    function tampil_data($a)
    {
        $this->db->query('SELECT urgensi, psd, qty, setup_time, standard_time, NOW() as tgl_sekarang, timediff(urgensi,NOW()) as urgensi1 FROM tbl_criteria1');
    }

    public function getdata1()
    {
        $query = $this->db->get('tbl_criteria');
        return $query;
    }

    public function getbycolum()
    {
        $this->db->select('dua');
        $query = $this->db->get('coba')->result();
        return $query;
    }

    public function sumdata($a)
    {
        $this->db->select_sum('urgensi', 't_dua');
        $this->db->select_sum('psd', 't_tiga');
        $this->db->select_sum('qty', 't_empat');
        $this->db->select_sum('standard_time', 't_lima');
        $this->db->select_sum('setup_time', 't_enam');
        $query = $this->db->get_where('tbl_criteria', array('id_workcenter' => $a));
        return $query->result();
    }

    // public function sumdata1()
    // {
    //     $query = $this->db->query("SELECT SUM(urgensi) as t_dua, SUM(psd) as t_tiga, SUM(qty) as t_empat , SUM(standard_time) as t_lima, SUM(setup_time) as t_enam FROM tbl_criteria")->result();
    //     return $query;
    // }

    public function maxmindata($a)
    {
        $this->db->select_max('urgensi', 'max_dua');
        $this->db->select_max('psd', 'max_tiga');
        $this->db->select_max('qty', 'max_empat');
        $this->db->select_max('standard_time', 'max_lima');
        $this->db->select_max('setup_time', 'max_enam');

        $this->db->select_min('urgensi', 'min_dua');
        $this->db->select_min('psd', 'min_tiga');
        $this->db->select_min('qty', 'min_empat');
        $this->db->select_min('standard_time', 'min_lima');
        $this->db->select_min('setup_time', 'min_enam');
        $query = $this->db->get_where('tbl_criteria', array('id_workcenter' => $a));
        return $query->result();
    }

    public function penguranganmaxmin($a)
    {
        $query = $this->db->query("SELECT MAX(urgensi)-MIN(urgensi) as hasil_dua,
        MAX(psd)-MIN(psd) as hasil_tiga,
        MAX(qty)-MIN(qty) as hasil_empat,
        MAX(standard_time)-MIN(standard_time) as hasil_lima,
        MAX(setup_time)-MIN(setup_time) as hasil_enam FROM tbl_criteria WHERE id_workcenter=$a");
        return $query->result();
    }

    public function save_batch($data)
    {
        return $this->db->insert_batch('tbl_rangking', $data);
    }

    public function cetak_rangking($a)
    {
        $this->db->select('r.id_rangking, r.urutan, r.id_operasi,r.id_workcenter,r.date, c.nama_operasi, c.id_workorder, c. plan_start_date');
        $this->db->from('tbl_rangking r');
        $this->db->join('tbl_criteria c', 'r.id_operasi = c.id');
        $this->db->where('r.date', $a);
        $this->db->order_by('r.urutan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_rangking()
    {
        $this->db->select('r.id_rangking, r.urutan, r.id_operasi,r.id_workcenter,r.date, c.nama_operasi, c.id_workorder, c. plan_start_date');
        $this->db->from('tbl_rangking r');
        $this->db->join('tbl_criteria c', 'r.id_operasi = c.id');
        $query = $this->db->get();
        return $query->result();
    }
}
