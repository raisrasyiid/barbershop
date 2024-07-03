<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background-image: url('<?php echo base_url('assets/bg.jpg'); ?>')";>
    <div class="container">
      <h1>Welcome to</h1>
      <h1>Tigasodara Barbershop</h1>
      <h2>We are a talented barbershop team that has skills in haircuts</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Tigasodara Barbershop</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Corporis voluptates sit</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Labore consequatur</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
            <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Dine Pad</a></h4>
              <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <?php if (isset($services) && !empty($services)): ?>
            <div class="row">
                <?php foreach ($services as $val): ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/foto_services/' . $val->Sfoto); ?>" class="card-img-top" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?=$val->Snama?></h5>
                                <p class="card-text text-center"><?=$val->Sdeskripsi?></p>
                                <h1 class="card-text text-center"><strong>Harga: </strong><?=$val->Sharga?></h1>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No services available.</p>
        <?php endif; ?>
      </div>
    </section><!-- End Services Section -->

    <?php if($this->session->userdata('status') == 'login'): ?>
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Booking Sekarang!</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('Booking/bookingUser') ?>" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Btanggal" class="form-label">Tanggal</label>
                    <input type="date" name="Btanggal" class="form-control" id="Btanggal" placeholder="Tanggal" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Bjam" class="form-label">Waktu</label>
                    <input type="time" class="form-control" name="Bjam" id="Bjam" placeholder="Waktu" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="barber" class="form-label">Nama Barber</label>
                    <select name="barber" id="barber" class="form-select" required>
                        <?php if (isset($barber) && !empty($barber)): ?>
                            <?php foreach ($barber as $val): ?>
                                <option value="<?= $val->idBarber; ?>"><?= $val->Bbnama; ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No barbers available.</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="service" class="form-label">Layanan yang Dipilih</label>
                    <select name="service" id="service" class="form-select" required>
                        <?php if (isset($services) && !empty($services)): ?>
                            <?php foreach ($services as $val): ?>
                                <option value="<?= $val->idServices; ?>"><?= $val->Snama; ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No services available.</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 mt-4">
                <!-- <div class="loading">Loading</div> -->
                <div class="error-message"></div>
                <!-- <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div> -->
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Booking</button>
            </div>
        </form>
      </div>
    </section>
    <?php endif; ?>
    <!-- End Appointment Section -->

    <!-- ======= Barbers Section ======= -->
    <section id="barber" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Barber</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <!-- <?php var_dump($data); ?> -->
        
        <div class="row">
          <?php if (isset($barber) && !empty($barber)): ?>
            <?php foreach ($barber as $val): ?>
              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member d-flex align-items-start">
                <div class="pic">
                <img src="<?= base_url('assets/foto_barber/' . $val->Bbfoto); ?>" class="img-fluid img-square" alt=""></div>
                  <div class="member-info">
                    <h4><?= $val->Bbnama; ?></h4>
                    <p><?= $val->Bbdeskripsi; ?></p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""><i class="ri-linkedin-box-fill"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No barbers available.</p>
        <?php endif; ?>
</div>

      </div>
    </section><!-- End Barbers Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" id="#gallery">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <?php if (isset($gallery) && !empty($gallery)): ?>
          <div class="container-fluid">
            <div class="row g-0">
              <?php foreach ($gallery as $val): ?>
                <div class="col-lg-3 col-md-4">
                  <div class="gallery-item">
                    <a href="#" class="gallery-lightbox">
                      <img src="<?= base_url('assets/foto_gallery/' . $val->Gfoto); ?>" alt="" class="img-fluid w-100">
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php else: ?>
          <p>No Gallery available.</p>
        <?php endif; ?>
      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->