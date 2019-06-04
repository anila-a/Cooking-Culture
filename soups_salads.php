<?php include("topPhpHeader.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookingCulture</title>
<link rel="stylesheet" type="text/css" href="styles/mainstyle2.css">
<link rel="icon" href="Food-Dome-icon.png.ico">
</head>


<body style="background-color:#fff4e5;">

<?php include("header.php"); ?>

<div style="width:1240px;margin:0px auto;">
<div id="box"><font size="7" face="Gabriola"><b>Soups & Salads:</b></font>
<a href="newRecipe.php"><img src="img/plainicon.com-43939-512px.png" width="34.1" height="34.1" align="right"></a>
<br/>
<?php
  $query = "SELECT * FROM recipes WHERE category = 1";
  $query_run = mysql_query($query);
  $counter = 0;
  while($row = mysql_fetch_assoc($query_run))
  {
    echo "<div class='img'>";
    echo "<a href='/recipe_page.php?id=".$row['recipe_id']."'><img src='uploads/".$row['filename']."' height='200' width='200'></a>";
    echo "<div class='desc'>".$row['title']."</div></div>";
    $counter++;
  }
?>
</div>

<div id="secondbox"><font size="7" face="Gabriola"><b>Categories:</b></font>
<font size="5">
<p><a href="soups_salads.php"><img src="img/Soup&Salad.png" width="34.5" height="34.5" border="1">   Soups & Salads</a></p>
<p><a href="main_dishes.php"><img src="img/Main Dish.jpg" width="34.5" height="34.5" border="1">   Main Dishes</a></p>
<p><a href="desserts.php"><img src="img/Dessert.jpg" width="34.5" height="34.5" border="1">   Desserts</a></p>
<p><a href="drinks_smoothies.php"><img src="img/Drink&Smoothie.jpg" width="34.5" height="34.5" border="1" >   Drinks & Smoothies</a></p>
</font>
</div>

</div>

<div id="footer" style="margin:10px auto;"><font size="4">Copyright © CookingCulture 2016</font></div>

</body>
</html>
