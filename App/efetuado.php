<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="My freight forwarder company" content="">
    <meta name="My freight forwarder company" content="">
    <link rel="icon" href="favicon.png">


    <title>My freight forwarder</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="cover.css" rel="stylesheet">


  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">My freght forwarder company</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Log in</a></li>

                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">




<?php
$host = "localhost";
$user = "root";
$pass = "12domlei";
$banco = "forwarder_db";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>



<?php
$name=$_POST['name'];
$email=$_POST['email'];
$surname=$_POST['surname'];
$passwd=$_POST['passwd'];
$passwd2 = password_hash($passwd, PASSWORD_DEFAULT);


if ($name=="" || $email=="" || $surname=="" || passwd==""  )
{
  echo "Please, fill all fields.";
}

else
{



  $sql = mysql_query("INSERT INTO users_tb(name, surname, email, passwd, date_time, active, level)
VALUES('$name', '$surname', '$email', '$passwd2', NOW(), 1, 2 )");



echo '<h1 class="cover-heading">Account created successfully!</h1>';
         echo  '<p class="lead">Your account has been created. Thank you. Now you can log in.</p>';
           echo '<p class="lead">';


}
?>

<a href="index.html" class="btn btn-success">Entrar</a><p>



</div>

          <div class="mastfoot">
            <div class="inner">
              
            </div>
          </div>

        </div>

      </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
