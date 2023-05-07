<div class="row mb-5">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Data Customer</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('customer/editData/') . $customerById['id_customer']; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Nama lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= $customerById['nama_customer'] ?>" placeholder="Nama Lengkap.." name="nama_customer">
            <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" value="<?= $customerById['username']; ?>" readonly placeholder="Username..." name="username">
            <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="warna">Alamat</label>
            <input type="text" class="form-control" value="<?= $customerById['alamat']; ?>" placeholder="Alamat..." name="alamat">
            <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <?php $jk = ['Laki-Laki', 'Perempuan']; ?>
            <select name="jk" class="form-control">
              <?php foreach ($jk as $jk) :  ?>
                <?php if ($customerById['jk'] == $jk) : ?>
                  <option value="<?= $customerById['jk'] ?>" selected><?= $customerById['jk']; ?></option>
                <?php else : ?>
                  <option value="<?= $jk ?>"><?= $jk; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="no_telp">No.Telephone</label>
            <input type="text" class="form-control" value="<?= $customerById['no_telp'] ?>" placeholder="No.Telephone..." name="no_telp">
            <?= form_error('no_telp', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="no_ktp">No.KTP</label>
            <input type="text" class="form-control" value="<?= $customerById['no_ktp']; ?>" placeholder="No.KTP..." name="no_ktp">
            <?= form_error('no_ktp', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url() . "assets/images/profile/$customerById[gambar]";  ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar">
                    <label class="custom-file-label" for="Images"><?= $customerById['gambar'] ?></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="<?= base_url('customer'); ?>" class="btn btn-danger">Kembali</a>
          <button class="btn btn-primary" type="submit">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>