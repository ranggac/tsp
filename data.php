<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$fixer=$_POST['fixer'];
$status=$_POST['status'];
if (!empty($fixer) AND !empty($status)){
$note=$_POST['note'];
$idd=$_POST['idd'];
$perintah="INSERT INTO damage_status (id_damage,status,idfixer,report) VALUES ('$idd','$status','$fixer','$note')";

		$hasil=mysql_query($perintah);
		
}

?>
<div class="text-right">
<p class="btn btn-success">Status Kerusakan </p>
</div>
<table class="table">
<thead>
  <tr>
  <?
  
	
    if($admin=="1")
	{
	?>
    <td>Nama</td>
    <td>Dept</td>
    <?
	}
	?>
    <td>Nama Item</td>
    <td>Kerusakan</td>
    <td>Prioritas</td>
    <td>tanggal Input</td>
    <td>Tanggal Target</td>
    <td>Note</td>
    <td>Status </td>
    <td>Fixer Note </td>
    <?
	
    if($admin=="1")
	{
	?>
    <td>Ubah Status</td>
    <?
	}
	?>
  </tr>
  </thead>
  <?

if ($admin==1)
{
	$where="";
	}
else{
		$where=" where ds.iduser = 1";
	}	
  $qryne2 = mysql_query("select ds.nameitem,ds.damageitem,ds.priority,ds.date,ds.targetdate,ds.noteadd,max(d.status) as status,ds.id,user.username as username,dept.name as deptname,d.report  
  from damage ds inner join damage_status d on  ds.id=d.id_damage inner join user on user.id=ds.iduser
  inner join dept on dept.id=user.dept $where group by ds.id order by date desc ;");
	while($row=mysql_fetch_row($qryne2))
	{
  ?>
  <tbody>
  <tr>
  
   <?
	
    if($admin=="1")
	{
	?>
     <td><?=$row[8]?></td>
    <td><?=$row[9]?></td>
    <?
    }?>
    <td><?=$row[0]?></td>
    <td><?=$row[1]?></td>
    <td><?=priority2($row[2])?></td>
    <td><?=$row[3]?></td>
    <td><?=$row[4]?></td>
    <td><?=$row[5]?></td>
    <td><?=priority($row[6])?></td>
    
    <?
    $rs = mysql_query("select damage_status.report,user.username 
	from damage_status inner join user on user.id=damage_status.idfixer where damage_status.id_damage='$row[7]'  order by damage_status.status desc limit 0,1");
		$row2=mysql_fetch_array($rs);
		$rep=$row2[report];
		$fixer=$row2[username];
	?>
    <td><?=$rep?></td>
      
      <?
    if($admin=="1")
	{
	?>
    <td><a href="index.php?q=cstatus&amp;id=<?=$row[7]?>" target="_self">Ubah Status</a></td>
    <?
	}
	?>
      
  </tr>
  </tbody>
  <?
	}
  ?>
</table>
<p>&nbsp;</p>
</body>
</html>