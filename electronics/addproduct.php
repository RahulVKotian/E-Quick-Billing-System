<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
   

if(isset($_REQUEST['psubmit']))
{
    if(($_REQUEST['pcode']=="") ||($_REQUEST['pname']=="") || ($_REQUEST['pdop']=="") || ($_REQUEST['pava']=="") || ($_REQUEST['ptotal']=="") || ($_REQUEST['poriginalcost']==""))
        {
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        }
    else
       {
          $pname=$_REQUEST["pname"];
          $pcode=$_REQUEST["pcode"];
          $pdop=$_REQUEST["pdop"];
           $pava=$_REQUEST["pava"];
          $ptotal=$_REQUEST["ptotal"];
          $pgst=$_REQUEST["pgst"];
          $pcost=$_REQUEST["poriginalcost"];
     
        

          $sql="insert into `product`(`pcode`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `GST`) values('$pcode','$pname','$pdop','$pava','$ptotal','$pcost','$pgst')";
   
          if(mysqli_query($db,$sql) == TRUE)
            {
                 $msg='<h1><div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added successfully</div></h1>';
             }
          else
            {
               $msg='<h1><div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div></h1>';
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
<div class="col-sm-12 col-md-12 mt-5 text-center">
<p class="bg-dark text-white p-2" style="font-size:15px">Add New Product</p>
</div>
<div class="col-sm-6  mt-5 mx-3 ">

<form action="" method="POST">
<div class="form-group" style="font-size:20px">
 <label for ="pcode">Product code</label>
 <input type="text" class="form-control" id="pcode" style="font-size:15px" name="pcode" autocomplete="off">
 </div>
<div class="form-group" style="font-size:20px">
 <label for ="pname">Product Name</label>
 <input type="text" class="form-control" id="pname" style="font-size:15px" name="pname"  autocomplete="off">
 </div>
 <div class ="form-group" style="font-size:20px">
 <label for="pdop">Date of Purchase</label>
 <input type="date" class="form-control" id="pdop" style="font-size:15px" name="pdop"  autocomplete="off">
 </div>

 <div class ="form-group" style="font-size:20px">
 <label for="pava">Available</label>
 <input type="text" class="form-control" id="pava" name="pava" style="font-size:15px" onkeypress="isInputNumber(event)" autocomplete="off">
 </div>

 <div class ="form-group" style="font-size:20px">
 <label for="ptotal">TOTAL</label>
 <input type="text" class="form-control" id="ptotal" name="ptotal" style="font-size:15px" onkeypress="isInputNumber(event)" autocomplete="off">
 </div>

 <div class ="form-group" style="font-size:20px">
 <label for="pgst">GST</label>
 <input type="text" class="form-control" id="pgst" name="pgst" style="font-size:15px" onkeypress="isInputNumber(event)" autocomplete="off">
 </div>

 <div class ="form-group" style="font-size:20px">
 <label for="poriginalcost">Cost</label>
 <input type="text" class="form-control" id="poriginalcost" style="font-size:15px" name="poriginalcost" onkeypress="isInputNumber(event)" autocomplete="off">
 </div>

 <div class ="text-center" style="font-size:20px">
<button type="submit" class="btn btn-danger" id="psubmit"  style="font-size:15px"  name="psubmit" >Submit</button>
<a href="sam.php" class="btn btn-secondary"  style="font-size:15px" >Close</a>
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
 </body>
 </html>