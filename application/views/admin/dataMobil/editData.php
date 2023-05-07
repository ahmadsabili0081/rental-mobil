<div class="row mb-5">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Data Mobil</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('DataMobil/EditData/') . $getMobilById['id_mobil']; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="type_mobil">Type Mobil</label>
            <select name="id_type" class="form-control">
              <option selected>--Pilih Type Mobil--</option>
              <?php foreach ($type as $typeMobil) :  ?>
                <?php if (ucwords($typeMobil['id_type']) == ucwords($getMobilById['id_type'])) :  ?>
                  <option value="<?= $typeMobil['id_type']; ?>" selected><?= $typeMobil['nama_type']; ?></option>
                <?php else : ?>
                  <option value="<?= $typeMobil['id_type'] ?>"><?= $typeMobil['nama_type']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <?= form_error('id_type', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="Nama Mobil">Nama Mobil</label>
            <input type="text" class="form-control" value="<?= $getMobilById['nama']; ?>" placeholder="Nama Mobil.." name="nama">
            <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nopol">Nopol</label>
            <input type="text" value="<?= $getMobilById['nopol']; ?>" class="form-control" placeholder="nopol..." name="nopol">
            <?= form_error('nopol', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" value="<?= $getMobilById['warna']; ?>" placeholder="warna..." name="warna">
            <?= form_error('warna', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <select name="tahun" class="form-control">
              <option selected>--Pilih Tahun--</option>
              <?php for ($no = 2015; $no <= intval(date('Y')); $no++) : ?>
                <?php if ($getMobilById['tahun'] == $no) :  ?>
                  <option value="<?= $getMobilById['tahun']; ?>" selected><?= $getMobilById['tahun']; ?></option>
                <?php else : ?>
                  <option value="<?= $no; ?>"><?= $no; ?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url() . "assets/images/$getMobilById[gambar]";  ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file mt-4">
                    <input type="file" class="custom-file-input" name="gambar">
                    <label class="custom-file-label" for="Image"><?= $getMobilById['gambar']; ?></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
              <?php if (intval($getMobilById['status']) ==  1) : ?>
                <option value="1" selected>Tersedia</option>
                <option value="0">Tidak Tersedia</option>
              <?php else :  ?>
                <option value="1">Tersedia</option>
                <option value="0" selected>Tidak Tersedia</option>
              <?php endif; ?>
            </select>
          </div>
          <a class="btn btn-danger" href="<?= base_url('DataMobil'); ?>">Kembali</a>
          <button class="btn btn-primary" type="submit">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>