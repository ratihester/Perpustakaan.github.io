<?php

session_start();

//menghubungkan dengan koneksi
 require_once('inc/koneksi.php');

//mengambil data dari v_daftar
$username = $_POST['username'];
$password   = md5($_POST['password']);

//input data ke database
//query data
$login = mysqli_query($connection, "SELECT * FROM `tbl_user` WHERE `tbl_user`.`username` = '$username' AND `tbl_user`.`password` = '$password'");
$cek   = mysqli_num_rows($login);
if($cek > 0){
  $akun = $login->fetch_assoc();
  $_SESSION['tbl_user'] = $tbl_user;
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "login";
  $_SESSION['logged'] = true;
  header("location: index.php");
} else {
  $_SESSION['logged'] = false;
  echo "<script>alert('Gagal Login, Username dan Password Salah!');</script>";
}
