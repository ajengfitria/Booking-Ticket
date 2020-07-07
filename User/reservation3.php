<!DOCTYPE html>
<html>
<head>
	<title>Best Travel | Book Your Flight</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Govihar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
	<style type="text/css">
	.span.js-my-bank {
		display: none;
	}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,500italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
	});
</script>
<script src="js/menu_jquery.js"></script>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="header-grids">
				<div class="logo">
					<h1><a  href="index.php"><span>Best Travel</a></h1>
					</div>
					<div class="header-dropdown">
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="nav-top">
					<div class="top-nav">
						<span class="menu"><img src="images/menu.png" alt="" /></span>
						<ul class="nav1">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="cek.php">Cek Pemesanan</a></li>
						</ul>
						<div class="clearfix"> </div>
						<script> 
							$( "span.menu" ).click(function() {
								$( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								});
							});

						</script>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="banner" style="background: #FFF;">
			<div class="container">
				<div class="col-md-12">
					<div class="sap_tabs" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px; border-radius: 0px;">
							<h3 style="color: #FFF;">Detail Pemasanan</h3><br>
						</div>
						<div class="table-responsive">
							<table class="table" style="border:none; color: #FFF;">
								<?php require "connect.php";
								$id_rute = $_GET['id_rute'];
								$jumlah_cos = $_GET['jumlah_cos'];
								$data = mysqli_query($cn, "SELECT rute.asal,rute.tujuan,rute.tgl,rute.sisa,rute.berangkat,rute.sampai,rute.harga,rute.id_rute,transport.nama_trans,transport.jml FROM rute, transport where rute.id=transport.id_trans AND rute.id_rute=".$id_rute."");
								$d = mysqli_fetch_array($data);
								echo '&nbsp&nbsp'.date('D, d/M/Y', strtotime($d['tgl'])); ?>
								<thead>
									<td>Kebrangkatan</td>
									<td>Tujuan</td>
									<td>Maskapai</td>
									<td>Waktu Kebrangkatan</td>
									<td>Waktu Tiba</td>
									<td>Durasi Penerbangan</td>
								</thead>
								<tbody>
									<?php
									$sampai = strtotime($d['sampai']);
									$berangkat = strtotime($d['berangkat']);
									$durasi = $sampai-$berangkat;
									echo'
									<tr>
									<td> '.$d['asal'].'</td>
									<td> '.$d['tujuan'].'</td>
									<td> '.$d['nama_trans'].'</td>
									<td> '.$d['berangkat'].'</td>
									<td> '.$d['sampai'].'</td>
									<td> '.gmdate("H", $durasi).' jam '.gmdate("i", $durasi).' menit '.gmdate("s", $durasi).' detik </td>
									</tr>';								
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<br>
			<div class="container">
				<div class="col-md-6">
					<div class="panel panel-default" style="border-color: rgb(97, 102, 125); border-radius: 0px;">
						<div class="panel-heading" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
							<h3 style="color: #FFF;">Informasi Pemesan</h3><br>
						</div>
						<div class="panel-body" style="border-radius: 0px;">
							<form>
								<?php
								$kode_res = $_GET['kode_res'];
								$datapemesan = mysqli_query($cn, "SELECT nama_pemesan,alamat,no_telp,email,kode_bayar FROM pemesan where kode_res='$kode_res'");
								$dpemesan = mysqli_fetch_array($datapemesan);
								?>
								<div class="form-group">
									<label class="control-label">Nama</label>
									<input type="text" class="form-control" style="border-radius: 0px;" readonly="" value="<?php echo $dpemesan['nama_pemesan']?>">
								</div>
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<input type="text" class="form-control" style="border-radius: 0px;" readonly="" value="<?php echo $dpemesan['alamat']?>">
								</div>
								<div class="form-group">
									<label class="control-label">No. Telp</label>
									<input type="text" class="form-control" style="border-radius: 0px;" readonly="" value="<?php echo $dpemesan['no_telp']?>">
								</div>
								<div class="form-group">
									<label class="control-label">E-mail</label>
									<input type="email" class="form-control" style="border-radius: 0px;" readonly="" value="<?php echo $dpemesan['email']?>">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default" style="border-color: rgb(97, 102, 125); border-radius: 0px;">
						<div class="panel-heading" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
							<h3 style="color: #FFF;">Informasi Penumpang</h3><br>
						</div>
						<div class="panel-body" style="border-radius: 0px;">
							<?php
							$datapenumpang = mysqli_query($cn, "SELECT * FROM penumpang where kode_res='$kode_res'");
							$no = 1;
							while($dpenumpang = mysqli_fetch_array($datapenumpang)){

								?>
								<div class="form-group">
									<label class="control-label"> Penumpang <?php echo $no; ?> </label>
									<input type="text" style="border-radius: 0px;" readonly="" value="<?php echo ''.$dpenumpang['titel']; echo " ".$dpenumpang['nama_penumpang']; ?>" class="form-control">
								</div>
								<div class="form-group">
									<label class="control-label"> Kode Kursi <?php echo $no; ?> </label>
									<input type="" class="form-control" style="border-radius: 0px;" readonly="" value="<?php echo ''.$dpenumpang['kode_kursi']; ?>">
								</div>
								<?php
								$no++;
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default" style="border-color: rgb(97, 102, 125); border-radius: 0px;">
						<div class="panel-heading" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
							<h3 style="color: #FFF;">Detail Harga</h3><br>
						</div>
						<div class="panel-body" style="border-radius: 0px;">
							<div class="form-group">
								<label class="control-label">Harga</label>
								<input type="text" readonly="" style="border-radius: 0px;" class="form-control" style="float: right;" value="<?php echo 'Rp '.$d['harga']; ?>">
							</div>
							<div class="form-group">
								<label class="control-label">Jumlah Penumpang</label>
								<input type="text" class="form-control" readonly="" style="border-radius: 0px;" value="<?php echo $jumlah_cos; ?>">
							</div>
							<div class="form-group">
								<label class="control-label">Total Pembayaran</label>
								<input type="text" readonly="" class="form-control" style="border-radius: 0px;" value="<?php $total=$d['harga']*$jumlah_cos; echo 'Rp '.$total; ?>">
							</div>
							<div class="form-group">
								<center><?php echo '<a href="carabayar.php?kode_res='.$kode_res.'" style="color:red;">*Penting!* Silahkan download kode dan cara pembayaran disini</a>';?></center>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</form>
		</div>
	</div>
	<div class="footer-bottom-grids" style="padding:0 0 2em 0;">
		<div class="clearfix"> </div>
		<div class="copyright">
			<strong>Copyright &copy; 2018 <a href="index.php">Best Travel Studio</a>.</strong> All rights
			reserved.
		</div>
	</div>
	<script defer src="js/jquery.flexslider.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
		$(function(){
			SyntaxHighlighter.all();
		});
		$(window).load(function(){
			$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		});
	</script>	
</body>
</html>