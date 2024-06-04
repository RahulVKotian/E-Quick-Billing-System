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
            
            <script src="js.js"></script>


<?php

if(isset($_POST["psubmit"]))
{
$f_n=$_POST["f_name"];
$s_n=$_POST["s_name"];
$u_n=$_POST["u_name"];
$comp_nm=$_POST["comp_name"];
$billtype=$_POST["bill_type"];
$comp_l_nm=$_POST["comp_li_no"];
$phn=$_POST["phone_no"];
$passwrd=$_POST["password"];
$confirm=$_POST["cpassword"];
$mail=$_POST["E_mail"];


$db=mysqli_connect("localhost","root","");
$createdb="create database $u_n";
mysqli_query($db,$createdb);
 
$qdb=mysqli_select_db($db,$u_n);


$createtb="create table singup(id int(10) NOT NULL auto_increment primary key,
                               first_name varchar(15),
                               sur_name varchar(15),
                               user_name varchar(15),
                               company_name varchar(15),
                               bill_type varchar(20),
                               company_license_no varchar(15),
                               phone_number varchar(10),
                               password varchar(25),
                               confirm_password varchar(25),
                               mail varchar(15))";
                               $qry=mysqli_query($db,$createtb);

$sql2="create table login(id int(11)NOT NULL auto_increment primary key,
                           user_name varchar(30),
                           bill_type varchar(30),
                           phone_no varchar(10),
                           password varchar(30))";
                           mysqli_query($db,$sql2);

                           if($billtype=="Electronics")
                           {
                           
                               $sql1="create table product(pid int(11) NOT NULL auto_increment primary key,
                                                   pcode varchar(25),
                                                   pname varchar(25),
                                                   pdop date,
                                                   pava int(11),
                                                   ptotal int(11),
                                                   poriginalcost int(11),
                                                   GST int(11))";
                                                   mysqli_query($db,$sql1);
                           
                           
                                                   $sql3="create table customer_tb(coustomer_id int(11)NOT NULL auto_increment primary key,
                                                       Bill_date date,
                                                       customer_name varchar(20),
                                                       customer_address varchar(50),
                                                       discount double,
                                                       total decimal(10,2))";
                                                       mysqli_query($db,$sql3);
                                                       
                                               $sql4="create table bill_details(id int(11)NOT NULL auto_increment primary key,
                                                         customer_id int(20),
                                                         product_id varchar(25),
                                                         product_name varchar(25),
                                                         product_qty int(10),
                                                         price decimal(10,2),
                                                         cgst float,
                                                         sgst float,
                                                         total decimal(10,2))";
                                                         mysqli_query($db,$sql4);        
                                                         
                           
                           
                                                       
                  
                           }
                           if($billtype=="Hotel"){
                                                         
                           $sql5="create table customer_tbl(id int(11)NOT NULL auto_increment primary key,
                           item_code varchar(20),
                           table_no int(15),
                           price int(15),
                           qty int(10),
                           total int(15))";
                           mysqli_query($db,$sql5);
                           
                           $sql6="create table item_details(id int(11)NOT NULL auto_increment primary key,
                           itemcode varchar(20),
                           itemname varchar(15),
                           price int(20),
                           gst int(20))";
                           mysqli_query($db,$sql6);
                           
                           $sql7="create table suppliers(id int(11)NOT NULL auto_increment primary key,
                           name varchar(20),
                           phone_no varchar(20),
                           age int(15),
                           Table_no int(19))";
                           mysqli_query($db,$sql7);
                           
                           $sql8="create table table_profit(id int(11)NOT NULL auto_increment primary key,
                           table_no int(20),
                           discount float,
                           total float,
                           bdate date)";
                           mysqli_query($db,$sql8); 
                                       
                           
                           }
                          
$query = "insert into singup(first_name,sur_name,user_name,company_name,bill_type,company_license_no,phone_number,password,confirm_password,mail)
             values('$f_n','$s_n','$u_n','$comp_nm','$billtype','$comp_l_nm','$phn','$passwrd','$confirm','$mail')";
$qry1=mysqli_query($db,$query);

$query2="insert into `login`(`user_name`,`bill_type`,`phone_no`,`password`) values('$u_n','$billtype','$phn','$passwrd')";
$qry2=mysqli_query($db,$query2);
if($qry2==TRUE)
{?>
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
                        <a class="navbar-brand"><img src="Images/Logo-2.svg" alt="Logo" href="http://localhost:8080/QuickBill1/index.html" height="30px" width="150px" id="logo"></a>
                    </nav>
                </header>  
                    <br>
            
<form action=""  method="POST" onsubmit="return myfun()" class="bg-light">

<div class="container">

<h3 class="uptext">Start From Here</h3>
        


  <table>
      <tr>
          <td><span id="firstname" class="text_danger"></span><br>
              <input type="text" name="f_name" id="fn" class="input" id="fn" placeholder="First Name" autocomplete="off"><br></td>
          
          <td><span id="surname" class="text_danger"></span><br>
              <input type="text" name="s_name" class="input1" placeholder="Surname" id="sn" autocomplete="off"><br></td>
          
      </tr>

      <tr>
          <td><span id="username" class="text_danger"></span><br>
              <input type="text" name="u_name" class="input" placeholder="Username" id="un" autocomplete="off"><br></td>
          
          <td><span id="emails" class="text_danger"></span><br>
              <input type="text" name="E_mail" class="input1" placeholder="E-mail" id="mail" autocomplete="off"><br></td>
          

      </tr>

      <tr>
          <td><span id="mobile_number" class="text_danger"></span><br>
              <input type="text" name="phone_no" class="input" placeholder="Phone Number" id="phn" autocomplete="off"><br></td>
          
          <td><span id="companyname" class="text_danger"></span><br>
              <input type="text" name="comp_name" class="input1" placeholder="Company Name" id="cn" autocomplete="off"><br></td>
         
      </tr>

      <tr>
          <td><span id="cln" class="text_danger"></span><br>
              <input type="text" name="comp_li_no" class="input" placeholder="Business License" id="cli" autocomplete="off"><br></td>
          

          <td><span id="Businesstype" class="text_danger"></span><br>
               <select name="bill_type" class="input1"  id="bt" placeholder="Business Type" >
                           <option class="un" value="" disabled selected>Select Business Type</option>
                           <option  class="input1" name="electro">Electronics</option>
       
                           <option  class="input1" name="hotel">Hotel</option>
       
                          </select><br>
                        </td>
      </tr>

      <tr>
        <td><span id="pword" class="text_danger"></span><br>
            <input type="password" name="password" id="pass" class="input" placeholder="Password" autocomplete="off"> <br></td>
        
        <td><span id="confirm_password" class="text_danger"></span><br>
            <input type="password" name="cpassword" id="conpass" class="input1" placeholder="Confirm Password" autocomplete="off"><br></td>
        
      </tr>

  </table>   
                               <input type="submit" value="Submit" name="psubmit" class="submit" onclick="myfun()" >
                                <p class="signup" align="center"><a href="http://localhost:8080/QuickBill1/Signin.php">Signin</p>

</form>

    </div>
    <style>

.container{
  width: 80vw;
  background-color: #FFFFFF;
  margin: 10vw;
  margin-top: 8vh;
  margin-bottom: 2.5vh;
  margin-left: 3vw auto;
  margin-right: 3vw auto;
  border-radius: 20px;
  box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}

.uptext{
  margin-top:-120px;
  margin-bottom: 50px;
  text-align: center;
  font-weight: bold;
  
  text-shadow: 0 1px 0 #ccc,
           0 2px 0 #c9c9c9,
           0 3px 0 #bbb,
           0 4px 0 #b9b9b9,
           0 5px 0 #aaa,
           0 6px 1px rgba(0,0,0,.1),
           0 0 5px rgba(0,0,0,.1),
           0 1px 3px rgba(0,0,0,.3),
           0 3px 5px rgba(0,0,0,.2),
           0 5px 10px rgba(0,0,0,.25),
           0 10px 10px rgba(0,0,0,.2),
           0 20px 20px rgba(0,0,0,.15);
  padding-top: 40px;
  color: rgb(109, 109, 109);
  font-family: 'Ubuntu', sans-serif;
  font-weight: bold;
}

input[type=text]{
  background-color: #ececec;
  width: 20vw;
  height: 5vh;
  text-align: center;
  border-radius: 1.5em;
  margin-bottom: 2.5vh;
  margin-left: 13vw;
  border: none;

}

input[type=password]{
  background-color: #ececec;
  width: 20vw;
  height: 5vh;
  text-align: center;
  border-radius: 1.5em;
  margin-bottom: 2.5vh;
  margin-left: 13vw;
  border: none;

}

.input1{
  background-color: #ececec;
  width: 20vw;
  height: 5vh;
  text-align: center;
  border-radius: 1.5em;
  margin-bottom: 2.5vh;
  margin-left: 13vw;
  border: none;
}

.text_danger{
  color: #ec1010;
  margin-left: 18vw;
  font-size: 12.5px;
  
}

    .submit 
    {
        a
        cursor: pointer;
        border-radius: 5em;
        color: rgb(99, 99, 99);
        background: #FFFFFF;
        text-decoration: none;
        font-weight: bold;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 43%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.08);
    }
    .submit:hover
    {
        background-image: linear-gradient(60deg,rgb(187, 212, 71),rgb(80, 220, 155));
                color: white;
    }
            </style>

    <footer id="footer">
                        <center>
                            <br><br>
                                    <a href="https://www.facebook.com/shravanas.shravanas/"><img src="Images/036-facebook.svg" class="sociallink"></a>
                                    <a href="https://wa.me/+917624808021?text=Hi%20,%20I%20am%20Interested%20on%20Quick%20Bill!" target="_blank">
                                    <img src="Images/005-whatsapp.svg" class="sociallink"></a>
                                    <a href="https://twitter.com/shravanAS1154"><img src="Images/008-twitter.svg" class="sociallink"></a>
                                    <a href="https://www.linkedin.com/in/shravan-a-s-562115147/"><img src="Images/027-linkedin.svg" class="sociallink"></a>
                        </center>
    </footer>
    
</body>
</html>