<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['passwd']))) {
    header("Location: fillallfields.html"); exit;
}

// Tenta se conectar ao servidor MySQL
mysql_connect('localhost', 'root', '12domlei') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL
mysql_select_db('forwarder_db') or trigger_error(mysql_error());

$email = mysql_real_escape_string($_POST['email']);
$passwd = mysql_real_escape_string($_POST['passwd']);

// Validação do usuário/senha digitados
//$sql = "SELECT `user_id`, `name`, `level`, `email` FROM `users_tb` WHERE (`email` = '". email ."') AND (`passwd` = '" . $passwd ."') AND (`active` = 1) LIMIT 1";


$sql = "SELECT `user_id`, `name`,`email`, `passwd`, `active`, `level` FROM `users_tb` WHERE (`email` = '". $email ."') AND (`active` = 1) LIMIT 1;";

$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    header("Location: usernotfound.html"); exit;
} else {

    // Salva os dados encontados na variável $resultado
    $resultado = mysql_fetch_assoc($query);

    $hash = $resultado['passwd'];



   if (password_verify($passwd, $hash)) {
        //  echo 'Password is valid!';
        // Se a sessão não existir, inicia uma

     if (!isset($_SESSION)) session_start();

        // Salva os dados encontrados na sessão
        $_SESSION['user_id'] = $resultado['user_id'];
        $_SESSION['name'] = $resultado['name'];
        $_SESSION['level'] = $resultado['level'];
      
       header("Location: dashboard.php"); exit;

   } else {
          header("Location: failed.html"); exit;

    }


}

?>
