<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="text-right">
<p class="btn btn-success">Input</p>
</div>
<?

$item=$_POST['item'];
$kerusakan=$_POST['kerusakan'];
if (!empty($item) AND !empty($kerusakan)){

$prior=$_POST['prior'];
$note=$_POST['note'];
$tanya=$_POST['tanya'];
//echo"nama$nama";
//echo"tanya$tanya";

//if ((!$nama) or (!$tanya)) {

	//echo("<center><font size=2>Maaf, data yang anda isikan tidak tepat!.<br>Silahkan ulangi!.</font></center>");

	//echo"<meta http-equiv='refresh' content='2;URL=index.php?dt88=FAQ&hal=1'>";

//}else{ 

	//$ip=$HTTP_SERVER_VARS["REMOTE_ADDR"];

$tang=date("d");
	$bul=date("m");
	$tah=date("Y");
	$da="$tah-$bul-$tang";
	$jam=date("H");
	$mnt=date("i");
	$dtk=date("s");
	$tm=date("Y-m-d H:i:s");

	if (!empty($item) AND !empty($kerusakan)){

		$perintah="INSERT INTO damage (iduser,nameitem,damageitem,priority,targetdate,noteadd) VALUES ('$iduser','$item','$kerusakan','$prior','$tm','$note')";

		$hasil=mysql_query($perintah);
		$rs = mysql_query("select id from damage where nameitem='$item' and damageitem='$kerusakan' order by id desc limit 0,1");
		$row2=mysql_fetch_array($rs);
		$id=$row2[id];
$perintah2="INSERT INTO damage_status (id_damage,dateinput,report) VALUES ('$id','$tm','Please Wait')";

		$hasil2=mysql_query($perintah2);
		if ($hasil){

			echo"Kerusakan,<B> $item </B> Telah dimasukan<BR>";

			echo"Masuk ke menu status untuk melihat proses perbaikan<BR>";

		//	echo"<meta http-equiv='refresh' content='3;URL=index.php?dt88=FAQ&hal=1'>";

 		}else{

			echo"Maaf!! Gagal dimasukan";

			//echo"<meta http-equiv='refresh' content='2;URL=index.php?dt88=FAQ&hal=1'>";

		}

   	}
	else{

		echo"Maaf!! Data yang anda isikan tidak lengkap!!<BR>";
		

		//echo"<meta http-equiv='refresh' content='2;URL=index.php?dt88=FAQ&hal=1'>";

	}
}

 ?>
<form id="form1" name="form1" method="post" action="index.php?q=input" role="form">
<div class="form-group">
 <label for="name">Nama Items </label>
   
    <select name="item" id="item2" class="form-control">
      <option value="CPU" selected="selected">CPU</option>
      <option value="Monitor">Monitor</option>
      <option value="Printer">Printer</option>
      <option value="Other">Other</option>
    </select>
  
</div>
 <div class="form-group">
   
    <label for="kerusakan">Kerusakan</label>
    <textarea name="kerusakan" id="kerusakan" cols="45" rows="5" class="form-control"></textarea>
  
  </div>
  <div class="form-group">
   
    <label for="prior">Prioritas</label>
    <select name="prior" size="1" id="prior" class="form-control">
      <option selected="selected" value="0">Normal</option>
      <option value="1">Urgent</option>
      <option value="2">Top Urgent</option>
    </select>
  </div>
  <div class="form-group">
   <label for="prior">Tanggal Selesai</label> 
  <input type="text" value="" id="some_classrc" class="form-control"/>
  </div>
  <div class="form-group">
  <label for="note">Note</label> 
    <textarea name="note" id="note" cols="45" rows="5" class="form-control"></textarea>
  </div>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default"/>
    <input type="reset" name="submit2" id="submit2" value="Reset" class="btn btn-default"/>
  </p>
  <p>&nbsp; </p>
</form>

</body>
</html>