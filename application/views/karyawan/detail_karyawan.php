<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Karyawan</h1>
                </div>
            </div>
        
            <div class="row">
            <div class="col-lg-2">
                
            </div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Detail Karyawan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <li class="text-center">
                            <img src="<?php echo base_url('foto/'.$detail['gambar']); ?>" class="user-image img-circle img-responsive img-thumbnail" />
                        </li>
                            <div class="list-group">
                                <p class="list-group-item">
                                    <strong>Nik Karyawan</strong>
                                    <span class="pull-right medium"><?php echo $detail['nik']; ?>
                                    </span>
                                </p>
                                <p class="list-group-item">
                                    <strong>Nama Karyawan</strong>
                                    <span class="pull-right medium"><?php echo $detail['nama_karyawan']; ?>
                                    </span>
                                </p>
                                <p class="list-group-item">
                                    <strong>Bagian</strong>
                                    <span class="pull-right medium"><?php echo date('d-M-Y',strtotime($detail['tanggal_masuk'])) ?>
                                    </span>
                                </p>
                                <p class="list-group-item">
                                    <strong>Alamat</strong>
                                    <span class="pull-right medium"><?php echo $detail['alamat']; ?>
                                    </span>
                                </p>
                                <p class="list-group-item">
                                    <strong>No telp</strong>
                                    <span class="pull-right medium"><?php echo $detail['no_telp']; ?>
                                    </span>
                                </p>
                                <p class="list-group-item">
                                    <strong>Username</strong>
                                    <span class="pull-right medium"><?php echo $detail['username']; ?>
                                    </span>
                                </p>
                                <p class="list-group-item">
                                    <strong>Level</strong>
                                    <span class="pull-right medium"><?php echo $detail['level']; ?>
                                    </span>
                                </p>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <center>
                                 <a href="<?php echo base_url().'c_karyawan' ?>" class="btn btn-warning">Cancel</a>
                             </center>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
</div>