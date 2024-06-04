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
<p class="bg-dark text-white p-2" style="font-size:20px">Customer Details</p>


<?php
$sql="select * from customer_tb";
$result = mysqli_query($db,$sql);
if($result->num_rows > 0)
{
    echo '<table class="table" >';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Customer ID</th>';
    echo '<th scope="col">Customer Name</th>';
    echo '<th scope="col">Bill Date</th>';
    echo '<th scope="col">Address</th>';
    echo '<th scope="col">Discount</th>';
    echo '<th scope="col">Total Bill</th>';
    echo '<th scope="col">Delete/Show</th>';
    echo '</tr>';
    echo '</thead>';
    echo '</tbody>';

    while($row=$result ->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row["coustomer_id"].'</td>';
        echo '<td>'.$row["customer_name"].'</td>';
        echo '<td>'.$row["Bill_date"].'</td>';
        echo '<td>'.$row["customer_address"].'</td>';
        echo '<td>'.$row["discount"].'</td>';
        echo '<td>'.$row["total"].'</td>';
    echo '<td>';
    echo '<form action="" method="POST" class="d-inline">';
    echo '<input type="hidden" name="id" value='.$row['coustomer_id'].'><button type="submit" style="width:50px" class="btn btn-secondary mr-3" name="delete" value="DELETE"><i class="fa fa-trash" style="font-size:20px"></i></button>';
    echo '</form>';
    echo '<form action="full_cust_detals.php" method="POST" class="d-inline">';
    echo '<input type="hidden" name="id" value='.$row['coustomer_id'].'><button type="submit" style="width:50px" class="btn btn-secondary mr-3" name="details" value=""><i class="fa fa-angle-double-right" style="font-size:20px"></i></button>';
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
    $sql="delete from customer_tb where coustomer_id={$_REQUEST['id']}";
    mysqli_query($db,$sql);
    $sql1="delete from bill_details where customer_id={$_REQUEST['id']}";
    mysqli_query($db,$sql1);
}
?>
</div>