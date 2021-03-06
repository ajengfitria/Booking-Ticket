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
            <li class="active">Informasi Pemesanan</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">


              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Informasi Pemesanan</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Pemesan</th>
                          <th>Kebrangkatan</th>
                          <th>Bandara</th>
                          <th>Tujuan</th>
                          <th>Bandara</th>
                          <th>Tanggal / Waktu</th>
                          <th>Maskapai</th>
                          <th>Jumlah Pemesanan</th>
                          <th>Kode Reservasi</th>
                          <th>Status</th>
                          <th>Bukti Pembayaran</th>
                          <th>Pembayaran</th>
                          <th>Action </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = mysqli_query($cn, "SELECT pemesan.kode_res, pemesan.id_pemesan, pemesan.status, pemesan.bukti_bayar, pemesan.jml_penumpang,rute.asal,rute.tujuan,rute.tgl,rute.berangkat,rute.sampai,rute.sisa,rute.harga,rute.id_rute,rute.bandara_asal,rute.bandara_tujuan,transport.nama_trans FROM rute, pemesan, transport WHERE pemesan.id=rute.id_rute AND rute.id=transport.id_trans AND status='Menunggu Konfirmasi'");
                        if(mysqli_num_rows($sql) == 0){
                          echo '';
                        }else{
                          $id = 1;
                          while($row = mysqli_fetch_assoc($sql)){
                            $pembayaran = $row['jml_penumpang']*$row['harga'];
                            echo'
                            <tr>
                            <td>'.$id.'</td>
                            <td><a href="pemesan.php?id='.$row['id_pemesan'].'" title="Cek Pemesan">'.$row['id_pemesan'].'</a></td>
                            <td>'.$row['asal'].'</td>
                            <td>'.$row['bandara_asal'].'</td>
                            <td>'.$row['tujuan'].'</td>
                            <td>'.$row['bandara_tujuan'].'</td>
                            <td>'.$row['tgl'].' / '.$row['berangkat'].'-'.$row['sampai'].'</td>
                            <td>'.$row['nama_trans'].'</td>
                            <td>'.$row['jml_penumpang'].'</td>
                            <td>'.$row['kode_res'].'</td>
                            <td>'.$row['status'].'</td>
                            <td><a href="../../../User/images/'.$row['bukti_bayar'].'">'.$row['bukti_bayar'].'</a></td>
                            <td>'.$pembayaran.'</td>
                            <td>';
                            echo '
                            <a href="../edit/pemesanan.php?aksi=edit&id_pemesan='.$row['id_pemesan'].'"title="Konfirmasi" onclick="return confirm(\'Konfirmasi pemesanan?\')"class="btn btn-sm btn-primary">Konfirmasi</a>
                            </td>
                            </tr>
                            ';
                            $id++;
                          }
                        }
                        $sql2 = mysqli_query($cn, "SELECT pemesan.kode_res, pemesan.id_pemesan, pemesan.status, pemesan.bukti_bayar, pemesan.jml_penumpang,rute.asal,rute.tujuan,rute.tgl,rute.berangkat,rute.sampai,rute.sisa,rute.harga,rute.id_rute,rute.bandara_asal,rute.bandara_tujuan,transport.nama_trans FROM rute, pemesan, transport WHERE pemesan.id=rute.id_rute AND rute.id=transport.id_trans AND status='Dikonfirmasi'");
                        if(mysqli_num_rows($sql2) == 0){
                        echo '';
                        }else{
                          while($row2 = mysqli_fetch_assoc($sql2)){
                            $pembayaran2 = $row2['jml_penumpang']*$row2['harga'];
                            echo'
                            <tr>
                            <td>'.$id.'</td>
                            <td><a href="pemesan.php?id='.$row2['id_pemesan'].'">'.$row2['id_pemesan'].'</a></td>
                            <td>'.$row2['asal'].'</td>
                            <td>'.$row2['bandara_asal'].'</td>
                            <td>'.$row2['tujuan'].'</td>
                            <td>'.$row2['bandara_tujuan'].'</td>
                            <td>'.$row2['tgl'].' / '.$row2['berangkat'].'-'.$row2['sampai'].'</td>
                            <td>'.$row2['nama_trans'].'</td>
                            <td>'.$row2['jml_penumpang'].'</td>
                            <td>'.$row2['kode_res'].'</td>
                            <td>'.$row2['status'].'</td>
                            <td><a href="../../../User/images/'.$row2['bukti_bayar'].'">'.$row2['bukti_bayar'].'</a></td>
                            <td>'.$pembayaran2.'</td>
                            <td>';
                            echo '
                            -
                            </td>
                            </tr>
                            ';
                            $id++;
                          }
                        }
                        $sql3 = mysqli_query($cn, "SELECT pemesan.kode_res, pemesan.id_pemesan, pemesan.status, pemesan.bukti_bayar, pemesan.jml_penumpang,rute.asal,rute.tujuan,rute.tgl,rute.berangkat,rute.sampai,rute.sisa,rute.harga,rute.id_rute,rute.bandara_asal,rute.bandara_tujuan,transport.nama_trans FROM rute, pemesan, transport WHERE pemesan.id=rute.id_rute AND rute.id=transport.id_trans AND status='Menunggu Pembayaran'");
                        if(mysqli_num_rows($sql3) == 0){
                          echo '';
                        }else{
                          while($row3 = mysqli_fetch_assoc($sql3)){
                             $pembayaran3 = $row3['jml_penumpang']*$row3['harga'];
                            echo'
                            <tr>
                            <td>'.$id.'</td>
                            <td><a href="pemesan.php?id='.$row3['id_pemesan'].'">'.$row3['id_pemesan'].'</a></td>
                            <td>'.$row3['asal'].'</td>
                            <td>'.$row3['bandara_asal'].'</td>
                            <td>'.$row3['tujuan'].'</td>
                            <td>'.$row3['bandara_tujuan'].'</td>
                            <td>'.$row3['tgl'].' / '.$row3['berangkat'].'-'.$row3['sampai'].'</td>
                            <td>'.$row3['nama_trans'].'</td>
                            <td>'.$row3['jml_penumpang'].'</td>
                            <td>'.$row3['kode_res'].'</td>
                            <td>'.$row3['status'].'</td>
                            <td><a href="../../../User/images/'.$row3['bukti_bayar'].'">'.$row3['bukti_bayar'].'</a></td>
                            <td>'.$pembayaran3.'</td>
                            <td>';
                            echo '
                            -
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
                          <th>Id Pemesan</th>
                          <th>Kebrangkatan</th>
                          <th>Bandara</th>
                          <th>Tujuan</th>
                          <th>Bandara</th>
                          <th>Tanggal / Waktu</th>
                          <th>Maskapai</th>
                          <th>Jumlah Pemesanan</th>
                          <th>Kode Reservasi</th>
                          <th>Pembayaran</th>
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