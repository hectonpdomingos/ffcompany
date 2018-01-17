
<?php

/* $codes = array('5.99','2.4','19.9999');
$names = array('Tunisia','United States','France'); */
$value1 = $_POST['ItemToSend'];

    foreach ($value1 as $value)
     {
         echo "Item : ".$value."<br />";
    }
?>

<!-- 
echo $codes;

echo $names;

$total;

foreach (array_combine($codes, $names) as $code => $name) {
    echo 'Weight: ' . $code . ' Package:  ' . $name . '<br>';
    $total = $total + $code;
}
echo "Total: ".$total;

?> -->