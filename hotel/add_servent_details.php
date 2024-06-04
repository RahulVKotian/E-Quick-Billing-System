<?php
include("check.php");
include("zz.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);

if(isset($_POST['psubmit']))
{
   $name=$_POST['name'];
   $phn=$_POST['phn'];
   $age=$_POST['age'];
   $tableno=$_POST['tableno'];
   
 $qry="insert into suppliers(name,phone_no,age,Table_no) values('$name','$phn','$age',$tableno)";
 $nm=mysqli_query($db,$qry);


if($nm == TRUE)
{
     $msg='<br><h1><div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added successfully</div></h1>';
 }
else
{
   $msg='<br><h1><div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div></h1>';
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
 <h1 class="text-success text-center" style="font-size:30px">Add Servant</h1>
  <div class="col-lg-8 m-auto d-block">
<form   method="POST"  class="bg-light">
<div class="form-group">
       <label style="font-size:20px">Servant name:</label>
       <input type="text" name="name" style="font-size:20px" id="un" class="form-control" autocomplete="off">
        
    </div>
    <div class="form-group">
       <label style="font-size:20px">Servant PhoneNo:</label>
       <input type="text" name="phn" style="font-size:20px"  id="pass" class="form-control" autocomplete="off">
       
    </div>
    <div class="form-group">
       <label style="font-size:20px">Age:</label>
       <input type="text" name="age" style="font-size:20px"  class="form-control" autocomplete="off">
        
    </div>

  
    <div class="form-group">
       <label style="font-size:20px">Table NO:</label>
       <input type="text" name="tableno" style="font-size:20px"  class="form-control" autocomplete="off">
        
    </div>
    
<input type="submit" name="psubmit" class="btn btn-success" style="font-size:20;width:100px" value="ADD">
<?php if(isset($msg)) {echo "$msg";}?>           
</form>
</div>
</div>
</body>
</html>
