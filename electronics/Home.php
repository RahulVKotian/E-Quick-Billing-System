<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:/QuickBill1/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <title>Home|Qick BIlling</title>
        
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
            <script type="text/javascript" src="Javascript.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
        <?php 
         $db=mysqli_connect("localhost","root","");
         $u_n=$_SESSION['username'];
         $qd=mysqli_select_db($db,$u_n);

         $sql="select company_name from singup";
         $result=mysqli_query($db,$sql);
         $row = $result-> fetch_assoc();
        ?>

        </head>

            <body onload="myfun()">

                <header>

                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand"><img src="Images/Logo-2.svg" alt="Logo" href="http://localhost:8080/QuickBill/index.html" height="30px" width="150px" id="logo"></a>
                    </nav>
                </header> 
                <div class="loading"></div>
    <div class="content">

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="home.php">Home</a>
    <a href="admine.php">Admin</a>

    <a href="sam.php">Product Details</a>
    <a href="addproduct.php">Add products</a>
    <a href="stock.php">Stocks</a>
    <a href="phpdemo.php">Bill</a>
    <a href="logout.php">Logout</a>
  </div>
  
  <div id="main">
    <button class="openbtn" onclick="openNav()">☰</button>
    <div id="hometext">Welcome to <?php echo $row['company_name'];?></h2>
</div>
  </div>  
  
  </div>

<script>
      function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
</script>
<script>
            $(window).on('load',function(){
                $(".loading").fadeOut(2000);
              $(".content").fadeIn(1000);

            });
        </script>
            </body>
    </html>