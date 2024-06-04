<?php
session_start();

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"hotel");


if(isset($_POST['psubmit'])){
$uname=$_POST["name"];
$password=$_POST["pwd"];


//$query = "select * from singup where  user_name='$uname' && password='$password' ";
//$sql=mysqli_query($db,$query); 
//$num=mysqli_num_rows($sql);
//if($num == TRUE){
   // $_SESSION['username']=$uname;
   // header('location:home.php');
//}

//else
//{
//    header('location:error.php');
//}
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
 <h1 class="text-success text-center">Admine Pannel</h1>
  <div class="col-lg-8 m-auto d-block">
<form action=""  method="POST" >
<div class="form-group">
       <label>User name:</label>
       <input type="text" name="name" id="un" class="form-control" autocomplete="off">
       <span id="username" class="text-danger font-weight-bold"></span>
    </div>
    <div class="form-group">
       <label>Password:</label>
       <input type="text" name="pwd" id="pass" class="form-control" autocomplete="off">
       <span id="pword" class="text-danger font-weight-bold"></span>
    </div>
 <a href="forget.php" class="btn btn-success" > Forgot Password?</a>
<input type="submit"  name="psubmit" class="btn btn-success" value="LOGIN">
                  
</form>
</div>
</div>
</body>
</html>