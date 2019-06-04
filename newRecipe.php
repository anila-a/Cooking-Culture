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
<div id="box" style="height: auto;width: 1150px;margin: 0px auto 20px;">
<font size="7" face="Gabriola"><b>New recipe</b></font>
<?php
/* are required at the top
require 'php/core.php';
require 'php/db_connect.php';*/

if(loggedin()){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $file_name = basename($_FILES["fileToUpload"]["name"]);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                // File is not an image
                $file_name = "no_img.png";
            }
        }
	//check if each field is submitted
	if($uploadOk==1&&isset($_POST['name'])&&isset($_POST['ingredients'])&&isset($_POST['description'])){
		$name = $_POST['name'];
		$ingredients = $_POST['ingredients'];
		$description = $_POST['description'];
		$userId = $_SESSION['user_id'];
                $category = $_POST['category'];
		if(!empty($name)&&!empty($description)&&!empty($ingredients)){
                        $query = "INSERT INTO recipes VALUES 
                        ('', '".$_SESSION['user_id']."', '".mysql_real_escape_string($name)."', '".mysql_real_escape_string($ingredients)."', '".mysql_real_escape_string($description)."', '".$category."', '".$file_name."')";
                        if($query_run = mysql_query($query)){
                                //does not work in biz.nf :
                                //header('Location: homeRegisterSuccess.php');
                                echo "<script>location.href='profile.php'</script>";
                        }else{
                                echo 'An error occurred. Try again later.';
                        }
			
		}else{
			echo 'All fields are required';
		}
	}
echo '
 <form action="newRecipe.php" method="post" enctype="multipart/form-data">
  <table width="400" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td>Name:</td>
    <td><input name="name" type="text" maxlength="40" name="name" /></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td>
        <select name="category">
        <option value="1">Soups and Salads</option>
        <option value="2">Main Dishes</option>
        <option value="3">Desserts</option>
        <option value="4">Drinks and Smoothies</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Ingredients:</td>
    <td><textarea cols="30" rows="5" name="ingredients"></textarea></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea cols="30" rows="5" name="description"></textarea></td>
  </tr>
  
  <tr>
    <td>Select image to upload:</td>
    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
  </tr>
</table>
<br/>';
echo '
<p><b>Note:</b> All the fields are required.</p><br/>
<input name="submit" type="submit" value="Submit" />
</form>';
} else{
echo '<br/>Please <a href="login.php">login</a> to add a new recipe.';
}
?>
</div>
</div>

<div id="footer" style="width:1200px;margin:0px auto 20px;"><font size="4">Copyright © CookingCulture 2016</font></div>
