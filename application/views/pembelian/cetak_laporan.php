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
		<span style="font-size:25px;">Laporan Pembelian Pratama Polos Jaya</span>
	</div>

	<table border="1px" class="tabel" width="100%" align="center">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Tanggal Pembelian</th>
		<th>Nama Barang</th>
		<th>Warna</th>
		<th>Ukuran</th>
		<th>Harga</th>
		<th>Qty</th>
		<th>Total</th>
	</tr>';
		$no=0;
		$total=0;
		foreach ($hasil as $row) {
			$no++;
			$content.='
				<tr>
					<td align="center">'.$no.'</td>
					<td>'.$row->kd_barang.'</td>
					<td>'.date('d M Y',strtotime($row->tgl_pembelian)).'</td>
					<td>'.$row->nama_barang.'</td>
					<td>'.$row->warna.'</td>
					<td align="center">'.$row->ukuran.'</td>
					<td>Rp. '.number_format($row->harga_beli).'</td>
					<td align="center">'.$row->qty.'</td>
					<td>Rp. '.number_format($row->total).'</td>
				</tr>
			';
			$total=$total+$row->total;
		}
$content.='
	<tr>
		<td colspan="8" align="center"><b>Total</b></td>
		<td>Rp. '.number_format($total).'</td>
	</tr>
	</table>
</page>
';

require_once('assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('cetak_laporan.pdf');
 ?>