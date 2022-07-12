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
		$nama=$_POST["nama"];
		$alamat=$_POST["alamat"];		
		$jenis_member=$_POST['jenis_member'];
		$username=$_POST["username"];		
		$password=$_POST['password'];

		$q_simpan="insert into member (id_jenis_member,nama,alamat,username,password) values ('".$jenis_member."','".$nama."','".$alamat."','".$username."','".$password."')";
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
	button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}
</style>
</head>
<body>
	<table align="center" class="tbl" border="1">
	<form action="" method="post">
		<tr>
			<td colspan="2"><img src="img/12345.png"></td>
		</tr>
		<tr>
			<td>Pilih jenis member</td><td><?php
include"config.php";

echo "<select name='jenis_member'>";
$tampil=mysql_query("SELECT * FROM jenis_member");
echo "<option value='belum milih' selected>- Pilih jenis member -</option>";

while($w=mysql_fetch_array($tampil))
{
    echo "<option value=$w[id_jenis_member] selected>$w[jenis_member]</option>";        
}
 echo "</select>";
?></td>
		</tr>
		<tr>
			<td>Nama: </td><td><input type="text" name="nama" placeholder="nama..."></td>
		</tr>
		<tr>
			<td>Alamat: </td><td><input type="text" name="alamat" placeholder="alamat..."></td>
		</tr>
		<tr>
			<td>Username: </td><td><input type="text" name="username" placeholder="username..."></td>
		</tr>
		<tr>
			<td>Password: </td><td><input type="password" name="password" placeholder="password..."></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="simpan" value="Register"></center></td>
		</tr>
	</form>
	</table>
</body>
</html>