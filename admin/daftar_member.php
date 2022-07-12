<?php

include'config.php';
	$key = isset($_GET['cari']) ? $_GET['cari'] : '';

?>
<html>
<title>Dragneel Hobby Shop</title>
<style>
	.apalah{
		width: 100px;
		height: 120px;
	}
	.btn{
		width: 100px;
	}
</style>
<head>
</head>
<body>
<table border="1" Width='1000' align='center'>
<tr>
	<td colspan='8' align='center'><h1>Daftar Member</h1><hr></td>
</tr>
	<tr>
	<form action="">
	<td colspan="8" align="center">Search<br><input type="text" name="cari" value="<?=$key?>"><input type="submit" value="Cari"><hr></td>
	</form>
</tr>
<tr>
	<th><center> ID Member </center></th>
	<th><center> Jenis Member </center></th>
	<th><center> Nama </center></th>
	<th><center> Alamat </center></th>
	<th><center> Action </center></th>
</tr>
<?php
include 'config.php';
$query = mysql_query("select m.id_member, jm.jenis_member, m.nama, m.alamat FROM member m, jenis_member jm WHERE jm.id_jenis_member=m.id_jenis_member and m.nama like '%$key%'
");
$sql = mysql_query("select * from figure");
	while($hasil = mysql_fetch_assoc($query)){
?>
        <tr>
        <td><center><?php echo $hasil['id_member']?></center></td>
        <td><center><?php echo $hasil['jenis_member']?></center></td>		
        <td><center><?php echo $hasil['nama']?></center></td>
        <td><center><?php echo $hasil['alamat']?></center></td>
        <td><center><a href='editm.php?id_member= <?php echo $hasil["id_member"] ?>'><button class="btn">Edit</button></a><br><a href='deletem.php?id_member= <?php echo $hasil["id_member"] ?>'><button class="btn">Delete</button></a>
        </center></td>
        </tr>
<?php
    }
    ?>
    <tr><td colspan="8"><a href='home.php'><center><button class='enter'>Kembali</button></center></td></tr>
 </table>
<div class="">
</html> 