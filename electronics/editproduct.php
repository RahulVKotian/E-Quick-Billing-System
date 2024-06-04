<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);

if(isset($_REQUEST['pupdate']))
{
    if(($_REQUEST['pcode']=="") || ($_REQUEST['pname']=="") || ($_REQUEST['pdop']=="") || ($_REQUEST['pava']=="") || ($_REQUEST['ptotal']=="") || ($_REQUEST['poriginalcost']==""))
        {
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        }
    else
       {
        $pid=$_REQUEST["pid"];
        $pcode=$_REQUEST["pcode"];
          $pname=$_REQUEST["pname"];
          $pdop=$_REQUEST["pdop"];
           $pava=$_REQUEST["pava"];
          $ptotal=$_REQUEST["ptotal"];
          $pgst=$_REQUEST["pgst"];
          $pcost=$_REQUEST["poriginalcost"];
          $sql="update product set pcode='$pcode',pname='$pname',pdop='$pdop',pava='$pava',ptotal='$ptotal',poriginalcost='$pcost',GST='$pgst' where pid='$pid'";
   
          if(mysqli_query($db,$sql) == TRUE)
            {
                 $msg='<h1><div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated successfully</div>';
             }
          else
            {
               $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div></h1>';
             }
 
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
<h3 class="text-center" style="font-size:30px">Update Product Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql="select * from product where pid={$_REQUEST['id']}";
    $result=mysqli_query($db,$sql);
    $row = $result-> fetch_assoc();
}
?>
<form action="" method="POST">
<div class="form-group">
 <label for ="pid" style="font-size:20px">Product ID</label>
 <input type="text" class="form-control" style="font-size:20px" id="pid" name="pid" value="<?php if(isset($row['pid'])){
     echo $row["pid"];}?>" readonly>
 </div>
 <div class="form-group">
 <label for ="pcode" style="font-size:20px">Product code</label>
 <input type="text" class="form-control" style="font-size:20px" id="pcode" name="pcode" value="<?php if(isset($row['pcode'])){
     echo $row["pcode"];}?>">
 </div>
<div class="form-group">
 <label for ="pname" style="font-size:20px">Product Name</label>
 <input type="text" style="font-size:20px" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])){
     echo $row["pname"];}?>">
 </div>
 <div class ="form-group">
 <label for="pdop" style="font-size:20px">Date of Purchase</label>
 <input type="date" style="font-size:20px" class="form-control" id="pdop" name="pdop" value="<?php if(isset($row['pdop'])){
     echo $row["pdop"];}?>">
 </div>

 <div class ="form-group">
 <label for="pava" style="font-size:20px">Available</label>
 <input type="text" style="font-size:20px" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])){
     echo $row["pava"];}?>" >
 </div>

 <div class ="form-group">
 <label for="ptotal" style="font-size:20px">TOTAL</label>
 <input type="text" style="font-size:20px" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)" value="<?php if(isset($row['ptotal'])){
     echo $row["ptotal"];}?>">
 </div>

 <div class ="form-group">
 <label for="ptotal" style="font-size:20px">GST</label>
 <input type="text" style="font-size:20px" class="form-control" id="pgst" name="pgst" onkeypress="isInputNumber(event)" value="<?php if(isset($row['GST'])){
     echo $row["GST"];}?>">
 </div>

 <div class ="form-group">
 <label for="poriginalcost" style="font-size:20px">Cost</label>
 <input type="text"  style="font-size:20px" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)" value="<?php if(isset($row['poriginalcost'])){
     echo $row["poriginalcost"];}?>">
 </div>

 <div class ="text-center">
<button type="submit" style="font-size:20px" class="btn btn-danger" id="pupdate" name="pupdate" >Update</button>
<a href="sam.php" style="font-size:20px" class="btn btn-secondary">Close</a>
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