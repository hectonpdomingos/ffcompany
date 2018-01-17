
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
require_once '_finduser.php';

$userid = $_POST['iduser'];
$nameUpdate =  $_POST['edfirstname'];
$surnameUpdate =  $_POST['edlastname'];
$birthUpdate =  $_POST['edbirth'];
$emailUpdate =  $_POST['edemail'];
$addressUpdate =  $_POST['edaddress'];
$zipcodeUpdate =  $_POST['edzipcode'];
$phoneUpdate =  $_POST['edphone'];
$phone2Update =  $_POST['edphone2'];
$countryUpdate =  $_POST['edcountry'];
$languageUpdate =  $_POST['edlanguage'];
$location_first_loginUpdate =  $_POST['edlocation_first_login'];

try {

require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "UPDATE users_tb SET name = :name,
                surname = :surname,
                address = :address,
                zipcode = :zipcode,
                phone = :phone,
                phone2 = :phone2,
                country = :country,
                birth = :birth,
                language = :language,
                email = :email,
                location_first_login = :location_first_login
                WHERE user_id = :userid ";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $nameUpdate);
    $stmt->bindParam(':surname', $surnameUpdate);
    $stmt->bindParam(':address', $addressUpdate);
    $stmt->bindParam(':zipcode', $zipcodeUpdate);
    $stmt->bindParam(':phone', $phoneUpdate);
    $stmt->bindParam(':phone2', $phone2Update);
    $stmt->bindParam(':birth', $birthUpdate);
    $stmt->bindParam(':country', $countryUpdate);
    $stmt->bindParam(':language', $languageUpdate);
    $stmt->bindParam(':location_first_login', $location_first_loginUpdate);
    $stmt->bindParam(':email', $emailUpdate);








    //$userid;
    //$email = $emailUpdate;
    //$address = $addressUpdate;


    $stmt->execute();


header("Location: users.php");

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$dbh = null;
?>
