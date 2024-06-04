<?php
include("check.php");
include("yy.php");  

$db=mysqli_connect("localhost","root","");
$u_n=$_SESSION['username'];
$qd=mysqli_select_db($db,$u_n);
   
?>

<?php
if(isset($_REQUEST['bill'])){
    $sql="select * from product where pid={$_REQUEST['id']}";
    $result=mysqli_query($db,$sql);
    $row = $result-> fetch_assoc();
}
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width-device-width, initial-scale-1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="files/style.css">

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
    
<h1>Customer Bill</h1>


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
<form id="cart" method="POST" action="productbill.php">
<div class="row">
                                        <div class="form-group row col-md-6" style="font-size:20px">
                                                <label class="col-sm-3">Build Date:</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="selldate"  style="font-size:20px" class="form-control" id="inputdate">
                                                       </div>
                                        </div>

                                        <div class="form-group row col-md-6" style="font-size:20px">
                                                <label class="col-sm-3 control-label">Customer Name</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="cname" style="font-size:20px" class="form-control" id="cname">
                                                </div>
                                        </div>
                                  
                                    

                                    <div class="form-group row col-md-6" style="font-size:20px">
                                                <label class="col-sm-3 control-label">Customer Address</label>
                                                <div class="col-sm-9">
                                                   <input type="text" style="font-size:20px" name="cadd" class="form-control" id="cadd">
                                                </div>
                                        </div>
                                    


	<table name="cart">
    <tr>
        <td colspan="2"><button class="row-add btn btn-success" style="font-size:20px;width:100px;height:40px">Add</button></td>
		</tr>
		<tr>
        <div class="form-group row">
           <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:20px">Product Code</label></th>
            </div>

            <div class="col-sm-2 from-control"> 
			<th ><label class="form-control"  style="font-size:20px">  Product Name</label></th>
        </div>

        <div class="col-sm-2 from-control"> 
			<th ><label class="form-control"  style="font-size:20px">Available</label></th>
        </div>

            <div class="col-sm-2 from-control"> 
			<th ><label class="form-control"  style="font-size:20px">Qty</label></th>
        </div>

        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:20px">Price</label></th>
        </div>

        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:20px">GST</label></th>
        </div>

        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:20px">GST in Rate</label></th>
        </div>


        <div class="col-sm-2">
			<th><label class="form-control"  style="font-size:20px">Gross Amount</label></th>
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
              <input type="text" class="form-control"  style="font-size:20px" id="pcode" name="pcode[]" placeholder="CODE" value="<?php if(isset($row['pcode'])){echo $row["pcode"];}?>" onkeyup="GetDetail(this.value)" >
            </td>
        </div>

            <div class="col-sm-3">
                <td>
                    <input type="text" name="pname1[]" style="font-size:20px" id="pname1" class="form-control" value="<?php if(isset($row['pname'])){echo $row["pname"];}?>">
                </td>
            </div>


           
            <div class="col-sm-1">
               <td>  <input type="text" class="form-control" style="font-size:20px" id="pava1" name="pava1[]" placeholder="AVAILABLE" value="<?php if(isset($row['pava'])){echo $row["pava"];}?>" readonly >
               </td>
            </div>
          

            <div class="col-sm-2">
		      	<td><input type="text" class="form-control" style="font-size:20px" id="qty" name="qty1" placeholder="quantity" value="">
                  <input type="text" class="form-control" id="qty" name="qty[]" placeholder="quantity" value="" jAutoCalc="{qty1}" hidden></td>
              </div>
              <div class="col-sm-2">
			    <td>
                  <input type="text" class="form-control" style="font-size:20px" name="price1" id="price" placeholder="price" value="<?php if(isset($row['poriginalcost'])){echo $row["poriginalcost"];}?>" onkeypress="isInputNumber(event)" onkeyup="GetDetail(this.value)" required>
                  <input type="text" class="form-control" name="price[]" id="price1" placeholder="price" value="<?php echo $row["poriginalcost"];?>" hidden>
                
                </td>
              </div>

              <div class="col-sm-1">
                    <td> 
                      <input type="text" class="form-control" style="font-size:20px" id="pgst" name="pgst1" placeholder="GST" onkeypress="isInputNumber(event)" value="<?php if(isset($row['GST'])){echo $row["GST"];}?>"  readonly="" >
                      <input type="text" class="form-control" id="pgst" name="pgst[]" placeholder="GST" value=""  jAutoCalc="{pgst1}" required hidden>
                    </td>
               </div>

               <div class="col-sm-1">
                    <td> 
                      <input type="text" class="form-control" style="font-size:20px" id="pgstrate" name="pgstrate1" placeholder="GST" onkeypress="isInputNumber(event)" value="" jAutoCalc="(({qty1} * {price1})*{pgst1})/100"  readonly="" >
                      <input type="text" class="form-control" id="pgstrate" name="pgstrate[]" placeholder="GST"  value="" jAutoCalc="{pgstrate1}"  readonly="" hidden>
                    </td>
               </div>

              <div class="col-sm-2">
			   <td>
                   <input type="text" class="form-control" style="font-size:20px" name="item_total1" value="" placeholder="total" jAutoCalc="({qty1} * {price1})+ {pgstrate1}">
                   <input type="text" class="form-control" name="item_total[]" value="" placeholder="total" jAutoCalc="{item_total1}" hidden>
               </td>
              </div>
             <td></td>
             <td> <div class="col-sm-2">
               <td colspan="2" ><button class="row-remove btn btn-danger" style="width:90px;height:35px;font-size:15px">Remove</button></td>
              </div>
            </div>
            </div>
		</tr>
        
        
          
        <tr>
    
			<td colspan="6">&nbsp;</td>
			<td>Total GST</td>
            <td >
                <input type="text" class="form-control" style="font-size:20px" name="tgst" value="" jAutoCalc="SUM({pgstrate1})">
                <input type="text" class="form-control" name="tgst" value="" jAutoCalc="{tgst}" hidden>
            </td>
            
		</tr>
		<tr>
			<td colspan="6">&nbsp;</td>
			<td>Subtotal</td>
            <td >
                <input type="text" class="form-control" style="font-size:20px" name="sub_total1" value="" jAutoCalc="SUM({item_total1})">
                <input type="text" class="form-control" name="sub_total" value="" jAutoCalc="{sub_total1}" hidden>
            </td>
            
		</tr>
		<tr>
			<td colspan="6"></td>
			<td name="tax">
				Discount
				
					
			</td>
		
			<td>
                <input type="text"  class="form-control" style="font-size:20px" name="tax_total1" value="0" jAutoCalc="{sub_total1} - {tax}">
                <input type="text"  class="form-control" name="tax_total" value="0" jAutoCalc="{tax_total1}" hidden>
            </td>
		</tr>
		<tr>
			<td colspan="6"></td>
			<td >Total</td>
			
			<td >
                <input type="text" class="form-control" style="font-size:20px" name="grand_total1" value="" jAutoCalc="{sub_total1} - {tax_total1}">
                <input type="text" class="form-control" name="grand_total" value="" jAutoCalc="{grand_total1}" hidden>
            </td>
		</tr>
		
	</table>

    
    <div class="text-center">                    
<button type="submit" class="btn btn-danger" style="font-size:20px;width:100px;height:40px" id="psubmit" name="psubmit" >Submit</button>
<a href="sam.php" style="font-size:20px;width:100px;height:40px" class="btn btn-secondary">Close</a>
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
    
    document.getElementById("pname1").value = ""; 

    document.getElementById("pava1").value = ""; 

    document.getElementById("price").value = ""; 
    document.getElementById("price1").value = ""; 
    document.getElementById("pgst").value = ""; 


    return; 

} 

else { 

    var xmlhttp = new XMLHttpRequest(); 

    xmlhttp.onreadystatechange = function () { 


        if (this.readyState == 4 &&  

                this.status == 200) { 

             

            var myObj = JSON.parse(this.responseText); 


            document.getElementById("pname1").value = myObj[0]; 

            document.getElementById("pava1").value = myObj[1]; 

              

            document.getElementById("price").value = myObj[2]; 
            document.getElementById("price1").value = myObj[3]; 

                document.getElementById("pgst").value = myObj[4];

        } 

    }; 



    xmlhttp.open("GET", "gfg.php?pcode1=" + str, true); 
 

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