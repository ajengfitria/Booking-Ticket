<?php
@session_start();
require "connect.php";
if(@$_POST['login']){
  $username = $_POST['username'];
  $pass = md5($_POST['pass']);
  $sql = mysqli_query($cn, "SELECT * FROM user WHERE Username = '$username' AND pass = '$pass'") or die ($db->error);
  $data = mysqli_fetch_array($sql);
  $id = $data[0];
  $cek = mysqli_num_rows($sql);
  if($cek > 0) {
    $_SESSION['adminticketing'] = $id;
    echo "<script>window.location = 'pages/index.php'</script>";
  }else{
    echo "<script>alert('Login Gagal')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Best Travel | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Best Travel</b>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan login terlebih dahulu</p>
      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4" style="float: right;">
            <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Login">
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' 
      });
    });
  </script>
</body>
</html>
