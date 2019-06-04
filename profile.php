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
<div id="box" style="width:1150px;height:auto;margin:0px auto;">
<font size="7" face="Gabriola"><b>Profile</b></font><br/>

<?php
	if(loggedin()){
          echo "<a href='newRecipe.php'>Add a new recipe</a><br/>";
          $query = "SELECT * FROM recipes WHERE user_id='".$_SESSION['user_id']."' ORDER BY recipe_id";
          $query_run = mysql_query($query);
          $counter = 0;
          while($row = mysql_fetch_assoc($query_run))
          {
            echo "<div class='img'>";
            echo "<a href='/recipe_page.php?id=".$row['recipe_id']."'><img src='uploads/".$row['filename']."' height='200' width='200'></a>";
            echo "<div class='desc'>".$row['title']."</div></div>"; 
            $counter++;
          }
	}else{  //log in
	    echo 'Please <a href="login.php">login</a> to see you profile.';
	}
?>

</div>
</div>
<div id="footer" style="width:1200px;margin:10px auto 20px;"><font size="4">Copyright © CookingCulture 2016</font></div>

</body>
</html>