<?php
include("check.php");
include("yy.php");
$db=mysqli_connect("localhost","root","",$_SESSION['username']);


?>


<?php

if(isset($_POST['psubmit']))
{
    $itemno=$_POST['itemno'];
    $tableno=$_POST['tableno'];
    $name=$_POST['name'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $gst=$_POST['gst'];
    $date=$_POST['date'];
    $gstrate=$_POST['pgstrate'];
    $item_total=$_POST['item_total'];
    $sub_total=$_POST['sub_total'];
    $discount=$_POST['tax_total'];
    $gd_total=$_POST['grand_total'];
    $count=1;
   
    $qry="insert into `table_profit`(`id`,`table_no`, `discount`, `total`,`bdate`) values('','$tableno','$discount',' $gd_total','$date') "; 
   mysqli_query($db,$qry);


   

    foreach($itemno as $index => $kk)
    {
       
        $itemno=$kk;
       
        $name1=$name[$index];
        $qty1=$qty[$index];
        $price1=$price[$index];
        $pgst=$gst[$index];
        $gstrate1=$gstrate[$index];
        $item_total1=$item_total[$index];
      
        

   //  echo "table no:$tableno<br>item_no:$itemno<br>item_no:$name1<br>qty:$qty1<br>price:$price1<br>gst:$pgst<br>gstrate:$gstrate1<br>total:$item_total1";
//echo"<br><br>";
     
               $query1="insert into `customer_tbl`(`id`,`item_code`, `table_no`, `price`, `qty`, `total`) 
                       values('','$itemno','$tableno','$price1','$qty1','$item_total1')";
       mysqli_query($db,$query1);

    }
    
  }
 
?>

<?php 
$cel="select * from singup";
$celr=mysqli_query($db,$cel);
$celrow=mysqli_fetch_array($celr);
?>

<?php 
$sel="select * from customer_tbl";
$selr=mysqli_query($db,$sel);
$selrow=mysqli_fetch_array($selr);
?>

<?php 
$selb="select * from suppliers where Table_no='$tableno'";
$selbr=mysqli_query($db,$selb);
$selbrow=mysqli_fetch_array($selbr);
?>

<?php 
$selb1="select * from table_profit";
$selbr1=mysqli_query($db,$selb1);
$selbrow1=mysqli_fetch_array($selbr1);
?>

<?php
 $cl="select * from item_details";
 $cl1=mysqli_query($db,$cl);
 $cl2=mysqli_fetch_array($cl1);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
<table width="30%"  border="1" cellpadding="5" cellspacing="0" >
    <tr>
     <td colspan="2" align="center" style="font-size:25px"><b>Bill</b></td>
    </tr>
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
       
        <td width="35%" style="font-size:18px">
       
        
         Invoice No.       : <b><?php echo $selbrow1['id'];?><br /></b>
         Invoice Date      :   <b><?php echo $selbrow1['bdate'];?><br /></b>
         Hotel Name : <b><?php echo $celrow['company_name'];?><br></b>
         Executive Name    : <b><?php echo $selbrow['name'];?></b><br>
        </td>
       </tr>
      </table>


       <br />
      
      
      <table width="100%" border="3" cellpadding="5" cellspacing="0" style="border-style:dashed">
 
       <tr style="border-style:dashed">
       <th width="3%" style="text-align:center">SL. No.</th>
        <th width="40%" style="text-align:center">Item Name</th>
        <th width="15%" style="text-align:center">QTY</th>
        <th width="15%" style="text-align:center">Rate</th>
        <th width="70%" style="text-align:center" rowspan="">AMT</th>
        <th width="70%" style="text-align:center" rowspan="">CGST</th>
        <th width="70%" style="text-align:center" rowspan="">SGST</th>
        <th width="70%" style="text-align:center" rowspan="">Gross AMT</th>
       </tr>
       <tr><td></td></tr>
       <tr>

       <?php
    $count=0;
    
    foreach($name as $index => $kk)
   {  
      $count += 1;
      $name=$kk;
      $qty1=$qty[$index];
      $cost=$price[$index];
      $itotal=$item_total[$index];

      $rtgst=$gstrate[$index];
      $sgst=$rtgst/2;
      $cgst=$rtgst/2;
  
  echo "<tr style='text-align:center'>";

  echo "<td>";
    echo $count;
    echo "</td>";

    echo "<td>";
     echo $name;
     echo "</td>";


    

     echo "<td>";
     echo $qty1 ;
     echo "</td>";

     echo "<td>";
     echo $cost;
     echo "</td>";

     echo "<td>";
     echo $qty1*$cost;
     echo "</td>";

     echo "<td>";
     echo $cgst;
     echo "</td>";

     echo "<td>";
     echo $sgst;
     echo "</td>";

     echo "<td>";
     echo $itotal;
     echo "</td>";

    
     echo "</tr>";
   }
   ?>
  </tr >

<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
<td bgcolor="gray"></td>
</tr>



  <tr>
  <td align="right" colspan="7"></td>
<td align="right"><b><?php  echo ($sub_total-$rtgst)+($cgst+$sgst) ?></b></td>
</tr>


  <tr>
   <td  align="right" colspan="7"><b>Discount Amt.  :</b></td>
   <td align="right"><?php echo "$discount";?></td>
  </tr> 

  <tr>
   <td  align="right" colspan="7"><b>Total Amt :</b></td>
   <td align="right"><b><?php echo $gd_total;?></b></td>
  </tr>
  </table>
</table>
 <center><input size="50px" type="button" class='btn btn-danger' type="submit" style="font-size:20px;width:100px" value="Print_Bill" onClick='window.print();'>
  <a href="hotel1.php" class='btn btn-secondary d-print-none' style="font-size:20px;width:100px">close</a> 
</body>
</html>