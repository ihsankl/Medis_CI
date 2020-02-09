<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?= base_url(); ?>images/logo.svg">
              </div>
              <h4>Hello! Selamat datang.</h4>
              <h6 class="font-weight-light">Silahkan login untuk melanjutkan.</h6>
              <?php if ($this->session->flashdata('gagal_login')) : ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Login gagal! Username atau Password <?= $this->session->flashdata('gagal_login'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?= form_open('login/aksi_login', ['class' => 'pt-3']); ?>
              <div class="form-group">
                <?= form_input('user', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Username']); ?>
              </div>
              <div class="form-group">
                <?= form_password('pass', '', ['type' => 'password', 'class' => 'form-control form-control-lg', 'placeholder' => 'Password']) ?>
              </div>
              <div class="mt-3">
                <?= form_submit('submit', 'LOGIN', ['class' => 'btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn']) ?>
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                  </label>
                </div>
                <a href="#" class="auth-link text-black">Forgot password?</a>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url(); ?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url(); ?>vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>js/misc.js"></script>
  <!-- endinject -->
</body>

</html>