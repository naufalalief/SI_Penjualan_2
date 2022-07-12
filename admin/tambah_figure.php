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
		$id_figure=$_POST["id_figure"];
		$jenis_figure=$_POST["jenis_figure"];
		$name=$_POST["name"];		
		$series=$_POST["series"];
		$description=$_POST["description"];
		$price=$_POST["price"];

		$nama_file = $_FILES['gambar']['name'];
		$ukuran_file = $_FILES['gambar']['size'];
		$tipe_file = $_FILES['gambar']['type'];
		$tmp_file = $_FILES['gambar']['tmp_name'];

		$newfilename= $id_figure.".jpg";
		$path = "images/".$newfilename;
		if(move_uploaded_file($tmp_file, $path)){
		$q_simpan="insert into figure (id_figure,id_jenis_figure,name,price,series,description,nama,ukuran,tipe,path) values ('".$id_figure."','".$jenis_figure."','".$name."','".$price."','".$series."','".$description."','".$newfilename."','".$ukuran_file."','".$tipe_file."','".$path."')";
		$sql_simpan = mysql_query($q_simpan, $conn);}

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
	<form action="" method="post" enctype="multipart/form-data">
		<tr>
			<td colspan='2'><center><h1>Dragneel Hobby Shop</h1></center></td>
		</tr>
		<tr>
			<td>ID Figure: </td><td><input type="text" name="id_figure" placeholder="ID Figure"></td>
		</tr>
		<tr>
			<td>Jenis Figure: </td><td>			<?php

						echo "<select name='jenis_figure'>";
						$tampil=mysql_query("SELECT * FROM jenis_figure");
						echo "<option value='belum milih' selected>- Pilih jenis -</option>";

						while($w=mysql_fetch_array($tampil))
						{
						echo "<option value=$w[id_jenis_figure] selected>$w[jenis_figure]</option>";        
						}
						echo "</select>";
?></td>
		</tr>
		<tr>
			<td>Name : </td><td><input type="text" name="name" placeholder="Name..."></td>
		</tr>
		<tr>
			<td>Series : </td><td><input type="text" name="series" placeholder="Series..."></td>
		</tr>
		<tr>
			<td>Description : </td><td><input type="text" name="description" placeholder="Description..."></td>
		</tr>
		<tr>
			<td>Price : </td><td><input type="text" name="price" placeholder="Price..."></td>
		</tr>		
		<tr>
			<td colspan="2"><center><input type="file" name="gambar"></center></td>
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