<br>
<br>
<br>
<br>
<br>
<br>
<?php if ($transaksi == null) : ?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Anda Belum Melakukan Transaksi</h1>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<?php else : ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header alert alert-dark">
            <h4 class="text-dark">Data Transaksi</h4>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Merk Mobil</th>
                    <th class="text-center">No.Plat</th>
                    <th class="text-center">Harga Sewa</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($transaksi as $transaksi) : ?>
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td class="text-center"><?= $transaksi['nama_customer']; ?></td>
                      <td class="text-center"><?= $transaksi['nama']; ?></td>
                      <td class="text-center"><?= $transaksi['nopol']; ?></td>
                      <td class="text-center">Rp. <?= number_format($transaksi['harga']); ?></td>
                      <td class="text-center">
                        <?php if ($transaksi['status_rental'] == "1") : ?>
                          <span class="badge badge-success p-2">Transaksi Selesai</span>
                        <?php else : ?>
                          <a class="btn btn-primary" href="<?= base_url('dashboard/pembayaran/') . $transaksi['id_rental']; ?>">Cek Pembayaran</a>
                          <?php if ($transaksi['status_pembayaran'] == "1") :  ?>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                              Batal Transaksi
                            </button>
                          <?php else : ?>
                            <a class="btn btn-danger" href="<?= base_url('dashboard/batalTransaksi/') . $transaksi['id_rental']; ?>">Batal Transaksi</a>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-center">Pembatalan Transaksi Tidak Bisa Dibatalkan, Karena Bukti Pembayaran Anda Sudah Di Proses! </h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>