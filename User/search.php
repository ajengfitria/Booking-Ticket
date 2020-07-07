<?php
require "connect.php";
?>
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
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
		padding: 8px;
		line-height: 5;
		vertical-align: top;
		border-top: 1px solid #ddd;
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
						<!-- /script-for-menu -->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="banner">
			<!-- container -->
			<div class="container">
				<div class="col-md-12">
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul class="resp-tabs-list">
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Cari Tujuan Anda</span></li>
								<div class="clearfix"></div>
							</ul>		
							<!---->		  	 
							<div class="resp-tabs-container">		
								<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
										<div class="booking-form">
											<!---strat-date-piker---->
											<link rel="stylesheet" href="css/jquery-ui.css" />
											<script src="js/jquery-ui.js"></script>
											<script>
												$(function() {
													$( "#datepicker,#datepicker1" ).datepicker();
												});
											</script>

											<!---/End-date-piker---->
											<form action="search.php" method="GET">

												<div class="online_reservation">
													<div class="b_room">
														<div class="booking_room">
															<div class="reservation">
																<ul>
																	<li class="span1_of_1 desti">
																		<h5>Kebrangkatan</h5>
																		<div class="book_date">
																			<select class="typeahead1 form-control input-md tt-input" name="asal" style="border-radius: 0px;">
																				<option>Pilih Kota</option>
																				<?php
																				$sql = mysqli_query($cn, "SELECT  * FROM kota");
																				if(mysqli_num_rows($sql) > 0){
																					while($data = mysqli_fetch_assoc($sql)){
																						echo '<option>'.$data['kota'].'</option>';
																					}
																				}
																				?>
																			</select>	
																		</div>					
																	</li>
																	<li class="span1_of_1 desti">
																		<h5>Tujuan</h5>
																		<div class="book_date">
																			<select class="typeahead1 form-control input-md tt-input" name="tujuan" style="border-radius: 0px;">
																				<option>Pilih Kota</option>
																				<?php
																				$sql = mysqli_query($cn, "SELECT  * FROM kota");
																				if(mysqli_num_rows($sql) > 0){
																					while($data = mysqli_fetch_assoc($sql)){
																						echo '<option>'.$data['kota'].'</option>';
																					}
																				}
																				?>
																			</select>
																		</div>		
																	</li>	
																	<li  class="span1_of_1 left">
																		<h5>Tanggal Kebrangkatan</h5>
																		<div class="book_date">
																			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																			<input type="date" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}" name="tgl">
																		</div>		
																	</li>
																	<li  class="span1_of_1 left">
																		<h5>Penumpang</h5>
																		<div class="book_date">
																			<input type="number" class="typeahead1 form-control input-md tt-input" style="border-radius:0px;" placeholder="Jumlah Penumpang" name="sisa">
																		</div>		
																	</li>
																	<li class="span1_of_1">
																		<div class="date_btn">
																			<input type="submit" value="Cari" />
																		</div>
																	</li>
																	<div class="clearfix"></div>
																</ul>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</form>
											<!---->
										</div>	
									</div>
								</div> 			        					            	      
							</div>	
						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //container -->
		</div>
		<!-- banner-bottom -->
		<div class="banner-bottom">
			<!-- container -->
			<div class="container">
				<div class="banner-bottom-info">
					<h3>Hasil Pencarian <?php if(isset($_GET['asal'])){
						$asal = $_GET['asal'];
						$tujuan = $_GET['tujuan'];
						$data = mysqli_query($cn, "SELECT rute.asal,rute.tujuan,rute.tgl,rute.berangkat,rute.sampai,rute.harga,rute.id_rute,rute.sisa,transport.nama_trans FROM rute, transport where rute.id=transport.id_trans AND rute.asal like '".$asal."' AND rute.tujuan like '".$tujuan."'");  
						$d = mysqli_fetch_array($data); 
						echo ''.$d['asal'].' ke '.$d['tujuan'].'';} ?></h3>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-12">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<table class="table" style="color: #000;">
								<thead>
									<tr>
										<th>No</th>
										<th>Asal</th>
										<th>Tujuan</th>
										<th>Tanggal</th>
										<th>Maskapai</th>
										<th>Harga</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									require "connect.php";
									if(isset($_GET['asal'])){
										$asal = $_GET['asal'];
										$tujuan = $_GET['tujuan'];
										$tgl = $_GET['tgl'];
										$sisa = $_GET['sisa'];
										$data = mysqli_query($cn, "SELECT rute.asal,rute.tujuan,rute.bandara_asal,rute.bandara_tujuan,rute.berangkat,rute.sampai,rute.tgl,rute.sisa,rute.berangkat,rute.sampai,rute.harga,rute.id_rute,transport.nama_trans FROM rute, transport where rute.id=transport.id_trans AND rute.asal like '".$asal."' AND rute.tujuan like '".$tujuan."' AND rute.tgl like '".$tgl."' AND rute.sisa-'".$sisa."'> 0 order by rute.harga");  
										$id = 1;
										while($d = mysqli_fetch_array($data)){
											echo'
											<tr>
											<td>'.$id.'</td>
											<td> '.$d['asal'].' <br>('.$d['bandara_asal'].')</td>
											<td> '.$d['tujuan'].' <br>('.$d['bandara_tujuan'].')</td>
											<td> '.$d['tgl'].' <br>('.$d['berangkat'].'-'.$d['sampai'].')</td>
											<td> '.$d['nama_trans'].'</td>
											<td>Rp. '.$d['harga'].'</td>
											<td><a href="pesan.php?id_rute='.$d['id_rute'].'&sisa='.$sisa.'&kuota='.$d['sisa'].'" style="color:#000;" class="date_btn">Pesan</a></td>
											</tr>';
											$id++;
										} 
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="reservation">
							<ul>	
								<li class="span1_of_3">
									<div class="date_btn"><a href="index.php" style="color: white;">Back to Home</a>
									</div>
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>	

					</div>
					<div class="clearfix"></div>
					<div class="clearfix"> </div>
				</div>
				<!-- //container -->
			</div>
			<!-- //banner-bottom -->
			<!-- footer -->
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