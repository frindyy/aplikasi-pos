<?php
	
	include "fpdf.php";
	include "../inc/koneksi.php";


$pdf = new FPDF('P','mm','legal');
$pdf->AddPage();

$pdf->Image('logo_prata.png',10,12,40);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'CV.PRATAMA JAYA MOBIL','0','1','C',false);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,5,'Perum tas 2 tanggulangin - Sidoarjo','0','1','C',false);
$pdf->Cell(0,2,'www.pratama Coding.com','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','L',false);
$pdf->Ln(5);


$pdf->Line(9,28.1,200,28.2);
$pdf->SetLineWidth(1);
$pdf->Line(9,28.2,200,28.2);

$pdf->SetLineWidth(0);
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Laporan Data Mobil','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(35,6,'Kode Mobil',1,0,'C');
$pdf->Cell(37,6,'Merk Mobil',1,0,'C');
$pdf->Cell(35,6,'Type Mobil',1,0,'C');
$pdf->Cell(35,6,'Warna pilihan',1,0,'C');
$pdf->Cell(40,6,'Harga Mobil',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("SELECT * FROM tb_mobil ORDER BY kode_mobil ASC") or die(mysql_error());
while ($data = mysql_fetch_assoc($sql)) {
	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(8,4,$no. ".",1,0,'C');
	$pdf->Cell(35,4,$data['kode_mobil'],1,0,'L');
	$pdf->Cell(37,4,$data['merk'],1,0,'L');
	$pdf->Cell(35,4,$data['type'],1,0,'L');
	$pdf->Cell(35,4,$data['warna'],1,0,'L');
	$pdf->Cell(40,4,$data['harga'],1,0,'R');
}

$pdf->Ln(10);

$pdf->SetY(-35);
$pdf->SetLineWidth(1);
$pdf->Line(10,$pdf->GetY(),200,$pdf->GetY());
$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
$pdf->Output();
?>