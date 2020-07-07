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
    <title>BestTravel | Rute</title>
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
                <li><a href="../input/rute.php"><i class="fa fa-circle-o"></i> Input Rute</a></li>
                <li class="active"><a href="../tables/rute.php"><i class="fa fa-circle-o"></i> Daftar Rute</a></li>
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
            <li class="active">Daftar Rute</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Rute</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kebrangkatan</th>
                          <th>Bandara</th>
                          <th>Tujuan</th>
                          <th>Bandara</th>
                          <th>Tanggal</th>
                          <th>Kepergian</th>
                          <th>Kedatangan</th>
                          <th>Maskapai</th>
                          <th>Sisa Kursi</th>
                          <th>Harga</th>
                          <th>Action </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = mysqli_query($cn, "SELECT rute.asal,rute.tujuan,rute.tgl,rute.berangkat,rute.sampai,rute.sisa,rute.harga,rute.id_rute,rute.bandara_asal,rute.bandara_tujuan,transport.nama_trans FROM rute, transport WHERE rute.id=transport.id_trans");
                        if(mysqli_num_rows($sql) == 0){
                          echo '';
                        }else{
                          $id = 1;
                          while($row = mysqli_fetch_assoc($sql)){
                            echo'
                            <tr>
                            <td>'.$id.'</td>
                            <td>'.$row['asal'].'</td>
                            <td>'.$row['bandara_asal'].'</td>
                            <td>'.$row['tujuan'].'</td>
                            <td>'.$row['bandara_tujuan'].'</td>
                            <td>'.$row['tgl'].'</td>
                            <td>'.$row['berangkat'].'</td>
                            <td>'.$row['sampai'].'</td>
                            <td>'.$row['nama_trans'].'</td>
                            <td>'.$row['sisa'].'</td>
                            <td>'.$row['harga'].'</td>
                            <td>';
                            echo '
                            <center>
                            <a href="../edit/rute.php?id_rute='.$row['id_rute'].'"title="Edit" class="btn btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a href="../delete/rute.php?aksi=delete&id_rute='.$row['id_rute'].'"title="Hapus" onclick="return confirm(\'Data Akan Dihapus?\')"class="btn btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
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
                          <th>Kebrangkatan</th>
                          <th>Bandara</th>
                          <th>Tujuan</th>
                          <th>Bandara</th>
                          <th>Tanggal</th>
                          <th>Kepergian</th>
                          <th>Kedatangan</th>
                          <th>Maskapai</th>
                          <th>Sisa Kursi</th>
                          <th>Harga</th>
                          <th>Action </th>
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
    <strong>Copyright &copy; 2018 <a href="../index.php">Best Travel Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>

 <!-- jQuery 3 -->
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../../dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../../dist/js/demo.js"></script>
 <!-- page script -->
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