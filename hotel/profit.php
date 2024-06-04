<?php
include("check.php");
?>
<?php
include("yy.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);
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
<p class="bg-dark text-white p-2" style="font-size:20px">Sales</p>

<?php
$sql="select * from table_profit";
$result = mysqli_query($db,$sql);
$count=1;


if($result->num_rows > 0)
{
    echo '<table class="table" >';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">SI:NO</th>';
    echo '<th scope="col">Date</th>';
    echo '<th scope="col">Table no</th>';
    echo '<th scope="col">Total Amt</th>';
    echo '<th scope="col">Discount</th>';
    echo '<th scope="col">Gross Amt</th>';
   
    
    echo '</tr>';
    echo '</thead>';
    echo '</tbody>';

 while($row=$result ->fetch_assoc()){
    $total=$row['total'];
    $dis=$row['discount'];
    $total_amt=$total-$dis;

    $select=" select sum(total) from table_profit";
    $qry=mysqli_query($db,$select);
    $rw=$qry ->fetch_assoc();
        echo '<tr>';
        echo '<td>'.$count++.'</td>';
        echo '<td>'.$row["bdate"].'</td>';
        echo '<td>'.$row["table_no"].'</td>';
        echo '<td>'.$total_amt.'</td>';
        echo '<td>'.$row["discount"].'</td>';
        echo '<td>'.$row["total"].'</td>';
     
       
    echo '<td>';
   
echo '</td>' ;
echo '</tr>';
echo '<tr>';
}
echo '<td></td><td></td><td></td><td></td><td></td>';
echo '<td align="right"><h2>Total Sales=</h2><h1>'.$rw["sum(total)"].'</h1></td>';
echo '<tbody>';
echo '<table>';
}
else{
    echo '<center>0 Result</center>';
}
?>
</div>

</div>