<div class="row mb-5">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert alert-primary">
        <h4 class="text-dark">Tambah Data Customer</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('customer/tambahDataCustomer'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Nama lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= set_value('nama_customer') ?>" placeholder="Nama Lengkap.." name="nama_customer">
            <?= form_error('nama_customer', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" value="<?= set_value('username') ?>" placeholder="Username..." name="username">
            <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="password..." name="password">
            <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="re-type">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password..." name="password2">
            <?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="warna">Alamat</label>
            <input type="text" class="form-control" value="<?= set_value('alamat') ?>" placeholder="Alamat..." name="alamat">
            <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control">
              <option selected>--Pilih Jenis Kelamin--</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="no_telp">No.Telephone</label>
            <input type="text" class="form-control" value="<?= set_value('no_telp') ?>" placeholder="No.Telephone..." name="no_telp">
            <?= form_error('no_telp', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="no_ktp">No.KTP</label>
            <input type="text" class="form-control" value="<?= set_value('no_ktp') ?>" placeholder="No.KTP..." name="no_ktp">
            <?= form_error('no_ktp', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <button class="btn btn-primary" type="submit">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>