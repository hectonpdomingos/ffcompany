<?php

if(isset($_POST['action'])) {

switch($_POST['action']) {
  case 'subscribe' :
 

  

$email = = $_POST['address'];
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

$_SESSION['namefound'] = $user['name'];
$_SESSION['surnamefound'] = $user['surname'];
$_SESSION['emailfound'] = $user['email'];




  break;
}

}

?>