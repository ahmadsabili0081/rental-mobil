<?php

class Customer extends CI_Controller
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
    $data['title'] = "Halaman Customer";
    $data['customer'] = $this->Model_user->getData();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/customer/index', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahDataCustomer()
  {
    $data['title'] = "Halaman Tambah Customer";
    $this->form_validation->set_rules('nama_customer', 'Nama Lengkap', 'required', array(
      'required' => "Kolom Nama Lengkap Harus Terisi!"
    ));
    $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email|is_unique[tb_customer.username]', array(
      'required' => "Kolom Username Harus Terisi!",
      'valid_email' => "Kolom Username Harus Valid!",
      'is_unique' => "Kolom Username Yang Anda Masukan Sudah Terdaftar!"
    ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
      'required' => "Kolom Alamat Lengkap Harus Terisi!"
    ));
    $this->form_validation->set_rules('no_telp', 'No.Telephone', 'required|numeric', array(
      'required' => "Kolom No.Telephone Harus Terisi!",
      'numeric' => "Kolom No.Telephone Harus Angka!"
    ));
    $this->form_validation->set_rules('no_ktp', 'No.KTP', 'required', array(
      'required' => "Kolom No.KTP Harus Terisi!"
    ));
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', array(
      'required' => "Kolom Password Harus Terisi!",
      'matches' => "Kolom Password Harus Sama Dengan Confirm Password"
    ));
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', array(
      'required' => "Kolom Password Harus Terisi!",
      'matches' => "Kolom Confirm Password Harus Sama Dengan Password"
    ));

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/customer/tambahCustomer', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'nama_customer' => htmlspecialchars($this->input->post('nama_customer'), true),
        'username' => htmlspecialchars($this->input->post('username'), true),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'alamat' => htmlspecialchars($this->input->post('alamat'), true),
        'jk' => $this->input->post('jk'),
        'no_telp' => $this->input->post('no_telp'),
        'no_ktp' => $this->input->post('no_ktp'),
        'gambar' => ($this->input->post('jk') == "Laki-Laki" ? "default.jpg" : "default2.jpg"),
        'id_role' => 2
      ];
      $this->Model_user->insertData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Menambahkan Data!
      </div>');
      redirect('customer');
    }
  }
  public function editData($id)
  {
    $data['title'] = "Halaman Edit Customer";
    $data['customerById'] = $this->Model_user->getDataById($id);
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', array(
      'required' => "Kolom Nama Lengkap Harus Terisi!"
    ));
    $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email', array(
      'required' => "Kolom Username Harus Terisi!",
      'valid_email' => "Kolom Username Harus Valid!",
    ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
      'required' => "Kolom Alamat Lengkap Harus Terisi!"
    ));
    $this->form_validation->set_rules('no_telp', 'No.Telephone', 'required|numeric', array(
      'required' => "Kolom No.Telephone Harus Terisi!",
      'numeric' => "Kolom No.Telephone Harus Angka!"
    ));
    $this->form_validation->set_rules('no_ktp', 'No.KTP', 'required', array(
      'required' => "Kolom No.KTP Harus Terisi!"
    ));

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/customer/editData', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $uploads = $_FILES['gambar']['name'];
      $newUploads = null;
      if ($uploads) {
        $config['upload_path'] = './assets/images/profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
        $config['max_size']     = 2048;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
          $path = FCPATH . "./assets/images/profile/" . $data['customerById']['gambar'];
          if (($data['customerById']['gambar'] != "default.jpg") || ($data['customerById']['gambar'] != "default2.jpg")) {
            unlink($path);
          }
          $newUploads = $this->upload->data('file_name');
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        $newUploads = $data['customerById']['gambar'];
      }
      $data = [
        'id_customer' => $id,
        'nama' => htmlspecialchars($this->input->post('nama_customer'), true),
        'username' => htmlspecialchars($this->input->post('username'), true),
        'alamat' => htmlspecialchars($this->input->post('alamat'), true),
        'jk' => $this->input->post('jk'),
        'no_telp' => $this->input->post('no_telp'),
        'no_ktp' => $this->input->post('no_ktp'),
        'gambar' => $newUploads,
      ];
      $this->Model_user->updateData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Mengedit Data!
      </div>');
      redirect('customer');
    }
  }
  public function hapusData()
  {
    $id  = $_POST['id'];
    $this->db->where('id_customer', $id);
    $this->db->delete('tb_customer');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda berhasil Menghapus Data!
    </div>');
  }
}
