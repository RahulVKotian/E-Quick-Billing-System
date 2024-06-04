<?php
session_start();
$db=mysqli_connect("localhost","root","",$_SESSION['username']);
$bill_type=$_POST["bill"];
$phn=$_POST["phn"];
$uname=$_POST["name"];

$s="select * from login where  phone_no='$phn' && user_name='$uname'";

$rr = mysqli_query($db,$s);

$num=mysqli_num_rows($rr);

if($num==TRUE)
{
  if($bill_type=="Electronics")
  {
  $_SESSION['username']=$uname;
  header('location:electronics/Home.php');
}

  if($bill_type=="Hotel"){
    $_SESSION['username']=$uname;
    header('location:hotel/Home.php');
 
  }
  
}

else
{
  header('location:error.php');
}

?>