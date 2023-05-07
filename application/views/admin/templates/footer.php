</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2021</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('admin/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/sbadmin/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/sbadmin/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="<?= base_url('assets/sbadmin/vendor/chart.js/Chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/sbadmin/js/demo/datatables-demo.js'); ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/js/demo/chart-area-demo.js'); ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/js/demo/chart-pie-demo.js') ?>"></script>
<script>
  let fileInput = document.querySelector('.custom-file-input');
  let labelInput = document.querySelector('.custom-file-label');

  fileInput.addEventListener('change', () => {
    let getValue = fileInput.value.split('\\').pop();
    labelInput.innerHTML = getValue;
  });
</script>
<script>
  $('#myModal').on('show.bs.modal', function(e) {
    let image = $(e.relatedTarget).data('image');
    console.log(image);
    $(this).find('.modal-body img').attr('src', image);
  });
</script>
<script>
  $(document).on("click", "#btnHapus", function() {
    let id = $(".hapusApaSaja").data("id");
    console.log(id);
    $.ajax({
      url: "<?= base_url('customer/hapusData'); ?>",
      type: "POST",
      data: {
        id: id
      },
      success: function(response) {
        $("#hapusModal").modal("hide");
        location.reload();
      }
    });
  });
</script>
<script>
  var transaksiChart = document.getElementById("transaksiChart");

  var chartData = <?= $chartData; ?>;

  var myChart = new Chart(transaksiChart, {
    type: 'line',
    data: chartData,
    options: {
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>
<!-- donut -->
<script>
  var ctx = document.getElementById("chartDonut").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: <?= $chart_data; ?>,
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          fontColor: '#333',
          fontSize: 14
        }
      },
      animation: {
        animateScale: true,
        animateRotate: true
      },
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var value = data.datasets[0].data[tooltipItem.index];
            return label + ': ' + value;
          }
        }
      }
    }
  });
</script>
</body>

</html>