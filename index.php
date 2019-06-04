<?php include("topPhpHeader.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookingCulture</title>
<link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
<link rel="icon" href="Food-Dome-icon.png.ico">
</head>
<body style="background-color:#fff4e5;">
<?php include("header.php"); ?>
<div style="width:1225px;margin:0px auto;">
<div id="box" style="width:1150px;">
<font size="7" face="Gabriola">
<b>Welcome to Cooking Culture</b></font><br/>

<?php
  $query = "SELECT * FROM recipes ORDER BY recipe_id DESC";
  $query_run = mysql_query($query);
  $counter = 0;
  echo "<br/>";
  while($row = mysql_fetch_assoc($query_run))
  {
    if($counter>=6) break;
    echo "<div class='img'>";
    echo "<a href='/recipe_page.php?id=".$row['recipe_id']."'><img src='uploads/".$row['filename']."'></a>";
    echo "<div class='desc'>".$row['title']."</div></div>";
    $counter++;
  }
?>

</div>

<div style="width:1250px;margin:0px auto 15px;">
<div class="img">
  <a href="soups_salads.php">
    <img src="img/Soup&Salad.png" width="250" height="250">
  </a>
  <div class="desc">Soups & Salads</div>
</div>

<div class="img">
  <a href="main_dishes.php">
    <img src="img/Main Dish.jpg" width="250" height="250">
  </a>
  <div class="desc">Main Dishes</div>
</div>

<div class="img">
  <a href="desserts.php">
    <img src="img/Dessert.jpg" width="250" height="250">
  </a>
  <div class="desc">Desserts</div>
</div>

<div class="img">
<a href="drinks_smoothies.php">
    <img src="img/Drink&Smoothie.jpg" width="250" height="250">
  </a>
  <div class="desc">Drinks & Smoothies</div>
</div>
</div>
</div>
<div id="footer" style="width:1200px;margin:0px auto 20px;"><font size="4">Copyright © CookingCulture 2016</font></div>


</body>
</html>
