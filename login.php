<?php include("topPhpHeader.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookingCulture</title>
<link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
<link rel="icon" href="Food-Dome-icon.png.ico">
</head>
<body style="background-color:#fff4e5;" >

<?php include("header.php"); ?>

<div style="width:1225px;margin:0px auto 15px;">
<div id="box" style="height:auto;width:1150px;margin:0px auto 15px;">
<font size="7" face="Gabriola"><b>Login</b></font>
  <?php 
	if(loggedin()){
          echo '<br/>You are logged in as '.getuserfield('username').'. <br/><br/><a href="php/logout.php">Log out</a>';
	}else{  //log in
	  include 'homeLoginForm.php';
	}
?>
</div>
</div>

<div id="footer" style="width:1200px;margin:0px auto 20px;"><font size="4">Copyright © CookingCulture 2016</font></div>

</body>
</html>