<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penjualan Barang</h1>
                </div>
             </div>
             <div><?php echo $this->session->flashdata('pesan') ?></div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-success">
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
				<a href="<?php echo base_url().'c_penjualan/cari_barang' ?>" class="btn btn-warning" name="cari_barang"><i class="fa fa-search"></i> Cari Barang</a>
			</div>
				</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Penjualan
			</div>
			<div class="panel-body">
				<!--Form-->
				<form action="<?php echo base_url().'c_penjualan/selesai_belanja' ?>" method="POST">
					<div class="form-group">
						<label>Kode Penjualan</label>
						<input type="text" class="form-control" name="kode_penjualan" value="<?php echo $kode_unik ?>" readonly>
					</div>
					<div class="form-group">
						<label>Tanggal Penjualan</label>
						<input type="text" class="form-control input-tanggal" name="tgl_penjualan" value="<?php echo date('Y-m-d') ?>" required readonly>
					</div>
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<select name="nama_pelanggan" class="form-control">
							<option value=""></option>
							<?php 
								$data = $this->db->query('select id_pelanggan,nm_pelanggan from pelanggan')->result_array();
								foreach ($data as $row) {
									echo "<option value='".$row['id_pelanggan']."'>".$row['nm_pelanggan']."</option>";
								}
							 ?>
						</select>
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
				<tr bgcolor="green" style="color: white">
					<th>No</th>
					<th>Nama Barang</th>
					<th>Warna</th>
					<th>Ukuran</th>
					<th>Harga</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$total=0;
			$diskon=0;
			 foreach ($detail as $row) {
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo ucwords($row['nama_barang']); ?></td>
				<td><?php echo ucwords($row['warna']); ?></td>
				<td><?php echo ucwords($row['ukuran']); ?></td>
				<td><?php echo "Rp. " .number_format($row['harga_jual']) ; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td><?php echo "Rp. " .number_format($row['total']) ; ?></td>
				<td>
					<a href="<?php echo base_url().'c_penjualan/hapus_item/'.$row['id_penjualan']; ?>" class="btn btn-danger" id="alert_hapus"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php 
			$total=$total+($row['qty']*$row['harga_jual']);
			$diskon = $diskon+$row['qty'];
				} 
				if ($diskon > 6) {
					$total_diskon = ($total*3)/100;
				}else{
					$total_diskon = 0;
				}
			 ?>
			<tr>
				<td colspan="6" align="center"><strong>Total</strong></td>
				<td><?php echo "Rp. " .number_format($total) ?></td>
			</tr>
			<tr>
				<td colspan="6" align="center"><strong>Diskon</strong></td>
				<td><?php echo "Rp. " .number_format($total_diskon) ?></td>
			</tr>
			<tr>
				<td colspan="6" align="center"><strong>Total Pembayaran</strong></td>
				<td><?php echo "Rp. " .number_format($total-$total_diskon) ?></td>
			</tr>
			</tbody>
		</table>
</div>
</div>
<div>
