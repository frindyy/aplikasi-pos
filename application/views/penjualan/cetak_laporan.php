<?php 
$content='
<style>
	.tabel{border-collapse:collapse;}
	.tabel th{padding:8px;background-color:orange;color:black}
	.tabel td{padding:5px;}
</style>
';

$content.='
<page>
	<div align="center" style="margin-top:20px;margin-bottom:30px;">
		<span style="font-size:25px;">Laporan Penjualan Pratama Polos Jaya</span>
	</div>

	<table border="1px" class="tabel" align="center">
	<tr>
		<th>No</th>
		<th>Tanggal Penjualan</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Warna</th>
		<th>Ukuran</th>
		<th>Harga Jual</th>
		<th>Harga Beli</th>
		<th>Qty</th>
		<th>Total</th>
		<th>Provit</th>
	</tr>';
		$no=0;
		$total=0;
		$provit=0;
		foreach ($hasil as $row) {
			$no++;
			$content.='
				<tr>
					<td align="center">'.$no.'</td>
					<td>'.date('d M Y',strtotime($row->tgl_penjualan)).'</td>
					<td>'.$row->kd_barang.'</td>
					<td>'.$row->nama_barang.'</td>
					<td>'.$row->warna.'</td>
					<td align="center">'.$row->ukuran.'</td>
					<td>Rp. '.number_format($row->harga_jual).'</td>
					<td>Rp. '.number_format($row->harga_beli).'</td>
					<td align="center">'.$row->qty.'</td>
					<td>Rp. '.number_format($row->total).'</td>
					<td>Rp. '.number_format($row->provit*$row->qty).'</td>
				</tr>
			';
			$total=$total+$row->total;
			$provit = $provit+($row->provit*$row->qty);
		}
$content.='
	<tr>
		<td colspan="9" align="center" style="background-color:orange;"><b>Total Penjualan dan Provit</b></td>
		<td><strong>Rp. '.number_format($total).'</strong></td>
		<td><strong>Rp. '.number_format($provit).'</strong></td>
	</tr>
	</table>
</page>
';

require_once('assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('cetak_laporan.pdf');
 ?>