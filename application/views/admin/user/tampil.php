<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen User</li>
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
          <h2 class="card-title">Data User</h2>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 20%">
                          Nama Customer
                      </th>
                      <th style="width: 20%">
                          Email
                      </th>
                      <th style="width: 19%">
                          No Telepon
                      </th>
                      <th style="width: 20%">
                          Password
                      </th>
                      <th style="width: 20%" class="text-center">
                        Aksi
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1; foreach($user as $val){?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td> <?php echo $val->Cnama; ?></td>
                      <td> <?php echo $val->Cemail; ?></td>
                      <td> <?php echo $val->Ctlpn; ?></td>
                      <td> <?php echo $val->Cpassword; ?></td>
                      <td class="project-actions text-center">
                          <a class="btn btn-danger btn-sm" href="<?php echo site_url('user/delete/'.$val->idCustomer)?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')">
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
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm">
        <?php echo $links; ?>
        </ul>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->