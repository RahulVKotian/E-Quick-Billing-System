<?php
include("check.php");
include("yy.php");  

$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
   
?>

<?php
 if(isset($_POST['psubmit']))
 {
    $date=$_POST['selldate'];
    $totalgst=$_POST['tgst'];
   $cust_name=$_POST['cname'];
    $cust_add=$_POST['cadd'];
    $pcode=$_POST['pcode'];
    $pname=$_POST['pname1'];
   $pava=$_POST['pava1'];
    $pqty=$_POST['qty'];
    $pcost=$_POST['price'];
    $pgst=$_POST['pgst'];
    $gstrate=$_POST['pgstrate'];
    $item_total=$_POST['item_total'];
    $sub_total=$_POST['sub_total'];
    $discount=$_POST['tax_total'];
    $gd_total=$_POST['grand_total'];
    $count=1;
    
    $query="insert into `customer_tb`(`coustomer_id`, `Bill_date`, `customer_name`, `customer_address`, `discount`, `total`) 
    values('','$date','$cust_name','$cust_add','$discount','$gd_total')";
        mysqli_query($db,$query);

        $last_billing_id =  mysqli_insert_id($db);
        $billingid = $last_billing_id;

       

    foreach($pcode as $index => $kk)
    {
       
        $code=$kk;
        $name=$pname[$index];
        $ava=$pava[$index];
        $qty=$pqty[$index];
        $cost=$pcost[$index];
        $gst=$pgst[$index];
        $rtgst=$gstrate[$index];
        $itotal=$item_total[$index];
       
        
        $sgst=$rtgst/2;
        $cgst=$rtgst/2;
       


      if($qty<$ava){
        
       
        

        $query1="insert into `bill_details`(`id`, `customer_id`, `product_id`, `product_name`, `product_qty`, `price`, `cgst`, `sgst`, `total`) 
                  values ('','$billingid','$code','$name','$qty','$cost','$cgst','$sgst','$itotal')";
        mysqli_query($db,$query1);

        $update="update product set pava=pava-$qty where pcode='$code'";
         mysqli_query($db,$update);
      }
      else{
          echo '<script>alert ("stock is less");</script>';
          
      }
    }

 }
?>

<?php 
$sel="select * from customer_tb";
$selr=mysqli_query($db,$sel);
$selrow=mysqli_fetch_array($selr);
?>
<?php
$selb="select * from bill_details";
$selbr=mysqli_query($db,$selb);
$selbrow=mysqli_fetch_array($selbr)
?>
<?php
 $cl="select * from singup";
 $cl1=mysqli_query($db,$cl);
 $cl2=mysqli_fetch_array($cl1);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" >
    <tr>
     <td colspan="2" align="center" style="font-size:25px"><b>Invoice</b></td>
    </tr>
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%" style="font-size:18px">
      
         To, <?php echo $_POST['cname'];?><br />
         <b></b><br /><br><br>
         Customer_Name : <?php echo $_POST['cname'];?><br /> 
         Customer Address : <?php echo $_POST['cadd'];?><br />
        </td>
        <td width="35%" style="font-size:18px">
       
         Customer ID       : <b><?php echo $selrow['coustomer_id'];?><br/></b>
         Invoice No.       : <b><?php echo $selbrow['id'];?><br /></b>
         Invoice Date      :   <b><?php echo $selrow['Bill_date'];?><br /></b>
         Company/Shop Name : <b><?php echo $cl2['company_name'];?><br></b>
         Executive Name    : <b><?php echo $u_n;?></b><br>
        </td>
       </tr>
      </table>
      
      
      <br />
      
      <table width="100%" border="3" cellpadding="5" cellspacing="0" style="border-style:dashed">
       <tr style="border-style:dashed">
        <th width="3%" style="text-align:center">SL. No.</th>
        <th width="15%" style="text-align:center">Item Name</th>
      
        <th style="text-align:center">Quantity</th>
        <th style="text-align:center">Rate</th>
        <th style="text-align:center">Total</th>
        <th style="text-align:center">CGST</th>
        <th style="text-align:center">SGST</th>
        <th style="text-align:center" rowspan="">Gross AMT</th>
       </tr>
     
       
   
    <?php
    $count=0;
    
    foreach($pname as $index => $kk)
   {  
      $count += 1;
      $name=$kk;
      $qty=$pqty[$index];
      $cost=$pcost[$index];
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
     echo $qty;
     echo "</td>";

     echo "<td>";
     echo $cost;
     echo "</td>";

     echo "<td>";
     echo $qty*$cost;
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
   <td  align="right" colspan="7"><b>Total Amt. Before Tax :</b></td>
   <td align="right"><b><?php echo  $sub_total-$totalgst; ?></b></td>
  </tr>
  <tr>
   <td  align="right" colspan="7"><b>Total GST Amt.  :</b></td>
   <td align="right"><?php echo $totalgst; ?> </td>
  </tr>

  <tr>
   <td  align="right" colspan="7"><b>Discount Amt.  :</b></td>
   <td align="right"><?php echo $discount; ?> </td>
  </tr> 

  <tr>
   <td  align="right" colspan="7"><b>Total Amt. After Tax :</b></td>
   <td align="right"><?php echo $gd_total;?></td>
  </tr>
  </table>
   <br>
  
   <table width="100%" cellpadding="5">
   <tr>
   <td>
   <b style="font-size:25px">Customer Signature</b><br>
   <TextArea rows="2" cols="25" name="add"  >
 </textarea></td>
 <td align="right" >
   <b style="font-size:25px">Authorized Signature</b><br>
   <TextArea rows="2" cols="25" name="add"  >
 </textarea></td>
 </tr>
 <tr>
 <td align="right">
 <center><input style="font-size:20px;width:100px;height:40px" type="button" class='btn btn-danger' type="submit" value="Print_Bill" onClick='window.print();'></td>
 <td> <a href="sam.php" style="font-size:20px;width:100px;height:40px" class='btn btn-secondary d-print-none'>close</a> </td>
 </tr>
 </table>
 </td>
    </tr>
   </table>