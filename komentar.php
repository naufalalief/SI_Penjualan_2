<html>
<head>
<title>Review</title>
    <style>
.komentar {
    border: 1px solid #5cb85c;
    border-radius :4px;
    width: 500px;
    height: 300px;
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
<?php
echo "<head><title>My Guest Book</title></head>";
$fp = fopen("guestbook.txt","r");
echo "<table border=0>";

while ($isi = fgets($fp,250))
{
$pisah = explode("|",$isi);
echo "<tr><td>$pisah[0], $pisah[1], $pisah[2]</td></tr>";
echo "<tr><td><font color=brown>$pisah[3]</font>, Bilang</td></tr>";
echo "<tr><td>$pisah[5]<hr/></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
}
echo "</table>"; 
?>
</center><br/>
<center>
<form id="formku" method="post" action="proses.php" onsubmit="return formCheck(this);" >
<table style="font-style: oblique; font-weight: bold;">
<tr>
<td width="150">Nama</td>
<td width="30">:</td>
<td width="550"><input type="text" name="nama" size="30" class="form-control" minlength="3" placeholder="Nama Anda" required /></td>
</tr>
<tr>
<td width="150">Email</td>
<td width="30">:</td>
<td width="550"><input type="text" name="email" size="30" class="form-control" minlength="3" placeholder="Alamat Email" required-email /></td>
</tr>
<tr>
<td width="150">Komentar</td>
<td width="30">:</td>
<td width="550"><input type="text" name="komentar" size="30" class="form-control" minlength="3" placeholder="Komentar Anda" required /></td>
</tr>
<tr>
<td width="150"></td>
<td width="30"></td>
<td width="550">
<button type="submit">Kirim</button>
<button type="reset">Reset</button>
<a href="daftar_figure.php"><button type="submit">Back</button></a>
</td>
</tr>
</table>
</form>
</center>
<script src="dist/js/bootstrap.js"></script>
</body>
</html>