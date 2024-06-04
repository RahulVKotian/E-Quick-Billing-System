<?php
include("check.php");
include("zz.php");  

$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
   

if(isset($_REQUEST['details'])){
  $id=$_POST['id'];
$sel="select * from customer_tb where coustomer_id=$id";
$selr=mysqli_query($db,$sel);
$selrow=mysqli_fetch_array($selr);

$selb="select * from bill_details where customer_id=$id";
$selbr=mysqli_query($db,$selb);
$selbrow1=mysqli_fetch_array($selbr);

}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" >
    <tr>
     <td colspan="2" align="center" style="font-size:30px"><b>Customer Details</b></td>
    </tr>
    <tr>
    <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%" style="font-size:18px">

        Customer_ID : <?php echo $selrow['coustomer_id'];?><br /> 
        Customer_Name : <?php echo $selrow['customer_name'];?><br /> 
         Customer Address : <?php echo $selrow['customer_address'];?><br />
        </td>
        </tr>
        </table>
        <br />
      
      <table width="100%" border="3" cellpadding="5" cellspacing="0" style="border-style:dashed">
       <tr style="border-style:dashed">
        <th width="3%" style="text-align:center">SL. No.</th>
        <th width="15%" style="text-align:center">Item Name</th>
        <th style="text-align:center">Product ID</th>
        <th style="text-align:center">Quantity</th>
        <th style="text-align:center">Rate</th>
        <th style="text-align:center">Total</th>
        <th style="text-align:center">CGST</th>
        <th style="text-align:center">SGST</th>
        <th style="text-align:center" rowspan="">Gross AMT</th>
       </tr>
      
       <?php
       $count=1;
       $selb1="select * from bill_details where customer_id=$id";
       $selbr1=mysqli_query($db,$selb1);
      while($selbrow=mysqli_fetch_array($selbr1)){
       echo "<tr align='center'>";

      echo "<td>";
      echo $count++;
      echo "</td>";


       echo "<td>";
       echo  $selbrow['product_name'];
       echo "</td>";

       echo "<td>";
       echo  $selbrow['product_id'];
       echo "</td>";

       echo "<td>";
       echo  $selbrow['product_qty'];
       echo "</td>";

       echo "<td>";
       echo  $selbrow['price'];
       echo "</td>";

       echo "<td>";
       echo  $selbrow['price']*$selbrow['product_qty'];
       echo "</td>";

       echo "<td>";
       echo  $selbrow['cgst'];
       echo "</td>";


       echo "<td>";
       echo  $selbrow['sgst'];
       echo "</td>";


       echo "<td>";
       echo  $selbrow['total'];
       echo "</td>";



    echo "</tr>";
      }
       ?>
       <tr>
<td bgcolor="gray"></td>
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
   <td  align="right" colspan="8"><b>Total Amt. Before Tax :</b></td>
   <td align="right"><b> <?php
       echo  $selbrow1['price']*$selbrow1['product_qty'];
      ?></b></td>
  </tr>
  <tr>
   <td  align="right" colspan="8"><b>Total GST Amt.  :</b></td>
   <td align="right"><?php echo $selbrow1['sgst']+$selbrow1['cgst'];?></td>
  </tr>

  <tr>
   <td  align="right" colspan="8"><b>Discount Amt.  :</b></td>
   <td align="right"><?php echo $selrow['discount'];?></td>
  </tr> 

  <tr>
   <td  align="right" colspan="8"><b>Total Amt. After Tax :</b></td>
   <td align="right"><?php echo $selrow['total'];?></td>
  </tr>
              </table>