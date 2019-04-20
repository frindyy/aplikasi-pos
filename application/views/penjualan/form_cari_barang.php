<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Barang</h1>
                </div>
                
                <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Ukuran</th>
                                                <th>Warna</th>
                                                <th>Harga Jual</th>
                                                <th>Stock</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($barang->result_array() as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['kd_barang'] ?></td>
                                                <td><?php echo ucwords($row['nama_barang']) ?></td>
                                                <td><?php echo ucwords($row['ukuran']) ?></td>
                                                <td><?php echo ucwords($row['warna']) ?></td>
                                                <td><?php echo $row['harga_jual'] ?></td>
                                                <td><?php 
                                                        if ($row['stock'] > 5) {
                                                            echo '<span style="color:green;font-weight:bold">'.$row['stock'].'</span>';
                                                        }else{
                                                            echo '<span style="color:red;font-weight:bold">'.$row['stock'].'</span>';
                                                        }
                                                 ?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'c_penjualan/pilih_barang/'.$row['kd_barang'] ?>" class="btn btn-primary">Pilih</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
            </div>
         </div>