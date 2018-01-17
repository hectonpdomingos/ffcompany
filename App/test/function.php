<?php
// Start the session
session_start();
?>



<?php


$btupdate = $_POST['updatepkg'];
$btadd = $_POST['addpkg'];


$idpkg =  $_POST['idpkg'];
$addstatus = $_POST['packagestatus'];
$addpackegetracknumber = $_POST['packagetracknumber'];
$addpackagefrom =  $_POST['packagefrom'];
$addpackageweight =  str_replace(",",".",$_POST['packageweight']);
$addpackageuseremail =  $_POST['packageuseremail'];
$addpackagearrived =  $_POST['packagearrived'];







//CONDITIONAL TO ADD A PACKAGE ON DATABASE
if ($btadd == "2"){

  addPackage($addstatus, $addpackegetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail, $addpackagearrived );
}
//CONDITIONAL TO UPDATE THE PACKAGE ON DATABASE
if ($btupdate == "1"){

    updatePackage($idpkg, $addstatus, $addpackegetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail, $addpackagearrived);

}

// FUNCTION UPDATE PACKAGE
function updatePackage($idpkg, $addstatus, $addpackegetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail, $addpackagearrived){



  try {

  require('db.php');

  $servername;
  $username;
  $password;
  $dbname;
  $dbh;
      // set the PDO error mode to exception
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "UPDATE warehouse_packages_tb SET track_number = :track_number,
                  origin = :origin,
                  weight = :weight,
                  user_email = :user_email
                  WHERE package_id = :package_id";

      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':package_id', $idpkg, PDO::PARAM_STR);
      $stmt->bindParam(':track_number', $addpackegetracknumber, PDO::PARAM_STR);
      $stmt->bindParam(':origin', $addpackagefrom, PDO::PARAM_STR);
      $stmt->bindParam(':weight', $addpackageweight, PDO::PARAM_STR);
      $stmt->bindParam(':user_email', $addpackageuseremail, PDO::PARAM_STR);



      $stmt->execute();


  header("Location: warehouse.php");

      }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
  $dbh = null;


}
//END OF FUNCTION UPDATE PACKAGE

//FUNCTION ADD PACKAGE ON DATABASE
function addPackage($addstatus, $addpackegetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail){


  try {

  require('db.php');

  $servername;
  $username;
  $password;
  $dbname;
  $dbh;
      // set the PDO error mode to exception
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO warehouse_packages_tb (user_email, origin, track_number, status, weight, date_arrive)
     VALUES (:addpackageuseremail ,:addpackagefrom ,:addpackagetracknumber ,:addstatus ,:addpackageweight ,:date_arrive)";

      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':addpackagetracknumber', $addpackegetracknumber);
      $stmt->bindParam(':addpackagefrom', $addpackagefrom);
      $stmt->bindParam(':addpackageweight', $addpackageweight);
      $stmt->bindParam(':addpackageuseremail', $addpackageuseremail);
      $stmt->bindParam(':addstatus', $addstatus);
      $stmt->bindParam(':date_arrive', date("Y-m-d H:i:s"));

      $stmt->execute();

      }
  catch(PDOException $e)
      {
         if($e->getMessage()){

            $_SESSION["error"] = "This track number is using by another package. ";
            header('Location: index.php');
            exit();
         }
      }
  $dbh = null;

  $_SESSION["error"] = "Package added sucessufully!";
  header('Location: index.php');
  exit();

}
?>
