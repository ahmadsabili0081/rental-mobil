<?php

class Model_user extends CI_Model
{
  public function getData()
  {
    return $this->db->get('tb_customer')->result_array();
  }
  public function getDataCard()
  {
    return $this->db->get('tb_customer')->num_rows();
  }
  public function getDataTransaksi()
  {
    return $this->db->get('tb_transaksi')->num_rows();
  }
  public function getDataMobilCard()
  {
    return $this->db->get('tb_mobil')->num_rows();
  }
  public function insertData($data)
  {
    return $this->db->insert('tb_customer', $data);
  }
  public function getDataById($id)
  {
    $this->db->where('id_customer', $id);
    return $this->db->get('tb_customer')->row_array();
  }
  public function updateData($data)
  {
    $this->db->where('id_customer', $data['id_customer']);
    return $this->db->update('tb_customer', $data);
  }
  public function getDataTransaksiChart()
  {
    return $this->db->query('SELECT MONTH(tgl_rental) AS bulan, COUNT(*) AS total_transaksi FROM tb_transaksi GROUP BY MONTH(tgl_rental) ORDER BY MONTH(tgl_rental) ASC')->result_array();
  }
  public function getDataMobilDonut()
  {
    return $this->db->get('tb_mobil')->result_array();
  }
}
