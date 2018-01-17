
<?php
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
try {

  $dbh;
  foreach($dbh->query('
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 1) where id =1;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 2) where id =2;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 3) where id = 3;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 4) where id = 4;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 5) where id = 5;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 6) where id = 6;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 7) where id = 7;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 8) where id = 8;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 9) where id = 9;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 10) where id = 10;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 11) where id = 11;
UPDATE analitics_total_users_tb SET analitics_total_users_tb.users = (select count(date_time)
FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 12) where id = 12;
' ) as $row) {

  }
 

    $dbh = null;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
