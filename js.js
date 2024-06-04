function opennav() 

  {
    document.getElementById("Mynav").style.display = "block";
  }

  function closenav() 
  {
    document.getElementById("Mynav").style.display = "none";
  }



  //form script//
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
        document.getElementById("firstname").innerHTML="Please fill first name";
        return false;
      }
     
      if((fname.length<3) || (fname.length>10)){
          document.getElementById("firstname").innerHTML="Length must be longer then 2 character";
          return false;
      }

     if(!isNaN(fname)){
          document.getElementById("firstname").innerHTML="Only characters are allowed";
          return false;
      }
      else{
        document.getElementById("firstname").innerHTML="";
      }



      if(sname=="")
     {
        document.getElementById("surname").innerHTML="Please fill surname";
        return false;
      }
      if((sname.length<=1) || (sname.length>10)){
          document.getElementById("surname").innerHTML="Length shouldn't exceed 10 characters";
          return false;
      }

     if(!isNaN(sname)){
          document.getElementById("surname").innerHTML="only characters are allowed";
          return false;
      }
      else{
        document.getElementById("surname").innerHTML="";
      }




      if(uname=="")
     {
        document.getElementById("username").innerHTML="Please fill the username";
        return false;
      }
      else{
        document.getElementById("username").innerHTML="";
      }




      if(mail=="")
     {
        document.getElementById("emails").innerHTML="Please fill the E-mail";
        return false;
      }
      if(mail.indexOf('@')<=0){
            document.getElementById("emails").innerHTML="Please fill E-mail in correct format";
            return false;
       }
       if((mail.charAt(mail.length-4)!='.') && (mail.charAt(mail.length-3)!='.')){
              document.getElementById("emails").innerHTML="Please fill The E-mail in correct format";
              return false;
        }
      else{
        document.getElementById("emails").innerHTML="";
      }




      if(mobile=="")
     {
        document.getElementById("mobile_number").innerHTML="Please fill your mobile number";
        return false;
      }
      if(isNaN(mobile)){
            document.getElementById("mobile_number").innerHTML="Please fill mobile number";
            return false;
      }

    if(mobile.length!=10){
              document.getElementById("mobile_number").innerHTML="Enter 10 digit mobile number";
               return false;
      }
      else{
        document.getElementById("mobile_number").innerHTML="";
      }




      if(com_name=="")
     {
        document.getElementById("companyname").innerHTML="Please fill company name";
        return false;
      }
      else{
        document.getElementById("companyname").innerHTML="";
      }




      if(com_li_no=="")
     {
        document.getElementById("cln").innerHTML="Please fill company licence number";
        return false;
      }
      else{
        document.getElementById("cln").innerHTML="";
      }




      if(business=="")
     {
        document.getElementById("Businesstype").innerHTML="Please select business type";
        return false;
      }
      else{
        document.getElementById("Businesstype").innerHTML="";
      }




      if(password=="")
     {
        document.getElementById("pword").innerHTML="Please fill password";
        return false;
      }
  
      if(password.length<9){
            document.getElementById("pword").innerHTML="Password length must be longer then 8 charactors";
              return false;
        }
        if(password.search(/[0-9]/)==-1)
         {
             document.getElementById("pword").innerHTML="Pleare fill Password of atleast 1 digit";
              return false;
          }

        if(password.search(/[a-z]/)==-1)
         {
               document.getElementById("pword").innerHTML="Pleare fill Password of atleast 1 lowercase";
              return false;
          }
       if(password.search(/[A-Z]/)==-1)
        {
             document.getElementById("pword").innerHTML="Pleare fill Password of atleast 1 uppercase";
            return false;
         }

       if(password.search(/[!\@\#\$\%\^\&\*\(\)\_\+\<\>\,\;\'\'\"\-]/)==-1)
        {
             document.getElementById("pword").innerHTML="***Pleare fill Password of atleast 1 special charactor";
             return false;
            }
      else{
        document.getElementById("pword").innerHTML="";
      }




      if(conpassword=="")
     {
        document.getElementById("confirm_password").innerHTML="Please confirm your password once again";
        return false;
      }
      if(conpassword!=password)
         {
           document.getElementById("confirm_password").innerHTML="password not matching";
           return false;
         }
      else{
        document.getElementById("confirm_password").innerHTML="";
      }
  }
