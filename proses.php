<html>
<head>
<title>Aplikasi Chat Sederhana Hakko Blog's</title>
</head>
<body>
<?php 

$hr=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari_ini=date("w");
$hari_ini=$hr[$hari_ini];
$jam = date ("H:i:s");

$tgl=date("d/m/Y");
$aktif="1";
$nama = $_POST["jeneng"];
$email = $_POST["email"];
$komentar = $_POST["komentar"];
$komentar2=$_POST["komentar2"];
$figure = $_POST['name'];


$fp = fopen("guestbook.txt","a+");
fputs($fp,"$hari_ini|$tgl|$jam|$nama|$email|$komentar|$figure|$komentar2\n");
fclose($fp);
echo("<script>alert('Komentar anda telah berhasil ditambahkan.'); window.location = 'buy.php'</script>");


?>
</body>
</html>