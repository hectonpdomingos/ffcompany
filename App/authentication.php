<?php



require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;


  
$userPass = "123456";



  $userEmail = "liza@gmail.com"; //$_POST['email'];
  $stmt = $dbh->prepare('SELECT user_id, name, email, passwd, level FROM users_tb WHERE email = :email');
  $stmt->execute(['email' => $userEmail]);
  $resultado = $stmt->fetch();
 
  
  if (password_verify($userPass, $resultado[3])) {

    if (!isset($_SESSION)) session_start();
    
            // Salva os dados encontrados na sessão
            $_SESSION['user_id'] = $resultado[0];
            $_SESSION['name'] = $resultado[1];
            $_SESSION['level'] = $resultado[4];
          
           header("Location: dashboard.php"); exit;
    

           echo "<strong> Password Corrreto </strong> ";
  }else{
    echo "<strong> Password incorreto </strong> ";
  }



  $dbh = null;



?>
