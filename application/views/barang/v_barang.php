<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Barang</h1>
                    <div id="notification"><?php echo $this->session->flashdata('pesan') ?></div>
                </div>
            </div>
                
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Ukuran</th>
                                                <th>Warna</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Provit</th>
                                                <th>Stock</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($hasil as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['kd_barang'] ?></td>
                                                <td><?php echo ucwords($row['nama_barang']) ?></td>
                                                <td><?php echo ucwords($row['ukuran']) ?></td>
                                                <td><?php echo ucwords($row['warna']) ?></td>
                                                <td><?php echo "Rp. ".number_format($row['harga_beli']) ?></td>
                                                <td><?php echo "Rp. ".number_format($row['harga_jual']) ?></td>
                                                <td><?php echo "Rp. ".number_format($row['provit']) ?></td>
                                                <td><?php 
                                                        if ($row['stock'] > 5) {
                                                            echo '<span style="color:green;font-weight:bold">'.$row['stock'].'</span>';
                                                        }else{
                                                            echo '<span style="color:red;font-weight:bold">'.$row['stock'].'</span>';
                                                        }
                                                 ?></td>
                                                <td align="center">
                                                   <!-- Tombol Edit Barang -->
                                                    <a href="<?php echo base_url().'c_barang/edit_barang/'.$row['kd_barang']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit data Barang"><i class="fa fa-edit"></i></a>
                                                    <!-- Tombol Hapus Barang -->
                                                    <a href="<?php echo base_url().'c_barang/hapus_barang/'.$row['kd_barang']; ?>" class="btn btn-danger" id="alert_hapus" data-toggle="tooltip" data-placement="top" title="Hapus data Barang"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                    <a href="<?php echo base_url().'c_barang/tambah_barang/'; ?>" class="scroll-to-top-link" data-toggle="tooltip" data-placement="top" title="Tambah data siswa"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url().'c_barang/cetak_pdf' ?>" target="_blank" class="btn btn-success" style="margin-bottom: 10px"><i class="fa fa-print"></i> Cetak PDF</a>
                                    <a href="<?php echo base_url().'c_barang/cetak_exel' ?>" target="_blank" class="btn btn-success" style="margin-bottom: 10px"><i class="fa fa-print"></i> Cetak EXEL</a>
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