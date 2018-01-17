<?php


$email = $_POST['searchuser'];
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;

$dbh;

$stmt = $dbh->prepare('SELECT * FROM users_tb WHERE email = :email');
$stmt->execute(['email' => $email]);
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
$datetimefound = $user['date_time'];
$location_first_loginfound = $user['location_first_login'];
$activefound = $user['active'];
$levelfound = $user['level'];
$creditcardnumberfound = $user['creditcardnumber'];
$creditcardownerfound = $user['creditcardowner'];
$creditcardvccfound = $user['creditcardcvv'];


?>
