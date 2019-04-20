<div id="page-wrapper">
	
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Pembelian</h1><br>
                </div>
		   <hr>
                <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>kode Pembelian</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Nama Barang</th>
                                                <th>Warna</th>
                                                <th>Ukuran</th>
                                                <th>qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php 
                                            $no=1;
                                            $total=0;
                                            foreach ($hasil->result() as $row) { 
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->kode_pembelian ?></td>
                                                <td><?php echo date('d-M-Y',strtotime($row->tgl_pembelian)) ?></td>
                                                <td><?php echo ucwords($row->nama_barang) ?></td>
                                                <td><?php echo ucwords($row->warna) ?></td>
                                                <td><?php echo ucwords($row->ukuran) ?></td>
                                                <td><?php echo $row->qty ?></td>
                                                <td><?php echo "Rp. ".number_format($row->harga_beli) ?></td>
                                                <td><?php echo "Rp. ".number_format($row->total) ?></td>
                                            </tr>
                                            <?php 
                                                }
                                             ?> 
                                        </tbody>
                                        
                         </table>
                         <a href="" class="btn btn-success" data-toggle="modal" data-target="#cetakpdf" style="margin-bottom: 10px"><i class="fa fa-print"></i> Cetak PDF</a>
              </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="cetakpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cetak Laporan Pembelian</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'c_pembelian/cetak_laporan' ?>" method="post" target="_blank">
            <table>
                <tr>
                    <td>
                        <div class="form-group">Dari Tanggal</div>
                    </td>
                    <td align="center" width="5%">
                        <div class="form-group">:</div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control input-tanggal" name="tanggal1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">Sampai Tanggal</div>
                    </td>
                    <td align="center">
                        <div class="form-group">:</div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control input-tanggal" name="tanggal2">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="cetak" value="cetak">
                    </td>
                </tr>
            </table>
        </form>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url().'c_pembelian/cetak_laporan' ?>" class="btn btn-primary" target="_blank">Cetak semua data</a>
      </div>
    </div>
  </div>
</div>