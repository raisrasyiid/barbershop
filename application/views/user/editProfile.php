<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tigasodara Barbershop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/logo.png" rel="icon'); ?>">
  <link href="<?php echo base_url('assets/logo.png" rel="logo'); ?>">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/animate.css/animate.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/user/Medilab/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/user/Medilab/assets/css/style.css" rel="stylesheet'); ?>">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="javascript:void(0);" onclick="history.back();">Tigasodara Barbershop</a></h1>
      <?php if($this->session->userdata('status') == 'login'): ?>
            <a href="<?=site_url('main/profile')?>" class="appointment-btn scrollto mr-2">
                <span class="d-none d-md-inline"><i class="fas fa-user"></i></span>
            </a>
            <a href="javascript:void(0);" onclick="history.back();" class="btn btn-secondary rounded-5 mx-2">
                <span class="d-none d-md-inline"><i class="fas fa-home"></i></span>
            </a>
      <?php else: ?>
          <a href="<?=site_url('main/viewLogin')?>" class="appointment-btn scrollto">
              <span class="d-none d-md-inline">Login</span>
          </a>
      <?php endif; ?>


    </div>
  </header><!-- End Header -->
  <?php
    // Mendapatkan ID pengguna dari sesi
    $idUser = $this->session->userdata('Cnama');

    // Query untuk mendapatkan data pengguna dari tabel tbl_customer
    $this->db->select('*');
    $this->db->from('tbl_customer');
    $this->db->where('Cnama', $idUser);
    $query = $this->db->get();
    $user = $query->row_array();
?>

<main id="main">
    <section id="contact" class="contact">
        <div class="container py-5">
            <!-- Konten formulir kontak seperti yang sudah ada -->

            <!-- Tampilan profil dalam bentuk form disabled -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <form action="<?= site_url('main/saveEditProfile');?>" method="POST">
                    <input type="hidden" name="idCustomer" value="<?= $user['idCustomer'] ?>" />
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="Cnama" id="nama" class="form-control" value="<?= $user['Cnama'] ?>">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="email">Email:</label>
                                <input type="email" name="Cemail" id="email" class="form-control" value="<?= $user['Cemail'] ?>">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone">Phone:</label>
                            <input type="text" name="Ctlpn" id="phone" class="form-control" value="<?= $user['Ctlpn'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="address">Password:</label>
                            <input type="text" name="Cpassword" id="phone" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="address">Konfirmasi Password:</label>
                            <input type="text" name="Cpassword_confirm" id="phone" class="form-control">
                        </div>
                        <div class="d-grid justify-content-center mt-3">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main>


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Medilab</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Medilab</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/user/Medilab/assets/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
  <script src="<?php echo base_url('assets/user/Medilab/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/user/Medilab/assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/user/Medilab/assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/user/Medilab/assets/vendor/php-email-form/validate.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/user/Medilab/assets/js/main.js'); ?>"></script>

</body>

</html>
