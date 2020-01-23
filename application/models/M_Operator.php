<?php
class M_Operator extends CI_Model
{
    public function get_operator($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('tbl_operator', array('id_user' => $a));
        return $query;
    }

    public function get_operator1($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('tbl_operator', array('id_user' => $a));
        return $query->result();
    }

    public function get_join($a)
    {
        $this->db->select('p.nama_lengkap, p.id_workcenter, p.id_user, p.id_operator, p.id_operasi, p.jenis_kelamin, p.keterangan, p.laporan, c.nama_operasi, c.plan_start_date');
        $this->db->from('tbl_operator p');
        $this->db->join('tbl_criteria c', 'p.id_operasi = c.id');
        $this->db->where('p.id_user', $a);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_join1($a)
    {
        $this->db->select('p.nama_lengkap, p.id_workcenter, p.id_user, l.id_laporan, l.id_leader');
        $this->db->from('tbl_operator p');
        $this->db->join('tbl_laporan l', 'p.id_user = l.id_user');
        $this->db->where('p.id_user', $a);
        $query = $this->db->get();
        return $query->result();
    }
}
