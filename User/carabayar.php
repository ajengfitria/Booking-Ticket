<?php
define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

class PDF extends FPDF{

  function Header(){
    $this->SetFont('Arial','B','13');
    $this->Cell(19,1,'Data Pemesanan',0,0,'L');
    $this->SetFont('Times','','9'); 
    $this->Cell(13.7);
    $this->Ln(1);
    $this->Cell('',0,'',1);
    $this->Ln(0.09);
    $this->Cell('',0,'',1);
    $this->Ln(0.7);
  }

}

$server = "localhost";
$user = "root";
$pass = "";
$data = "ticketing";

$net = new mysqli($server, $user, $pass, $data);

if($net->connect_error){
  die("Koneksi gagal: ".$net->connect_error);
}
$kode_res = $_GET['kode_res'];
$q = "SELECT * FROM pemesan WHERE kode_res='$kode_res' LIMIT 1";
$h = $net->query($q) or die($net->error);
$i = 0;
$tgl = date('d M Y');
$date = date('H:i:s');
while($d=$h->fetch_array()){
  $cell[$i][1]=$d[1];
  $cell[$i][2]=$d[2];
  $cell[$i][3]=$d[3];
  $cell[$i][4]=$d[4];
  $cell[$i][5]=$d[5];
  $cell[$i][7]=$d[7];
  $cell[$i][10]=$d[10];
  $cell[$i][11]=$d[11];
  $i++;
}
$pdf = new PDF('P','cm','A4');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','','9');
$pdf->SetFillColor(255,255,255); 
$pdf->SetTextColor(0,0,0);
for($j=0;$j<$i;$j++){
  $pdf->SetFont('Arial','','11');
  $pdf->Cell(4,0.7,'No. Identitas ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][11],0,'L');
  $pdf->Ln();
  $pdf->Cell(4,0.7,'Nama Pemesan ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][1],0,'L');
  $pdf->Ln();
  $pdf->Cell(4,0.7,'Alamat ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][2],0,'L');
  $pdf->Ln();
  $pdf->Cell(4,0.7,'No Telp ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][3],0,'L');
  $pdf->Ln();
  $pdf->Cell(4,0.7,'E-mail ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][4],0,'L');
  $pdf->Ln();
  $pdf->Cell(4,0.7,'Jumlah Pemesanan ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][10],0,'L');
  $pdf->Ln();
  $pdf->Cell(4,0.7,'Kode Reservasi ',0,'L');
  $pdf->Cell(10,0.7,': '.$cell[$j][5],0,'L');
  $pdf->Ln(2);

  $pdf->SetFont('Arial','B','13');
  $pdf->Cell(19,1,'Cara Pembayaran',0,0,'L');
  $pdf->SetFont('Times','','9'); 
  $pdf->Cell(13.7);
  $pdf->Ln(1);
  $pdf->Cell('',0,'',1);
  $pdf->Ln(0.09);
  $pdf->Cell('',0,'',1);
  $pdf->Ln(0.7);

  $pdf->SetFont('Arial','','11');
  $pdf->Cell(0.5,0.7,'1.',0,'L');
  $pdf->Cell(18,0.7,'Pilih bank tujuan',0,'L');
  $pdf->Ln();
   $pdf->Cell(1,0.7,'-',0,'L');
  $pdf->Cell(18,0.7,'No. Rek Mandiri : AB086596845959',0,'L');
  $pdf->Ln();
   $pdf->Cell(1,0.7,'-',0,'L');
  $pdf->Cell(18,0.7,'No. Rek BRI : AB9839890e38w9e',0,'L');
  $pdf->Ln();
   $pdf->Cell(1,0.7,'-',0,'L');
  $pdf->Cell(18,0.7,'No. Rek BNI : AB487r8uer48847',0,'L');
  $pdf->Ln();
   $pdf->Cell(1,0.7,'-',0,'L');
  $pdf->Cell(18,0.7,'No. Rek Danamon : AB3978378344ru8',0,'L');
  $pdf->Ln();
  $pdf->Cell(0.5,0.7,'2.',0,'L');
  $pdf->Cell(18,0.7,'Pada saat transfer, masukkan kode reservasi lalu transfer sejumlah pembayaran ke rekening yang tertera',0,'L');
  $pdf->Ln();
  $pdf->Cell(0.5,0.7,'3.',0,'L');
  $pdf->Cell(18,0.7,'Dapatkan struk, buka halaman cek pemesanan',0,'L');
  $pdf->Ln();
  $pdf->Cell(0.5,0.7,'4.',0,'L');
  $pdf->Cell(18,0.7,'Masukkan email dan kode reservasi, klik cek pemesanan',0,'L');
  $pdf->Ln();
  $pdf->Cell(0.5,0.7,'5.',0,'L');
  $pdf->Cell(18,0.7,'Jika belum dikonfirmasi, masukkan foto bukti pembayaran',0,'L');
  $pdf->Ln();
  $pdf->Cell(0.5,0.7,'6.',0,'L');
  $pdf->Cell(18,0.7,'Tunggu beberapa saat, refresh halaman, dapatkan bukti pemesanan',0,'L');  
}
$pdf->Output(); 
// $this->Cell(12,1,'Nama Pemesan',1,0,'L',1);
?>