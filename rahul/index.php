<html>
<head>
<title>
school fee billing
</title>
</head>
<body>

<center>
  <h1><b><u>School Fees billing System</h1></b></u>
<div>
 <form method="POST" action="print_bill.php">
 <table>
  <tr>
    <td style="padding:10px"> <lable>Name<lable><br><input type ="text" name="name" placeholder="Name"></td>
    <td> <lable>Regiter no</lable><br><input type ="number" name="reg_num" placeholder="reg no" ></td>
    <td> <lable>Class</lable><br><select name="class" > <option selected>--class--</option>
                <option value="nursery">Nursery</option>
                <option value="LKG">lkg</option>
                <option value="ukg">ukg</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
         <td><lable>Date</lable><br><input type="text" name="date" value="<?php echo date ("d-m-Y"); ?>"></td>
         <td><lable>Depositer</lable><br><input type="text" name="depositer" placeholder="Deposister"></td>
         </tr>
         <tr bgcolor="skyblue" ><td colspan="5">
           <fieldset>
              <legend>particular</legend>
              <input type="checkbox" name="admission" value="Admission"> <lable>New Admission</lable>
              <input type="checkbox" name="yearly" value="Yearly"><lable>Yearly</lable>
              <input type="checkbox" name="diary" value="Diary"><lable>Diary</lable>
              <input type="checkbox" name="tie" value="Tie"><lable>Tie</lable>
              <input type="checkbox" name="adform" value="Adform"><lable>adform</lable>
              <input type="checkbox" name="belt" value="Belt"> <lable>Belt</lable>
              <input type="checkbox" name="icard" value="ID CARD"><lable>ID CARD</lable>
              </fieldset>

              </td>
              </tr>
              <tr bgcolor="pink" ><td colspan="5">
               <fieldset>
               <legend>Enetr Fees Details</legend>
               <input type="checkbox" name="option1"><lable> School fees:</lable><input type="text" name="school_fee" placeholder="school fee"><br><br>
               <input type="checkbox" name="option2"><lable> Tution fees:</lable><input type="text" name="tution_fee" placeholder="Tution fee"><br><br>
               <input type="checkbox" name="option3"><lable> Lunch fees:</lable><input type="text" name="lunch_fee" placeholder="Lunch fee"><br><br>
               <input type="checkbox" name="option4"><lable> School Bus fees:</lable><input type="text" name="school_bus_fee" placeholder="school bus fee">
               </fieldset>
             </td>
             </tr>
                  </table>
                  <input type="submit" name="print" value="print_bill">
                  
                  
                  </form>
                  <form method="POST" action="database.php">
                    <input type="submit" name="data" value="Show FEES Details">
</form>
                  </center>
                  </body>
                  </html> 


