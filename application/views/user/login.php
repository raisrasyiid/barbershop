<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css');?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>TigaSodaraBarbershop</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Disini!</p>

      <form action="<?php echo site_url('main/login');?>" method="POST">
          <div class="input-group mb-3">
              <input type="text" name="Cnama" class="form-control" placeholder="Username" value="<?php echo set_value('Cnama'); ?>">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                  </div>
              </div>
          </div>
          <?php echo form_error('Cnama', '<div class="text-danger">', '</div>'); ?>
          <div class="input-group mb-3">
              <input type="password" name="Cpassword" class="form-control" placeholder="Password" value="<?php echo set_value('Cpassword'); ?>">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                  </div>
              </div>
          </div>
          <?php echo form_error('Cpassword', '<div class="text-danger">', '</div>'); ?>
          
          <?php if ($this->session->flashdata('error')): ?>
              <div class="text-danger"><?php echo $this->session->flashdata('error'); ?></div>
          <?php endif; ?>
          
          <div class="row d-flex justify-content-between">
              <div class="col-6">
                  <a href="<?=site_url('main')?>" class="btn btn-info btn-block">
                      Kembali Ke Menu
                  </a>
              </div>
              <!-- /.col -->
              <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Masuk</button>
              </div>
              <!-- /.col -->
          </div>
      </form>


      <div class="social-auth-links text-center mb-3">
        <p> Belum Punya Akun? </p>
        <a href="<?=site_url('main/viewRegister')?>">
          Register
        </a>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js');?>"></script>
</body>
</html>
