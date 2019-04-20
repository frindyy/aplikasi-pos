<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pelanggan</h1>
                    <div id="notification"><?php echo $this->session->flashdata('pesan') ?></div>
                </div>
            </div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pelanggan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>id Pelanggan</th>
                                                <th>Nama pelanggan</th>
                                                <th>Alamat</th>
                                                <th>No telp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($hasil as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['id_pelanggan']; ?></td>
                                                <td><?php echo ucwords($row['nm_pelanggan']); ?></td>
                                                <td><?php echo ucwords($row['alamat']); ?></td>
                                                <td><?php echo $row['no_telp']; ?></td>
                                                <td align="center">
                                                    <a href="<?php echo base_url().'c_pelanggan/edit_pelanggan/'.$row['id_pelanggan']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit data Pelanggan"><i class="fa fa-edit"></i></a>
                                                    <!-- Tombol Hapus pelanggan -->
                                                    <a href="<?php echo base_url().'c_pelanggan/hapus_pelanggan/'.$row['id_pelanggan']; ?>" class="btn btn-danger" id="alert_hapus" data-toggle="tooltip" data-placement="top" title="Hapus data Pelanggan"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                    <a href="<?php echo base_url().'c_pelanggan/tambah_pelanggan/'; ?>" class="scroll-to-top-link" data-toggle="tooltip" data-placement="top" title="Tambah data Pelanggan"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>
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