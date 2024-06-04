<?php
include("check.php");
include("yy.php");
$con=mysqli_connect("localhost","root","",$_SESSION['username']);


$qry="select * from suppliers";
$res=mysqli_query($con,$qry);
$row = $res-> fetch_assoc();

?>


<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width-device-width, initial-scale-1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="files/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h2>HOTEL Bill</h2>


</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="page-body">
<div class="card">
<div class="card-block">


<form id="cart" method="POST" action="hotelbill.php">


<div class="row">
<div class="form-group row col-md-6">

<label style="font-size:20px">Table No  :</label>

<div class="col-sm-3">

                <td>
                    <select name="tableno" class="form-control select_services" style="font-size:15px" required>
                                     <option value="">--SelectProduct--</option>
                                    <?php
                                    $sql= "select * from suppliers";
                                      $result=$con->query($sql);
                                   foreach ($result as $r_service) { ?>  
                                        <option><?php echo $r_service['Table_no'];?></option>
                                   <?php } ?>
                                   </select> </td>
            </div>
            </div>
            <div class="form-group row col-md-6">
                                                 
                                                    <label style="font-size:20px">Date:</label>
                                                 
                                                <div class="col-sm-9">
                                                  <input type="date" name="date" class="form-control datepicker" style="font-size:15px" id="inputdate">
                                                       </div>
                                        </div>
                                  
                                         
                                  
	<table name="cart">
    
                     <tr>
                     <td colspan="2"><button class="row-add btn btn-success" style="font-size:15px;width:90px;height:30px">Add Row+</button></td>
		</tr>
		<tr>
        <div class="form-group row">
           <div class="col-sm-2">
			<th><label class="form-control" style="font-size:15px">Item Code</label></th>
            </div>

         
        <div class="col-sm-2 from-control"> 
			<th ><label class="form-control"  style="font-size:15px">Item Name</label></th>
        </div>

        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:15px">Price</label></th>
        </div>

            <div class="col-sm-2 from-control" > 
			<th ><label class="form-control"  style="font-size:15px">Qty</label></th>
        </div>

       

        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:15px">GST in %</label></th>
        </div>

        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:15px">GST in Rate</label></th>
        </div>


        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:15px">Gross Amount</label></th>
        </div>

        <div class="col-sm-2">
            <th></th>
            <th></th>
        </div>
        </div>

		</tr>
		<tr class="line_items">
        <div class="form-group control-group">
         
         <div class="col-sm-2">
            <td>
              <input type="text" class="form-control" id="itemno" name="itemno[]" placeholder="CODE" value=""  style="font-size:15px" onkeyup="GetDetail(this.value)" >
            </td>
        </div>

          

           
            <div class="col-sm-1">
               <td>  <input type="text" class="form-control" id="name" name="name[]"  style="font-size:15px" placeholder="Name" value="" readonly>
               </td>
            </div>
          
            <div class="col-sm-2">
			    <td>
                  <input type="text" class="form-control" name="price1" id="price"  style="font-size:15px" placeholder="price" value="" onkeypress="isInputNumber(event)"   required>                
                  <input type="text" class="form-control" name="price[]" id="price1" placeholder="price" value="" jAutoCalc="{price1}" hidden>                
                
                </td>
              </div>

              <div class="col-sm-2">
		      	<td><input type="text" class="form-control" id="qty" name="qty1"  style="font-size:15px" placeholder="quantity" value="">
                  <input type="text" class="form-control" id="qty" name="qty[]" placeholder="quantity" jAutoCalc="{qty1}"  value="" hidden></td>
              </div>
              

              <div class="col-sm-1">
                    <td> 
                      <input type="text" class="form-control" id="gst"  style="font-size:15px" name="gst1" placeholder="GST" onkeypress="isInputNumber(event)" value=""  readonly="" >
                      <input type="text" class="form-control" id="gst" name="gst[]" placeholder="GST"  value="" jAutoCalc="{gst1}" readonly="" hidden>
                     
                    </td>
               </div>

               <div class="col-sm-1">
                    <td> 
                      <input type="text" class="form-control" id="pgstrate"  style="font-size:15px" name="pgstrate1" placeholder="GST" onkeypress="isInputNumber(event)" value="" jAutoCalc="(({qty1} * {price1})*{gst1})/100"  readonly="" >
                      <input type="text" class="form-control" id="pgstrate" name="pgstrate[]" placeholder="GST"  value="" jAutoCalc="{pgstrate1}"  readonly="" hidden>
                    </td>
               </div>

              <div class="col-sm-2">
			   <td>
                   <input type="text" class="form-control" name="item_total1"  style="font-size:15px" value="" placeholder="total" jAutoCalc="({qty1} * {price1})+ {pgstrate1}">
                   <input type="text" class="form-control" name="item_total[]" value="" placeholder="total" jAutoCalc="{item_total1}" hidden>
               </td>
              </div>
             <td></td>
             <td> <div class="col-sm-2">
               <td colspan="2" ><button class="row-remove btn btn-danger" style="font-size:15px;width:90px">Remove</button></td>
              </div>
            </div>
            </div>
		</tr>
        
        
          
        
		<tr>
			<td colspan="5">&nbsp;</td>
			<td>Subtotal</td>
            <td >
                <input type="text" class="form-control" name="sub_total1" style="font-size:15px" value="" jAutoCalc="SUM({item_total1})">
                <input type="text" class="form-control" name="sub_total" value="" jAutoCalc="{sub_total1}" hidden>
            </td>
            
		</tr>
        <tr>
    
			<td colspan="5">&nbsp;</td>
			<td>Total GST</td>
            <td >
                <input type="text" class="form-control" name="tgst" value="" style="font-size:15px" jAutoCalc="SUM({pgstrate1})">
                <input type="text" class="form-control" name="tgst" value="" jAutoCalc="{tgst}" hidden>
            </td>
            
		</tr>
		<tr>
			<td colspan="5"></td>
			<td name="tax">
				Discount
				
					
			</td>
		
			<td>
                <input type="text"  class="form-control" name="tax_total1" style="font-size:15px" value="0" jAutoCalc="{sub_total1} - {tax}">
                <input type="text"  class="form-control" name="tax_total" value="0" jAutoCalc="{tax_total1}" hidden>
            </td>
		</tr>
		<tr>
			<td colspan="5"></td>
			<td >Total</td>
			
			<td >
                <input type="text" class="form-control" name="grand_total1" style="font-size:15px" value="" jAutoCalc="{sub_total1} - {tax_total1}">
                <input type="text" class="form-control" name="grand_total" value="" jAutoCalc="{grand_total1}" hidden>
            </td>
		</tr>
		<tr>
        <td>  Add New Items<div class="float-left"><a href="addhotelitem.php" style="font-size:15px;width:80px;height:50px" class="btn btn-danger">
                       <i class="fa fa-plus" style="font-size:26px"></i></a></div></div>
                     </td>
                     </tr>
	</table>

    
    <div class="text-center">                    
    <button type="submit" class="btn btn-danger" id="psubmit" style="font-size:20px" name="psubmit" >Submit</button>
<a href="home.php" class="btn btn-secondary" style="font-size:20px">Close</a>
</div>
    
</form>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
    
<script>
	$(function() {

function autoCalcSetup() {
    $('form#cart').jAutoCalc('destroy');
    $('form#cart tr.line_items').jAutoCalc({keyEventsFire: true , thousandOpts: ['','.',''], decimalPlaces: 2, emptyAsZero: true});
    $('form#cart').jAutoCalc({thousandOpts: ['','.',''],decimalPlaces: 2});
}
autoCalcSetup();


$('button.row-remove').on("click", function(e) {
    e.preventDefault();

    var form = $(this).parents('form')
    $(this).parents('tr').remove();
    autoCalcSetup();

});

$('button.row-add').on("click", function(e) {
    e.preventDefault();
   
    var $table = $(this).parents('table');
    var $top = $table.find('tr.line_items').first();
    var $new = $top.clone(true);

    $new.jAutoCalc('destroy');
    $new.insertBefore($top);
    $new.find('input[type=text]').val('');
    autoCalcSetup();

});

});
//-->
</script>
<script>
function GetDetail(str) { 

if (str.length == 0) { 
    document.getElementById("name").value = ""; 
    document.getElementById("price").value = ""; 
    document.getElementById("price1").value="";
    document.getElementById("gst").value = ""; 



    return; 

} 

else { 

    var xmlhttp = new XMLHttpRequest(); 

    xmlhttp.onreadystatechange = function () { 


        if (this.readyState == 4 &&  

                this.status == 200) { 

             

            var myObj = JSON.parse(this.responseText); 


            document.getElementById("name").value = myObj[0]; 
            document.getElementById("price").value = myObj[1]; 
            document.getElementById("price1").value = myObj[2];
            document.getElementById("gst").value = myObj[3]; 
            
           
        } 

    }; 



    xmlhttp.open("GET", "gfg1.php?itemno=" + str, true); 
 

    xmlhttp.send(); 

} 

} 

</script> 
            <script>
 function isInputNumber(evt){
     var ch = String.fromCharCode(evt.which);
     if(!(/[0-9]/.test(ch))){
         evt.preventDefault();

     }
 }
 
 </script>

</body>
</html>