
<?php
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
try {
    
    $dbh;
    foreach($dbh->query('SELECT count(name) as name from users_tb;') as $row) {
       $totalusers = $row['name'];
     
    }
    
    $dbh = null;
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
