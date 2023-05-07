<?php

class ModelType extends CI_Model
{
  public function getType()
  {
    return $this->db->get("tb_type")->result_array();
  }
  public function insertData($data)
  {
    return $this->db->insert('tb_type', $data);
  }
  public function getById($id)
  {
    $this->db->where('id_type', $id);
    return $this->db->get('tb_type')->row_array();
  }
  public function updateData($data)
  {
    $this->db->where('id_type', $data['id_type']);
    return $this->db->update('tb_type', $data);
  }
}
