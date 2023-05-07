<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataType extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/userguide3/general/urls.html
   */
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
    $data['title'] = "Halaman Data Type";
    $data['type'] = $this->ModelType->getType();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/dataType/index', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahType()
  {
    $data['title'] = "Halaman Tambah Data";
    $this->form_validation->set_rules('kode_type', 'Kode Type', 'required', array(
      'required' => "Kolom Kode Type Harus Terisi!"
    ));
    $this->form_validation->set_rules('nama_type', 'Nama Type', 'required', array(
      'required' => "Kolom Nama Type Harus Terisi!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/dataType/tambahData', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'kode_type' => $this->input->post('kode_type'),
        'nama_type' => $this->input->post('nama_type')
      ];
      $this->ModelType->insertData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Menambahkan Data!
      </div>');
      redirect('DataType');
    }
  }
  public function editData($id)
  {
    $data['title'] = "Halaman Edit Data";
    $data['typeById'] = $this->ModelType->getById($id);
    $this->form_validation->set_rules('kode_type', 'Kode Type', 'required', array(
      'required' => "Kolom Kode Type Harus Terisi!"
    ));
    $this->form_validation->set_rules('nama_type', 'Nama Type', 'required', array(
      'required' => "Kolom Nama Type Harus Terisi!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/dataType/editData', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'id_type' => $id,
        'kode_type' => $this->input->post('kode_type'),
        'nama_type' => $this->input->post('nama_type')
      ];
      $this->ModelType->updateData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Mengedit Data!
      </div>');
      redirect('DataType');
    }
  }
  public function hapusData($id)
  {
    $this->db->where('id_type', $id);
    return $this->db->delete('tb_type');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda berhasil Menghapus Data!
    </div>');
    redirect('DataType');
  }
}
