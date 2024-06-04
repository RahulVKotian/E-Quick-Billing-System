<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
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
    header('location:admine.php');
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
 <h1 class="text-success text-center">Admin Pannel</h1>
  <div class="col-lg-8 m-auto d-block">
<form action=""  method="POST" ><center> 
<div class="form-group" style="font-size:30px">

      <label >User name:</label>
      
       <input type="text" name="name" id="un"   size="20px" autocomplete="off">
      
    </div>
    <div class="form-group" style="font-size:30px">
       <label>Password:</label>
       <input type="password" name="pwd"  id="pass" style="widht:60px"  autocomplete="off">
      
    </div>
 
<input type="submit"  name="psubmit" style="font-size:20px" class="btn btn-success" value="LOGIN">
                  
</form>
</div>
</div>
</body>
</html>

















