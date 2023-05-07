<?php
class Laporan extends CI_Controller
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
    $this->load->model('Model_laporan');
  }
  public function index()
  {
    $data['title'] = "Halaman Laporan";
    $dari = $this->input->post('tgl_rental');
    $sampai = $this->input->post('tgl_pengembalian');
    if (empty($dari) || empty($sampai)) {
      $dari = date('Y-m-01');
      $sampai = date('Y-m-t');
    }
    $this->form_validation->set_rules('tgl_rental', 'Tanggal Rental', 'required', array(
      'required' => "Kolom Tanggal Rental Harus Terisi!"
    ));
    $this->form_validation->set_rules('tgl_pengembalian', 'Tanggal Pengembalian', 'required', array(
      'required' => "Kolom Tanggal Pengembalian Harus Terisi!"
    ));
    $data['laporan'] = $this->Model_laporan->getData($dari, $sampai);
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/laporan/index', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/laporan/index', $data);
      $this->load->view('admin/templates/footer');
    }
  }
}
