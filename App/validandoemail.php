<?php
    $host="localhost"; // Host name
    $username="hecto042"; // Mysql username
    $password="OwN6j5p70u"; // Mysql password
    $db_name="hecto042_bookit"; // Database name
    $tbl_name="usuarios"; // Table name
    
    // Connect to server and select databse.
    mysql_connect("$host", "$username", "$password")or die("cannot connect");
    mysql_select_db("$db_name")or die("cannot select DB");
     $email=$_POST['email'];
    $sql="SELECT $email FROM $tbl_name";
    $result=mysql_query($sql);
    ?>
     
     
      <?php

	if ($result == "$email)
           {
		echo "Este email já está cadastrado";
	   }
	   else
	   {
	   echo "Este email está disponível";
	   }


       ?>