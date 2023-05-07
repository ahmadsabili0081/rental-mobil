<?php


class Mobil_model extends CI_Model
{
  public function getMobil()
  {
    return $this->db->query("SELECT tb_mobil.*, tb_type.id_type, tb_type.kode_type  FROM tb_mobil
    INNER JOIN tb_type ON tb_mobil.id_type = tb_type.id_type")->result_array();
  }
  public function getType()
  {
    return $this->db->query("SELECT * FROM tb_type")->result_array();
  }
  public function insertData($data)
  {
    return $this->db->insert('tb_mobil', $data);
  }
  public function getById($id)
  {
    return $this->db->query("SELECT tb_mobil.*, tb_type.id_type, tb_type.kode_type,tb_type.nama_type  FROM tb_mobil
    INNER JOIN tb_type ON tb_mobil.id_type = tb_type.id_type 
    WHERE tb_mobil.id_mobil = $id
    ")->row_array();
  }
  public function insertTrans($data)
  {
    return $this->db->insert('tb_transaksi', $data);
  }
  public function updateDataTran($data)
  {
    $this->db->set('status', $data['status']);
    $this->db->where('id_mobil', $data['id_mobil']);
    return $this->db->update('tb_mobil');
  }
  public function updateData($data)
  {
    $this->db->where('id_mobil', $data['id_mobil']);
    return $this->db->update('tb_mobil', $data);
  }
  public function updateDataTransaksi($data)
  {
    $this->db->set('status', $data['status']);
    $this->db->where('id_mobil', $data['id_mobil']);
    return $this->db->update('tb_mobil');
  }
  public function getMobilNew()
  {
    return $this->db->query("SELECT tb_mobil.*, tb_type.id_type, tb_type.kode_type  FROM tb_mobil
    INNER JOIN tb_type ON tb_mobil.id_type = tb_type.id_type LIMIT 3")->result_array();
  }
}
