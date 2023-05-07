<div class="card-body p-0">
  <!-- Nested Row within Card Body -->
  <div class="row">
    <div class="col-lg">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Login</h1>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <form class="user" action="<?= base_url('auth'); ?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Email Address...">
            <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
            <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
          <hr>
        </form>
        <div class="text-center">
          <a class="small" href="forgot-password.html">Forgot Password?</a>
        </div>
        <div class="text-center">
          <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
        </div>
      </div>
    </div>
  </div>
</div>