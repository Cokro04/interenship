<?php
class M_Criteria extends CI_Model
{
    public function get_workcenter()
    {
        $query = $this->db->get('tbl_criteria');
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
