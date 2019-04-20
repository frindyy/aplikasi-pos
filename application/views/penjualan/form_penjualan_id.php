<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penjualan Barang</h1>
                </div>
             </div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Barang
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url().'c_penjualan' ?>" method="POST">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang"  value="<?php echo $barang->nama_barang; ?>" readonly>
					</div>
					<div class="form-group">
						<label>warna</label>
						<input type="text" class="form-control" name="warna" value="<?php echo $barang->warna; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Ukuran</label>
						<input type="text" class="form-control" name="ukuran" value="<?php echo $barang->ukuran; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Qty</label>
						<input type="number" class="form-control" name="qty" id="item" max="10000" min="0" placeholder="Qty">
					</div>
			</div>
			<div class="panel-footer">			
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</button>
			</div>
			<input type="hidden" name="kd_barang" value="<?php echo $barang->kd_barang; ?>">
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
				<form action="" method="POST">
					<div class="form-group">
						<label>Kode Penjualan</label>
						<input type="text" class="form-control" name="kode_penjualan">
					</div>
					<div class="form-group">
						<label>Tanggal Penjualan</label>
						<input type="text" class="form-control" name="tglpenjualan">
					</div>
					<div class="form-group">
						<label>Total Bayar</label>
						<input type="number" class="form-control" name="totalbayar">
					</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel-footer" align="center">
		<a href="" class="btn btn-primary" name="simpan"><i class="fa fa-save"></i>Simpan</a>
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
					<th>Harga</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<body>

			</body>
		</table>
</div>
</div>
<div>
