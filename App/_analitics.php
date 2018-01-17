
<?php

//
totalusers();













function totalusers(){

require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;
try {

  $dbh;
  foreach($dbh->query('
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 1) where month = 1 AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 2) where month = 2  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 3) where month = 3  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 4) where month = 4  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 5) where month = 5  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 6) where month = 6  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 7) where month = 7  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 8) where month = 8  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 9) where month = 9  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 10) where month = 10  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 11) where month = 11  AND subject = 'totalusers';
UPDATE analitics SET analitics.total = (select count(date_time)
FROM users_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 12) where month = 12  AND subject = 'totalusers';
' ) as $row) {

  }


    $dbh = null;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


}//THE END OF TOTALUSERS functions


function totalpackages(){


}//THE END OF PACKAGES


function totalorders(){


}//THE END OF TOTAL ORDERS


function totaltickets(){


}//THE END OF TOTALTICKETS


?>
