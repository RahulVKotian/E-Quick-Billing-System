<?php
include("check.php");
include("yy.php");

$db=mysqli_connect("localhost","root","",$_SESSION['username']);


if(isset($_REQUEST['psubmit']))
{
    if(($_REQUEST['icode']=="") ||($_REQUEST['iname']=="") || ($_REQUEST['icost']=="") || ($_REQUEST['igst']==""))
        {
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        }
        else{

        
$icode=$_REQUEST["icode"];
$iname=$_REQUEST["iname"];
$icost=$_REQUEST["icost"];
$igst=$_REQUEST["igst"];
$sql="INSERT INTO `item_details`(`itemcode`, `itemname`, `price`, `gst`) VALUES ('$icode','$iname','$icost','$igst')";
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="col-sm-6 mt-4 mx-3 ">
<h3 class="text-center" style="font-size:20px">Add New Item</h3>
<form action="" method="POST">


<div class="form-group">
 <label for ="icode" style="font-size:20px">Item code</label>
 <input type="text" style="font-size:20px" class="form-control" id="icode" autocomplete="off" name="icode">
 </div>


<div class="form-group">
 <label for ="iname" style="font-size:20px">Item Name</label>
 <input type="text" style="font-size:20px" class="form-control" id="iname" name="iname" autocomplete="off">
 </div>
 

 

 <div class ="form-group">
 <label for="icost" style="font-size:20px">Price</label>
 <input type="text" style="font-size:20px" class="form-control" id="icost" name="icost" autocomplete="off" onkeypress="isInputNumber(event)">
 </div>

 <div class ="form-group">
 <label for="igst" style="font-size:20px">GST</label>
 <input type="text" style="font-size:20px" class="form-control" id="igst" name="igst" autocomplete="off" onkeypress="isInputNumber(event)">
 </div>


 <div class ="text-center">
<button type="submit" style="font-size:20px;width:100px"" class="btn btn-danger" id="psubmit" name="psubmit" >Submit</button>
<a href="home.php" class="btn btn-secondary" style="font-size:20px;width:100px">Close</a>
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