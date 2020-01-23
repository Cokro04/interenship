<?php
class Login_model extends CI_Model{

  function validate($email,$password){
    $this->db->where('user_name',$email);
    $this->db->where('user_password',$password);
    $result = $this->db->get('tbl_users');
    return $result;
  }

}
