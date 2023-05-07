<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Dashboard Rental Mobil";
		$data['getMobil'] = $this->Mobil_model->getMobilNew();
		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('dashboard/templates/footer', $data);
	}
	public function mobil()
	{
		$data['title'] = "Halaman Rental Mobil";
		$data['getMobil'] = $this->Mobil_model->getMobil();
		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/datamobil', $data);
		$this->load->view('dashboard/templates/footer', $data);
	}
	public function detail($id)
	{
		$data['title'] = "Dashboard Detail Mobil";
		$data['getMobilById'] = $this->Mobil_model->getById($id);
		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/detail', $data);
		$this->load->view('dashboard/templates/footer', $data);
	}
	public function tambahRental($id)
	{
		if ($this->session->userdata('id_customer') == null) {
			redirect('auth');
		}
		$data['title'] = "Sewa Mobil";
		$data['getMobilById'] = $this->Mobil_model->getById($id);
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric', array(
			'required' => "Kolom Harga Harus Terisi!",
			'numeric' => "Kolom Harga Harus Bertipe Angka!"
		));
		$this->form_validation->set_rules('denda', 'Denda', 'required|numeric', array(
			'required' => "Kolom Denda Harus Terisi!",
			'numeric' => "Kolom Denda Harus Bertipe Angka!"
		));
		if ($this->form_validation->run() == false) {
			$this->load->view('dashboard/templates/header', $data);
			$this->load->view('dashboard/rentalMobil', $data);
			$this->load->view('dashboard/templates/footer');
		} else {
			$id_customer = $this->input->post('id_customer');
			$id_mobil = $this->input->post('id_mobil');
			$tgl_rental = $this->input->post('tgl_rental');
			$tgl_kembali = $this->input->post('tgl_kembali');
			$selisihTanggal = (strtotime($tgl_rental) - strtotime($tgl_kembali)) / (60 * 60 * 24);
			$data = [
				'id_customer' => $id_customer,
				'id_mobil' => $id_mobil,
				'tgl_rental' => $this->input->post('tgl_rental'),
				'tgl_kembali' => $this->input->post('tgl_kembali'),
				'harga' => $this->input->post('harga'),
				'denda' => $this->input->post('denda'),
				'tgl_pengembalian' => "-",
				'status_pengembalian' => "0",
				'status_rental' => "0",
				'lama_sewa' => abs($selisihTanggal)
			];
			$update = [
				'status' => "0",
				'id_mobil' => $id_mobil
			];
			$this->Model_transaksi->insertData($data);
			$this->Mobil_model->updateDataTransaksi($update);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda Menyewa Mobil!
      </div>');
			redirect('dashboard/transaksi');
		}
	}
	public function transaksi()
	{
		if ($this->session->userdata('id_customer') == null) {
			redirect('auth');
		}
		$id_role = $this->session->userdata('id_role');
		if ($id_role != "2") {
			redirect('Admin');
		}
		$data['title'] = "Halaman Transaksi";
		$id_customer = $this->session->userdata('id_customer');
		$data['transaksi'] = $this->Model_transaksi->getDataById($id_customer);
		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/transaksi', $data);
		$this->load->view('dashboard/templates/footer');
	}
	public function pembayaran($id)
	{
		if ($this->session->userdata('id_customer') == null) {
			redirect('auth');
		}
		$id_role = $this->session->userdata('id_role');
		if ($id_role != "2") {
			redirect('Admin');
		}
		$data['title'] = "Halaman Pembayaran";
		$id_customer = $this->session->userdata('id_customer');
		$data['transaksi'] = $this->Model_transaksi->getDataRental($id, $id_customer);
		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/pembayaran', $data);
		$this->load->view('dashboard/templates/footer');
	}
	public function uploadsGambar($id)
	{
		if ($this->session->userdata('id_customer') == null) {
			redirect('auth');
		}
		$id_role = $this->session->userdata('id_role');
		if ($id_role != "2") {
			redirect('Admin');
		}
		$id_customer = $this->session->userdata('id_customer');
		$uploads = $_FILES['bukti_pembayaran']['name'];
		$newUploads = null;
		if ($uploads) {
			$config['upload_path'] = './assets/images/pembayaran/';
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['max_size']     = 2048;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('bukti_pembayaran')) {
				$newUploads = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Anda Gagal Mengupload Bukti Pembayaran!
			</div>');
			redirect('dashboard/transaksi');
		}
		$data = [
			'id_rental' => $id,
			'id_customer' => $id_customer,
			'bukti_pembayaran' => $newUploads
		];
		$this->Model_transaksi->updateData($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		Anda Berhasil Mengupload Bukti Pembayaran!
		</div>');
		redirect('dashboard/transaksi');
	}
	public function batalTransaksi($id)
	{
		if ($this->session->userdata('id_customer') == null) {
			redirect('auth');
		}
		$id_role = $this->session->userdata('id_role');
		if ($id_role != "2") {
			redirect('Admin');
		}
		$data['title'] = "Halaman Batal Transaksi";
		$data['transaksi'] = $this->Model_transaksi->getTransaksiBatalById($id);
		$this->db->set('status', "1");
		$this->db->where('id_mobil', $data['transaksi']['id_mobil']);
		$this->db->update('tb_mobil');
		$this->db->where('id_rental', $id);
		$this->db->delete('tb_transaksi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		Anda Berhasil Membatalkan Transaksi!
		</div>');
		redirect('dashboard/transaksi');
	}
	public function printInvoice($id)
	{
		if ($this->session->userdata('id_customer') == null) {
			redirect('auth');
		}
		$id_role = $this->session->userdata('id_role');
		if ($id_role != "2") {
			redirect('Admin');
		}
		$data['title'] = "Cetak Pembayaran";
		$id_customer = $this->session->userdata('id_customer');
		$data['transaksi'] = $this->Model_transaksi->getDataRental($id, $id_customer);
		$this->load->view('dashboard/cetakPembayaran', $data);
	}
	public function logout()
	{
		$this->session->unset_userdata('id_customer');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_customer');
		$this->session->unset_userdata('gambar');
		$this->session->unset_userdata('id_role');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Logout!
      </div>');
		redirect('dashboard');
	}
}
