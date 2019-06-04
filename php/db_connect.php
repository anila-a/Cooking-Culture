<?php
$mysql_host = 'fdb3.biz.nf';
$mysql_user = '2171963_cculture';
$mysql_pass = 'helloWorld2000';
$mysql_db = '2171963_cculture';

//we use @ to not get an error message when the database is not connected
//we use die() to kill the page when we get error 

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysql_select_db($mysql_db)){
    die('Could not connect.');
}
?>