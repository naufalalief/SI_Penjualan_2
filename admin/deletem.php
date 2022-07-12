<?php 
include 'config.php';
$id_member = $_GET['id_member'];
mysql_query("DELETE FROM member WHERE id_member='$id_member'")or die(mysql_error());

header("location:daftar_member.php");
?>