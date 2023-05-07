<div class="row">
  <div class="col-md-12">
    <a class="btn btn-primary mb-4" href="<?= base_url('customer/tambahDataCustomer'); ?>">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h3>Data Customer</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Username</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">No.Telphone</th>
                <th class="text-center">No.KTP</th>
                <th class="text-center">Password</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($customer as $user) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $user['nama_customer']; ?></td>
                  <td><?= ucwords($user['username']); ?></td>
                  <td><?= $user['alamat']; ?></td>
                  <td><?= $user['jk']; ?></td>
                  <td><?= $user['no_telp']; ?></td>
                  <td><?= $user['no_ktp']; ?></td>
                  <td><?= $user['password']; ?></td>
                  <td>
                    <img style="width: 150px; height:150px" src="<?= base_url('assets/images/profile/') . $user['gambar']; ?>" alt="">
                  </td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="<?= base_url('customer/editData/') . $user['id_customer']; ?>"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger hapusApaSaja" data-toggle="modal" data-target="#hapusModal" data-id="<?= $user['id_customer']; ?>"><i class="fas fa-trash"></i></button>

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

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btnHapus">Hapus</button>
      </div>
    </div>
  </div>
</div>