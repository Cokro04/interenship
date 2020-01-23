<?php
class M_Superadmin extends CI_Model
{
    public function get_operator()
    {
        $query = $this->db->get('tbl_operator');
        return $query->result();
    }

    public function get_operator1()
    {
        $this->db->where('id_workcenter', 0);
        $query = $this->db->get('tbl_operator');
        return $query->result();
    }

    public function get_leader()
    {
        $this->db->where('id_workcenter', 0);
        $query = $this->db->get('tbl_leader');
        return $query->result();
    }

    public function get_rangking()
    {
        $query = $this->db->get('tbl_criteria');
        return $query->result();
    }

    public function get_user()
    {
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function edit_data($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
