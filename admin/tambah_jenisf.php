<?php
	error_reporting(0);

	//KONEKSI PHP MYSQL
	$database="figure";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);

	if ($_POST["simpan"])
	{
		//SIMPAN DATA

		$jenis_figure=$_POST['jenis_figure'];


		$q_simpan="insert into jenis_figure (jenis_figure) values ('".$jenis_figure."')";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("");
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
	<form action="" method="post">
		<tr>
			<td colspan='2'><center><h1>Dragneel Hobby Shop</h1></center></td>
		</tr>
		<tr>
			<td>Jenis Figure: </td><td><input type="text" name="jenis_figure" placeholder="Jenis Figure..."></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="simpan" value="Tambah"></center></td>
		</tr>
	</form>
	<tr>
		<td colspan="2"><center><a href="home.php"><button>Back</button></a></center></td>
	</tr>
	</table>
</body>
</html>