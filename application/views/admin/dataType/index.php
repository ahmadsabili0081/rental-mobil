<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url('DataType/tambahType'); ?>" class="btn btn-primary mb-4">Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
      <div class="card-header">
        <h3>Data Type Mobil</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <th class="text-center" style="width:20px;">No</th>
              <th class="text-center">Kode Type</th>
              <th class="text-center">Nama Type</th>
              <th class="text-center">Action</th>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($type as $tipe) :  ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center"><?= $tipe['kode_type']; ?></td>
                  <td class="text-center"><?= $tipe['nama_type']; ?></td>
                  <td class="text-center">
                    <a class="btn btn-primary" href="<?= base_url('DataType/editData/') . $tipe['id_type']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger" href="<?= base_url('DataType/hapusData/') . $tipe['id_type']; ?>"><i class="fas fa-trash"></i></a>
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