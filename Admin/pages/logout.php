<?php
session_start();
unset($_SESSION['adminticketing']);
echo "<script>window.location ='../index.php';</script>";
session_destroy();
?>