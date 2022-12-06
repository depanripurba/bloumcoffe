<?php

$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image(base_url('assets/img/logo-bloumcoffe.png'),15,3,25);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'Bloum Coffee','0','1','C',false);
$pdf->SetFont('Arial','i',9);
$pdf->Cell(0,5,'Jln. Pasar Baru no.55,','0','1','C',false);
$pdf->Cell(0,3,'Kec. Medan Baru, Kota Medan, Sumatera Utara','0','1','C',false);
$pdf->Cell(0,5,'HP : 0853 3306 0888','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','1','L',false);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,'Laporan Data Transaksi','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',7);

$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(72,6,'Kode Pesanan',1,0,'C');
$pdf->Cell(35,6,'Meja',1,0,'C');
$pdf->Cell(35,6,'Tanggal',1,0,'C');
$pdf->Cell(40,6,'Total',1,0,'C');
$pdf->Ln(5.9);

$no = 1 ;
$total = 0;
foreach ($laporan as $row) :
$pdf->Cell(8,6,$no++,1,0,'C');
$pdf->Cell(72,6,$row['kodePesanan'],1,0,'L');
$pdf->Cell(35,6,$row['noMeja'],1,0,'C');
$pdf->Cell(35,6,$row['tanggal'],1,0,'C');
$pdf->Cell(40,6,"Rp. ".number_format($row['totalHarga']),1,0,'L');
$total += $row['totalHarga'];
$pdf->Ln(5.9);
endforeach;

$pdf->Cell(150,6,'Total Pendapatan',1,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,6,"Rp. ".number_format($total),1,0,'C');
$pdf->Ln(5.9);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,5,date('d / M / y'),'0','1','R',false);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,5,'Bloum Coffee','0','1','R',false);
$pdf->Ln(20);
$pdf->Cell(0,5,'_______________________','0','1','R',false);
$pdf->Cell(0,5,'Marasih Panjaitan','0','1','R',false);

$pdf->Output();