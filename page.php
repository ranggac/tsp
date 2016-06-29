<?
session_start();
if(!isset($_SESSION['rc02']))
{
	
//echo "Pageviews = ". $_SESSION['rc02'];
//echo"gagal";
		header('Location: login.php');exit;

	
	}
	else
	{
		$iduser=$_SESSION['rc02'];
$p=$_GET['q'];
include_once"rcon.php";
$qry="select * from user_privilage where iduser='$iduser' and privilage='1'";
		
		$q=mysql_query("$qry");
		$nrq=mysql_num_rows($q);


if($nrq==1)
{
$admin=1;

}
if($p=="input")
{
$page="input.php";

}

else if($p=="data")
{
$page="data.php";

}

else if($p=="status")
{
$page="status.php";

}

else if($p=="report")
{
$page="report.php";

}
else if($p=="cstatus")
{
$page="cstatus.php";

}
else if($p=="progress")
{
$page="progress.php";

}
else if($p=="about")
{
$page="about.php";

}
else
{
	$page="awal.php";
	}




function priority($a)
{
	if ($a=="0")
	{echo"Menunngu Antrian";}
	else if ($a=="1")
	{echo"Dalam Proses";}
	else if ($a=="2")
	{echo"Selesai";}
	
	
	}
	
	function priority2($a)
{
	if ($a=="0")
	{echo"Normal";}
	else if ($a=="1")
	{echo"Urgent";}
	else if ($a=="2")
	{echo"Top Urgent";}
	
	
	}
	}
?>