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
<dic class="col-sm-9 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2" style="font-size:20px">Item Details</p>


<?php
$sql="select * from item_details";
$result = mysqli_query($db,$sql);
if($result->num_rows > 0)
{
    echo '<table class="table" >';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Item Code</th>';
    echo '<th scope="col">Item Name</th>';
    echo '<th scope="col">Price</th>';
    echo '<th scope="col">GST</th>';
    echo '<th scope="col">Edit / Delete </th>';

 
    echo '</tr>';
    echo '</thead>';
    echo '</tbody>';
    $count=1;
    while($row=$result ->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$count++.'</td>';
        echo '<td>'.$row["itemcode"].'</td>';
        echo '<td>'.$row["itemname"].'</td>';
        echo '<td>'.$row["price"].'</td>';
        echo '<td>'.$row["gst"].'</td>';
       
    echo '<td>';
    echo '<form action="edit_item.php" class="d-inline" method="POST">';
echo '<input type="hidden" name="id" value='.$row['id'].'><button type="submit" class="btn btn-info mr-3" style="width:50px;height:50px" name="edit" value="EDIT"><i class="fa fa-pencil" style="font-size:30px"></i></button>';
echo '</form>';
    echo '<form action="" method="POST" class="d-inline">';
    echo '<input type="hidden" name="id" value='.$row['id'].'><button type="submit" style="width:50px" class="btn btn-secondary mr-3" name="delete" value="DELETE"><i class="fa fa-trash" style="font-size:30px"></i></button>';
    echo '</form>';

echo '</td>' ;
echo '</tr>';
}
echo '<tbody>';
echo '<table>';
}
else{
    echo '<center>0 Result</center>';
}
?>
</div>
<?php
if(isset($_REQUEST['delete'])){
   
    $sql1="delete from item_details where id={$_REQUEST['id']}";
    mysqli_query($db,$sql1);
}
?>
</div>