<?php

class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $id_customer = $this->session->userdata('id_customer');
    $id_role = $this->session->userdata('id_role');
    if ($id_customer == null) {
      redirect('auth');
    }
    if ($id_role !== "1") {
      redirect('auth');
    }
  }
  public function index()
  {
    $data['title'] = "Halaman Transaksi";
    $data['transaksi'] = $this->Model_transaksi->getData();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/transaksi/index', $data);
    $this->load->view('admin/templates/footer');
  }
  public function download($file)
  {
    $path = FCPATH . 'assets/images/pembayaran/' . $file;
    if (file_exists($path)) {
      $this->load->helper('download');
      force_download($file, file_get_contents($path));
    }
  }
  public function konfirmasiPembayaran($id)
  {
    $this->db->set('status_pembayaran', "1");
    $this->db->where('id_rental', $id);
    $this->db->update('tb_transaksi');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Pembayaran Terkonfirmasi!
    </div>');
    return redirect('transaksi');
  }
  public function konfirmasiTransaksi($id)
  {
    $data['title'] = "Halaman Selesai Transaksi";
    $data['transaksi'] = $this->Model_transaksi->getTransaksiById($id);
    $this->form_validation->set_rules('status_pengembalian', 'Status Pengembalian', 'required', array(
      'required' => "Kolom Status Pengembalian Harus Terisi",
    ));
    $this->form_validation->set_rules('status_rental', 'Status Rental', 'required', array(
      'required' => "Kolom Status Rental Harus Terisi",
    ));
    $this->form_validation->set_rules('tgl_pengembalian', 'Status Rental', 'required', array(
      'required' => "Kolom Tanggal Pengembalian  Harus Terisi",
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/transaksi/selesaiTransaksi', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $tgl_kembali = $this->input->post('tgl_kembali');
      $tgl_pengembalian = $this->input->post('tgl_pengembalian');
      $denda = $this->input->post('denda');
      $tgl_selisih = (strtotime($tgl_pengembalian) - strtotime($tgl_kembali)) / (60 * 60 * 24);
      $dendaSebenarnya  = null;
      if (intval($tgl_selisih) > 0) {
        $dendaSebenarnya = (intval($tgl_selisih) * intval($denda));
      } else {
        $dendaSebenarnya = "0";
      }
      $data = [
        'id_rental' => $id,
        'id_mobil' => $this->input->post('id_mobil'),
        'tgl_pengembalian' => $tgl_pengembalian,
        'total_denda' => $dendaSebenarnya,
        'status_pengembalian' => $this->input->post('status_pengembalian'),
        'status_rental' => $this->input->post('status_rental'),
        'status' => '1'
      ];
      $this->Mobil_model->updateDataTran($data);
      $this->Model_transaksi->updateTransaksi($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Konfirmasi Transaksi Selesai!
      </div>');
      return redirect('transaksi');
    }
  }
  // public function prosesTransaksi()
  // {

  //   $tgl_lebih = (strtotime($this->input->post('tgl_pengembalian')) - strtotime($this->input->post('tgl_kembali'))) / (60 * 60 * 24);
  //   if (intval($tgl_lebih) > 0) {
  //     echo $tgl_lebih * intval($this->input->post('denda'));
  //   } else {
  //     echo 'Tidak kena denda';
  //   }
  // }
}
