<br>
<br>
<br>
<br>
<?php
$id_customer = $this->session->userdata('id_customer');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Rental Mobil</h3>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-body">
          <form action="<?= base_url('dashboard/tambahRental/') . $getMobilById['id_mobil']; ?>" method="post">
            <input type="hidden" value="<?= $getMobilById['id_mobil']; ?>" name="id_mobil">
            <input type="hidden" value="<?= $id_customer; ?>" name="id_customer">
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="text" class="form-control" value="<?= $getMobilById['harga']; ?>" name="harga">
              <?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
            <div class="mb-3">
              <label for="denda" class="form-label">Denda</label>
              <input type="text" class="form-control" value="<?= $getMobilById['denda']; ?>" name="denda">
              <?= form_error('denda', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
            <div class="mb-3">
              <label for="tgl_rental" class="form-label">Tanggal Rental</label>
              <input type="date" class="form-control" name="tgl_rental">
            </div>
            <div class="mb-3">
              <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
              <input type="date" class="form-control" name="tgl_kembali">
            </div>
            <a href="<?= base_url('dashboard'); ?>" class="btn btn-warning">Kembali</a>
            <button class="btn btn-primary" type="submit">Sewa</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>