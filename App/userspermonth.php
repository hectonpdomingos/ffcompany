<?php
//setting header to json
header('Content-Type: application/json');
//database
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;

$sth = $dbh->prepare("SELECT jan,feb,mar,apr,may,jun,jul,aug,sep,octo,nov,dece from analitics_total_users_tb");

$sth->execute();

$data[] = $sth->fetch();


print json_encode($data);   

?>
