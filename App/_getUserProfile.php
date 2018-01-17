<?php


$email = $_POST['searchuser'];
$userProfile;
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;

$dbh;

$stmt = $dbh->prepare('SELECT * FROM users_tb WHERE email = :email');
$stmt->execute(['email' => $userProfile]);
$user = $stmt->fetch();

$user_idfound = $user['user_id'];
$namefound = $user['name'];
$surnamefound = $user['surname'];
$birthfound = $user['birth'];
$emailfound = $user['email'];
$addressfound = $user['address'];
$zipcodefound = $user['zipcode'];
$phonefound = $user['phone'];
$phone2found = $user['phone2'];
$countryfound = $user['country'];
$languagefound = $user['language'];
$datetimefound = $user['datetime'];
$location_first_loginfound = $user['location_first_login'];
$activefound = $user['active'];
$levelfound = $user['level'];


?>
