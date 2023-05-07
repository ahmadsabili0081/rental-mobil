<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url('DataType/tambahType'); ?>" class="btn btn-primary mb-4">Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
      <div class="card-header">
        <h3>Data Transaksi</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <th class="text-center" style="width:20px;">No</th>
              <th class="text-center">Customer</th>
              <th class="text-center">Mobil</th>
              <th class="text-center">Tanggal Rental</th>
              <th class="text-center">Tanggal Kembali</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Denda</th>
              <th class="text-center">Tanggal Pengembalian</th>
              <th class="text-center">Total Denda</th>
              <th class="text-center">Status Pengembalian</th>
              <th class="text-center">Status Rental</th>
              <th class="text-center">Lama Sewa</th>
              <th class="text-center">Bukti Pembayaran</th>
              <th class="text-center" style="width:50px;">Action</th>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($transaksi as $tran) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $tran['nama_customer']; ?></td>
                  <td><?= $tran['nama']; ?></td>
                  <td><?= date('d/m/Y', strtotime($tran['tgl_rental'])); ?></td>
                  <td><?= date('d/m/Y', strtotime($tran['tgl_kembali'])); ?></td>
                  <td>Rp.<?= number_format($tran['harga']); ?></td>
                  <td>Rp.<?= number_format($tran['denda']); ?></td>
                  <td class="text-center">
                    <?php if ($tran['tgl_pengembalian'] == "0000-00-00") : ?>
                      <?= "-" ?>
                    <?php else : ?>
                      <?= date('d/m/Y', strtotime($tran['tgl_pengembalian'])); ?>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($tran['status'] == "0") : ?>
                      <?= "-"; ?>
                    <?php else : ?>
                      <?= "Rp. " . number_format($tran['total_denda']); ?>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($tran['status'] == "1") : ?>
                      <span class="badge badge-success p-2">Kembali</span>
                    <?php else : ?>
                      <span class="badge badge-danger p-2">Belum Kembali</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($tran['status'] == "1") : ?>
                      <span class="badge badge-success p-2">Selesai</span>
                    <?php else : ?>
                      <span class="badge badge-danger p-2">Belum Selesai</span>
                    <?php endif; ?>
                  </td>
                  <td><?= $tran['lama_sewa']; ?>/Hari</td>
                  <td class="text-center">
                    <?php if ($tran['bukti_pembayaran'] == null) :  ?>
                      <span class="badge badge-danger p-2">Belum Upload</span>
                    <?php else : ?>
                      <?php
                      $namaFile = $tran['bukti_pembayaran'];
                      $ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
                      ?>
                      <?php if ($ekstensi == "pdf") :  ?>
                        <?php if ($tran['status_pembayaran'] == "0") : ?>
                          <a class="btn btn-sm btn-success" onclick="return confirm('Apakah anda yakin ingin Mengkonfirmasi Pembayaran ?')" href="<?= base_url('transaksi/konfirmasiPembayaran/') . $tran['id_rental']; ?>"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('transaksi/download/') . $tran['bukti_pembayaran']; ?>"><i class="fas fa-download"></i></a>
                      <?php else : ?>
                        <?php if ($tran['status_pembayaran'] == "0") : ?>
                          <a class="btn btn-sm btn-success" onclick="return confirm('Apakah anda yakin ingin Mengkonfirmasi Pembayaran ?')" href="<?= base_url('transaksi/konfirmasiPembayaran/') . $tran['id_rental']; ?>"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('transaksi/download/') . $tran['bukti_pembayaran']; ?>"><i class="fas fa-download"></i></a>
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" data-image="<?= base_url('assets/images/pembayaran/' . $tran['bukti_pembayaran']); ?>"><i class="fas fa-eye"></i> </a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($tran['status'] == "1") : ?>
                      <span class="badge badge-success p-2">Transaksi Selesai</span>
                    <?php else : ?>
                      <?php if ($tran['status_pembayaran'] == "0") : ?>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                          <i class="fas fa-check"></i>
                        </button>
                      <?php else : ?>
                        <a class="btn btn-sm btn-success" href="<?= base_url('transaksi/konfirmasiTransaksi/') . $tran['id_rental']; ?>"><i class="fas fa-check"></i></a>
                      <?php endif; ?>
                      <a class="btn btn-sm btn-danger" href=""><i class="fas fa-times"></i>
                      </a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-center">Konfirmasi Pembayaran Tidak Bisa Dilakukan, Karena Bukti Pembayaran Belum Di Upload!</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h4 class="modal-title">Bukti Upload Gambar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
        <img src="" class="img-fluid" alt="Gambar">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>