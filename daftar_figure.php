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
	<td colspan='8' align='center'><h1>Daftar Figure</h1><hr></td>
</tr>
	<tr>
	<form action="">
	<td colspan="8" align="center">Search<br><input type="text" name="cari" value="<?=$key?>"><input type="submit" value="Cari"><hr></td>
	</form>
</tr>
<tr>
	<th><center> ID Figure </center></th>
	<th><center> Jenis Figure </center></th>
	<th><center> Image </center></th>	
	<th><center> Name </center></th>
	<th><center> Series </center></th>
	<th><center> Price </center></th>
	<th colspan="4"><center> Action </center></th>
</tr>
<?php
include 'config.php';
$query = mysql_query("select f.id_figure, j.jenis_figure, f.name, f.series, f.price, f.nama FROM figure f, jenis_figure j WHERE j.id_jenis_figure=f.id_jenis_figure and f.name like '%$key%'
");
$sql = mysql_query("select * from figure");
	while($hasil = mysql_fetch_assoc($query)){
?>
        <tr>
        <td><center><?php echo $hasil['id_figure']?></center></td>
        <td><center><?php echo $hasil['jenis_figure']?></center></td>
		<td><center>
			<img src="<?php echo "admin/images/".$hasil['nama']; ?>" class='apalah'></center>
		</td>		
        <td><center><?php echo $hasil['name']?></center></td>
        <td><center><?php echo $hasil['series']?></center></td>
        <td><center><?php echo $hasil['price']?></center></td>
        <td><center><a href='buy.php?id_figure= <?php echo $hasil["id_figure"] ?>'><button class="btn">Buy</button></a></center></td>
        </tr>
<?php
    }
    ?>
    <tr><td colspan="8"><a href='home.php'><center><button class='enter'>Kembali</button></center></td></tr>
 </table>
<div class="">
</html> 