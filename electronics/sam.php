<?php

include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-sm-9 col-md-12 mt-5 text-center">
<p class="bg-dark text-white p-2">products details</p>

<?php
$sql="select * from product";
$result = mysqli_query($db,$sql);
if($result->num_rows > 0)
{
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Product id</th>';
    echo '<th scope="col">Product code</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">DOP</th>';
    echo '<th scope="col">Available</th>';
    echo '<th scope="col">Total</th>';
    echo '<th scope="col">Original cost Each</th>';
    echo '<th scope="col">GST</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '</tbody>';

    while($row=$result ->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row["pid"].'</td>';
        echo '<td>'.$row["pcode"].'</td>';
        echo '<td>'.$row["pname"].'</td>';
        echo '<td>'.$row["pdop"].'</td>';
        echo '<td>'.$row["pava"].'</td>';
        echo '<td>'.$row["ptotal"].'</td>';
        echo '<td>'.$row["poriginalcost"].'</td>';
        echo '<td>'.$row["GST"].'</td>';
    echo '<td>';
echo '<form action="editproduct.php" class="d-inline" method="POST">';
echo '<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-info mr-3" style="width:70px" name="edit" value="EDIT"><i class="fa fa-pencil" style="font-size:30px"></i></button>';
echo '</form>';
echo '<form action="" method="POST" class="d-inline">';
echo '<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-secondary mr-3" style="width:70px" name="delete" value="DELETE"><i class="fa fa-trash" style="font-size:30px"></i></button>';
echo '</form>';
echo '<form action="phpdemo.php" class="d-inline" method="POST">';
echo '<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-warning mr-3"  style="width:70px" name="bill" value="BILL"><i class="fa fa-handshake-o" style="color:red;font-size:30px"></i></button>';
echo '</form>';
echo '</td>' ;
echo '</tr>';
}
echo '<tbody>';
echo '<table>';
}
else{
    echo '0 Result';
}
?>
</div>
<?php
if(isset($_REQUEST['delete'])){
    $sql="delete from product where pid={$_REQUEST['id']}";
    if(mysqli_query($db,$sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }
    else{
         echo 'unable to DELETE';
    }
}
?>
</div>
<div class="float-right"><a href="addproduct.php"
class="btn btn-danger" style="width:70px"><i class="fa fa-plus" style="font-size:36px"></i></a></div>
</div>
</body>
</html>