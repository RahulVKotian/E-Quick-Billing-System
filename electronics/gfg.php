<?php 
session_start();
$u_n=$_SESSION['username'];
$con = mysqli_connect("localhost", "root", "", "$u_n"); 
$user_id = $_REQUEST['pcode1'];  

if ($user_id !== "") { 

      

    $query = mysqli_query($con, "select pname,pava,  

    poriginalcost,GST from product WHERE pcode='$user_id'"); 

  

    $row = mysqli_fetch_array($query); 

    $p_name = $row["pname"]; 
    $p_ava = $row["pava"]; 
    $p_cost = $row["poriginalcost"]; 
    $p_cost1 = $row["poriginalcost"]; 
    $gst=$row["GST"]; 
} 

  

$result = array("$p_name","$p_ava", "$p_cost","$p_cost1","$gst"); 


$myJSON = json_encode($result); 

echo $myJSON; 
?>