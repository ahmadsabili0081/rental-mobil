<div class="col-lg">
  <div class="p-5">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Registration!</h1>
    </div>
    <form class="user" action="<?= base_url('auth/registration'); ?>" method="post">
      <div class="form-group row">
        <div class="col-sm mb-3 mb-sm-0">
          <input type="text" class="form-control form-control-user" name="nama_customer" placeholder="Nama Lengkap...">
          <?= form_error('nama_customer', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" name="username" placeholder="Username...">
          <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" name="alamat" placeholder="alamat...">
          <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm mb-3 mb-sm-0">
          <select name="jk" class="form-control">
            <option selected>--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm mb-3 mb-sm-0">
          <input type="text" class="form-control form-control-user" name="no_telp" placeholder="No. Telephone...">
          <?= form_error('no_telp', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" name="no_ktp" placeholder="No.KTP...">
          <?= form_error('no_ktp', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
          <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <input type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
          <?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
      </div>
      <button class="btn btn-primary btn-user btn-block" type="submit">Register Account</button>
    </form>
    <hr>
    <div class="text-center">
      <a class="small" href="forgot-password.html">Forgot Password?</a>
    </div>
    <div class="text-center">
      <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
    </div>
  </div>
</div>