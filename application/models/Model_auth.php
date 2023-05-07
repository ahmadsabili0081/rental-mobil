<?php
class Model_auth extends CI_Model
{
  public function insertData($data)
  {
    return $this->db->insert('tb_customer', $data);
  }
  public function getUser($data)
  {
    $this->db->where('username', $data);
    return $this->db->get('tb_customer')->row_array();
  }
}
