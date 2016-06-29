<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
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
<table class="table">
<thead>
  <tr>
    <td width="137">date Progress</td>
    <td width="11">Status</td>
    <td width="11">Fixer</td>
    <td width="168">Report</td>
  </tr>
  </thead>
  <?
  $qryne2 = mysql_query("select ds.status,ds.dateinput,u.username,ds.report 
  from damage_status ds left join user u on u.id=ds.idfixer
  where ds.id_damage='$did' order by ds.dateinput desc
  ;");
 
 
	while($row=mysql_fetch_row($qryne2))
	{
  ?>
  <tbody>
  <tr>
    <td><?=$row[1]?></td>
    <td><?=priority($row[0])?></td>
    <td><?=$row[2]?></td>
    <td><?=$row[3]?></td>
  </tr>
  </tbody>
  <?
	}
  ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>