<?php
include("check.php");
include("zz.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
   
if(isset($_POST['psubmit'])){
       $un=$_POST['uname'];
    $oldpass=$_POST['opass'];
    
    $conpass=$_POST['cpass'];

   $query="select password from login where user_name='$un'";
   $result=mysqli_query($db,$query);
   $run=mysqli_fetch_array($result);

   if($oldpass==$run['password'])
    {
        $sql1="update login set password='$conpass'  where user_name='$un'";
        mysqli_query($db,$sql1);
        $sql2="update singup set password='$conpass' , confirm_password='$conpass' where user_name='$un'";
        mysqli_query($db,$sql2);
        $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated successfully</div>';
    }
    else 
    {
        $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">old password is not matching to your original password please try again</div>';
        }
}

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="files/style.css">
<script type="text/javascript">
function myfun()
{   
      var uname=document.getElementById("uname").value;
      var od=document.getElementById("opass").value;
      var nd=document.getElementById("npass").value;
      var cd=document.getElementById("cpass").value;
     



     if(uname=="")
     {
        document.getElementById("username").innerHTML="***Please fill the Username***";
        return false;
     }
     else{
        document.getElementById("username").innerHTML="";
     }
     



     if(od=="")
     {
        document.getElementById("oldpassword").innerHTML="***Please fill the Old Password***";
        return false;
     }
     else{
        document.getElementById("oldpassword").innerHTML="";
     }





     if(nd=="")
     {
        document.getElementById("newpassword").innerHTML="***Please fill the New Password***";
        return false;
     }
            if(nd.length<9){
                   document.getElementById("newpassword").innerHTML="***Password length must be greater then 8 charactors***";
                     return false;
               }
               if(nd.search(/[0-9]/)==-1)
                {
                    document.getElementById("newpassword").innerHTML="***Pleare write Password of atleast 1 digit***";
                     return false;
                 }

               if(nd.search(/[a-z]/)==-1)
                {
                      document.getElementById("newpassword").innerHTML="***Pleare write Password of atleast 1 lowercase charactor***";
                     return false;
                 }
              if(nd.search(/[A-Z]/)==-1)
               {
                    document.getElementById("newpassword").innerHTML="***Pleare write Password of atleast 1 uppercase charactor***";
                   return false;
                }

              if(nd.search(/[!\@\#\$\%\^\&\*\(\)\_\+\<\>\,\;\'\'\"\-]/)==-1)
               {
                    document.getElementById("newpassword").innerHTML="***Pleare write Password of atleast 1 special charactor***";
                    return false;
                   }
             else{
               document.getElementById("newpassword").innerHTML="";
             }






     if(cd=="")
     {
        document.getElementById("confirmpassword").innerHTML="***Please fill the confirm Password***";
        return false;
     }
     if(cd!=np)
                {
                  document.getElementById("confirmpassword").innerHTML="***password not matching***";
                  return false;
                }
     else{
        document.getElementById("confirmpassword").innerHTML="";
     }


    
    
}
</script>
</head>



<body>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Change Password</h4>


</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="page-body">
<div class="card">
<div class="card-block">
<form method="POST" action="" onsubmit="return myfun()">
<div class="row" align="right" style="font-size:20px">
</div>
                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-6" style="font-size:20px"><b>User Name:</b></label>
                                                <div class="col-sm-5">
                                                  <input type="text" name="uname" id="uname" class="form-control " style="font-size:15px">
                                                  <span id="username" class="text-danger font-weight-bold"></span>
                                                       </div>
                                        </div>
                                        
                                        </div>
                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-6" style="font-size:20px"><b>Old Password:</b></label>
                                                <div class="col-sm-5">
                                                  <input type="password" name="opass" id="opass" class="form-control " style="font-size:15px">
                                                  <span id="oldpassword" class="text-danger font-weight-bold"></span>
                                                       </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-6 control-label" style="font-size:20px"><b>New Password:</b></label>
                                                <div class="col-sm-5">
                                                   <input type="password" name="npass" id="npass" class="form-control" style="font-size:15px">
                                                   <span id="newpassword" class="text-danger font-weight-bold"></span>
                                                </div>
                                        </div>
                                  
                                    
                            
                                    <div class="form-group row col-md-6 ">
                                                <label class="col-sm-6 control-label" style="font-size:20px"><b>Confirm New Password:</b></label>
                                                <div class="col-sm-5">
                                                   <input type="password" name="cpass" id="cpass" class="form-control" style="font-size:15px">
                                                   <span id="confirmpassword" class="text-danger font-weight-bold"></span>
                                                </div>
                                        </div>
                                    
                                    <div class="text-center">                    
<button type="submit" class="btn btn-danger" style="font-size:20px" name="psubmit" >Submit</button>
<a href="sam.php" class="btn btn-secondary" style="font-size:20px">Close</a>
</div>
</div>
<?php if(isset($msg)) {echo "$msg";}?>

                                    </form>
                                    
                                    </body>
                                    </html>
                                    