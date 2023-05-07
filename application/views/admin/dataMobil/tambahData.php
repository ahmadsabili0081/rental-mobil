<div class="row mb-5">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert alert-primary">
        <h4 class="text-dark">Tambah Data Mobil</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('DataMobil/tambahData'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="type_mobil">Type Mobil</label>
            <select name="id_type" class="form-control">
              <option selected>--Pilih Type Mobil--</option>
              <?php foreach ($type as $typeMobil) :  ?>
                <option value="<?= $typeMobil['id_type'] ?>"><?= $typeMobil['nama_type']; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('id_type', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="Nama Mobil">Nama Mobil</label>
            <input type="text" class="form-control" placeholder="Nama Mobil.." name="nama">
            <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nopol">Nopol</label>
            <input type="text" class="form-control" placeholder="nopol..." name="nopol">
            <?= form_error('nopol', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" placeholder="warna..." name="warna">
            <?= form_error('warna', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <select name="tahun" class="form-control">
              <option selected>--Pilih Tahun--</option>
              <?php for ($no = 2015; $no <= intval(date('Y')); $no++) : ?>
                <option value="<?= $no; ?>"><?= $no; ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="gambar">
              <label class="custom-file-label" for="gambar">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
              <option selected>--Pilih Status--</option>
              <option value="Tidak Tersedia">Tidak Tersedia</option>
              <option value="Tersedia">Tersedia</option>
            </select>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" placeholder="harga..." name="harga">
            <?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="Denda">Denda</label>
            <input type="text" class="form-control" placeholder="Denda..." name="denda">
            <?= form_error('Denda', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <button class="btn btn-primary" type="submit">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>