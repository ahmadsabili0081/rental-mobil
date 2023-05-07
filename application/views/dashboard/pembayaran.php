<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header alert alert-success">
          <h6>Invoice Pembayaran Anda</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <td>Merk Mobil</td>
                <td>:</td>
                <td><?= $transaksi['nama']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Rental</td>
                <td>:</td>
                <td><?= date('d/m/Y', strtotime($transaksi['tgl_rental'])); ?></td>
              </tr>
              <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td><?= date('d/m/Y', strtotime($transaksi['tgl_kembali'])); ?></td>
              </tr>
              <tr>
                <td>Harga Sewa/Hari</td>
                <td>:</td>
                <td>Rp. <?= number_format($transaksi['harga']); ?></td>
              </tr>
              <?php
              $selisihHari = (strtotime($transaksi['tgl_rental']) - strtotime($transaksi['tgl_kembali'])) / (60 * 60 * 24);
              ?>
              <tr>
                <td>Jumlah Hari Sewa</td>
                <td>:</td>
                <td><?= abs($selisihHari); ?> Hari</td>
              </tr>
              <tr>
                <td>Jumlah Pembayaran</td>
                <td>:</td>
                <td><span class="btn btn-success">Rp. <?= number_format((abs($selisihHari) * $transaksi['harga'])); ?></span></td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td><a href="<?= base_url('dashboard/printInvoice/') . $transaksi['id_rental']; ?>" class="btn btn-primary">Print Invoice</a></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header alert alert-success">
          <h6 class="text-center">Informasi Pembayaran</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="text-primary">Silahkan Melakukan Pembayaran Melalui Nomor Rekening dibawah ini :</span></li>
                <li class="list-group-item">BANK BCA 3719837212</li>
                <li class="list-group-item">BANK BRI 3781092881</li>
                <li class="list-group-item">BANK BJB 1273940321</li>
                <li class="list-group-item">BANK MANDIRI 9827317318</li>
              </ul>
              <?php if ($transaksi['bukti_pembayaran'] == null) : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-block btn-danger mt-4" data-toggle="modal" data-target="#exampleModal">
                  Upload Bukti Pembayaran
                </button>
              <?php else : ?>
                <?php if ($transaksi['status_pembayaran'] == "0") : ?>
                  <button class="btn btn-block btn-warning mt-4 " type="submit"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
                <?php else : ?>
                  <button class="btn btn-block btn-success mt-4" type="submit"><i class="fa fa-check"></i> Transaksi Selesai</button>
                <?php endif; ?>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" style="margin-top: 10%;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header alert alert-success">
        <h5 class="modal-title" id="exampleModalLabel">Upload Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('dashboard/uploadsGambar/') . $transaksi['id_rental']; ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="upload bukti pembayaran">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="form-control">
            <?= form_error('bukti_pembayaran', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>