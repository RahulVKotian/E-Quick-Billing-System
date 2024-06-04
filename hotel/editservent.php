<?php
include("check.php");
include("zz.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);

if(isset($_REQUEST['pupdate']))
{
   
        $id=$_REQUEST["id"];
        $name=$_REQUEST["name"];
          $phn=$_REQUEST["phn"];
          $age=$_REQUEST["age"];
           $tbleno=$_REQUEST["tableno"];
         
          $sql="update suppliers set name='$name',phone_no='$phn',age='$age',table_no='$tbleno' where id='$id'";
   
          if(mysqli_query($db,$sql) == TRUE)
            {
                 $msg='<h1><div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated successfully</div>';
             }
          else
            {
               $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div></h1>';
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
<h3 class="text-center" style="font-size:30px">Update Servent Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql="select * from suppliers where id={$_REQUEST['id']}";
    $result=mysqli_query($db,$sql);
    $row = $result-> fetch_assoc();
}
?>
<form action="" method="POST">
<div class="form-group">
 <label for ="id" style="font-size:20px">Servent ID</label>
 <input type="text" class="form-control" style="font-size:20px" id="id" name="id" value="<?php if(isset($row['id'])){
     echo $row["id"];}?>" readonly>
 </div>
 <div class="form-group">
 <label for ="name" style="font-size:20px">Servent Name</label>
 <input type="text" class="form-control" style="font-size:20px" id="name" name="name" value="<?php if(isset($row['name'])){
     echo $row["name"];}?>">
 </div>
<div class="form-group">
 <label for ="phn" style="font-size:20px">Phone No</label>
 <input type="text" style="font-size:20px" class="form-control" id="phn" name="phn" value="<?php if(isset($row['phone_no'])){
     echo $row["phone_no"];}?>">
 </div>
 <div class ="form-group">
 <label for="age" style="font-size:20px">Age</label>
 <input type="text" style="font-size:20px" class="form-control" id="age" name="age" value="<?php if(isset($row['age'])){
     echo $row["age"];}?>">
 </div>

 <div class ="form-group">
 <label for="tableno" style="font-size:20px">Table No</label>
 <input type="text" style="font-size:20px" class="form-control" id="tableno" name="tableno" onkeypress="isInputNumber(event)" value="<?php if(isset($row['Table_no'])){
     echo $row["Table_no"];}?>" >
 </div>


 <div class ="text-center">
<button type="submit" style="font-size:20px" class="btn btn-danger" id="pupdate" name="pupdate" >Update</button>
<a href="servent_details.php" style="font-size:20px" class="btn btn-secondary">Close</a>
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