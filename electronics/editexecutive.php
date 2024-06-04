<?php
include("check.php");
include("zz.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
   
if(isset($_REQUEST['pupdate']))
{
         $pid=$_REQUEST["id"];
        $user_name=$_REQUEST["user_name"];
        $phone_no=$_REQUEST["phone_no"];
          $password=$_REQUEST["password"];
         
          
          $sql="update login set user_name='$user_name',phone_no='$phone_no',password='$password' where id='$pid'";
   
          if(mysqli_query($db,$sql) == TRUE)
            {
                 $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated successfully</div>';
             }
          else
            {
               $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
             }
 
        
}
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-sm-6 mt-5 mx-3 ">
<h3 class="text-center" style="font-size:20px">Update Executive Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql="select * from login where id={$_REQUEST['id']}";
    $result=mysqli_query($db,$sql);
    $row = $result-> fetch_assoc();
}
?>
<form action="" method="POST">
<div class="form-group">
 <label for ="pid" style="font-size:20px">ID</label>
 <input type="text" class="form-control" id="id" style="font-size:20px" name="id" value="<?php if(isset($row['id'])){
     echo $row["id"];}?>" readonly>
 </div>
 <div class="form-group">
 <label for ="user_name" style="font-size:20px">Executive Name</label>
 <input type="text" class="form-control" id="user_name" style="font-size:20px"  name="user_name" value="<?php if(isset($row['user_name'])){
     echo $row["user_name"];}?>">
 </div>
<div class="form-group">
 <label for ="phone_no" style="font-size:20px">Executive phone no</label>
 <input type="text" class="form-control" id="phone_no" style="font-size:20px" name="phone_no" value="<?php if(isset($row['phone_no'])){
     echo $row["phone_no"];}?>">
 </div>
 <div class ="form-group">
 <label for="password" style="font-size:20px">Password</label>
 <input type="text" class="form-control" id="password" style="font-size:20px" name="password" value="<?php if(isset($row['password'])){
     echo $row["password"];}?>">
 </div>


 <div class ="text-center">
<button type="submit" class="btn btn-danger" id="pupdate" style="font-size:20px" name="pupdate" >Update</button>
<a href="executive_details.php" class="btn btn-secondary" style="font-size:20px">Close</a>
 </div>
 <?php if(isset($msg)) {echo "$msg";}?>
 </form>
 </div>
 <script>
 function isInputNumber(evt){
     var ch = String.fromCharCode(evt.which);
     if(!(/[0-9]/.test(ch))){
         evt.preventDefault();

     }
 }
 </script>