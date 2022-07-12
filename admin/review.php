<?php
	error_reporting(0);
	?>
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
<table border="1">
<tr>
<td colspan="2"><center>Review</center></td></tr>
<tr>
			<td colspan="2"><div class="komentar" align="center"><?php
									echo "<head><title>My Guest Book</title></head>";
									$fp = fopen("..\guestbook.txt","r");
									echo "<table border=0>";

									while ($isi = fgets($fp,250))
									{
									$pisah = explode("|",$isi);
									echo "<tr><td>$pisah[0], $pisah[1], $pisah[2]</td></tr>";
									echo "<tr><td>User <font color=brown>$pisah[3]</font>, Said for</td></tr>";
									echo "<tr><td>$pisah[6]</td></tr>";
									echo "<tr><td>$pisah[5]<hr/></td></tr>
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
	<td colspan="2"><button type="submit" name="rate">Kirim</button></td>
</tr>
</form></tr></table>w