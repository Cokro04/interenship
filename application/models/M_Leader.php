<?php
class M_Leader extends CI_Model
{
    public function get_workcenter($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('work_center', array('id_user' => $a));
        return $query;
    }

    public function get_leader($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('tbl_leader', array('id_user' => $a));
        return $query;
    }

    public function get_rangking($a)
    {
        $this->db->select('r.id_rangking, r.urutan, r.id_operasi, c.nama_operasi');
        $this->db->from('tbl_rangking r');
        $this->db->join('tbl_criteria c', 'r.id_operasi = c.id');
        $this->db->where('c.id_workcenter', $a);
        $this->db->order_by('r.urutan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_operator($a)
    {
        $this->db->where('id_workcenter', $a);
        $this->db->where('id_operasi', 0);
        $query = $this->db->get('tbl_operator');
        return $query->result();
    }

    public function get_operator_all($a)
    {
        $this->db->select('*');
        $query = $this->db->get_where('tbl_operator', array('id_workcenter' => $a));
        return $query->result();
    }
}
