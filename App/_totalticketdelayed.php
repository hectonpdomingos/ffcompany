<?php

require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;




$sth = $dbh->prepare('SELECT count(ticket_id) as tk FROM ticket_tb where date_time < :day and status = :status');
$sth->bindParam(':day', $today);
$sth->bindParam(':status', $status);

$today = date('Y-m-d');
$status = 1;
$sth->execute();


$ticketdelayed = $sth->fetchColumn();


?>
