<?php

class Model_transaksi extends CI_Model
{
  public function getData()
  {
    return $this->db->query("SELECT tb_transaksi.*, tb_customer.*, tb_mobil.* FROM tb_transaksi
    INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer
    INNER JOIN tb_mobil ON tb_transaksi.id_mobil = tb_mobil.id_mobil
     ")->result_array();
  }
  public function getDataById($id)
  {
    return $this->db->query("SELECT tb_transaksi.*, tb_customer.*, tb_mobil.* FROM tb_transaksi
    INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer
    INNER JOIN tb_mobil ON tb_transaksi.id_mobil = tb_mobil.id_mobil
    WHERE tb_transaksi.id_customer = $id  ORDER BY tb_transaksi.id_rental DESC
     ")->result_array();
  }
  public function getTransaksiBatalById($id)
  {
    return $this->db->query("SELECT tb_transaksi.*, tb_customer.*, tb_mobil.* FROM tb_transaksi
    INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer
    INNER JOIN tb_mobil ON tb_transaksi.id_mobil = tb_mobil.id_mobil
    WHERE tb_transaksi.id_rental = $id 
     ")->row_array();
  }
  public function getDataRental($id, $id_customer)
  {
    return $this->db->query("SELECT tb_transaksi.*, tb_customer.*, tb_mobil.* FROM tb_transaksi
    INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer
    INNER JOIN tb_mobil ON tb_transaksi.id_mobil = tb_mobil.id_mobil
    WHERE tb_transaksi.id_rental = $id AND tb_transaksi.id_customer = $id_customer
     ")->row_array();
  }
  public function insertData($data)
  {
    return $this->db->insert('tb_transaksi', $data);
  }
  public function updateData($data)
  {
    $this->db->set('bukti_pembayaran', $data['bukti_pembayaran']);
    $this->db->where('id_rental', $data['id_rental']);
    return $this->db->update('tb_transaksi');
  }
  public function get_image($id)
  {
    $this->db->where('id_rental', $id);
    return $this->db->get('tb_transaksi');
  }
  public function getTransaksiById($id)
  {
    return $this->db->query("SELECT tb_transaksi.*, tb_customer.*, tb_mobil.* FROM tb_transaksi
    INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer
    INNER JOIN tb_mobil ON tb_transaksi.id_mobil = tb_mobil.id_mobil
    WHERE tb_transaksi.id_rental = $id 
     ")->row_array();
  }
  public function updateTransaksi($data)
  {
    $this->db->set('tgl_pengembalian', $data['tgl_pengembalian']);
    $this->db->set('total_denda', $data['total_denda']);
    $this->db->set('status_pengembalian', $data['status_pengembalian']);
    $this->db->set('status_rental', $data['status_rental']);
    $this->db->where('id_rental', $data['id_rental']);
    return $this->db->update('tb_transaksi');
  }
}
