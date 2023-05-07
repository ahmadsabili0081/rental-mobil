<br>
<br>
<br>
<div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center p-2">
  <div class="card mt-5 mb-4">
    <div class="card-body">
      <div class="card mb-3" style="max-width: 100%;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img width="100%" height="100%" src="<?= base_url('assets/images/') . $getMobilById['gambar']; ?>" alt="...">
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
                  <td>No.Plat Mobil</td>
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
                    <?php if ($getMobilById['status'] == "1") :  ?>
                      <div class="btn btn-primary p-1">Tersedia</div>
                    <?php else : ?>
                      <div class="btn btn-danger p-1">Tidak Tersedia</div>
                    <?php endif; ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
  </div>
</div>