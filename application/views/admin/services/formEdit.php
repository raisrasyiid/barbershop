<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Ubah Data Layanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Ubah Data Layanan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Layanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="quickForm" method="post" enctype="multipart/form-data" action="<?php echo site_url('services/edit/'.$services->idServices);?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Layanan</label>
                    <input type="text" name="Snama" value="<?php echo $services->Snama; ?>" class="form-control" id="inputEmail3" placeholder="Nama Layanan"  
                      required="required" data-validation-required-message="Masukkan nama services">
                  </div>
                  <div class="control-group">
                    <label for="exampleInputPassword1">Foto</label>
                    <input type="file" name="Sfoto" class="form-control" id="emfail" placeholder="Sfoto"
                        required="required" data-validation-required-message="Masukkan foto services"/>
                        <img src="<?php echo base_url('assets/foto_services/' . $services->Sfoto); ?>" width="150" height="110">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <textarea class="form-control" name="Sdeskripsi" id="exampleFormControlTextarea1" rows="3" 
                    required="required" data-validation-required-message="Masukkan deskripsi dari services" placeholder="Deskripsi"><?php echo $services->Sdeskripsi; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Layanan</label>
                    <input type="text" name="Sharga" value="<?php echo $services->Sharga; ?>" class="form-control" id="inputEmail3" placeholder="Harga Layanan"  
                      required="required" data-validation-required-message="Masukkan harga services">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->