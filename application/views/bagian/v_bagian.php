<div id="page-wrapper">
	
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Bagian</h1><br>
                    <div id="notification"><?php echo $this->session->flashdata('pesan') ?></div>
                </div>
            </div>
                
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Bagian
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>kode Bagian</th>
                                                <th>Nama Bagian</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($hasil->result_array() as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['kode_bagian']; ?></td>
                                                <td><?php cetak(ucwords($row['nama_bagian'])) ; ?></td>
                                                <td align="center">
                                                <!-- Tombol Edit Bagian -->
                                                    <a href="<?php echo base_url().'c_bagian/edit_bagian/'.$row['kode_bagian']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit data Bagian"><i class="fa fa-edit"></i></a>
                                                    <!-- Tombol Hapus Bagian -->
                                                    <a href="<?php echo base_url().'c_bagian/hapus_bagian/'.$row['kode_bagian']; ?>" class="btn btn-danger" id="alert_hapus" data-toggle="tooltip" data-placement="top" title="Hapus data Bagian"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                         </table>
                                    <a href="<?php echo base_url().'c_bagian/tambah_bagian/'; ?>" class="scroll-to-top-link" data-toggle="tooltip" data-placement="top" title="Tambah data siswa"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>
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