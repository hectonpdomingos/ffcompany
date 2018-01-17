<?php
$date = date('d/m/Y');
echo $date; 


$date = (new \DateTime())->modify('-1 day');



echo $date;


?>

