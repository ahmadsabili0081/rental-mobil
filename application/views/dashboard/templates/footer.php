<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-content">
          <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/car-rental-website-template/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/car-rental-website-template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script>
  let fileInput = document.querySelector('.custom-file-input');
  let labelInput = document.querySelector('.custom-file-label');

  fileInput.addEventListener('change', () => {
    let getValue = fileInput.value.split('\\').pop();
    labelInput.innerHTML = getValue;
  });
</script>

<!-- Additional Scripts -->
<script src="<?= base_url('assets/car-rental-website-template/assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/car-rental-website-template/assets/js/owl.js'); ?>"></script>
</body>

</html>