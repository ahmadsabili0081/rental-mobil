<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Edit Data Type</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('DataType/editData/') . $typeById['id_type']; ?>" method="post">
          <div class="form-group">
            <label for="kode Type">Kode Type</label>
            <input type="text" value="<?= $typeById['kode_type'] ?>" class="form-control" name="kode_type">
            <?= form_error('kode_type', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="kode Type">Nama Type</label>
            <input type="text" value="<?= $typeById['nama_type']; ?>" class="form-control" name="nama_type">
            <?= form_error('nama_type', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <a class="btn btn-danger" href="<?= base_url('DataType'); ?>">Kembali</a>
          <button class="btn btn-primary" type="submit">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>