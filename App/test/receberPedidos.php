<?php
if($_POST){
    $field_values_array = array_filter($_POST['field_name']);
    if($field_values_array){
        foreach ($field_values_array as $value){
            $soma = $value[2] + 2;
            //  echo "Qantidade: ".$value[2] . " Valor: ".$soma'<br />';
               

            echo $value[0], $soma. '<br />';

            //your mysql goes here
            //$sql="INSERT INTO stock_port (name, ticker) VALUES ('$value[0]', '$value[1]')";          
        }
    }
}
?>