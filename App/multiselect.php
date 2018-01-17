
<?php
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
try {
     $dbh;


$sql = "SELECT name from users_tb where email="liza@gmail.com";SELECT surname from users_tb where email="igor@gmail.com"";
$statement = $pdo->query($sql);

while ($statment->columnCount()) {
     $rowset = $statment->fetchAll(PDO::FETCH_ASSOC);
   

    
    
    $statment->nextRowset();
    <?php echo $name = $rowset['name']; ?>
    <?php echo $surname = $rowset['surname']; ?>
}


    $dbh = null;
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>


