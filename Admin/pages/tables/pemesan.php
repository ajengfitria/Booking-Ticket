<?php
session_start();
require'../../connect.php';
if(@$_SESSION['adminticketing']){
  $user_terlogin=$_SESSION['adminticketing'];
  $sql_user = $cn->query("SELECT * FROM user WHERE id_user='$user_terlogin'") or die (mysqli_error());
  $data_user = mysqli_fetch_array($sql_user);
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BestTravel | Pemesanan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <li class="active">
              <a href="../tables/pemesanan.php">
                <i class="fa fa-ticket"></i> <span>Pemesanan</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-map-marker"></i> <span>Rute</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../input/rute.php"><i class="fa fa-circle-o"></i> Input Rute</a></li>
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
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Best Travel
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Informasi Pemesan</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">


              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Informasi Pemesan</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No. Identitas</th>
                          <th>Nama Pemesan</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>No. Telp</th>
                          <th>Penumpang</th>
                          <th>Kode Kursi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $id_pemesan = $_GET['id'];
                        $sql = mysqli_query($cn, "SELECT pemesan.nama_pemesan, pemesan.ktp, pemesan.alamat, pemesan.email, pemesan.no_telp, pemesan.kode_res, penumpang.titel, penumpang.kode_res, penumpang.nama_penumpang, penumpang.kode_kursi FROM pemesan, penumpang WHERE pemesan.id_pemesan='$id_pemesan' AND pemesan.kode_res=penumpang.kode_res");
                        $jml=mysqli_num_rows($sql);
                        if(mysqli_num_rows($sql) == 0){
                          echo '';
                        }else{
                          $id = 1;
                          while($row = mysqli_fetch_assoc($sql)){
                            echo'
                            <tr>
                            <td>'.$id.'</td>
                            <td>'.$row['ktp'].'</td>
                            <td>'.$row['nama_pemesan'].'</td>
                            <td>'.$row['alamat'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['no_telp'].'</td>
                            <td>'.$row['titel'].'. '.$row['nama_penumpang'].'</td>
                            <td>'.$row['kode_kursi'].'</td>
                            </tr>
                            ';
                            $id++;
                          }
                        }

                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>No. Identitas</th>
                          <th>Nama Pemesan</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>No. Telp</th>
                          <th>Penumpang</th>
                          <th>Kode Kursi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
       <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="index.php">Best Travel Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
 <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
 <script src="../../dist/js/adminlte.min.js"></script>
 <script src="../../dist/js/demo.js"></script>
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php
}else{
  echo "<script>window.location='../../index.php';</script>";
}