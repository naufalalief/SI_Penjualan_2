<?php 
include 'config.php';
$id_figure = $_GET['id_figure'];
$hapus=unlink( "images/".$id_figure.".jpg" );
if($hapus){
	mysql_query("DELETE FROM figure WHERE id_figure='$id_figure'")or die(mysql_error());
header("location:daftar_figure.php");
}
else{
	echo "eror";
}

?>