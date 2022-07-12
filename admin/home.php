<?php
   session_start();
   
   include "config.php";

   if(!isset($_SESSION['username'])){
      header("location:index.php");
      exit();
   }

   if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
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
			<td><center>Selamat	 datang, <?php echo $_SESSION['username']; echo "  "?></center></td>
			<td><center><a href="logout.php">logout</a></center></td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="tambah_jenism.php"><button>Tambah Jenis Member</button></a></center>
			</td>
		</tr>		
		<tr>
			<td colspan="2">
				<center><a href="tambah_jenisf.php"><button>Tambah Jenis Figure</button></a></center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="tambah_figure.php"><button>Tambah Figure</button></a></center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="daftar_figure.php"><button>Daftar Figure</button></a></center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="daftar_member.php"><button>Daftar Member</button></a></center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center><a href="..\index.php"><button>Awal</button></a></center>
			</td>
		</tr>		
		</table>
</body>
</html>