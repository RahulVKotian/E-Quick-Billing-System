<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);

if(isset($_POST['psubmit'])){
$uname=$_POST["name"];
$password=$_POST["pwd"];


$query = "select * from singup where  user_name='$uname' && password='$password' ";
$sql=mysqli_query($db,$query); 
$num=mysqli_num_rows($sql);
if($num == TRUE){
    $_SESSION['username']=$uname;
    header('location:zz.php');
}

else
{
   echo '<script>alert("Unauthorized user")</script>';
}
}

?>

<html>
<head>
<title>
Quick bill
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
<div class="contianer">
 <h1 class="text-success text-center" style="font-size:30px">Admin Pannel</h1>
  <div class="col-lg-8 m-auto d-block">
<form action=""  method="POST" >
<div class="form-group">
       <label style="font-size:20px">User name:</label>
       <input type="text" name="name" id="un" style="font-size:20px" class="form-control" autocomplete="off">
      
    </div>
    <div class="form-group">
       <label style="font-size:20px">Password:</label>
       <input type="password" name="pwd" id="pass" style="font-size:20px" class="form-control" autocomplete="off">
     
    </div>

<input type="submit"  name="psubmit" style="font-size:20px;width:100px" class="btn btn-success" value="LOGIN">
                  
</form>
</div>
</div>
</body>
</html>
