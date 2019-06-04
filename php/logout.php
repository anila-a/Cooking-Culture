<?php

require 'core.php';
session_destroy();

if(isset($_SERVER['HTTP_REFERER'])){
        
header('Location: '.$http_referer);  //goes back to the page it was before
}
?>