<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();


$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user_id']) OR ($_SESSION['level'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: youneedlogin.html"); exit;
}

?>




<?php


$track_number = $_POST['searchpackage'];
if(!$track_number){
  

}else{

try {
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;

$dbh;

$stmt = $dbh->prepare('SELECT * FROM warehouse_packages_tb WHERE track_number = :track_number');
$stmt->execute(['track_number' => $track_number]);
$userpackage = $stmt->fetch();

$pkg_id = $userpackage['package_id'];
$pkguser_id = $userpackage['user_id'];
$pkguser_email = $userpackage['user_email'];
$pkgfrom = $userpackage['origin'];
$pkgtrack_number = $userpackage['track_number'];
$pkgdate_arrive = $userpackage['date_arrive'];
$pkgstatus = $userpackage['status'];
$pkgweight = $userpackage['weight'];


if(!$pkgtrack_number){
  $_SESSION["error"] = "Package with this ".$track_number." track number not found!";
}else{
  $_SESSION["error"] ="";
}
}
catch(PDOException $e)
{
  echo $e->getMessage();

}
$dbh = null;

}
?>
