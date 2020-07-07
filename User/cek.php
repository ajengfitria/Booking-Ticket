<?php
require "connect.php";
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
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="cek.php">Cek Pemesanan</a></li>
						</ul>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="banner">
			<div class="container">
				<div class="col-md-12">
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul class="resp-tabs-list">
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Cek Pemesanan</span></li>
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
											<form action="cek2.php" method="GET">
												<div class="online_reservation">
													<div class="b_room">
														<div class="booking_room">
															<div class="reservation">
																<ul>
																	<li class="span1_of_1 left">
																		<h5>E-mail</h5>
																		<div class="book_date">
																			<input type="email" name="email" placeholder="Masukkan e-mail" class="typeahead1 form-control input-md tt-input" style="border-radius: 0px;" required="">
																		</div>					
																	</li>
																	<li class="span1_of_1 left">
																		<h5>Kode Reservasi</h5>
																		<div class="book_date">
																			<input type="text" name="kode_res" placeholder="Masukkan kode reservas" class="typeahead1 form-control input-md tt-input" style="border-radius: 0px;" required="">
																		</div>		
																	</li>
																	<li class="span1_of_1 left">
																		<div class="date_btn">
																			<input type="submit" value="Cek" />
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
		<div class="footer-bottom-grids" style="padding:14.3em 0 2em 0;">
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