<?php
session_start();
$db=mysqli_connect("localhost","root","");
if(isset($_POST['login'])){
    $bill_type=$_POST["bill"];
$uname=$_POST["name"];
$password=$_POST["pwd"];
$qdb=mysqli_select_db($db,$uname);


$query = "select * from login,authorities where  login.user_name='$uname'  && login.password='$password' || authorities.user_name='$uname'  && authorities.password='$password'"; 
$sql=mysqli_query($db,$query); 
$num=mysqli_num_rows($sql);
if($num == TRUE){
  
if($bill_type=="Electronics")
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
                              


                              $_SESSION['username']=$uname;
header('location:electronics/Home.php');
}
if($bill_type=="Hotel"){



                              
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

$_SESSION['username']=$uname;
header('location:hotel/Home.php');

}
}
else
{
    header('location:error.php');
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

<style>
            .loading{
                display:flex;
                justify-content:center;
              }

              .loading::after{
                  content:"";
                  position:absolute;
                  top:30%;
                left:50%;
                  width:100px;
                  height:100px;     
                  border: 20px solid #dddddd;
                  border-top-color: #cf0000;
                  border-bottom-color: #1b03f0;
                  border-radius: 50%;
                  animation: loading 1.5s linear infinite;
                  
              }
              .content{
                display:none;
              }

             
              @keyframes loading{
                  to{
                      transform:rotate(360deg);
                  }
              }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" src="style.css">
</head>
<body onload="myfun()">
<div class="loading"></div>
    <div class="content">
<div class="contianer">
 <h1 class="text-success text-center">Login form</h1>
  <div class="col-lg-8 m-auto d-block">
<form action=""  method="POST" onsubmit="return myfun()" class="bg-light">
<div class="form-group">
       <label>Select Billing Software:</label>
       <select name="bill" class="form-control"><option>--select---</option>
       <option name="electro">Electronics</option>
       <option  name="hotel">Hotel</option>
       </select>
    </div>
<div class="form-group">
       <label>User name:</label>
       <input type="text" name="name" id="un" class="form-control" autocomplete="off">
       <span id="username" class="text-danger font-weight-bold"></span>
    </div>
    <div class="form-group">
       <label>Password:</label>
       <input type="text" name="pwd" id="pass" class="form-control" autocomplete="off">
       <span id="pword" class="text-danger font-weight-bold"></span>
    </div>
    
 <a href="forget.php" class="btn btn-success" > Forgot Password?</a>

<input type="submit"  class="btn btn-success" name="login" value="LOGIN"><br><br>
<a href="index.php" class="btn btn-danger" > <-Back</a>
</form>
</div>
</div>
</div>
</body>
</html>
<script>
            $(window).on('load',function(){
                $(".loading").fadeOut(2000);
              $(".content").fadeIn(1000);

            });
        </script>