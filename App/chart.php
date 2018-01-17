<?php 
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost", "root", "12domlei", "forwarder_db");
 
/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


/* Fetch result set from t_test table */
$data=mysqli_query($mysqli,"SELECT * FROM analitics_total_users_tb");
?>



<!DOCTYPE html>
<html>
	<head>
		<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
		<script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
		ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script></head>
    
    
    
    <script>
var myData=[<?php 
while($info=mysqli_fetch_array($data))
    echo $info['users'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data=mysqli_query($mysqli,"SELECT * FROM analitics_total_users_tb");
?>
var myLabels=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['month'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>
    <?php
/* Close the connection */
$mysqli->close(); 
?>
	<body>
		<div id='myChart'></div>
        
      <script>   window.onload=function(){
zingchart.render({
    id:"myChart",
    width:"100%",
    height:400,
    data:{
    "type":"bar",
    "title":{
        "text":"Data Pulled from MySQL Database"
    },
    "scale-x":{
        "labels":myLabels
    },
    "series":[
        {
            "values":myData
        }
]
}
});
        }; </script>
	</body>
</html>