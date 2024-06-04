<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <title>
                Sign Up|Quick Billing
            </title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1" >

            <!--CDN-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

            <!--Local library-->
            <link rel="stylesheet" type="text/css" href="Styles.css">

            <script src="javascript.js"></script>




            <script type="text/javascript">
               function myfun()
                  {
                     var fname=document.getElementById("fn").value;
                    var sname=document.getElementById("sn").value;
                    var uname=document.getElementById("un").value;
                    var mail=document.getElementById("mail").value;
                    var mobile=document.getElementById("phn").value;
                    var com_name=document.getElementById("cn").value;
                    var com_li_no=document.getElementById("cli").value;
                    var business=document.getElementById("bt").value;
                    var password=document.getElementById("pass").value;
                    var conpassword=document.getElementById("conpass").value;
                  
                    if(fname=="")
                     {
                        document.getElementById("firstname").innerHTML="***Please fill the firstname feild***";
                        return false;
                      }
                     
                      if((fname.length<3) || (fname.length>10)){
                          document.getElementById("firstname").innerHTML="***FIRSTNAME LENGTH MUST BETWEEN 2 AND 10 CHARACTORS ***";
                          return false;
                      }
         
                     if(!isNaN(fname)){
                          document.getElementById("firstname").innerHTML="***ONLY CHARACTORS ARE ALLOWED***";
                          return false;
                      }
                      else{
                        document.getElementById("firstname").innerHTML="";
                      }
         
         
         
                      if(sname=="")
                     {
                        document.getElementById("surname").innerHTML="***Please fill the surname feild***";
                        return false;
                      }
                      if((sname.length<=1) || (sname.length>10)){
                          document.getElementById("surname").innerHTML="***SURNAME SHOULD NOT EXCEED FROM 10 CHARACTORS ***";
                          return false;
                      }
         
                     if(!isNaN(sname)){
                          document.getElementById("surname").innerHTML="***ONLY CHARACTORS ARE ALLOWED***";
                          return false;
                      }
                      else{
                        document.getElementById("surname").innerHTML="";
                      }
         
         
         
         
                      if(uname=="")
                     {
                        document.getElementById("username").innerHTML="***Please fill the username feild***";
                        return false;
                      }
                      else{
                        document.getElementById("username").innerHTML="";
                      }
         
         
         
         
                      if(mail=="")
                     {
                        document.getElementById("emails").innerHTML="***Please fill the E-mail feild***";
                        return false;
                      }
                      if(mail.indexOf('@')<=0){
                            document.getElementById("emails").innerHTML="***Please Enter The E-mail in correct formate (abc@gmail.com)***";
                            return false;
                       }
                       if((mail.charAt(mail.length-4)!='.') && (mail.charAt(mail.length-3)!='.')){
                              document.getElementById("emails").innerHTML="***Please Enter The E-mail in correct formate (abc@gmail.com)***";
                              return false;
                        }
                      else{
                        document.getElementById("emails").innerHTML="";
                      }
         
         
         
         
                      if(mobile=="")
                     {
                        document.getElementById("mobile_number").innerHTML="***Please Enetr your mobile number***";
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
         
         
         
         
                      if(com_name=="")
                     {
                        document.getElementById("companyname").innerHTML="***Please enter the company name***";
                        return false;
                      }
                      else{
                        document.getElementById("companyname").innerHTML="";
                      }
         
         
         
         
                      if(com_li_no=="")
                     {
                        document.getElementById("cln").innerHTML="***Please enter your company licence number***";
                        return false;
                      }
                      else{
                        document.getElementById("cln").innerHTML="";
                      }
         
         
         
         
                      if(business=="")
                     {
                        document.getElementById("Businesstype").innerHTML="***Please enter type of your business***";
                        return false;
                      }
                      else{
                        document.getElementById("Businesstype").innerHTML="";
                      }
         
         
         
         
                      if(password=="")
                     {
                        document.getElementById("pword").innerHTML="***Please Enter the password***";
                        return false;
                      }
                  
                      if(password.length<9){
                            document.getElementById("pword").innerHTML="***Password length must be greater then 8 charactors***";
                              return false;
                        }
                        if(password.search(/[0-9]/)==-1)
                         {
                             document.getElementById("pword").innerHTML="***Pleare write Password of atleast 1 digit***";
                              return false;
                          }
         
                        if(password.search(/[a-z]/)==-1)
                         {
                               document.getElementById("pword").innerHTML="***Pleare write Password of atleast 1 lowercase charactor***";
                              return false;
                          }
                       if(password.search(/[A-Z]/)==-1)
                        {
                             document.getElementById("pword").innerHTML="***Pleare write Password of atleast 1 uppercase charactor***";
                            return false;
                         }
         
                       if(password.search(/[!\@\#\$\%\^\&\*\(\)\_\+\<\>\,\;\'\'\"\-]/)==-1)
                        {
                             document.getElementById("pword").innerHTML="***Pleare write Password of atleast 1 special charactor***";
                             return false;
                            }
                      else{
                        document.getElementById("pword").innerHTML="";
                      }
         
         
         
         
                      if(conpassword=="")
                     {
                        document.getElementById("confirm_password").innerHTML="***Please confirm your password once again***";
                        return false;
                      }
                      if(conpassword!=password)
                         {
                           document.getElementById("confirm_password").innerHTML="***password not matching***";
                           return false;
                         }
                      else{
                        document.getElementById("confirm_password").innerHTML="";
                      }
         
         
                  }
                 
             
         
         </script>
<?php

if(isset($_POST["psubmit"])){
$f_n=$_POST["f_name"];
$s_n=$_POST["s_name"];
$u_n=$_POST["u_name"];
$comp_nm=$_POST["comp_name"];
$bns=$_POST["business"];
$comp_l_nm=$_POST["comp_li_no"];
$phn=$_POST["phone_no"];
$passwrd=$_POST["password"];
$confirm=$_POST["cpassword"];
$mail=$_POST["E_mail"];

$_SESSION['username']=$u_n;

$db=mysqli_connect("localhost","root","");
$createdb="create database $u_n";
mysqli_query($db,$createdb);
 
$qdb=mysqli_select_db($db,$u_n);


$createtb="create table singup(id int(10) NOT NULL auto_increment primary key,
                               first_name varchar(15),
                               sur_name varchar(15),
                               user_name varchar(15),
                               company_name varchar(15),
                               business_type varchar(20),
                               company_license_no varchar(15),
                               phone_number varchar(10),
                               password varchar(25),
                               confirm_password varchar(25),
                               mail varchar(15))";
                               $qry=mysqli_query($db,$createtb);





$sql2="create table login(id int(11)NOT NULL auto_increment primary key,
                           user_name varchar(30),
                           phone_no varchar(10),
                           password varchar(30))";
                           mysqli_query($db,$sql2);

$sql3="create table authorities(id int(11)NOT NULL auto_increment primary key,
                                 user_name varchar(30),
                                 phone_no varchar(10),
                                 password varchar(30))";
                                 mysqli_query($db,$sql2);
                  
$querys="insert into `login`(`user_name`, `phone_no`, `password`) values('$u_n','$phn','$passwrd')";
mysqli_query($db,$querys);


$query = "insert into singup(first_name,sur_name,user_name,company_name,business_type,company_license_no,phone_number,password,confirm_password,mail)
             values('$f_n','$s_n','$u_n','$comp_nm','$bns','$comp_l_nm','$phn','$passwrd','$confirm','$mail')";
$qry1=mysqli_query($db,$query);

$query2="insert into `login`(`user_name`, `phone_no`, `password`) values('$u_n','$phn','$passwrd')";
mysqli_query($db,$query2);
if($qry1==TRUE){?>
    <script type="text/javascript">
    window.location='index.php';
    </script>
<?php
}

}

?>
        </head>

            <body>

                <header>

                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand"><img src="Images/Logo-2.svg" alt="Logo" href="http://localhost:8080/QuickBill/index.html" height="30px" width="150px" id="logo"></a>
                    </nav>
                </header>  
                    <div class="container">
            
<form action=""  method="POST" onsubmit="return myfun()" class="bg-light">
 
    <div class="form-group">
       <label>First name:</label>
       <input type="text" name="f_name" id="fn" class="form-control" id="fn" autocomplete="off">
       <span id="firstname" class="text-danger font-weight-bold"></span>
    </div>

    <div class="form-group">
       <label>Sur name:</label>
       <input type="text" name="s_name" class="form-control" id="sn" autocomplete="off">
       <span id="surname" class="text-danger font-weight-bold"></span>
    </div>

    <div class="form-group">
       <label>User name:</label>
       <input type="text" name="u_name" class="form-control" id="un" autocomplete="off">
       <span id="username" class="text-danger font-weight-bold"></span>
    </div>

       <div class="form-group">
        <label>E_mail:</label>
        <input type="text" name="E_mail" class="form-control" id="mail" autocomplete="off">
       <span id="emails" class="text-danger font-weight-bold"></span>
    </div>

    <div class="form-group">
       <label>Phone number:</label>
       <input type="text" name="phone_no" class="form-control" id="phn" autocomplete="off">
       <span id="mobile_number" class="text-danger font-weight-bold"></span>
    </div>

    <div class="form-group">
       <label>company name:</label>
       <input type="text" name="comp_name" class="form-control" id="cn" autocomplete="off">
       <span id="companyname" class="text-danger font-weight-bold"></span>
    </div> 

    <div class="form-group">
       <label>Company license number:</label>
       <input type="text" name="comp_li_no" class="form-control" id="cli" autocomplete="off">
       <span id="cln" class="text-danger font-weight-bold"></span>
    </div>

 

 <div class="form-group">
       <label>Business type:</label>
       <input type="text" name="business" class="form-control" id="bt" autocomplete="off">
       <span id="Businesstype" class="text-danger font-weight-bold"></span>
    </div>

 
  


 <div class="form-group">
       <label>Password:</label>
       <input type="text" name="password" id="pass" class="form-control" autocomplete="off">
       <span id="pword" class="text-danger font-weight-bold"></span>
    </div>

 <div class="form-group">
       <label>confirm password:</label>
       <input type="text" name="cpassword" id="conpass" class="form-control"  autocomplete="off">
       <span id="confirm_password" class="text-danger font-weight-bold"></span>
    </div>


 <input type="submit" value="submit" name="psubmit" class="btn btn-success" >
</form>

                    </div>
                    
                    <footer id="footer">
                        <center>
                            <br><br>
                                    <a href="https://www.facebook.com/shravanas.shravanas/"><img src="Images/036-facebook.svg" class="sociallink"></a>
                                    <a href="https://wa.me/+919741894704?text=Hi%20,%20I%20am%20Interested%20on%20Quick%20Bill!" target="_blank">
                                    <img src="Images/005-whatsapp.svg" class="sociallink"></a>
                                    <a href="https://twitter.com/shravanAS1154"><img src="Images/008-twitter.svg" class="sociallink"></a>
                                    <a href="https://www.linkedin.com/in/shravan-a-s-562115147/"><img src="Images/027-linkedin.svg" class="sociallink"></a>
                        </center>
                    </footer>
            </body>
    </html>