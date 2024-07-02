<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah Data Galeri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Tambah Data Galeri</li>
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
                <h3 class="card-title">Tambah Data Galeri</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="quickForm" method="post" enctype="multipart/form-data" action="<?php echo site_url('gallery/save');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Layanan</label>
                    <input type="text" name="idServices" class="form-control" id="inputEmail3" placeholder="Id Layanan"  
                      required="required" data-validation-required-message="Masukkan nama layanan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Galeri</label>
                    <input type="text" name="Gnama" class="form-control" id="inputEmail3" placeholder="Nama Galeri"  
                      required="required" data-validation-required-message="Masukkan nama layanan">
                  </div>
                  <div class="control-group">
                    <label for="exampleInputPassword1">Foto</label>
                    <input type="file" name="Gfoto" class="form-control" id="emfail" placeholder="Gfoto"
                        required="required" data-validation-required-message="Masukkan foto layanan"/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <textarea class="form-control" name="Gdeskripsi" id="exampleFormControlTextarea1" rows="3" 
                    required="required" data-validation-required-message="Masukkan deskripsi dari layanan" placeholder="Deskripsi"></textarea>
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