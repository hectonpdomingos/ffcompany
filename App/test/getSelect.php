<html>
<head>
</head>
<body>
<h1>Packages to send </h1>
<?php

$hobby = $_POST['hobby'];

   foreach ($hobby as $value) {
             echo "Hobby : ".$value."<br />";
        }
        header("Location: select.php");
    
?>

</body>
</html>
