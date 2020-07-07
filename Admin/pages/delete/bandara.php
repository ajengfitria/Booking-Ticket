<?php
session_start();
if($_SESSION['adminticketing']){
	?>
<?php
require "../../connect.php";
if(isset($_GET['aksi']) == 'delete'){
	$ambilid = $_GET['id_bandara'];
	$cek = mysqli_query($cn, "SELECT * FROM bandara WHERE id_bandara='$ambilid'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($cn, "DELETE FROM bandara WHERE id_bandara='$ambilid'");
		if($delete){
			echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
			header('location:../tables/bandara.php');
		}else{
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
		}
	}
}
?>
<?php
}else{
	echo "<script>window.location='../index.php';</script>";
}