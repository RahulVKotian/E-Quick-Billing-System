<?php

if(isset($_POST["psubmit"]))
{
    $u_n=$_POST["u_name"];

 
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
}
?>
<html>
    <head>
   </head>
            <body><form action="" >
            <input type="text" name="u_name" class="input" placeholder="Username" id="un" autocomplete="off">
            
            <input type="submit" value="Submit" name="psubmit" class="submit" >
</form>
</body>
</html>