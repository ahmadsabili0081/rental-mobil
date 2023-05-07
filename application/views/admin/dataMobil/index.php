<div class="row">
  <div class="col-md-12">
    <a class="btn btn-primary mb-4" href="<?= base_url('dataMobil/tambahData'); ?>">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3 alert alert-primary">
        <h3 class="m-0 font-weight-bold text-dark">Data Mobil</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Type</th>
                <th class="text-center">Nama Mobil</th>
                <th class="text-center">Nopol</th>
                <th class="text-center">Warna</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">Status</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($mobil as $mobil) :  ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $mobil['kode_type']; ?></td>
                  <td><?= $mobil['nama']; ?></td>
                  <td><?= $mobil['nopol']; ?></td>
                  <td><?= $mobil['warna']; ?></td>
                  <td><?= $mobil['tahun']; ?></td>

                  <td class="text-center">
                    <?php if ($mobil['status'] == 1) : ?>
                      <span class="badge badge-success">Tersedia</span>
                    <?php else : ?>
                      <span class="badge badge-danger">Tidak Tersedia</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <img style="width:100px; height:100px" class="img-thumbnail" src="<?= base_url('assets/images/') . $mobil['gambar']; ?>">
                  </td>
                  <td>
                    <a class="btn btn-sm btn-success" href="<?= base_url('DataMobil/DetailMobil/') . $mobil['id_mobil']; ?>"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-sm btn-danger hapus-produk" data-toggle="modal" data-target="#deleteModal" href="<?= base_url('DataMobil/hapusMobil/') . $mobil['id_mobil']; ?>"><i class="fas fa-trash"></i></a>
                    <a class="btn btn-sm btn-primary" href="<?= base_url('DataMobil/EditData/') . $mobil['id_mobil']; ?>"><i class="fas fa-edit"></i></a>
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

<!-- Modal konfirmasi penghapusan data -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <a href="<?= base_url('DataMobil/hapusMobil/') . $mobil['id_mobil']; ?>" class="btn btn-danger" id="btn-delete">Hapus</a>
      </div>
    </div>
  </div>
</div>