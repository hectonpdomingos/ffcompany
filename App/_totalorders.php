
<?php
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
try {
    
    $dbh;
    foreach($dbh->query('SELECT count(order_id) as totalorders from orders_tb;') as $row) {
       $totalorders = $row['totalorders'];
     
    }
    
    $dbh = null;
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
