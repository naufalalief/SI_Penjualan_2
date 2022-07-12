<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama     = $_POST['nama'];
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysql_query("select * from member where username='$username' and password='$password' and nama='$nama'");

// menghitung jumlah data yang ditemukan
$cek = mysql_num_rows($data);

if($cek > 0){
	$user = mysql_fetch_array($data);
	$_SESSION['id'] = $user['id_member'];
	$_SESSION['nama'] = $nama;
	$_SESSION['status'] = "login";
	setcookie('username', $username, time()+3600);
	setcookie('password', $password, time()+3600);
	header("location:home.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>