<?php include("topPhpHeader.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookingCulture</title>
<link rel="stylesheet" type="text/css" href="styles/mainstyle2.css">
<link rel="icon" href="Food-Dome-icon.png.ico">
</head>


<body style="background-color:#fff4e5;" >

<?php include("header.php"); ?>

<?php
  $query = "SELECT * FROM recipes WHERE recipe_id='".$_GET['id']."'";
  $query_run = mysql_query($query);
  $row = mysql_fetch_assoc($query_run);
  $title = $row['title'];
  $ingredients = $row['ingredients'];
  $description = $row['description'];
  $filename = $row['filename'];
?>

<div style="width:1225px;margin:0px auto;">
<div id="box"><font size="7" face="Gabriola"><b><?php echo $title;?></b></font>
<br/>
<?php echo $description."<br/><br/><img src='uploads/".$row['filename']."'/>"; ?>
</div>

<div id="secondbox"><font size="7" face="Gabriola"><b>Ingredients: <br /></b></font>
<font size="3">
<?php echo "<pre><font face='Time New Romans'>".$ingredients."</font></pre>";?>
</font>
</div>
</div>

<div id="footer" style="margin:10px auto;"><font size="4">Copyright © CookingCulture 2016</font></div>

</body>
</html>
