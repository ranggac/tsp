<?

if(isset($_POST['username'])){
		$user=$_POST[username];
		$passg=$_POST[password];
		include('rcon.php');
		$qry="SELECT id FROM `user` WHERE username = '$user' AND password = '$passg';";
		
		$q=mysql_query("$qry");
		$nrq=mysql_num_rows($q);
		if($nrq==0){
			$err='Nama Login / Password tidak valid';
		}else{
			
			session_start();
		$row2=mysql_fetch_array($q);
		$_SESSION['rc03']=$user;
		$_SESSION['rc02']=$row2[id];
		//echo "Pageviews = ". $_SESSION['rc02'];
			header("Location: index.php");exit;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login XYZ IT</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
</head>

<body>
<p>
  <?


?>
</p>
<p> <?php
  	if(isset($err)){
  ?>
  <strong><font color="#FF0000"><?=$err?></font></strong>
  <?php
  	}
  ?> </p>
  <div class="container">
  <div class="row" >
  <div class="col-md-6" style="background-color: #dedef8;
box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
<form id="form1" name="form1" method="post" action="login.php">
  <div class="form-group"> 
    <label for="username">Username </label>
    
    <input type="text" name="username" id="username" class="form-control" />
  </div>
  <div class="form-group"> 
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" />
  </div>
  <p>
    <input type="submit" name="button" id="button" value="Submit" class="btn btn-default"/>
  </p>
</form>
</div>
</div>
</div>
</body>
</html>