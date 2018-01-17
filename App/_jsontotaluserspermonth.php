
<?php
//setting header to json
header('Content-Type: application/json');
//database
require('db.php');

$servername;
$username;
$password;
$dbname;
$dbh;

$sth = $dbh->prepare("SELECT
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 1)AS jan,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 2)AS feb,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 3)AS mar,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 4)AS apr,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 5)AS may,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 6)AS jun,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 7)AS jul,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 8)AS aug,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 9)AS sep,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 10)AS octo,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 11)AS nov,
(select count(date_time) FROM ticket_tb  WHERE YEAR(date_time) = 2017 AND MONTH(date_time) = 12)AS dece ;");

$sth->execute();

	$data[] = $sth->fetchAll();


print json_encode($data);

?>
