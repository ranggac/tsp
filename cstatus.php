<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>Change Status
</p>
<?
$did=$_GET['id'];
$rs = mysql_query("select u.username,ds.nameitem  as name,ds.damageitem,ds.priority,max(ds.date) as date,max(ds.targetdate) as targetdate,ds.noteadd,max(d.status) as status,ds.id  from damage ds inner join damage_status d on  ds.id=d.id_damage 
inner join user u on u.id=ds.iduser 
where ds.id = $did group by ds.id;");

$row2=mysql_fetch_array($rs);
$nama=$row2[name];
$username=$row2[username];
$damageitem=$row2[damageitem];
$idate=$row2[date];
$tdate=$row2[targetdate];
$noteadd=$row2[noteadd];
$status=$row2[status];

?>
<p>Nama : <?=$username?></p>
<p>Nama Barang : <?=$nama?></p>
<p>Kerusakan : <?=$damageitem?></p>
<p>Tanggal input : <?=$idate?></p>
<p>Tanggal Target : <?=$tdate?></p>
<p>Note : <?=$noteadd?></p>
<p>Status Sebelum : <?=priority($status)?></p>
<form id="form1" name="form1" method="post" action="index.php?q=data" >
  <div class="form-group">
    <label for="status">Status Sekarang</label>
    <select name="status" id="status" class="form-control">
      <option value="0">Menunngu Antrian</option>
      <option value="1">Dalam Proses</option>
      <option value="2">Selesai</option>
    </select>
    <input name="idd" type="hidden" id="idd" value="<?=$did?>" />
  </div>
  <div class="form-group">
    
    <label for="fixer">Fixer</label>
    <select name="fixer" id="fixer" class="form-control">
    <?
    $qryne2 = mysql_query("select id,username from user where dept=5");
	while($row=mysql_fetch_row($qryne2))
	{
	?>
    <option value="<?=$row[0]?>"><?=$row[1]?></option>
    <?
	}
	?>
    </select>
  </div>
   <div class="form-group">
    <label for="note">Note </label>
    <textarea name="note" id="note" cols="45" rows="5" class="form-control"></textarea>
  </div>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default"/>
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>