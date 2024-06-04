<?php
include("check.php");
include("zz.php");
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
<dic class="col-sm-9 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2" style="font-size:30px">Executive Details</p>

<?php
$sql="select * from login";
$result = mysqli_query($db,$sql);
if($result->num_rows > 0)
{
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Id</th>';
    echo '<th scope="col">Executive Name</th>';
    echo '<th scope="col">Phone No.</th>';
    echo '<th scope="col">Password</th>';
    echo '</tr>';
    echo '</thead>';
    echo '</tbody>';
 $count=0;
    while($row=$result ->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$count++.'</td>';
        echo '<td>'.$row["user_name"].'</td>';
        echo '<td>'.$row["phone_no"].'</td>';
        echo '<td>'.$row["password"].'</td>';
    echo '<td>';
echo '<form action="editexecutive.php" class="d-inline" method="POST">';
echo '<input type="hidden" name="id" value='.$row['id'].'><button type="submit" style="width:40px" class="btn btn-info mr-3" name="edit" value="EDIT"><i class="fa fa-pencil"></i></button>';
echo '</form>';
echo '<form action="" method="POST" class="d-inline">';
echo '<input type="hidden" name="id" value='.$row['id'].'><button type="submit" style="width:50px" class="btn btn-secondary mr-3" name="delete" value="DELETE"><i class="fa fa-trash"></i></button>';
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
    $sql="delete from login where id={$_REQUEST['id']}";
    if(mysqli_query($db,$sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }
    else{
         echo 'unable to DELETE';
    }
}
?>

</body>
</html>