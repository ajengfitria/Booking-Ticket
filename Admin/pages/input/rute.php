<?php
session_start();
require'../../connect.php';
if(@$_SESSION['adminticketing']){
  $user_terlogin=$_SESSION['adminticketing'];
  $sql_user = $cn->query("SELECT * FROM user WHERE id_user='$user_terlogin'") or die (mysqli_error());
  $data_user = mysqli_fetch_array($sql_user);
  if (isset($_POST['Input'])){
    $tgl = $_POST['tgl'];
    $asal = $_POST['asal'];
    $bandara_asal = $_POST['bandara_asal'];
    $tujuan = $_POST['tujuan'];
    $bandara_tujuan = $_POST['bandara_tujuan'];
    $harga = $_POST['harga'];
    $berangkat = $_POST['berangkat'];
    $sampai = $_POST['sampai'];
    $sisa = $_POST['sisa'];
    $id = $_POST['id'];
    $cn->query("INSERT INTO rute (tgl,asal,bandara_asal,tujuan,bandara_tujuan,harga,id,berangkat,sampai,sisa) VALUES ('$tgl','$asal','$bandara_asal','$tujuan','$bandara_tujuan','$harga','$id','$berangkat','$sampai','$sisa')");
    header('location:../tables/rute.php');
  }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BestTravel | Input Rute</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="../index.php" class="logo">
          <span class="logo-lg">Best Travel</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $data_user['namapanjang']?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $data_user['namapanjang']?> - Web Developer
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $data_user['namapanjang']?></p>
            </div>
          </div>
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Halaman Utama</li>
            <li>
              <a href="../index.php">
                <i class="fa fa-dashboard"></i> <span>Beranda</span>
              </a>
            </li>
            <li>
              <a href="../tables/pemesanan.php">
                <i class="fa fa-ticket"></i> <span>Pemesanan</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-map-marker"></i> <span>Rute</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="../input/rute.php"><i class="fa fa-circle-o"></i> Input Rute</a></li>
                <li><a href="../tables/rute.php"><i class="fa fa-circle-o"></i> Daftar Rute</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-fighter-jet"></i> <span>Pesawat</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../input/pesawat.php"><i class="fa fa-circle-o"></i> Input Pesawat</a></li>
                <li><a href="../tables/pesawat.php"><i class="fa fa-circle-o"></i> Daftar Pesawat</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Kota</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../input/kota.php"><i class="fa fa-circle-o"></i> Input Kota</a></li>
                <li><a href="../tables/kota.php"><i class="fa fa-circle-o"></i> Daftar Kota</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Bandara</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../input/bandara.php"><i class="fa fa-circle-o"></i> Input Bandara</a></li>
                <li><a href="../tables/bandara.php"><i class="fa fa-circle-o"></i> Daftar Bandara</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Best Travel
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Input Rute</li>
          </ol>
        </section>

        <section class="content">
         <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Input Daftar Rute</h3>
          </div>
          <form role="form" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="asal">Maskapai</label>
                <select class="form-control" name="id" required="">
                  <option disabled="" selected="">Pilih Maskapai</option>
                  <?php
                  $sql = mysqli_query($cn, "SELECT  * FROM transport");
                  if(mysqli_num_rows($sql) > 0){
                    while($data = mysqli_fetch_assoc($sql)){
                      echo '<option value="'.$data['id_trans'].'">'.$data['nama_trans'].'</option>';
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="asal">Kebrangkatan</label>
                <select class="form-control" name="asal" required="">
                  <option disabled="" selected="">Pilih Kota Kebrangkatan</option>
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
              <div class="form-group">
                <select class="form-control" name="bandara_asal" required="">
                  <option disabled="" selected="">Pilih Bandara Kebrangkatan</option>
                  <?php
                  $sql = mysqli_query($cn, "SELECT  * FROM bandara");
                  if(mysqli_num_rows($sql) > 0){
                    while($data = mysqli_fetch_assoc($sql)){
                      echo '<option>'.$data['nama_bandara'].'</option>';
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="asal">Tujuan</label>
                <select class="form-control" name="tujuan" style="border-radius: 0px;" required="">
                  <option disabled="" selected="">Pilih Kota Tujuan</option>
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
              <div class="form-group">
                <select class="form-control" name="bandara_tujuan" required="">
                  <option disabled="" selected="">Pilih Bandara Tujuan</option>
                  <?php
                  $sql = mysqli_query($cn, "SELECT  * FROM bandara");
                  if(mysqli_num_rows($sql) > 0){
                    while($data = mysqli_fetch_assoc($sql)){
                      echo '<option>'.$data['nama_bandara'].'</option>';
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="tgl">Tanggal</label>
                <input type="date" class="form-control" id="tgl" name="tgl" required="">
              </div>
              <div class="form-group">
                <label for="tujuan">Waktu Keberangkatan</label>
                <input type="time" class="form-control" id="tujuan" name="berangkat" required="">
              </div>
              <div class="form-group">
                <label for="tgl">Waktu Tiba</label>
                <input type="time" class="form-control" id="tgl" name="sampai" required="">
              </div>
              <div class="form-group">
                <label for="Jumlah Kursi">Jumlah Kursi</label>
                <input type="number" class="form-control" id="Jumlah Kursi" placeholder="Jumlah Kursi" name="sisa" required="">
              </div>
              <div class="form-group">
                <label for="Harga">Harga</label>
                <input type="text" class="form-control" id="Harga" placeholder="Harga" name="harga" required="">
              </div>
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-primary"><a href="../tables/rute.php" style="color: #FFFFFF;">Cancel</a></button>
              <input type="submit" class="btn btn-primary" name="Input" value="Input">
            </div>
          </form>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->

     <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="index.php">Best Travel Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>

  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../bower_components/Chart.js/Chart.js"></script>
  <script src="../../dist/js/pages/dashboard2.js"></script>
  <script src="../../dist/js/demo.js"></script>
</body>
</html>
<?php
}else{
  echo "<script>window.location='../../index.php';</script>";
}