<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    table {
      width: 100%;
    }

    th {
      width: 30%;
    }

    td,
    tr,
    th {
      padding: 5px;
    }
  </style>
</head>

<body>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <u>
            <h3 class="text-center">INVOICE PEMBAYARAN</h3>
          </u>
          <br>
          <br>
          <br>
          <div class="col-md-8">
            <table>
              <tr>
                <th>Nama Customer</th>
                <td>:</td>
                <td><?= $transaksi['nama_customer']; ?></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>:</td>
                <td><?= $transaksi['alamat']; ?></td>
              </tr>
              <tr>
                <th>No. Telephone</th>
                <td>:</td>
                <td><?= $transaksi['no_telp']; ?></td>
              </tr>
              <tr>
                <th>No. KTP</th>
                <td>:</td>
                <td><?= $transaksi['no_ktp']; ?></td>
              </tr>
            </table>
          </div>
          <br>
          <br>
          <div class="card">
            <div class="card-header alert alert-success">
              <h6>Invoice Pembayaran Anda</h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th>Merk Mobil</th>
                  <td>:</td>
                  <td><?= $transaksi['nama']; ?></td>
                </tr>
                <tr>
                  <th>Tanggal Rental</th>
                  <td>:</td>
                  <td><?= date('d/m/Y', strtotime($transaksi['tgl_rental'])); ?></td>
                </tr>
                <tr>
                  <th>Tanggal Kembali</th>
                  <td>:</td>
                  <td><?= date('d/m/Y', strtotime($transaksi['tgl_kembali'])); ?></td>
                </tr>
                <tr>
                  <th>Harga Sewa/Hari</th>
                  <td>:</td>
                  <td>Rp. <?= number_format($transaksi['harga']); ?></td>
                </tr>
                <?php
                $selisihHari = (strtotime($transaksi['tgl_rental']) - strtotime($transaksi['tgl_kembali'])) / (60 * 60 * 24);
                ?>
                <tr>
                  <th>Jumlah Hari Sewa</th>
                  <td>:</td>
                  <td><?= abs($selisihHari); ?> Hari</td>
                </tr>
                <tr>
                  <th>Jumlah Pembayaran</th>
                  <td>:</td>
                  <td><span>Rp. <?= number_format((abs($selisihHari) * $transaksi['harga'])); ?></span></td>
                </tr>
              </table>
            </div>
          </div>
          <br>
          <br>
          <br>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header alert alert-success">
                <h6 class="text-center">Informasi Pembayaran</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><span class="text-primary">Silahkan Melakukan Pembayaran Melalui Nomor Rekening dibawah ini :</span></li>
                      <li class="list-group-item">BANK BCA 3719837212</li>
                      <li class="list-group-item">BANK BRI 3781092881</li>
                      <li class="list-group-item">BANK BJB 1273940321</li>
                      <li class="list-group-item">BANK MANDIRI 9827317318</li>
                    </ul>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.print();
    setTimeout(() => {
      history.back();
    }, 500)
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>