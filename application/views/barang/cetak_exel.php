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
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach ($hasil as $row) { ?>
                                            <tr>
                                                <td width="20px"><?php echo $row['kd_barang'] ?></td>
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
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>