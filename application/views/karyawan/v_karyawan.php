<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Karyawan</h1>
                    <div id="notification"><?php echo $this->session->flashdata('pesan') ?></div>
                </div>
            </div>

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Karyawan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                 <table width="100%" class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>Nik</th>
                                                <th>Foto Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Nama Bagian</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($hasil as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['nik'] ?></td>
                                                <td><img src="<?php echo base_url('foto/'.$row['gambar']) ?>" alt="" width="60px" class='img-responsive'></td>
                                                <td><?php echo ucwords($row['nama_karyawan']) ?></td>
                                                <td><?php echo ucwords($row['nama_bagian']) ?></td>
                                                <td><?php echo date('d-M-Y',strtotime($row['tanggal_masuk'])) ?></td>
                                                <td><?php echo ucwords($row['alamat']) ?></td>
                                                <td align="center">
                                                    <!-- Tombol Edit Barang -->
                                                    <a href="<?php echo base_url().'c_karyawan/edit_karyawan/'.$row['nik']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit data karyawan"><i class="fa fa-edit"></i></a>
                                                    <!-- Tombol Hapus Barang -->
                                                    <a href="<?php echo base_url().'c_karyawan/hapus_karyawan/'.$row['nik']; ?>" class="btn btn-danger" id="alert_hapus" data-toggle="tooltip" data-placement="top" title="Hapus data karyawan"><i class="fa fa-trash"></i></a>
                                                    <!-- Tombol Detail Barang -->
                                                    <a href="<?php echo base_url().'c_karyawan/detail_karyawan/'.$row['nik']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail data karyawan"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                    <a href="<?php echo base_url().'c_karyawan/tambah_karyawan/'; ?>" class="scroll-to-top-link" data-toggle="tooltip" data-placement="top" title="Tambah data siswa"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>
             </div> <!-- panel-body -->
         </div> <!-- panel panel-default -->
       </div> <!-- col-lg-12 -->
    </div> <!-- row -->
</div> <!-- wrapper -->
<style>
         .scroll-to-top-link{
      position: fixed;
      width: 50px;
      bottom: 5%;
      right: 5%;
      cursor: pointer;
      color: blue;
    }
        </style>