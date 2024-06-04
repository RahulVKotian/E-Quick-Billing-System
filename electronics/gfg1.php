<?php 
// Get the user id  

$us = $_REQUEST['itemno']; 

  
// Database connection 

$con = mysqli_connect("localhost", "root", "", "hotel"); 
if ($us !== "") { 

      

    $query = mysqli_query($con, "select itemname,price,gst from  item_details WHERE itemcode='$us'"); 

  

    $row = mysqli_fetch_array($query); 

    $name= $row['itemname'];
    $cost = $row["price"]; 
    $gst=$row["gst"]; 
  
} 

  

$result = array("$name","$cost","$gst"); 


$myJSON = json_encode($result); 

echo $myJSON; 
?>