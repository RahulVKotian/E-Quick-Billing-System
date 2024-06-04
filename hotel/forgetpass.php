<?php
session_start();
include("dbconnection.php");

$phn=$_POST["phn"];
$uname=$_POST["name"];

$s="select * from login where  phone_no='$phn' && user_name='$uname'";

$rr = mysqli_query($db,$s);

$num=mysqli_num_rows($rr);

if($num==1)
{
  $_SESSION['username']=$uname;
  header('location:home.php');

  
}

else
{
  header('location:error.php');
}

?>