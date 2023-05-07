<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Tambah Data Type</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('DataType/tambahType'); ?>" method="post">
          <div class="form-group">
            <label for="kode Type">Kode Type</label>
            <input type="text" class="form-control" name="kode_type">
            <?= form_error('kode_type', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="kode Type">Nama Type</label>
            <input type="text" class="form-control" name="nama_type">
            <?= form_error('nama_type', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <button class="btn btn-primary" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>