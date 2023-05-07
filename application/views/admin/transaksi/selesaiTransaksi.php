<?php
echo var_dump($transaksi['tgl_kembali']);
?>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header alert-primary">
        <h3 class="text-dark">Halaman Selesai Transaksi</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('transaksi/konfirmasiTransaksi/') . $transaksi['id_rental']; ?>" method="post">
          <input type="hidden" name="id_rental" value="<?= $transaksi['id_rental']; ?>">
          <input type="hidden" name="tgl_kembali" value="<?= $transaksi['tgl_kembali']; ?>">
          <input type="hidden" name="denda" value="<?= $transaksi['denda']; ?>">
          <input type="hidden" name="id_mobil" value="<?= $transaksi['id_mobil']; ?>">
          <div class="form-group">
            <label for="tanggal pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tgl_pengembalian" class="form-control" placeholder="Tanggal Pengembalian...">
          </div>
          <div class="form-group">
            <label for="status_pengembalian">Status Pengembalian</label>
            <select name="status_pengembalian" class="form-control">
              <option selected>--Pilih Status Pengembalian--</option>
              <option value="0">Belum Selesai</option>
              <option value="1">Selesai</option>
            </select>
            <?= form_error('status_pengembalian', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tanggal status_rental">Status Rental</label>
            <select name="status_rental" class="form-control">
              <option selected>--Pilih Status Rental--</option>
              <option value="0">Belum Kembali</option>
              <option value="1">Sudah Kembali</option>
            </select>
            <?= form_error('status_rental', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <a href="<?= base_url('transaksi'); ?>" class="btn btn-warning">Kembali</a>
          <button class="btn btn-primary" type="submit">Selesai Transaksi</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>