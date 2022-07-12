<?php
   session_start();
   
   include "config.php";
      if(isset($_SESSION['nama'])){
      $nama = $_SESSION['nama'];
   }
    if (empty($_SESSION['nama'])) {
 	header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dragneel Hobby Shop</title>
<style type="text/css">
	button{
		width: 200px;
	}
</style>
</head>
<body>
	<table align="center" class="tbl" border="1">
		<tr>
			<td colspan="2"><img src="img/12345.png"></td>
		</tr>
		<tr>
			<td colspan="2"><center>Selamat	 datang, <?php echo $_SESSION['nama']; echo "  "?></center></td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="daftar_figure.php"><button>List</button></a></center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="logout.php"><button>Logout</button></a></center>
			</td>
		</tr>
	</table>
</body>
</html>