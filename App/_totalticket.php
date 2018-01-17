
<?php
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
try {
    
    $dbh;
    foreach($dbh->query('SELECT count(ticket_id) as openticket from ticket_tb where status = 1;') as $row) {
       $opentickets = $row['openticket'];
     
    }
    
    $dbh = null;
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>