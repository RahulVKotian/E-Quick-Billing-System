<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);

if(isset($_REQUEST['pupdate']))
{
   
        $id=$_REQUEST["id"];
        $code=$_REQUEST["code"];
          $name=$_REQUEST["name"];
          $price=$_REQUEST["price"];
           $gst=$_REQUEST["gst"];
         
          $sql="update item_details set itemcode='$code',itemname='$name',price='$price',gst='$gst' where id='$id'";
   
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
<h3 class="text-center" style="font-size:30px">Update item Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql="select * from item_details where id={$_REQUEST['id']}";
    $result=mysqli_query($db,$sql);
    $row = $result-> fetch_assoc();
}
?>
<form action="" method="POST">
<div class="form-group">
 <label for ="id" style="font-size:20px">Item ID</label>
 <input type="text" class="form-control" style="font-size:20px" id="id" name="id" value="<?php if(isset($row['id'])){
     echo $row["id"];}?>" readonly>
 </div>
 <div class="form-group">
 <label for ="code" style="font-size:20px">Item Code</label>
 <input type="text" class="form-control" style="font-size:20px" id="code" name="code" value="<?php if(isset($row['itemcode'])){
     echo $row["itemcode"];}?>">
 </div>
<div class="form-group">
 <label for ="name" style="font-size:20px">Item Name</label>
 <input type="text" style="font-size:20px" class="form-control" id="name" name="name" value="<?php if(isset($row['itemname'])){
     echo $row["itemname"];}?>">
 </div>
 <div class ="form-group">
 <label for="price" style="font-size:20px">Price</label>
 <input type="text" style="font-size:20px" class="form-control" id="price" name="price" value="<?php if(isset($row['price'])){
     echo $row["price"];}?>">
 </div>

 <div class ="form-group">
 <label for="gst" style="font-size:20px">GST</label>
 <input type="text" style="font-size:20px" class="form-control" id="gst" name="gst" onkeypress="isInputNumber(event)" value="<?php if(isset($row['gst'])){
     echo $row["gst"];}?>" >
 </div>


 <div class ="text-center">
<button type="submit" style="font-size:20px" class="btn btn-danger" id="pupdate" name="pupdate" >Update</button>
<a href="item_details.php" style="font-size:20px" class="btn btn-secondary">Close</a>
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