<?php
session_start();
$db=mysqli_connect("localhost","root","");

$uname=$_POST["name"];
$password=$_POST["pwd"];
$qdb=mysqli_select_db($db,$uname);


$query = "select * from login,singup where  login.user_name='$uname'  || login.password='$password' && singup.user_name='$uname'|| singup.password='$password'"; 
$sql=mysqli_query($db,$query); 
$num=mysqli_num_rows($sql);
if($num == TRUE){
    $_SESSION['username']=$uname;
    header('location:right.php');
}

else
{
    header('location:error.php');
}

?>

