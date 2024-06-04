<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="contianer">
<h1 class="text-center text-success"> FORGET PASSWORD</h1>
  <div class="col-lg-8 m-auto d-block">
<form method="POST" action="http://localhost:8080/current project/sr/forgetpass.php">

   
    <br><br>
    <div class="form-group">
       <label>User name:</label>
       <input type="text" name="name" id="un" class="form-control" autocomplete="off">
      
    </div>
    <div class="form-group">
       <label>phone number:</label>
   <input type="text" class="form-control" name="phn" autocomplete="off"><br>
   </div>
   <input type="submit" class="btn btn-success">

  </form>
  </div>
</div>
   </body>
   </html>