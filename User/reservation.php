<?php
require "connect.php";
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Best Travel | Book Your Flight</title>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Govihar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<!-- //js -->
	<!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,500italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //fonts -->	
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});
	</script>
	<!--pop-up-->
	<script src="js/menu_jquery.js"></script>
	<!--//pop-up-->	
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="header-grids">
				<div class="logo">
					<h1><a  href="index.php"><span>Best Travel</a></h1>
					</div>
					<!--navbar-header-->
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
						<!-- script-for-menu -->
						<script> 
							$( "span.menu" ).click(function() {
								$( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								});
							});

						</script>
						<!-- /script-for-menu -->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--//header-->
		<!-- banner -->
		<div class="banner" style="background: #FFF;">
			<!-- container -->
			<div class="container">
				<div class="col-md-12">
					<div class="sap_tabs" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px; border-radius: 0px;">
							<h3 style="color: #FFF;">Detail Pemasanan</h3><br>
						</div>
						<div class="table-responsive" style="color: #FFF;">
							<table class="table" style="border:none; color: #FFF;">
								<?php require "connect.php";
								$id_rute = $_GET['id_rute'];
								$sisa = $_GET['sisa'];
								$data = mysqli_query($cn, "SELECT rute.asal,rute.tujuan,rute.tgl,rute.sisa,rute.berangkat,rute.sampai,rute.harga,rute.id_rute,transport.nama_trans,transport.jml FROM rute, transport where rute.id=transport.id_trans AND rute.id_rute=".$id_rute." AND rute.sisa-'".$sisa."'> 0");
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
					<br>
					<h3>Isi Data Penumpang</h3>
				</div>
				<div class="clearfix"> </div>
			</div><br>
			<div class="container">
				<?php 
				function getcode(){
					$k = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$h = strlen($k) -1;
					return substr($k, rand(0, $h), 1);
				}
				?>
				<?php
				$sisa = $_GET['sisa'];
				$id_rute = $_GET['id_rute'];
				$nama_pemesan = $_GET['nama_pemesan'];
				$alamat = $_GET['alamat'];
				$no_telp = $_GET['no_telp'];
				$email = $_GET['email'];
				$ktp = $_GET['ktp'];
				$kuota = $_GET['kuota'];
				$sisakuota = $kuota-$sisa;
				$jml = $d['jml'];
				for ($j=1; $j <= $sisa; $j++){
					?>
					<div class="col-md-6">
						<div class="panel panel-default" style="border-color: rgb(97, 102, 125); border-radius: 0px;">
							<div class="panel-heading" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
								<h3 style="color: #FFF;">Data Penumpang <?php echo '#'.$j; ?></h3><br>
							</div>
							<div class="panel-body" style="border-radius: 0px;">
								<form method="POST">
									<input type="hidden" name="ktp" value="<?php echo $ktp; ?>">
									<input type="hidden" name="nama_pemesan" value="<?php echo $nama_pemesan; ?>">
									<input type="hidden" name="alamat" value="<?php echo $alamat; ?>">
									<input type="hidden" name="no_telp" value="<?php echo $no_telp; ?>">
									<input type="hidden" name="email" value="<?php echo $email; ?>">
									<input type="hidden" name="sisa" value="<?php echo $sisa; ?>">
									<input type="hidden" name="kode_res" value="<?php 
									for ($t = 0; $t < 7; $t++){
										echo getcode(); }?>">
										<input type="hidden" name="kode_bayar" value="<?php 
										for ($t = 0; $t < 7; $t++){
											echo getcode(); }?>">
											<input type="hidden" name="id_rute" value="<?php echo $id_rute; ?>">
											<input type="hidden" name="kuota" value="<?php echo $sisakuota ?>">
											<div class="form-group">
												<label class="control-label">Titel</label>
												<select class="form-control" style="border-radius: 0px;" name="titel<?php echo $j ?>">
													<option>Pilih</option>
													<option>Tuan</option>
													<option>Nyonya</option>
													<option>Nona</option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label">Nama</label>
												<input type="text" required="" name="nama_penumpang<?php echo $j ?>" placeholder="Nama Lengkap" class="form-control" style="border-radius: 0px;">
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
							<div class="date_btn col-md-6" style="float: left;">
								<input type="submit" name="Input" value="Selanjutnya" />
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST['Input'])){
						$get= array(
							'id_rute' => $_POST['id_rute'],
							'jml' => $d['jml'],
							'kode_res' => $_POST['kode_res']
						);
						$getdata = http_build_query($get);
						$ktp = $_POST['ktp'];
						$nama_pemesan = $_POST['nama_pemesan'];
						$alamat = $_POST['alamat'];
						$no_telp = $_POST['no_telp'];
						$email = $_POST['email'];
						$kode_bayar = $_POST['kode_bayar'];
						$id_rute = $_POST['id_rute'];
						$kode_res = $_POST['kode_res'];
						$sisakuota = $_POST['kuota'];
						$jml_penumpang = $_POST['sisa'];
						$insertpemesan = mysqli_query($cn, "INSERT INTO pemesan (ktp,nama_pemesan,alamat,no_telp,email,kode_res,kode_bayar,id,status,jml_penumpang) VALUES ('$ktp','$nama_pemesan','$alamat','$no_telp','$email','$kode_res','$kode_bayar','$id_rute','Menunggu Pembayaran','$jml_penumpang')");
						$upd = mysqli_query($cn, "UPDATE rute SET sisa='$sisakuota' WHERE id_rute='$id_rute'");
						for ($j=1; $j <= $sisa; $j++){
							$nama_penumpang = $_POST['nama_penumpang'.$j];
							$titel = $_POST['titel'.$j];
							$insertpenumpang = mysqli_query($cn, "INSERT INTO penumpang (titel,nama_penumpang,kode_res,id_rute) VALUES ('$titel','$nama_penumpang','$kode_res','$id_rute') ");
						}
						header('Location:reservation2.php?'.$getdata);
					}
					?>
					<!-- //container -->
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