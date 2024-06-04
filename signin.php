<?php
session_start();

   
$db=mysqli_connect("localhost","root","");
if(isset($_POST['login'])){
   
$admine_name=$_POST["adminename"];
$uname=$_POST["name"];
$password=$_POST["pwd"];

$qdb=mysqli_select_db($db,$admine_name);

$qry = "select * from login where  user_name='".$uname."' AND password='".$password."'"; 
$sql = mysqli_query($db,$qry); 

    $row=mysqli_fetch_assoc($sql);

    if($row['bill_type']=="Electronics")
    {
         $_SESSION['username']=$admine_name;
         header('location:electronics/Home.php');
}
elseif($row['bill_type']=="Hotel"){
$_SESSION['username']=$admine_name;
header('location:hotel/Home.php');

}



else
{
    header('location:error.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <title>
                SignIn|Quick Billing
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

            <script src="../javascript.js"></script>
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
            <style>

.main 
    {
        background-color: #FFFFFF;
        width: 400px;
        height: 550px;
        margin: 7em auto;
        margin-top: 160px;
        margin-bottom: 161px;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign 
    {
            color: white;
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
        font-size: 23px;
    }
    

    .un 
    {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 
    {
    padding-top: 40px;
    }
    
    .pass 
    {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus 
    {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit 
    {
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
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.08);
    }
    .submit:hover
    {
        background-image: linear-gradient(60deg,rgb(187, 212, 71),rgb(80, 220, 155));
                color: white;
    }
    
    .signup
    {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: rgb(80, 220, 155);
        padding-top: 13px;
    }

    .forgot 
    {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: rgb(80, 220, 155);
        padding-top: 5px;
    }
    
    a 
    {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: rgb(80, 220, 155);
        text-decoration: none;
    }
    
    @media (max-width: 600px) 
    {
        .main 
        {
            border-radius: 0px;
        }
    }
            </style>


        </head>
            <body onload="myfun()">
                <header>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand"><img src="Images/Logo-2.svg" alt="Logo" href="http://localhost:8080/QuickBill1/index.html" height="30px" width="150px" id="logo"></a>
                    </nav>
                </header>  <br>
                <div class="loading"></div>
    <div class="content">

                <div class="main">
                    <p class="sign" align="center">Sign In</p>
                    <form action=""  method="POST"  class="form1">
                     
                        
       
       <span id="Select Billing Type"></span>
                            
                     <input class="un" type="text" align="center" name="adminename" id="un" placeholder="Admine Username" autocomplete="off">
                      <span id="username"></span>
                      <input class="un " type="text" align="center" name="name" id="un" placeholder="Username" autocomplete="off">
                      <span id="username"></span>
                      <input class="pass" type="password" align="center" name="pwd" id="pass" placeholder="Password" autocomplete="off">
                      <span id="pword"></span>
                      <input type="Submit" value="Log In" name="login" class="submit" align="center">
                      <p class="signup" align="center"><a href="http://localhost:8080/QuickBill1/Signup.php">Sign Up</p>
                      <p class="forgot" align="center"><a href="forget.php">Forgot Password?</p>
                    </form>
                </div>
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





    <script>
            $(window).on('load',function(){
                $(".loading").fadeOut(2000);
              $(".content").fadeIn(1000);

            });
        </script>