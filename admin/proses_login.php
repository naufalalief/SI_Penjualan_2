<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysql_query("select * from admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysql_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	setcookie('username', $username, time()+3600);
	setcookie('password', $password, time()+3600);
	header("location:home.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>