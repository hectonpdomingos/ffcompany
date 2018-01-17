<html>

<head>

</head>

<body>


  <form name="frm" method="post" action='getSelect.php'>
    <input type="checkbox" name="hobby[]" value="coding"> coding &nbsp
    <input type="checkbox" name="hobby[]" value="database"> database &nbsp
    <input type="checkbox" name="hobby[]" value="software engineer"> soft Engineering <br>
    <input type="submit" name="submit" value="submit">
  </form>


  <?php
include ('getSelect.php');
 ?>
</body>

</html>



<?php
     $item = $_POST['ItemToSend'];
         foreach ($item as $value)
          {
              echo "Item : ".$value."<br />";
         }
?>