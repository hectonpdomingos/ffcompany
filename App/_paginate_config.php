<?php
//header('Content-Type: text/html; charset=utf-8');
$mysql_hostname = "localhost";  //your mysql host name
$mysql_user = "root";			//your mysql user name
$mysql_password = "12domlei";			//your mysql password
$mysql_database = "forwarder_db";	//your mysql database
$charset = "charset=utf8";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Error on database connection");
