<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Pembelian Barang</h1>
                </div>
             </div>
             <div><?php echo $this->session->flashdata('pesan') ?></div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Barang
			</div>
			<div class="panel-body">
				<form action="" method="POST">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" readonly>
					</div>
					<div class="form-group">
						<label>warna</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="Warna Barang" readonly>
					</div>
					<div class="form-group">
						<label>Ukuran</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="Ukuran Barang" readonly>
					</div>
					<div class="form-group">
						<label>Qty</label>
						<input type="number" class="form-control" name="qty" id="item" max="10000" min="0" placeholder="Qty" required>
					</div>
			</div>
			<div class="panel-footer">			
				<a href="<?php echo base_url().'c_pembelian/cari_barang' ?>" class="btn btn-warning" name="cari_barang"><i class="fa fa-search"></i> Cari Barang</a>
			</div>
				</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Pembelian
			</div>
			<div class="panel-body">
				<!--Form-->
				<form action="<?php echo base_url().'c_pembelian/selesai_belanja' ?>" method="POST">
					<div class="form-group">
						<label>Kode Pembelian</label>
						<input type="text" class="form-control" name="kode_pembelian" value="<?php echo $kode_unik; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Tanggal Pembelian</label>
						<input type="text" class="form-control input-tanggal" name="tgl_pembelian" id="tgl_penjualan" placeholder="yyyy/mm/dd" required>
					</div>
					<div class="form-group">
						<label>Total Bayar</label>
						<input type="number" class="form-control" name="total_bayar" id="total_bayar" required>
					</div>
			</div>
		</div>
	</div>
		<div class="col-md-12">
		<div class="panel-footer" align="center">
			<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		</div>	
		</div>			
				</form><!--End Form-->
</div>

<hr>
<div class="row">
<div class="col-md-12">
		<table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Warna</th>
					<th>Ukuran</th>
					<th>Harga Beli</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$total = 0;
					$no = 1;
					foreach ($detail as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['nama_barang'] ?></td>
						<td><?php echo $row['warna'] ?></td>
						<td><?php echo $row['ukuran'] ?></td>
						<td><?php echo "Rp. ".number_format( $row['harga_beli']) ?></td>
						<td><?php echo $row['qty'] ?></td>
						<td><?php echo "Rp. ".number_format( $row['total']); ?></td>
						<td>
							<a href="<?php echo base_url().'c_pembelian/hapus_item/'.$row['id_pembelian']; ?>" class="btn btn-danger" id="alert_hapus"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php
				$total=$total+($row['qty']*$row['harga_beli']);
			}
				 ?>
				 <tr>
				 	<td colspan="6" align="center"><strong>Total</strong></td>
				 	<td><?php echo "Rp. ".number_format($total); ?></td>
				 </tr>
			</tbody>
		</table>
</div>
</div>
<div>
