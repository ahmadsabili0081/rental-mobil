<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMobil extends CI_Controller
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
    $data['title'] = "Halaman Data Mobil";
    $data['mobil'] = $this->Mobil_model->getMobil();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/dataMobil/index', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahData()
  {
    $data['title'] = "Halaman Tambah Data";
    $data['type'] = $this->Mobil_model->getType();
    $this->form_validation->set_rules('id_type', 'Type', 'required', array(
      'required' => "Kolom Type Harus Terisi!"
    ));
    $this->form_validation->set_rules('nama', 'Nama', 'required', array(
      'required' => "Kolom Nama Harus Terisi!"
    ));
    $this->form_validation->set_rules('nopol', 'Nopol', 'required', array(
      'required' => "Kolom Nopol Harus Terisi!"
    ));
    $this->form_validation->set_rules('warna', 'Warna', 'required', array(
      'required' => "Kolom Warna Harus Terisi!"
    ));
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', array(
      'required' => "Kolom Warna Harus Terisi!",
      'numeric' => "Kolom Harga Harus Berupa Angka!"
    ));
    $this->form_validation->set_rules('denda', 'Denda', 'required|numeric', array(
      'required' => "Kolom Warna Harus Terisi!",
      'numeric' => "Kolom Denda Harus Berupa Angka!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/dataMobil/tambahData', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $uploads = $_FILES['gambar']['name'];
      $newUploads = null;
      if ($uploads) {
        $config['upload_path'] = './assets/images/'; // direktori tempat gambar akan diunggah
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // jenis file yang diperbolehkan
        $config['max_size'] = 2048; // ukuran file maksimum dalam KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
          $newUploads = $this->upload->data('file_name');
        } else {
          echo $this->upload->display_errors();
        }
      }
      $data = [
        'id_type' => $this->input->post('id_type'),
        'nama' => $this->input->post('nama'),
        'nopol' => $this->input->post('nopol'),
        'warna' => $this->input->post('warna'),
        'tahun' => $this->input->post('tahun'),
        'gambar' => $newUploads,
        'status' => ($this->input->post('status') == 'Tersedia' ? 1 : 0),
        'harga' => $this->input->post('harga'),
        'denda' => $this->input->post('denda')
      ];
      $this->Mobil_model->insertData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Menambahkan Data!
      </div>');
      redirect('DataMobil');
    }
  }
  public function EditData($id)
  {
    $data['title'] = "Halaman Edit Data Mobil";
    $data['type'] = $this->Mobil_model->getType();
    $data['getMobilById'] = $this->Mobil_model->getById($id);
    $this->form_validation->set_rules('id_type', 'Type', 'required', array(
      'required' => "Kolom Type Harus Terisi!"
    ));
    $this->form_validation->set_rules('nama', 'Nama', 'required', array(
      'required' => "Kolom Nama Harus Terisi!"
    ));
    $this->form_validation->set_rules('nopol', 'Nopol', 'required', array(
      'required' => "Kolom Nopol Harus Terisi!"
    ));
    $this->form_validation->set_rules('warna', 'Warna', 'required', array(
      'required' => "Kolom Warna Harus Terisi!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/dataMobil/editData', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $uploads = $_FILES['gambar']['name'];
      $newUploads = null;
      if ($uploads) {
        $config['upload_path'] = './assets/images/'; // direktori tempat gambar akan diunggah
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // jenis file yang diperbolehkan
        $config['max_size'] = 2048; // ukuran file maksimum dalam KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
          $gambarLama = $data['getMobilById']['gambar'];
          $path = FCPATH . './assets/images/' . $gambarLama;
          if (file_exists($path)) {
            unlink($path);
          }
          $newUploads = $this->upload->data('file_name');
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        $newUploads =  $data['getMobilById']['gambar'];
      }
      $data = [
        'id_mobil' => $id,
        'id_type' => $this->input->post('id_type'),
        'nama' => $this->input->post('nama'),
        'nopol' => $this->input->post('nopol'),
        'warna' => $this->input->post('warna'),
        'tahun' => $this->input->post('tahun'),
        'gambar' => $newUploads,
        'status' => $this->input->post('status'),
      ];
      $this->Mobil_model->updateData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Mengedit Data!
      </div>');
      redirect('DataMobil');
    }
  }
  public function DetailMobil($id)
  {
    $data['type'] = $this->Mobil_model->getType();
    $data['getMobilById'] = $this->Mobil_model->getById($id);
    $data['title'] = "Halaman Detail Mobil";
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/dataMobil/detailMobil', $data);
    $this->load->view('admin/templates/footer');
  }
  public function hapusMobil($id)
  {
    $this->db->where('id_mobil', $id);
    $this->db->delete('tb_mobil');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    Anda berhasil Menghapus Data!
    </div>');
    redirect('DataMobil');
  }
}
