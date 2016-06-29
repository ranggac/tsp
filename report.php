<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="text-right">
<p class="btn btn-success">Report</p>
</div>
<p>&nbsp</p>
<div class="thumbnail">
                   
                    <div class="caption-full">
					<div class="hidden-print">
                        
                        <h4><a href="#">Search</a>
                        </h4>
                        <form id="form1" name="form1" method="post" action="index.php?q=report" role="form" class="form-inline">
  <div class="form-group">
    <input type="checkbox" name="cbtime" id="cbtime" class="form-control" />
    <label for="cbtime">From</label>
     
  <label for="ftime"></label>
  <input type="text" name="ftime" id="ftime" class="form-control" /> 
    
  <label for="ttime">to time</label>
  <input type="text" name="ttime" id="ttime" class="form-control" />
  </div>
  <div class="form-group">
    <label for="item">Item Name </label>
    <select name="item" id="item2" class="form-control">
      <option value="%" selected="selected">All</option>
      <option value="CPU">CPU</option>
      <option value="Monitor">Monitor</option>
      <option value="Printer">Printer</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default"/>
  </p>
</form>
                    </div>
					</div>
                    
                </div>



<p>&nbsp;</p>
<table class="table">
<thead>
  <tr>
 
    <td>Nama</td>
    <td>Dept</td>
      <td>Nama Item</td>
    <td>Kerusakan</td>
    <td>Prioritas</td>
    <td>tanggal Input</td>
    <td>Tanggal Target</td>
    <td>Note</td>
    <td>Status </td>
    <td>Fixer </td>
    <td>Note Fixer </td>
    <td>Show Progress </td>
  
  </tr>
  </thead>
  <?
$item=$_POST['item'];
if (!empty($item))
{
	$a=$_POST['cbtime'];
		$where=" where ds.nameitem like '$item'";
	if($_POST['cbtime']=="on")
	{
		$ftime=$_POST['ftime'];
		$ttime=$_POST['ttime'];
		
		$where=$where." and ds.date>'$ftime' and ds.date<'$ttime' ";
		}
	
	}

  $qryne2 = mysql_query("select ds.nameitem,ds.damageitem,ds.priority,ds.date,ds.targetdate,ds.noteadd,max(d.status) as status,ds.id,user.username as username,dept.name as deptname 
  from damage ds inner join damage_status d on  ds.id=d.id_damage inner join user on user.id=ds.iduser
  inner join dept on dept.id=user.dept
   $where group by ds.id order by date desc ;");
 
	while($row=mysql_fetch_row($qryne2))
	{
  ?>
  <tbody>
  <tr>
  
  
     <td><?=$row[8]?></td>
    <td><?=$row[9]?></td>
   
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
    <td><?=$fixer?></td>
    <td><?=$rep?></td>
      <td><a href="index.php?q=progress&amp;id=<?=$row[7]?>">Show</a></td>
     
      
  </tr>
  </tbody>
  <?
	}
  ?>
</table>
</body>
</html>