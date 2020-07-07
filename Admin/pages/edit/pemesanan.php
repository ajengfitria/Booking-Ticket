<?php
session_start();
if($_SESSION['adminticketing']){
	?>
<?php
require "../../connect.php";
if(isset($_GET['aksi']) == 'edit'){
	$ambilid = $_GET['id_pemesan'];
	$cek = mysqli_query($cn, "SELECT * FROM pemesan WHERE id_pemesan='$ambilid'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($cn, "UPDATE pemesan SET status='Dikonfirmasi' WHERE id_pemesan='$ambilid'");
		if($delete){
			echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Sudah Dikonfirmasi.</div>';
			header('location:../tables/pemesanan.php');
		}else{
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dikonfirmasi.</div>';
		}
	}
}
?>
<?php
}else{
	echo "<script>window.location='../index.php';</script>";
}