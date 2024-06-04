
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

<link rel="stylesheet" type="text/css" href="Styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



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
</head>
<body>

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand"><img src="Images/Logo-2.svg" alt="Logo" href="http://localhost:8080/QuickBill/index.html" height="30px" width="150px" id="logo"></a>
</nav>
</header>  



<div class="contianer">
 <h1 class="text-success text-center">Registration form</h1>
  <div class="col-lg-8 m-auto d-block">

<form action="http://localhost:8080/current project/sr/sign.php"  method="POST" onsubmit="return myfun()" class="bg-light">
 
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


 <input type="submit" value="submit" class="btn btn-success" >


 
</form>
</div>
</div>


</body>
</html>
