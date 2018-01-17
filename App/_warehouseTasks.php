
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





//name login on the header
$userlogin =  $_SESSION['name'];

//BUTTONS
$btupdate = $_POST['updatepkg'];
$btadd = $_POST['addpkg'];

//FIELDS FROM SEACH PACKAGES
$idpkg =  $_POST['idpkg'];
$addstatus = $_POST['packagestatus'];
$addpackagetracknumber = $_POST['packagetracknumber'];
$addpackagefrom =  $_POST['packagefrom'];
$addpackageweight =  str_replace(",",".",$_POST['packageweight']);
$addpackageuseremail =  $_POST['packageuseremail'];
$addpackagearrived =  $_POST['packagearrived'];


//process ticket from user
$employee = $_POST['employee'];
$ticketId = $_POST['ticket_id'];
$team_msg = $_POST['team_msg'];



if ($team_msg){

processTask($ticketId, $team_msg, $userlogin);
}



//CONDITIONAL TO ADD A PACKAGE ON DATABASE
if ($btadd == "2"){


  addPackage($addstatus, $addpackagetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail, $addpackagearrived );
}
//CONDITIONAL TO UPDATE THE PACKAGE ON DATABASE
if ($btupdate == "1"){

    updatePackage($idpkg, $addstatus, $addpackagetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail, $addpackagearrived);

}



function findPackage(){


}

//PROCESSING TICKETS


function processTask($ticketId, $team_msg, $userlogin){


    try {

          require('db.php');

          $servername;
          $username;
          $password;
          $dbname;
          $dbh;
              // set the PDO error mode to exception
              $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "UPDATE ticket_tb SET team_msg = :team_msg,
                          status = :status,
                          employee = :employee
                          WHERE ticket_id = :ticket_id";

              $stmt = $dbh->prepare($sql);
              $stmt->bindParam(':status', $statusUpdate, PDO::PARAM_STR);
              $stmt->bindParam(':employee', $userlogin, PDO::PARAM_STR);
              $stmt->bindParam(':ticket_id', $ticketId, PDO::PARAM_STR);
              $stmt->bindParam(':team_msg', $team_msg, PDO::PARAM_STR);
              $statusUpdate = 3;

              $stmt->execute();



      header("Location: tasks.php");

              }
          catch(PDOException $e)
              {
              echo "Error: " . $e->getMessage();
              }
          $dbh = null;
}




// end of processing tickets



//FUNCTION ADD PACKAGE ON DATABASE
function addPackage($addstatus, $addpackagetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail){


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
      $stmt->bindParam(':addpackagetracknumber', $addpackagetracknumber);
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


// FUNCTION UPDATE PACKAGE
function updatePackage($idpkg, $addstatus, $addpackagetracknumber, $addpackagefrom, $addpackageweight, $addpackageuseremail, $addpackagearrived){
require_once '_findpackage.php';


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
      $stmt->bindParam(':track_number', $addpackagetracknumber, PDO::PARAM_STR);
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

?>
