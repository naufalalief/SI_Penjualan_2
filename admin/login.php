<?php
   session_start();
   
   include "config.php";

   if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
       header("location:home.php"); // jika belum login, maka dikembalikan ke file form_login.php

   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dragneel Hobby Shop</title>
<style type="text/css">
	.tbl{

	}
	button{
		width: 120px;
	}
	input{
		width: 120px;
	}
</style>
</head>
<body>
<table align="center" class="tbl" border="1">
	<form action="proses_login.php" method="post">
	<tr>
			<td colspan="2"><img src="img/12345.png"></td>
	</tr>
	<tr>
		<td>Username : </td><td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password : </td><td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td colspan="2"><center><input type="submit" name="login" value="Login"></center></td>
	</tr></form>
	<tr>
		<td colspan="2"><center><a href="./index.php"><button>Back</button></a></center></td>
	</tr>
</table>
</body>
</html>