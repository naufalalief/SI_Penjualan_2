<?php
	session_start();
   if(!isset($_SESSION['nama'])){
      // $username = $_SESSION['nama'];
   	header("Location: login.php");
   }
	//KONEKSI PHP MYSQL
	$database="figure";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);

	if (isset($_POST["simpan"]))
	{
		//SIMPAN DATA
		$id_member=$_POST['id_member'];
		$jenis_member=$_POST['jenis_member'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$price=$_POST['price'];

		$s=mysql_query("UPDATE member SET id_member='$id_member', id_jenis_member='$jenis_member', nama='$nama', alamat='$alamat' WHERE id_member='$id_member'");
		$q=mysql_query($s);

		header("location:daftar_member.php");


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
	.input{
		width: 500px;
		border:none;
	}
	#myImg {
	    border-radius: 5px;
	    cursor: pointer;
	    transition: 0.3s;
	}

	#myImg:hover {opacity: 0.7;}

	/* The Modal (background) */
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    padding-top: 100px; /* Location of the box */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-content {
	    margin: auto;
	    display: block;
	    width: 80%;
	    max-width: 700px;
	}

	/* Caption of Modal Image */
	#caption {
	    margin: auto;
	    display: block;
	    width: 80%;
	    max-width: 700px;
	    text-align: center;
	    color: #ccc;
	    padding: 10px 0;
	    height: 150px;
	}

	/* Add Animation */
	.modal-content, #caption {    
	    -webkit-animation-name: zoom;
	    -webkit-animation-duration: 0.6s;
	    animation-name: zoom;
	    animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
	    from {-webkit-transform:scale(0)} 
	    to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
	    from {transform:scale(0)} 
	    to {transform:scale(1)}
	}

	/* The Close Button */
	.close {
	    position: absolute;
	    top: 15px;
	    right: 35px;
	    color: #f1f1f1;
	    font-size: 40px;
	    font-weight: bold;
	    transition: 0.3s;
	}

	.close:hover,
	.close:focus {
	    color: #bbb;
	    text-decoration: none;
	    cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
	    .modal-content {
	        width: 100%;
	    }
	}
	.buyb{
		width: 120px;
	}
</style>
</head>
<body>
	<table align="center" class="tbl" border="1">
		<?php
			$s="select * from member where id_member='".$_GET["id_member"]."'";
			$q=mysql_query($s);
			$l=mysql_fetch_array($q);
		?>
	<form action="" method="post">
		<tr>
			<td colspan='2'><center><h1>Dragneel Hobby Shop</h1></center></td>
		</tr>
<tr>
	<td>ID Member : </td><td><input type="text" name="id_member" value="<?php echo $l['id_member'] ?>" class='input' readonly></td>
</tr>
<tr>
		<td>Jenis Member : </td><td><?php

						echo "<select name='jenis_member'>";
						$tampil=mysql_query("SELECT * FROM jenis_member");

						while($w=mysql_fetch_array($tampil))
						{
						echo "<option value=$w[id_jenis_member] selected>$w[jenis_member]</option> ";        
						}
						echo "</select>";
?></td></tr>
		<tr>
		<td>Nama : </td><td><input type="text" name="nama" value="<?php echo $l['nama'] ?>" class='input' readonly></td>
		</tr>
		<tr>
		<td>Alamat : </td><td><input type="text" name="alamat" value="<?php echo $l['alamat'] ?>" class='input'></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="simpan" value="Edit" class="buyb"></center></td>
		</tr>
	</form>
	<tr>
		<td colspan="2"><center><a href="daftar_member.php"><button>Back</button></a></center></td>
	</tr>
	</table>
	<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
</body>
</html>
<script type="text/javascript">
	// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
} 
</script>
