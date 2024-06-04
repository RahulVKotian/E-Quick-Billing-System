<?php
error_reporting(E_ALL);
 $conn=new mysqli('localhost','root','',);
 if(!$conn)
 die('not connected'.mysql_error());

  $cun=mysqli_select_db($conn,'feesub1');

  $qry_rcv="select rcv_no from drt order by id DESC LIMIT 1";
  $get_last_rcv=mysqli_query($conn,$qry_rcv);
 

  $data=mysqli_fetch_assoc($get_last_rcv);
  $rcv_no=$data['rcv_no'];
  $rcv_no++;
  

  $name=$_POST['name'];
  $class=$_POST['class'];
  $reg_num=$_POST['reg_num'];

  if(isset($_POST['diary']))
  {
   $particulars =$_POST['diary'];
  }

  if(isset($_POST['tie']))
  {
   $particulars =$_POST['tie'];
  }

  if(isset($_POST['belt']))
  {
   $particulars =$_POST['belt'];
  }

  if(isset($_POST['adform']))
  {
   $particulars =$_POST['adform'];
  }

  if(isset($_POST['icard']))
  {
   $particulars =$_POST['icard'];
  }

  if(isset($_POST['yearly']))
  {
   $particulars =$_POST['yearly'];
  }

  if(isset($_POST['admission']))
  {
   $particulars =$_POST['admission'];
  }


 
 $depositer=$_POST['depositer'];

 $date=$_POST['date'];

 $fee1=0;
 $fee2=0;
 $fee3=0;
 $fee4=0;
 if(isset($_POST['option1']))
    {
      $fee1=$_POST['school_fee'];
    }

    if(isset($_POST['option2']))
    {
      $fee2=$_POST['tution_fee'];
    }

    if(isset($_POST['option3']))
    {
      $fee3=$_POST['lunch_fee'];
    }

    if(isset($_POST['option4']))
    {
      $fee4=$_POST['school_bus_fee'];
    }

     $qry="INSERT INTO `drt`( `name`, `reg_num`, `class`, `depositer`, `date`, `rcv_no`, `particulars`,school_fee,tution_fee,lunch_fee,school_bus_fee)
             VALUES('$name','$reg_num','$class','$depositer','$date','$rcv_no','$particulars','$fee1','$fee2','$fee3','$fee4')";

             $run=mysqli_query($conn,$qry);
   
            
              ?>
            <div align="center">
            <body>
             <table border="">
              <tr><td style="text-align:center; border-width:0px;" colspan:"4"><b style="font-size:20px;">My New School</b></td></tr>
              <tr> 
              <td colspan="2" style="border-width:px;" rowspan="2">Student Name:<b style="text-transform:uppercase; text-align:right;">
              <?php echo "".$_POST['name']." / ".$_POST['reg_num'];?>
              </b><br>
              Paid by:<?php echo $_POST['depositer'];?><br>
              Class:<?php echo $_POST['class'];?><br>
              </td>
              <td align="right" colspan="2">Date : <?php echo $_POST['date'];?> </td>
              </tr>
              <tr>
              <td colspan="3" align="right"> Rc.no <b><?php echo $rcv_no; ?> </td>
              </tr>

              <tr>
              <td style="padding-left:0px;"><b><particulars</b></td>
              <td><b> Fee</b></td>
              <td> <b>Total</b></td>
              <td><b>Balance</b></td>
              </tr>
              <tr>
              <td>
              <?php
              $amount=0;
               if (isset($_POST['diary']))
                 {
                    echo ""."Dairy"." =50/-<br>";
                    $amount=50;
                 }

                 if(isset($_POST['tie']))
                 {
                    echo ""."tie"."=55/-<br>";
                    $amount=$amount+55;
                 }
                 if(isset($_POST['belt']))
                 {
                    echo ""."belt"."=75/-<br>";
                    $amount=$amount+75;
                 }

                 if(isset($_POST['adform']))
                 {
                    echo ""."ad form"."=25/-<br>";
                    $amount=$amount+25;
                 }

                 if(isset($_POST['icard']))
                 {
                    echo ""."ID card"."=100/-<br>";
                    $amount=$amount+255;
                 }

                 if(isset($_POST['admission']))
                 {
                    echo ""."Admission"."=1155/-<br>";
                    $amount=$amount+1155;
                 }

                 
                  ?>
              </td>

              <td>
               <?php 
               $feetotal=0;
               if(isset($_POST['option1']))
               {
                
                 echo "school fee=$fee1<br>";
                 $feetotal=$fee1;
               }
                  if(isset($_POST['option2']))
                  {
               
                     echo "Tution_fee=$fee2<br>";
                     $feetotal=$feetotal+$fee2;
                  }

                     if(isset($_POST['option3']))
                        {
                        
                           echo "Lunch_fee=$fee3<br>";
                     $feetotal=$feetotal+$fee3;

                        }
                           
                           if(isset($_POST['option4']))
                           {
                           
                              echo "school_bus_fee=$fee4<br>";
                              $feetotal=$feetotal+$fee4;

                           }


                          
                 ?>
                 </td>

                 <td>
                 <?php echo $amount;?>+<?php echo $feetotal;?></td>
                 </td>
              </tr>

              <tr>
              <td colspan="2">Total :</td><td><?php 
              echo $total=$amount+$feetotal;?>/-</td><td align="right" >
              </td>
              </tr>
              <?php 
              $qurry="update `drt` set `total`='$total' where `rcv_no` ='$rcv_no'";
              $runn=mysqli_query($conn,$qurry);
              
              ?>
              </table>
              
              <br><br><input type="button" onclick="window.print()" value="print bill" /> 
             <a href='index.php' style="margin-left:50px;">GO BACK..'</a>
              </body>


























