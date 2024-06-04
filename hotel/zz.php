
<html>
<head>
    <title>
        Quick bill
</title>
<link rel="stylesheet" type="text/css" href="Styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>
<body onload="myfun()">
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand"><img src="Images/Logo-2.svg" alt="Logo" href="http://localhost:8080/QuickBill/index.html" height="40px" width="150px" id="logo"></a>
</nav>
</header> 
<div class="loading"></div>
    <div class="content">
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="zz.php">Home</a>
    <a href="adminelog.php">Create Incharge Account</a>
    <a href="add_servent_details.php">Add Servant</a>

    <a href="admine_change_password.php">Change password</a>
    <a href="servent_details.php">Servant Details</a>

    <a href="home.php">Logout</a>
  </div>
  
  <div id="main">
    <button class="openbtn" onclick="openNav()">☰</button>

    <div>
</div>
</div>
</div>
</body>
</html>


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
