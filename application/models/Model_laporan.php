<?php

class Model_laporan extends CI_Model
{
  public function getData($dari, $sampai)
  {
    return $this->db->query("SELECT tb_transaksi .*, tb_mobil.*, tb_customer.* FROM tb_transaksi
    INNER JOIN tb_mobil ON tb_transaksi.id_mobil = tb_mobil.id_mobil
    INNER JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer
    WHERE tb_transaksi.tgl_rental >= '$dari'  AND tb_transaksi.tgl_pengembalian <= '$sampai' AND tb_transaksi.status_pengembalian = '1' 
    ")->result_array();
  }
}
