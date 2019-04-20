<?php
	

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('times','B',16); //Setting Font size
$pdf->Cell(62,5,'KAOS PRATAMA JAYA',0,0,'C',false);  //62 = untuk setting margin kiri, 5 untuk setting margin atas
$pdf->SetFont('times','B',12);
$pdf->Cell(183,5,'Nota Penjualan ',0,0,'C');
$pdf->Ln(5);
//------------------------------------------------------------------
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,'Perum tas 2 tanggulangin - Sidoarjo',0,0,'C');
$pdf->SetFont('times','B',10);
$pdf->Cell(180,5,'Nomor Nota : ',0,0,'C');
$pdf->Cell(-135,5,$tam->kode_penjualan,0,0,'C');
$pdf->Ln(5);
//------------------------------------------------------------------
$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,5,'Telp : 081333984608',0,0,'C');
$pdf->SetFont('times','B',10);
$pdf->Cell(230,5,'Tanggal Nota : ',0,0,'C');
$pdf->Cell(-185,5,date('d-M-Y',strtotime($tam->tgl_penjualan)),0,0,'C');
$pdf->Ln(5);
//------------------------------------------------------------------

$pdf->Ln(5);
$pdf->SetFont('times','B',10);
$pdf->Cell(15,7,'Kepada : ',0,0,'C');
$pdf->Cell(30,7,$tam->nm_pelanggan,0,0,'C');

$pdf->Line(9,28.1,200,28.2);
$pdf->SetLineWidth(1);
$pdf->Line(9,28.2,200,28.2);
//------------------------------------------------------------------
$pdf->SetLineWidth(0);
$pdf->Ln(10);
//------------------------------------------------------------------

$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(25,6,'Kode Barang',1,0,'C');	
$pdf->Cell(30,6,'Nama Barang',1,0,'C');
$pdf->Cell(30,6,'Warna',1,0,'C');
$pdf->Cell(30,6,'Ukuran',1,0,'C');
$pdf->Cell(20,6,'Harga',1,0,'C');
$pdf->Cell(15,6,'qty',1,0,'C');
$pdf->Cell(25,6,'Total',1,0,'C');
$pdf->Ln(2);
$no = 0;
$diskon = 0;
foreach ($hasil as $row) {
	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(8,4,$no. ".",1,0,'C');
	$pdf->Cell(25,4,$row->kd_barang,1,0,'L');
	$pdf->Cell(30,4,$row->nama_barang,1,0,'L');
	$pdf->Cell(30,4,$row->warna,1,0,'L');
	$pdf->Cell(30,4,$row->ukuran,1,0,'L');
	$pdf->Cell(20,4,'Rp. '.number_format($row->harga_jual),1,0,'L');
	$pdf->Cell(15,4,$row->qty,1,0,'L');
	$pdf->Cell(25,4,'Rp. '.number_format($row->total),1,0,'L');
	$diskon = $diskon+$row->qty;
}	
				if ($diskon > 6) {
					$total_diskon = ($tam->total_pembayaran*3)/100;
				}else{
					$total_diskon = 0;
				}
//------------------------------------------------------------------
$pdf->Ln(5);
$pdf->SetFont('times','B',9);
$pdf->Cell(250,7,'Total :',0,0,'C');
$pdf->Cell(-160,7,'Rp '.number_format($tam->total_pembayaran),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',9);
$pdf->Cell(250,7,'Diskon	 :',0,0,'C');
$pdf->Cell(-160,7,'Rp '.number_format($total_diskon),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',9);
$pdf->Cell(250,7,'Total Pembayaran :',0,0,'C');
$pdf->Cell(-160,7,'Rp '.number_format($tam->total_pembayaran-$total_diskon),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',9);
$pdf->Cell(250,7,'Total Bayar :',0,0,'C');
$pdf->Cell(-160,7,'Rp '.number_format($tam->total_bayar),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',9);
$pdf->Cell(250,7,'Kembalian :',0,0,'C');
$pdf->Cell(-160,7,'Rp '.number_format($tam->total_bayar-($tam->total_pembayaran-$total_diskon)),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',10);
$pdf->Cell(10,7,'Kasir :',0,0,'C');
$pdf->Cell(25,7,$tam->nama_karyawan,0,0,'C');
$pdf->Ln(10);
$pdf->Cell(170,7,'Barang yang sudah di beli tidak dapat di tukar atau kembali. Retur barang rusak atau cacat maximal 1 hari kerja',0,0,'C');


$pdf->Output();
?>