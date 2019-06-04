<?php
if (isset($_POST['username']) && isset($_POST['password'])){   //checks if the user inputed all the data
$username = $_POST['username'];
$password = $_POST['password'];  
$password_hash = md5($password);//converts the password into a md5 value
	if(!empty($username)  &&  !empty($password)){
		
		$query = "SELECT id FROM users WHERE username='$username' AND password='$password_hash'";
		if($query_run = mysql_query($query)){
			$query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows == 0){
				echo 'Invalid username or password';
			}else if($query_num_rows == 1){
				$user_id = mysql_result($query_run, 0, 'id'); // gets the id of the user
				$_SESSION['user_id']=$user_id;	
				update_lastloggedin();   //updates the last logged in date
				//does not work on biz.nf
				//header('Location: homeLogin.php'); //go back to this location
				echo "<script>location.href='login.php'</script>";		
			}
		}
	}else{
		echo 'enter all data'; 
	}
}

?>
<form action="<?php echo $current_file; ?>" method="post" >
  <table width="400" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td>Username:</td>
    <td><input name="username" type="text" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input name="password" type="password" maxlength="40" /></td>
  </tr>
</table>
<br/>
<input type="submit" value="Log in" />
  </form>
  <br/>
 <p>Don't have an account yet? <a href="homeRegisterForm.php">Register now!</a></p>