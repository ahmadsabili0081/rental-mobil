<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    $transaksiChart = $this->Model_user->getDataTransaksiChart();
    // inisialisasi variabel labels dan data  
    $labels = array();
    $data = array();

    // loop data transaksi bulanan dan masukkan ke variabel labels dan data
    foreach ($transaksiChart as $transaksi) {
      $labels[] = date("F", mktime(0, 0, 0, $transaksi['bulan'], 1));
      $totalTrans[] = $transaksi['total_transaksi'];
    }

    // siapkan data untuk chart
    $chartData = array(
      'labels' => $labels,
      'datasets' => array(
        array(
          'label' => 'Transaksi Terbanyak',
          'data' => $totalTrans,
          'fill' => true,
          'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
          'borderColor' => 'rgba(75, 192, 192, 1)',
          'borderWidth' => 1
        )
      )
    );

    $donut = $this->Model_user->getDataMobilDonut();
    $tersedia  = 0;
    $tidakTersedia = 0;
    foreach ($donut as $donutChart) {
      if ($donutChart['status'] == '1') {
        $tersedia++;
      } else {
        $tidakTersedia++;
      }
    }
    $chart_data = array(
      'labels' => array('Tersedia', 'Tidak Tersedia'),
      'datasets' => array(
        array(
          'label' => 'Jumlah Mobil',
          'data' => array($tersedia, $tidakTersedia),
          'backgroundColor' => array('#007bff', '#dc3545')
        )
      )
    );
    $data['title'] = "Halaman Dashboard";
    $data['user'] = $this->Model_user->getDataCard();
    $data['transaksi'] = $this->Model_user->getDataTransaksi();
    $data['mobil'] = $this->Model_user->getDataMobilCard();
    $data['chartData'] = json_encode($chartData);
    $data['chart_data'] = json_encode($chart_data);
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/templates/footer');
  }
  public function logout()
  {
    $this->session->unset_userdata('nama_customer');
    $this->session->unset_userdata('id_customer');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('gambar');
    $this->session->unset_userdata('id_role');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda berhasil Logout!
    </div>');
    redirect('auth');
  }
}
