<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-header">
        <h4>Laporan Rental</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('laporan'); ?>" method="post">
          <div class="form-group">
            <label for="tgl_rental">Tanggal Rental</label>
            <input type="date" name="tgl_rental" class="form-control">
            <?= form_error('tgl_rental', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tgl_pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tgl_pengembalian" class="form-control">
            <?= form_error('tgl_pengembalian', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <a class="btn btn-warning" href="<?= base_url('admin'); ?>">Kembali</a>
          <button class="btn btn-primary" type="submit"><i class="fas fa-eye"></i> Lihat Laporan</button>
        </form>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Customer</th>
                <th class="text-center">Nama Mobil</th>
                <th class="text-center">Tanggal Rental</th>
                <th class="text-center">Tanggal Kembali</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Denda</th>
                <th class="text-center">Total Denda</th>
                <th class="text-center">Tanggal Pengembalian</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($laporan as $laporan) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $laporan['nama_customer']; ?></td>
                  <td><?= $laporan['nama']; ?></td>
                  <td><?= date('d-m-Y', strtotime($laporan['tgl_rental'])); ?></td>
                  <td><?= date('d-m-Y', strtotime($laporan['tgl_kembali'])); ?></td>
                  <td>Rp. <?= number_format($laporan['harga']); ?></td>
                  <td>Rp. <?= number_format($laporan['denda']); ?></td>
                  <td>Rp. <?= number_format($laporan['total_denda']); ?></td>
                  <td><?= date('d-m-Y', strtotime($laporan['tgl_pengembalian'])); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>