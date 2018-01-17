
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


$disuser = $_POST['disuser'];

try {
    
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $dbh->prepare('UPDATE users_tb set active=2 WHERE email=:email');
    $stmt->bindParam(':email', $email);

    $email = $disuser;
    $stmt->execute();


header("Location: users.php");

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$dbh = null;
?>


<?php

$activeuser = $_POST['active'];

try {
    
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $dbh->prepare('UPDATE users_tb set active=1 WHERE email=:email');
    $stmt->bindParam(':email', $email);

    $email = $activeuser;
    $stmt->execute();


header("Location: users.php");

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$dbh = null;
    

?>




        
