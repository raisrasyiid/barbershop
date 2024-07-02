  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Galeri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Galeri</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Data Galeri</h2>
        </div>
        <div class="card-body p-0">
        <a href="<?php echo site_url('gallery/add');?>" class="btn btn-primary btn-sm" style="margin-left: 2%; margin-top: 1%;" href="#">
                <i class="fas fa-plus">
                </i>
                Tambah Galeri
          </a>
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 10%">
                          Id Layanan
                      </th>
                      <th style="width: 20%">
                          Nama Galeri
                      </th>
                      <th style="width: 24%">
                          Foto 
                      </th>
                      <th style="width: 25%" class="text-center">
                          Deskripsi
                      </th>
                      <th style="width: 20%" class="text-center">
                        Aksi
                      </th>
                  </tr>

              </thead>
              <?php $no=1; foreach($gallery as $val){?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $val->idServices; ?></td>
                      <td> <?php echo $val->Gnama; ?></td>
                      <td><img src="<?php echo base_url('assets/foto_gallery/'.$val->Gfoto); ?>" width="150" height="110"></td>
                      <td class="text-center"><?php echo $val->Gdeskripsi; ?></td>
                      <td class="project-actions text-center">
                          <a href="<?php echo site_url('gallery/get_by_id/'.$val->idGallery)?>" class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="<?php echo site_url('gallery/delete/'.$val->idGallery)?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php $no++; } ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->