<div class="row">
  <div class="col-md-12">
    <div class="card mb-3" style="max-width: 1204px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url('assets/images/') . $getMobilById['gambar']; ?>" style="width: 370px; height:100%;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <table class="table table-striped">
              <tr>
                <td>Type Mobil</td>
                <td>:</td>
                <td><?= $getMobilById['nama_type']; ?></td>
              </tr>
              <tr>
                <td>Nama Mobil</td>
                <td>:</td>
                <td><?= $getMobilById['nama']; ?></td>
              </tr>
              <tr>
                <td>No.Plat</td>
                <td>:</td>
                <td><?= $getMobilById['nopol']; ?></td>
              </tr>
              <tr>
                <td>Warna</td>
                <td>:</td>
                <td><?= $getMobilById['warna']; ?></td>
              </tr>
              <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= $getMobilById['tahun']; ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <?php if ($getMobilById['status'] == "1") : ?>
                    <span class="badge badge-primary p-2">Tersedia</span>
                  <?php else :  ?>
                    <span class="badge badge-danger p-2">Tidak Tersedia</span>
                  <?php endif; ?>
                </td>

              </tr>
            </table>
            <a href="<?= base_url('DataMobil'); ?>" class="btn btn-danger">Kembali</a>
            <a class="btn btn-primary" href="<?= base_url('DataMobil/EditData/') . $getMobilById['id_mobil']; ?>">Update Data</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>