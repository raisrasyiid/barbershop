<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Pemesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Pemesanan</li>
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
                <h2 class="card-title">Data Pemesanan</h2>
                <div class="card-tools">
                    <form action="<?php echo site_url('booking'); ?>" method="get">
                        <select name="month" class="form-control" onchange="this.form.submit()">
                            <option value="">Pilih Bulan</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $monthName = date('F', mktime(0, 0, 0, $i, 10));
                                echo "<option value='$i'>$monthName</option>";
                            }
                            ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">No</th>
                            <th style="width: 15%">Nama Customer</th>
                            <th style="width: 15%">Nama Barber</th>
                            <th style="width: 15%">Nama Layanan</th>
                            <th style="width: 20%">Tanggal</th>
                            <th style="width: 8%">Jam</th>
                            <th style="width: 8%">Status</th>
                            <th style="width: 20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($booking as $val){ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $val->customer_name; ?></td>
                                <td><?php echo $val->barber_name; ?></td>
                                <td><?php echo $val->service_name; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($val->Btanggal)); ?></td>
                                <td><?php echo $val->Bjam; ?></td>
                                <td>
                                    <?php if ($val->Bstatus == "Berhasil"){?>
                                        <button class="btn btn-success" style="color: white">Berhasil</button>
                                    <?php } elseif ($val->Bstatus == "Menunggu") {?>
                                        <button class="btn btn-secondary" style="color: white">Menunggu</button>
                                    <?php } else {?>
                                        <button class="btn btn-danger" style="color: white">Dibatalkan</button>
                                    <?php } ?> 
                                </td>
                                <td class="project-actions text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('booking/ubah_status/'.$val->idBooking);?>" class="btn btn-warning" style="color: white">Ubah Status</a>
                                    </div>
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