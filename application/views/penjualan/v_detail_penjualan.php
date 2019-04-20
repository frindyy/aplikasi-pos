<div id="page-wrapper">
	
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Penjualan</h1><br>
                </div>

                <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>kode Penjualan</th>
                                                <th>Tanggal Penjualan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($hasil->result_array() as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['kode_penjualan'] ?></td>
                                                <td><?php echo date('d-M-Y',strtotime($row['tgl_penjualan'])) ?></td>
                                                <td><?php echo ucwords($row['nm_pelanggan']); ?></td>
                                                <td align="center">
                                                    <a href="<?php echo base_url().'c_penjualan/cetak_detail_penjualan/'.$row['kode_penjualan'] ?>" class="btn btn-primary" target="_blank"><i class="fa fa-search"></i> Detail</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                         </table>

        </div>
</div>