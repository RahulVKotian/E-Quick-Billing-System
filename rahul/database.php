
  <html>
      <head>
</head>
<title>
</title>
<style>
    body{
        background-color:skyblue;
    }
    table,th,td{
        border: 2px solid black;
        width:1100px;
        background-color:lightgreen;
    }
    .btn{
        width:10%;
        height:5%;
        font-size:18px;
        padding:0px;
    }
    </style>

  <body>
      <center>
      <div class="container">
          <form action="" method="POST">
              <lable><h2><b>Enetr the student REG_NUM</b></h2></lable>:<input type="textarea" name="reg_num" class="btn" placeholder="Reg_no"><br><br>
              
</from>
      <table border="3">
          <tr>
              <th>id</th>
              <th> name</th>     
              <th>reg_num</th>
              <th>class</th>
              <th>depositer</th>
              <th>date<th>
              <th>rcv_no</th>
              <th>particulars</th>
              <th>school_fee</th>
              <th>tution_fee</th>
              <th>lunch_fee</th>
              <th>school_bus_fee</th>
              <th>total</th>
</tr>
<?php
 $conn=new mysqli('localhost','root','',);
 if(!$conn)
 die('not connected'.mysql_error());

  $cun=mysqli_select_db($conn,'feesub1');
  
  if(isset($_POST['search']))
  {
      $reg_num=$_POST['reg_num'];

      $query="SELECT * from `drt` where reg_num='$reg_num'";
      $run=mysqli_query($conn,$query);

      while($row=mysqli_fetch_assoc($run))
      {
        ?>
        <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['reg_num'];?></td>
        <td><?php echo $row['class'];?></td>
        <td><?php echo $row['depositer'];?></td>
        <td><?php echo $row['date'];?></td>
        <td></td>
        
        <td><?php echo $row['rcv_no'];?></td>
        <td><?php echo $row['particulars'];?></td>
        <td><?php echo $row['school_fee'];?></td>
        <td><?php echo $row['tution_fee'];?></td>
        <td><?php echo $row['lunch_fee'];?></td>
        <td><?php echo $row['school_bus_fee'];?></td>
        <td><?php echo $row['total'];?></td>
        </tr>
        <?php 
       }
     } 
  ?>

</table>
<input type="submit" name="search" class="btn" value="GO">
    <a href="index.php"><b><u>BACK</u></b></a>
   </form>
    </center>
    </body>
    </html>