<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $id_role = $this->session->userdata('id_role');
    if ($id_role == "1" && $id_role != null) {
      redirect('admin');
    }
    if ($id_role == "2" && $id_role != null) {
      redirect('dashboard');
    }
  }
  public function index()
  {
    $data['title'] = "Halaman Login";
    $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email', array(
      'required' => "Kolom Username Harus Terisi!",
      'valid_email' => "Kolom Username Harus Email!"
    ));
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]', array(
      'required' => "Kolom Password Harus Terisi!",
      'min_length' => "Kolom Password Panjang Minimal 3 Karakter!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/templates/header', $data);
      $this->load->view('auth/index');
      $this->load->view('auth/templates/footer');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $userVerified = $this->Model_auth->getUser($username);
      if ($userVerified['username']) {
        if (password_verify($password, $userVerified['password'])) {
          $user = array(
            'id_customer' => $userVerified['id_customer'],
            'nama_customer' => $userVerified['nama_customer'],
            'id_role' => $userVerified['id_role'],
            'username' => $userVerified['username'],
            'gambar' => $userVerified['gambar'],
          );
          $this->session->set_userdata($user);
          if ($userVerified['id_role'] == "1") {
            redirect('admin');
          } else {
            redirect('dashboard');
          }
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password Yang Anda Masukkan Tidak Terdaftar!
          </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Username Yang Anda Masukkan Tidak Terdaftar!
        </div>');
        redirect('auth');
      }
    }
  }
  public function registration()
  {
    $data['title'] = "Halaman Register";
    $this->form_validation->set_rules('nama_customer', 'Nama Lengkap', 'required', array(
      'required' => "Kolom Nama Lengkap Harus Terisi!"
    ));
    $this->form_validation->set_rules('username', 'Username', 'required|valid_email|trim|is_unique[tb_customer.username]', array(
      'required' => "Kolom Nama Lengkap Harus Terisi!",
      'valid_email' => "Kolom Username Tidak Valid!",
      'is_unique' => "Kolom Username Sudah Pernah Terdaftar!"
    ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
      'required' => "Kolom Alamat Lengkap Harus Terisi!"
    ));
    $this->form_validation->set_rules('no_telp', 'No.Telephone', 'required|numeric', array(
      'required' => "Kolom No.Telephone Harus Terisi!",
      'numeric' => "Kolom No.Telephone Harus Bertipe Angka!"
    ));
    $this->form_validation->set_rules('no_ktp', 'NO.KTP', 'required|numeric', array(
      'required' => "Kolom No.KTP Harus Terisi!",
      'numeric' => "Kolom No.KTP Harus Bertipe Angka!"
    ));
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', array(
      'required' => "Kolom Password Harus Terisi!",
      'matches' => " Password Tidak Sama Dengan Confirm Password!"
    ));
    $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]', array(
      'required' => "Kolom Confirm Password Harus Terisi!",
      'matches' => " Confirm Password Tidak Sama Dengan Password!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/templates/header', $data);
      $this->load->view('auth/registration');
      $this->load->view('auth/templates/footer');
    } else {
      $data = [
        'nama_customer' => htmlspecialchars($this->input->post('nama_customer'), true),
        'username' => htmlspecialchars($this->input->post('username'), true),
        'alamat' => htmlspecialchars($this->input->post('alamat'), true),
        'jk' => $this->input->post('jk'),
        'no_telp' => $this->input->post('no_telp'),
        'no_ktp' => $this->input->post('no_ktp'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'gambar' => ($this->input->post('jk') == "Laki-Laki" ? "default.jpg" : "default2.jpg"),
        'id_role' => 2
      ];
      $this->Model_auth->insertData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Account Berhasil Dibuat!
      </div>');
      redirect('auth');
    }
  }
}
