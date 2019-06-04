<?php include("topPhpHeader.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookingCulture</title>

<style type="text/css">

.error {color: #FF0000;}

#header{
	background-color: #96ceb4;
	border: 10px ;
	padding: 10px;
	margin: 25px;
	border-radius: 5px;
}

#box{
	background-color: #b9decd;
	height: auto;
	border: 10px ;
	padding: 35px;
	margin: 25px;
    border-radius: 5px;
} 

#footer {
    background-color:#96ceb4;
    color:black;
    clear:both;
    text-align:center;
	border: 10px;
    padding:10px;
	margin: 25px;
	border-radius: 5px;
}

.dropbtn {
    color: #fff6ea;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff4e5;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	border-radius: 5px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
	border-radius: 5px;
}

.dropdown-content a:hover {background-color: #fff7ec} 

.dropdown:hover .dropdown-content {
    display: block;
}

a:link {
    color: #2b7868;
	text-decoration: none;
}

a:visited {
    color: #2b7868;
	text-decoration: none;
}

a:hover {
    color: #2b7868;
	text-decoration: none;
}

a:active {
    color: #399d89;
	text-decoration: none;
}

</style>

<link rel="icon" href="Food-Dome-icon.png.ico">
</head>

<body style="background-color:#fff4e5;">
<div id="header"><a href="index.php"><img src="img/img1.png" style="width:524.5px;height:164.5px;" align="left;"></a>
<a href="index.php"><img src="img/img2.png" style="width:146.9px;height:85px;" align="right;"></a>
<div class="dropdown">
  <img class="dropbtn" src="img/img3.png" style="position:relative;top:17px;width:146.9px;height:85px;">
	<div class="dropdown-content">
		<a href="soups_salads.php">Soups & Salads</a>
		<a href="main_dishes.php">Main Dishes</a>
		<a href="desserts.php">Desserts</a>
		<a href="drinks_smoothies.php">Drinks & Smoothies</a>
	</div>
</div>
<a href="login.php"><img src="img/img4.png" style="width:146.9px;height:85px;;" align="right;"></a>
<a href="about.php"><img src="img/img5.png" style="width:146.9px;height:85px;" align="right;"></a></div>
<div id="box"><font size="7" face="Gabriola"><b>Add a new recipe</b></font><br>
<?php
$rnameErr = $categoryErr = $ingredientsErr = $recipeErr = "";
$rname = $category = $ingredients = $recipe = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["rname"])) {
		$rnameErr = "Name is required";
		} else {
		$name = test_input ($_POST["rname"]);
	}
	
if (empty($_POST["category"])) {
    $categoryErr = "Category is required";
  } else {
    $category = test_input($_POST["category"]);
  }

if (empty($_POST["ingredients"])) {
    $ingredientsErr = "Ingredients are required";
  } else {
    $ingredients = test_input($_POST["ingredients"]);
  }
 
if (empty($_POST["recipe"])) {
    $recipeErr = "Recipe is required";
  } else {
    $recipe = test_input($_POST["recipe"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>

<p><span class="error">* All fields are required</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
  Recipe name: <input type="text" name="rname">
  <span class="error"> <?php echo $rnameErr;?></span>
  <br><br>
  Category:
  <input type="radio" name="category" value="Soups & Salads">Soups & Salads
  <input type="radio" name="category" value="Main Dish">Main Dishes
  <input type="radio" name="category" value="Desserts">Desserts
  <input type="radio" name="category" value="Drinks & Smoothies">Drinks & Smoothies
  <span class="error"> <?php echo $categoryErr;?></span>
  <br><br>
  Ingredients: <textarea name="ingredients" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $ingredientsErr;?></span>
  <br><br>
  Recipe: <textarea name="recipe" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $recipeErr;?></span>
  <br><br>
</form>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
	<br><br>
</form>

<form>  
	<input type="submit" name="Post" value="Post">  
</form>
</div>
  
<div id="footer"><font size="4">Copyright © CookingCulture 2016</font></div>
</body>
</html>