<?php
error_reporting(0);
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

	if ($_POST["simpan"])
	{
		//SIMPAN DATA
		$id_member=$_SESSION['id'];
		$id_figure=$_POST['name'];
		$price=$_POST['price'];
		$q_simpan="insert into transaksi (id_member,id_figure,tgl_transaksi,price) values ('".$id_member."','".$id_figure."','".Date('Y-m-d')."','".$price."')";
		$sql=mysql_query($q_simpan);
		header("");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dragneel Hobby Shop</title>
<style type="text/css">
	.tbl{
		margin-left: 200px;
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
.komentar {
    border: 1px solid #5cb85c;
    border-radius :4px;
    width: 300px;
    height: 447px;
    overflow: scroll;
}
</style>
<script src="dist/js/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
    
    <script type="text/javascript">
    x=0;
    $(document).ready(function(){
       $(".komentar").scroll(function(){
        $("span").text(x+=1);
       }); 
    });
    </script>
</head>
<body>
	<table align="left" class="tbl" border="1">
		<?php
			$s="select * from figure where id_figure='".$_GET["id_figure"]."'";
			$q=mysql_query($s);
			$l=mysql_fetch_array($q);
		?>
	<form action="" method="post">
		<tr>
			<td colspan="2"><img src="img/12345.png"></td>
		</tr>
		<tr>
			<td colspan="2"><center><img id="myImg" src="<?php echo "admin/images/".$l['nama']; ?>"></center></td></tr>
<tr>
		<td>Name : </td><td><?php

						echo "<select name='name'>";
						$tampil=mysql_query("SELECT * FROM figure where id_figure='".$_GET["id_figure"]."'");

						while($w=mysql_fetch_array($tampil))
						{
						echo "<option value=$w[id_figure] selected>$w[name]</option> readonly";        
						}
						echo "</select>";
?></td></tr>
		<tr>
		<td>Series : </td><td><input type="text" name="series" value="<?php echo $l['series'] ?>" class='input' readonly></td>
		</tr>
		<tr>
		<td>Description : </td><td><input type="text" name="series" value="<?php echo $l['description'] ?>" class='input' readonly></td>
		</tr>
		<tr>
		<td>Prices : </td><td><input type="text" name="price" value="<?php echo $l['price'] ?>" class='input' readonly></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="simpan" value="Buy" class="buyb"></center></td>
		</tr>
	</form>
	<tr>
		<td colspan="2"><center><a href="daftar_figure.php"><button>Back</button></a></center></td>
	</tr>
	</table>

	<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<table border="1">
<tr>
<td colspan="2"><center>Review</center></td></tr>
<tr>
			<td colspan="2"><div class="komentar" align="center"><?php
									echo "<head><title>My Guest Book</title></head>";
									$fp = fopen("guestbook.txt","r");
									echo "<table border=0>";

									while ($isi = fgets($fp,250))
									{
									$pisah = explode("|",$isi);
									echo "<tr><td>$pisah[0], $pisah[1], $pisah[2]</td></tr>";
									echo "<tr><td>User <font color=brown>$pisah[3]</font>, Rate : </td></tr>";
									echo "<tr><td>$pisah[5]</td></tr>";
									echo "<tr><td>Komentar : </td></tr><tr><td>$pisah[7]<hr/></td></tr>
									<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
									}
									echo "</table>"; 
							?></td></div>
</tr>
<tr>
<form id="formku" method="post" action="proses.php" onsubmit="return formCheck(this);" >
<td>Nama : </td><td><input type="text" id="Editbox1" name="jeneng" value="<?PHP if(isset($_SESSION['nama'])){echo $_SESSION['nama'];}?>" readonly></td></tr>
<tr>
		<td>Email : </td><td><input type="text" name="email"></td>
</tr>
<tr>
		<td>Name : </td><td><?php

						echo "<select name='name'>";
						$tampil=mysql_query("SELECT * FROM figure where id_figure='".$_GET["id_figure"]."'");

						while($w=mysql_fetch_array($tampil))
						{
						echo "<option value=$w[id_figure] selected>$w[name]</option> readonly";        
						}
						echo "</select>";
?></td></tr>
<tr>
		<td>Rate : </td><td><input type="text" name="komentar"></td>
</tr>
<tr>
	<td>Komentar : </td><td><input type="text" name="komentar2"></td>
</tr>
<tr>
	<td colspan="2"><button type="submit" name="rate">Kirim</button></td>
</tr>
</form></tr></table>
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