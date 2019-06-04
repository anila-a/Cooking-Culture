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
<div id="box" style="height: auto;width:1150px;margin:0px auto 15px;">
<font size="7" face="Gabriola"><b>Register</b></font>
<?php
/* are required at the top
require 'php/core.php';
require 'php/db_connect.php';*/

if(!loggedin()){
	//chechk if ech field is submitted
	if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['repassword'])&&isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['email'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$password_hash = md5($password);
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		
		if(!empty($username)&&!empty($password)&&!empty($repassword)&&!empty($name)&&!empty($surname)&&!empty($email)){
			if($password != $repassword){
				echo 'Passwords do not match';
			}else{
				// check if the username exists
				$query = "SELECT username FROM users WHERE username = '$username'";
				$query_run = mysql_query($query);
				if(mysql_num_rows($query_run) == 1){  //if there already exists a uresname like that
				echo 'The username already exists.';
				}else{
					//register the user
					$query = "INSERT INTO users VALUES 
					('', '".mysql_real_escape_string($username)."', '".mysql_real_escape_string($password_hash)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($name)."', '".mysql_real_escape_string($surname)."')";
					if($query_run = mysql_query($query)){
						//does not work in biz.nf :
						//header('Location: homeRegisterSuccess.php');
						echo "<script>location.href='homeRegisterSuccess.php'</script>";
					}else{
						echo 'Sorry we coudnt register you this time. Try again later.';
					}
				}
			}
			
		}else{
			echo 'All fields are required';
		}
	}
	//register the user
?>
<!--we escape here, but the if else still works AMAZING-->
 <form action="homeRegisterForm.php" method="post" >
  <table width="400" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td>Name:</td>
    <td><input name="name" type="text" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Surname:</td>
    <td><input name="surname" type="text" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Username:</td>
    <td><input name="username" type="text" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input name="password" type="password" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Retype password:</td>
    <td><input name="repassword" type="password" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input name="email" type="text" maxlength="40" /></td>
  </tr>
</table>
<br/>
<p id="warning_msg"><i></i></p>
<p><b>Note:</b> All the fields are required.</p><br/>
<input name="submit" type="submit" value="Register" />
  </form>
	
<?php
}else if (loggedin()){
	echo 'You are already registered and logged in.';
}
?>
</div>
</div>

<div id="footer" style="width:1200px;margin:0px auto 20px;"><font size="4">Copyright © CookingCulture 2016</font></div>

</body>
</html>