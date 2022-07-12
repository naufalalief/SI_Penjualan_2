<?php 
// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();
Setcookie('username','');

Setcookie('password','');
// mengalihkan halaman sambil mengirim pesan logout
header("location:index.php?pesan=logout");
?>