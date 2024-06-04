<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);

?>
<html>
<head>
<title>
Quick||Billing
</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</body>
<div class="col-sm-12 col-md-12 mt-5 text-center">
<p class="bg-dark text-white p-2" style="font-size:15px">Stock Details</p>
<div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" style="font-size:15px" placeholder="Search By Starting Letter">
                                        <button type="submit" class="btn btn-primary" style="font-size:15px;width:100px;height:35px">Search</button>
                                       
                                    </div>
                                </form>
                                <form action="" method="POST">
                                <button type="submit" name="all" class="btn btn-danger" style="font-size:15px;width:100px" >SEE ALL</button>
                                </form>

                            </div>
                        </div>
                    </div>

                <?php
                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM product WHERE CONCAT(pcode,pname) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($db, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            echo '<table class="table">';
                                            echo '<thead>';
                                            echo '<tr>';
                                           
                                            echo '<th scope="col">Product code</th>';
                                            echo '<th scope="col">Name</th>';
                                            echo '<th scope="col">Total</th>';
                                            echo '<th scope="col">Available</th>';
                                            echo '<th scope="col">Original cost Each</th>';
                                           
                                            echo '</tr>';
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['pcode']; ?></td>
                                                    <td><?= $items['pname']; ?></td>
                                                    <td><?= $items['ptotal']; ?></td>
                                                    <td><b><?= $items['pava']; ?></b></td>
                                                    <td><?= $items['poriginalcost']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }

else
{
$sql="select * from product";
$result = mysqli_query($db,$sql);
if($result->num_rows > 0)
{
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
   
    echo '<th scope="col">Product code</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Total</th>';
    echo '<th scope="col">Available</th>';
    echo '<th scope="col">Original cost Each</th>';
   
    echo '</tr>';
    while($row=$result ->fetch_assoc()){
        echo '<tr>';
     
        echo '<td>'.$row["pcode"].'</td>';
        echo '<td>'.$row["pname"].'</td>';
       
      
        echo '<td>'.$row["ptotal"].'</td>';
        echo '<td><b>'.$row["pava"].'</b></td>';
        echo '<td>'.$row["poriginalcost"].'</td>';
      
        echo '</tr>';
    }
    echo '</thead>';
    echo '</tbody>';
}
}
?>

<?php
if(isset($_POST['all'])){
    $sql="select * from product";
$result = mysqli_query($db,$sql);
if($result->num_rows > 0)
{
    echo '<table class="table">';
    echo '<thead>';
    echo "<tr bgcolor='red'>";
    echo "<td></td>";
    echo "<td></td>";
    ?>
    <td style='color:white'>ALL STOCKS</td>
    <?php
   
    echo "<td></td>";
    echo "<td></td>";
    echo "</tr>";
    echo '<tr>';
   
    echo '<th scope="col">Product code</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Total</th>';
    echo '<th scope="col">Available</th>';
    echo '<th scope="col">Original cost Each</th>';
   
    echo '</tr>';
    while($row=$result ->fetch_assoc()){
        echo '<tr>';
     
        echo '<td>'.$row["pcode"].'</td>';
        echo '<td>'.$row["pname"].'</td>';
       
      
        echo '<td>'.$row["ptotal"].'</td>';
        echo '<td><b>'.$row["pava"].'</b></td>';
        echo '<td>'.$row["poriginalcost"].'</td>';
      
        echo '</tr>';
    }
    echo '</thead>';
    echo '</tbody>';
}
}
?>