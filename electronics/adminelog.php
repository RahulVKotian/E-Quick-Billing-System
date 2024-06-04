
<?php
include("check.php");
include("zz.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
if(isset($_POST['psubmit']))
{
      $billtype="Electronics";
   $name=$_POST['name'];
   $phn=$_POST['phn'];
   $password=$_POST['pwd'];
  
 $qry="insert into login(user_name,bill_type,phone_no,password) values('$name','$billtype','$phn','$password')";
 $nm=mysqli_query($db,$qry);


if($nm == TRUE)
{
     $msg='<h1><div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added successfully</div></h1>';
 }
else
{
   $msg='<h1><div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div></h1>';
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


<script type="text/javascript">
function myfun()
  {
     var fname=document.getElementById("un").value;
    var password=document.getElementById("pass").value;
    var mobile=document.getElementById("phn").value;
  
    if(fname=="")
     {
        document.getElementById("firstname").innerHTML="***Please fill the firstname field***";
        return false;
      }
     
      if((fname.length<3) || (fname.length>10)){
          document.getElementById("firstname").innerHTML="***FIRSTNAME LENGTH MUST BETWEEN 2 AND 10 CHARACTERS ***";
          return false;
      }

     if(!isNaN(fname)){
          document.getElementById("firstname").innerHTML="***ONLY CHARACTERS ARE ALLOWED***";
          return false;
      }
      else{
        document.getElementById("firstname").innerHTML="";
      }






      if(password=="")
     {
        document.getElementById("pword").innerHTML="***Please Enter the password***";
        return false;
      }
  
      if(password.length<9){
            document.getElementById("pword").innerHTML="***Password length must be greater than 8 characters***";
              return false;
        }
        if(password.search(/[0-9]/)==-1)
         {
             document.getElementById("pword").innerHTML="***Please write Password of atleast 1 digit***";
              return false;
          }

        if(password.search(/[a-z]/)==-1)
         {
               document.getElementById("pword").innerHTML="***Please write Password of atleast 1 lowercase character***";
              return false;
          }
       if(password.search(/[A-Z]/)==-1)
        {
             document.getElementById("pword").innerHTML="***Please write Password of atleast 1 uppercase character***";
            return false;
         }

       if(password.search(/[!\@\#\$\%\^\&\*\(\)\_\+\<\>\,\;\'\'\"\-]/)==-1)
        {
             document.getElementById("pword").innerHTML="***Please write Password of atleast 1 special character***";
             return false;
            }
      else{
        document.getElementById("pword").innerHTML="";
      }

      if(mobile=="")
     {
        document.getElementById("mobile_number").innerHTML="***Please enter your mobile number***";
        return false;
      }
      if(isNaN(mobile)){
            document.getElementById("mobile_number").innerHTML="***Please enter mobile number***";
            return false;
      }

    if(mobile.length!=10){
              document.getElementById("mobile_number").innerHTML="***Enter 10 digit mobile number ***";
               return false;
      }
      else{
        document.getElementById("mobile_number").innerHTML="";
      }
    
  }
</script>




</head>


<body>
<div class="contianer">
 <h1 class="text-success text-center">Add Executive</h1>
  <div class="col-lg-8 m-auto d-block">
<form   method="POST" action="" onsubmit="return myfun()">
<div class="form-group" style="font-size:20px">
       <label>Executive name:</label>
       <input type="text" name="name" id="un"  autocomplete="off" require>
        
    </div>
    <div class="form-group" style="font-size:20px">
       <label>Create Executive Password:</label>
       <input type="password" name="pwd" id="pass"  autocomplete="off" require>
       
    </div>
    <div class="form-group" style="font-size:20px">
       <label>Create Executive PhoneNO:</label>
       <input type="text" name="phn" id="phn" autocomplete="off" require>
        
    </div>
    
<input type="submit" name="psubmit" class="btn btn-success" style="font-size:20px;width:100px" value="ADD">
<a href="home.php" class="btn btn-danger" style="font-size:20px;width:100px">CLOSE</a>
<?php if(isset($msg)) {echo "$msg";}?>           
</div>
</form>
</div>
</div>
</body>
</html>
