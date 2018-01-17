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

//vars to move packages to another user
$emailMoveTo = $_POST['emailMoveTo'];
$pkgMoveTo =  $_POST['pkgMoveTo'];

//post from user
$idpkg =  $_POST['idpkg'];
$addstatus = $_POST['packagestatus'];
$addpackagetracknumber = $_POST['packagetracknumber'];
$addpackagefrom =  $_POST['packagefrom'];
$addpackageweight =  str_replace(",",".",$_POST['packageweight']);
$addpackageuseremail =  $_POST['packageuseremail'];
$addpackagearrived =  $_POST['packagearrived'];


//search for valid email
searchEmail($addpackageuseremail, $addstatus, $addpackagefrom, $addpackageweight, $addpackagetracknumber);

//BEGINNING OF SEARCH EMAIL USER FUNCTION
function searchEmail($addpackageuseremail, $addstatus, $addpackagefrom, $addpackageweight, $addpackagetracknumber){
require 'db.php';

$servername;
$username;
$password;
$dbname;
$dbh;

$stmt = $dbh->prepare('SELECT user_id, email FROM users_tb WHERE email = :email');
$stmt->execute(['email' => $addpackageuseremail]);
$user = $stmt->fetch();
$userid =  $user['user_id'];

if ($userid){
  echo '<br>';
  echo "User found on database with ID: ".$userid ;
  searchPackage($addpackagetracknumber, $userid, $addstatus, $addpackagefrom, $addpackageweight, $addpackageuseremail);

}else {
  echo '<br>';
  echo "User NOT found on database";
  echo '<br>';
}


}


//BEGINNING OF SEARCH PACKAGE FUNCTION

function searchPackage($addpackagetracknumber, $userid, $addstatus, $addpackagefrom, $addpackageweight, $addpackageuseremail){

require 'db.php';

$servername;
$username;
$password;
$dbname;
$dbh;

$dbh;

$stmt = $dbh->prepare('SELECT package_id, user_id, track_number, user_email FROM warehouse_packages_tb WHERE track_number = :track_number');
$stmt->execute(['track_number' => $addpackagetracknumber]);
$tn = $stmt->fetch();
$track_number = $tn['track_number'];
$package_id  = $tn['package_id'];
$user_id =  $tn['user_id'];
$pkguseremail = $tn['user_email'];

if ($track_number){
  echo " Track number found on database with ID: ".$package_id." and the ID owner is: ".$user_id ;
  updatePackage($package_id, $user_id, $addpackageuseremail, $addpackagefrom, $track_number, $addstatus, $addpackageweight, $pkguseremail);
}else {
  echo '<br>';
  echo " Track number NOT found on database";
  addPackage($userid, $addpackageuseremail,  $addpackagefrom, $addpackagetracknumber, $addstatus, $addpackageweight);
}


}


function addPackage($userid, $addpackageuseremail,  $addpackagefrom, $addpackagetracknumber, $addstatus, $addpackageweight){


  try {

  require('db.php');

  $servername;
  $username;
  $password;
  $dbname;
  $dbh;
      // set the PDO error mode to exception
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO warehouse_packages_tb (user_id, user_email, origin, track_number, status, weight, date_arrive)
     VALUES (:user_id ,:addpackageuseremail ,:addpackagefrom ,:addpackagetracknumber ,:addstatus ,:addpackageweight ,:date_arrive)";

      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':user_id', $userid);
      $stmt->bindParam(':addpackagetracknumber', $addpackagetracknumber);
      $stmt->bindParam(':addpackagefrom', $addpackagefrom);
      $stmt->bindParam(':addpackageweight', $addpackageweight);
      $stmt->bindParam(':addpackageuseremail', $addpackageuseremail);
      $stmt->bindParam(':addstatus', $addstatus);
      $stmt->bindParam(':date_arrive', date("Y-m-d H:i:s"));

      $stmt->execute();

$_SESSION["error"] = "Package added sucessufully!";

      }
  catch(PDOException $e)
      {
        echo $e->getMessage();

        $_SESSION["error"] =  "This track number is using by another package. ";

      }
  $dbh = null;


header("Location: warehouse.php");


}





function updatePackage($package_id, $user_id, $addpackageuseremail, $addpackagefrom, $track_number, $addstatus, $addpackageweight, $pkguseremail){

  echo '<br>';
  echo " You can just UPDATE this ".$track_number." track number of this package_id  ".$package_id." that for this ".$user_id." ID";
  echo '<br>';
  echo " User Email: ".$addpackageuseremail." From: ".$addpackagefrom." status: ".$addstatus." Weight: ".$addpackageweight;
  echo '<br>';
  if($pkguseremail == $addpackageuseremail){
  echo "The package will remain for original owner";

try{
  require('db.php');

  $servername;
  $username;
  $password;
  $dbname;
  $dbh;
      // set the PDO error mode to exception
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "UPDATE warehouse_packages_tb SET track_number = :track_number,
                  user_id = :user_id,
                  origin = :origin,
                  weight = :weight,
                  user_email = :user_email,
                  status = :status
                  WHERE package_id = :package_id";

      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':package_id', $package_id, PDO::PARAM_STR);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
      $stmt->bindParam(':track_number', $track_number, PDO::PARAM_STR);
      $stmt->bindParam(':origin', $addpackagefrom, PDO::PARAM_STR);
      $stmt->bindParam(':weight', $addpackageweight, PDO::PARAM_STR);
      $stmt->bindParam(':user_email', $addpackageuseremail, PDO::PARAM_STR);
      $stmt->bindParam(':status', $addstatus, PDO::PARAM_STR);


      $stmt->execute();

      }
  catch(PDOException $e)
      {

      $_SESSION["error"] = "Something wrong happened!   ".$e->getMessage();;
      }
  $dbh = null;
$_SESSION["error"] =  " Done!";
header("Location: warehouse.php");

  }


  else{
$_SESSION["error"] = "The original owner is: ".$pkguseremail." You can not move to ".$addpackageuseremail."  Any information was changed.";

header("Location: warehouse.php");

  }

}

function movePackageTo($emailMoveTo,$pkgMoveTo){

  require ('db.php');



}

?>
