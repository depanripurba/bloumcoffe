<?php

// var_dump($listpesanan);
// die;
$pdf = new FPDF('p', 'mm', array(110, 200));
$pdf->AddPage();
$pdf->SetFont('courier', '', 16);
$pdf->Cell(0, 7, 'BLOUM COFFE', '0', '1', 'C', false);

$pdf->SetFont('courier', '', 10);
$pdf->Cell(0, 4, 'Jalan Pasar Baru No.55', '0', '1', 'C', false);
$pdf->SetFont('courier', '', 9);
$pdf->Cell(0, 4, 'Kecamatan Medan Baru, Kota Medan, Sumatera Utara', '0', '1', 'C', false);
$pdf->SetFont('courier', '', 10);
$pdf->Cell(0, 4, 'HP : 0853 3306 0888', '0', '1', 'C', false);
$pdf->Cell(0, 4, '===============================================', '0', '1', 'C', false);

// new section
$pdf->SetFont('courier', 'i', 8);
$pdf->Cell(20, 5, date('d-m-Y'), '0', '0', '', false);
$pdf->Cell(20, 5, date('h:i:s'), '0', '1', '', false);
$pdf->ln(3);
$pdf->SetFont('courier', '', 12);
$pdf->Cell(0, 5, 'DETAIL PESANAN', '0', '1', 'C', false);
$pdf->SetFont('courier', '', 10);

// NEW SECTION
$pdf->Cell(28, 5, 'KODE PESANAN', '0', '0', 'l', false);
$pdf->Cell(5, 5, ':', '0', '0', 'l', false);
$pdf->Cell(28, 5, $root->kodePesanan, '0', '1', 'l', false);
// NEW SECTION
$pdf->Cell(28, 5, 'Nama Customer', '0', '0', 'l', false);
$pdf->Cell(5, 5, ':', '0', '0', 'l', false);
$pdf->Cell(28, 5, $person->nama, '0', '1', 'l', false);
//NEW SECTION
$pdf->Cell(28, 5, 'No Meja', '0', '0', 'l', false);
$pdf->Cell(5, 5, ':', '0', '0', 'l', false);
$pdf->Cell(28, 5, 'Meja ' . $root->noMeja, '0', '1', 'l', false);
$pdf->ln(4);

// NEW SECTION
$pdf->Cell(0, 5, 'Pesanan', '0', '1', 'l', false);

// NEW SECTION
$pdf->SetFont('courier', 'B', 12);
$pdf->Cell(20, 5, 'Pesanan', '0', '0', 'l', false);
$pdf->Cell(20, 5, 'Jumlah', '0', '0', 'l', false);
$pdf->Cell(30, 5, '@', '0', '0', 'C', false);
$pdf->Cell(30, 5, 'Total', '0', '1', 'l', false);
$pdf->ln(2);

// NEW SECTION
foreach ($listpesanan as $row) {
    $pdf->SetFont('courier', '', 11);
    $pdf->Cell(20, 5, $row->pesanan, '0', '0', 'l', false);
    $pdf->Cell(20, 5, $row->jumlah, '0', '0', 'C', false);
    $pdf->Cell(25, 5, number_format($row->harga), '0', '0', 'r', false);
    $total = $row->harga*$row->jumlah;
    $pdf->Cell(30, 5, number_format($total), '0', '1', 'r', false);
}



// NEW SECTION
$pdf->Cell(0, 5, '======================================', '0', '1', 'C', false);
// NEW SECTION
$pdf->SetFont('courier', 'b', 11);
$pdf->Cell(65, 5, 'T O T A L', '0', '0', 'l', false);
$pdf->Cell(25, 5, "Rp. ".number_format($root->totalHarga), '0', '1', 'R', false);

// NEW SECTIO

// NEW SECTION
$pdf->ln(10);
if($status==="cetakbill"){
    $pesan = "SILAHKAN BAYAR KE KASIR";
}else{
    $pesan = "SUDAH DIBAYAR";
}
$pdf->Cell(0, 5, $pesan, '0', '1', 'C', false);




// OUTPUT
$pdf->Output();
