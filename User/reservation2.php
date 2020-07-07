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
	<style type="text/css">
	.customer-color{
		width: 15px;
		height: 15px;
		background-color:#61667d;
		cursor:pointer;
	}
	.customer-selected{
		background-color:#2d2d2f;
	}
	/* seat */
	.seat{
		background-color:#f2f2f2;
		padding:5px;
		overflow: hidden;
	}
	.seat-id{
		height: 46px;
		width: 46px;
		margin:2px;
		background-color: #bfbfbf;
		float: left;
		cursor: pointer;
	}
	.seat-id > p{
		text-align: center;
	}
	.seat-notavailabe{
		background-color: #dc352f;
		/* cursor:disabl */
	}
	.seat-selected{
		background-color: #61667d;
	}
</style>
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
								<?php
								$kode_res = $_GET['kode_res'];
								$data_penum = mysqli_query($cn, "SELECT * FROM pemesan WHERE kode_res='$kode_res'");
								$dp = mysqli_fetch_array($data_penum);
								$rute_res = $dp['id'];
								$kode_res = $dp['kode_res'];
								$data = mysqli_query($cn, "SELECT rute.asal,rute.tujuan,rute.tgl,rute.sisa,rute.berangkat,rute.sampai,rute.harga,rute.id_rute,transport.nama_trans,transport.jml FROM rute, transport where rute.id=transport.id_trans AND rute.id_rute=".$rute_res."");
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
			</div><br>
			<div class="container">
				<div class="col-md-12">
					<div class="sap_tabs" style="background-color: rgb(97, 102, 125); border-radius: 0px;">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px; border-radius: 0px;">
							<h3 style="color: #FFF;">Pilih Lokasi Kursi</h3><br>
						</div>
					</div>
					<form method="POST">
						<?php
						$kode = $dp['kode_res'];
						$jml = $_GET['jml'];
						$pemesan = mysqli_query($cn,"SELECT * FROM penumpang WHERE kode_res='$kode'"); 
						$jumlah_cos = mysqli_num_rows($pemesan);
						$count = 0;
						if(isset($_POST['submit'])){
							$get = array(
								'kode_res' => $kode_res,
								'id_rute' => $rute_res,
								'jumlah_cos' => $jumlah_cos
							);
							$getdata = http_build_query($get);
							$kursi = $_POST['kursi'];
							foreach ($pemesan as $cus) {
								$cn->query("UPDATE penumpang SET kode_kursi='$kursi[$count]' WHERE kode_res='$kode' AND id_penumpang = '$cus[id_penumpang]'");
								$count++;
							}
							header('Location:reservation3.php?'.$getdata);
						} 
						?>
						<?php
						for ($i=1; $i <= $jumlah_cos ; $i++) { 
							
							?>
							<div class="customer-name">
								<table>
									<td>
										<div onclick="pget(this.id)" id="p<?php echo $i;?>" class="customer-color id-1"></div>
									</td>
									<div class="form-group">
										<td>
											<span>Penumpang<?php echo $i; ?></span>
										</td>
										<td>
											<input required="" id="i<?php echo $i ?>" type="text" name="kursi[]">
										</td>
									</div>
								</table>
							</div>
							<?php
						}
						?>
						<?php
						$apa = [];
						$sss = mysqli_query($cn, "SELECT * FROM penumpang WHERE id_rute =".$rute_res."");
						while ($bb = mysqli_fetch_assoc($sss)) {
							$apa[]=$bb['kode_kursi'];
						}
						?>
						<div class="seat">
							<?php
							for ($i=1; $i <= $jml ; $i++) { 
								if (in_array($i, $apa)) {
									?>
									<div id="<?php echo $i; ?>" class="seat-id seat-notavailabe"><p><?php echo $i; ?></p></div>
									<?php
								}
								else{
									?>
									<div onclick="sget(this.id)" id="<?php echo $i; ?>" class="seat-id"><p><?php echo $i; ?></p></div>

									<?php
								}
							} 
							?>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="date_btn col-md-12">
						<input type="submit" class="btn btn-primary" name="submit" value="Selanjutnya" style="border-radius: 0px; float: right;">
					</div>
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
		<script>

			function pget(id){
				seat.p = id;
				$('.customer-color').removeClass("customer-selected");
				$('#'+id).addClass("customer-selected");
			}
			function sget(id){
				seat.selectSeat(id);
			}

			var seat = {
				p:'',
				pn:function(id){
					pn = id.replace('p', '');
					return pn;
				},
				selectSeat: function(id) {
					if ($('#' + id).attr('class') == 'seat-id') {

						if($('#i'+this.pn(this.p)).val() == ''){
							$('#' + id).addClass("seat-selected");
                         // console.log(this.pn(this.p));
                         $('#i'+this.pn(this.p)).val(id);
                         $('#'+id).addClass('seat-for-'+this.p);
                     }


                 } else {
                 	cSeat = $('#' + id).attr('class');
                 	cSeatoc = cSeat.replace('seat-id seat-selected seat-for-p','');
                 	$('#' + id).removeClass("seat-selected");
                 	$('#'+id).removeClass(cSeat.replace('seat-id ',''));
                 	$('#i'+cSeatoc).val(''); 


                 }
                //    console.log($('#'+id).attr('class'));
            }
        }



    </script>
</body>
</html>