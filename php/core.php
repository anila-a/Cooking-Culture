<?php
  //ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
$http_referer = @$_SERVER['HTTP_REFERER'];  //tells us the page which we have come from


function loggedin(){
  if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])){
    return true;
  }else{
  return false;}
}

function getuserfield($field){
  $query = "SELECT `$field` FROM users WHERE id = ".$_SESSION['user_id'];//gets the id of the user from the session
  if($query_run = mysql_query($query)){
    return mysql_result($query_run, 0, $field);
  }
}
function update_lastloggedin(){ //updates in the database the last time the user logged in
$time = date("Y/m/d");
  $update_query = "UPDATE users SET lastloggedin='$time' WHERE id=".$_SESSION['user_id'];
  mysql_query($update_query);
}
?>
