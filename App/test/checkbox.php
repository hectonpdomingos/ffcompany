<html>

<head>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>






    <div id="boxes">
    <?php

    
 $numbers = array(5.98, 2.876, 10.00, 4.897);

for ($x= 0;$x < 4; $x++) {
    $tempNumber = $numbers[$x];
    
    echo $temp = $tempNumber;
    
    
    echo "<label><input type='checkbox' id='enbapicks-1' name='ENBApicks[1]' value='1' data-exval='$temp'> 1 Golden State</label> <br>";
      }

    ?>
        
    
  
    </div>
    <div>Result: <span id="result"></span></div>
    <br>
    <div>Aviso: <span id="Aviso"></span></div>

</body>


<script>
    $(document).ready(function () {
        //Set a handler to catch clicking the check box
        $("#boxes input[type='checkbox']").click(function () {
            var total = 0;
            //lOOP THROUGH CHECKED
            $("#boxes input[type='checkbox']:checked").each(function () {
                //Update total
                total += parseFloat($(this).data("exval"), 10);
            });
            $("#result").text(total);
            
        
        });

    });
</script>

</html>