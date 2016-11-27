<?php
include_once("init.php");
include "config.php";
date_default_timezone_set('NZ');
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sale Purchase SystemS</title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="js/date_pic/date_input.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="tpl1/css/jquery.autocomplete.css">
  <!-- jQuery & JS files  important -->
	<?php include_once("tpl1/common_js.php"); ?>
    
    
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
         <script src="js/date_pic/jquery.date_input.js"></script>  
	<script src="js/script.js"></script>  
		<script>
		/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
  $('#from_category_sales_date_s').jdPicker();
  $('#to_category_sales_date_s').jdPicker();
	$('#from_sales_date_s').jdPicker();
	$('#to_sales_date_s').jdPicker();
	$('#from_sales_date').jdPicker();
	$('#invoice_end_date').jdPicker();
	$('#invoice_start_date').jdPicker();
	$('#to_sales_date').jdPicker();
	$('#from_purchase_date').jdPicker();
	$('#to_purchase_date').jdPicker();
	$('#start_date').jdPicker();
	$('#end_date').jdPicker();
	$('#start_date_purchase').jdPicker();
	$('#end_date_purchase').jdPicker();
	$('#from_sales_purchase_date').jdPicker();
	$('#to_sales_purchase_date').jdPicker();
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				
				cost: {
                                        required: true
					
				},
				sell: {
                                        required: true
					
				}
			},
			messages: {
				name: {
					required: "Please enter a Stock Name",
					minlength: "Stock must consist of at least 3 characters"
				},
				cost: {
					required: "Please enter a cost Price"
				},
				sell: {
					required: "Please enter a Sell Price"
				}
			}
		});
	
	});
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
    function change_balance(){
        if(parseFloat(document.getElementById('new_payment').value) > parseFloat(document.getElementById('balance').value)){
            document.getElementById('new_payment').value=parseFloat(document.getElementById('balance').value);
        }
    }
    
function sales_report_fn() 

{ 
 window.open("sales_report.php?from_sales_date="+$('#from_sales_date').val()+"&to_sales_date="+$('#to_sales_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
 
}
 
function sales_report_name_fn() 
{ 
 window.open("sales_report_name.php?customer="+$('#customer').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
}

function sales_report_product_fn() 
{ 
 window.open("sales_report_product.php?product="+$('#product_sale').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
}
function sales_report_category_fn() 
{ 
 window.open("sales_report_category.php?category="+$('#category_sale').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
}
function stock_report_category_fn() 		
{ 		
 window.open("stock_report_category.php?category="+$('#category_sale1').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 		
}
function complete_sales_report_fn() 
{ 
 window.open("complete_sales_report.php?start_date="+$('#start_date').val()+"&end_date="+$('#end_date').val()+"&product_name="+$('#product_name').val()+"&customer_name="+$('#customer_name').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
}
function purchase_report_fn() 
{ 
 window.open("purchase_report.php?from_purchase_date="+$('#from_purchase_date').val()+"&to_purchase_date="+$('#to_purchase_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");}
function purchase_report_product_fn() 
{ 
 window.open("purchase_product_report.php?product="+$('#product_purchase').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");
}

function purchase_supplier_report_fn() 
{ 
 window.open("purchase_supplier_report.php?supplier="+$('#supplier').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");}   
function complete_purchase_report_fn() 
{ 
 window.open("complete_purchase_report.php?start_date="+$('#start_date_purchase').val()+"&end_date="+$('#end_date_purchase').val()+"&product_name="+$('#product_name_purchase').val()+"&supplier_name="+$('#supplier_name').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
}

function sales_purchase_report_fn() 
{ 
 window.open("all_report.php?from_sales_purchase_date="+$('#from_sales_purchase_date').val()+"&to_sales_purchase_date="+$('#to_sales_purchase_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
} 

function stock_sales_report_fn() 
{ 
 window.open("sales_stock_report.php?from_stock_sales_date="+$('#from_stock_sales_date').val()+"&to_stock_sales_date="+$('#to_stock_sales_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
} 

function invoice_sales_report_fn() 
{ 
 window.open("sales_invoice.php?sellid="+$('#sellid').val()+ "&invoice_start_date="+$('#invoice_start_date').val()+
  "&invoice_end_date="+$('#invoice_end_date').val(),
 "myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");  
} 


function sales_report_product_date_fn() 
{ 
 window.open("sales_date_product.php?p_sale="+$('#p_sale').val()+ "&from_sales_date_s="+$('#from_sales_date_s').val()+
  "&to_sales_date_s="+$('#to_sales_date_s').val(),
 "myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");  
} 
function sales_report_category_date_fn() 
{ 
 window.open("sales_date_category.php?c_sale="+$('#c_sale').val()+ "&from_category_sales_date_s="+$('#from_category_sales_date_s').val()+
  "&to_category_sales_date_s="+$('#to_category_sales_date_s').val(),
 "myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");  
} 
	</script>

</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
                                <li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="view_sales.php" class="sales-tab">Sales</a></li>
				<li><a href="view_customers.php" class=" customers-tab">Customers</a></li>
				<li><a href="view_purchase.php" class="purchase-tab">Purchase</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
				<li><a href="view_product.php" class="stock-tab">Stocks / Products</a></li>
				<li><a href="view_payments.php" class=" payment-tab">Payments / Outstandings</a></li>
				<li><a href="view_report.php" class="active-tab report-tab">Reports</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Report</h3>
				<ul>
                                	<ul>
                                  
                                            <li>  Report</li>
					                                      
				</ul>
                                    </ul>
                                <div style="background:#ffffff ">
                                    <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- posnic (180x90) Displays 3 links -->
<ins class="adsbygoogle"
     style="display:inline-block;width:180px;height:90px"
     data-ad-client="ca-pub-5212135413309920"
     data-ad-slot="1223074159"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                </div>
                                    
                                                                
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					 <!-- end content-module-heading -->
					
						<div >
		
                
 <table   border="0" cellspacing="0" cellpadding="0">
   	<tr >
    		 
            <h3 ><b style="color:#F00">For Report Of Sales Of Stock</b></h3> 
           
   	</tr>
     <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
  </tr>
  
  <form action="" method="post"    name="sales_report" id="sales_report" target="myNewWinsr">
	    <tr align="">
              <td><strong>From</strong></td>
              <td ><input name="from_sales_date" type="text" id="from_sales_date" placeholder="Start Date" >  </td>
              
              <td ><input name="to_sales_date" type="text" id="to_sales_date" palceholder="enddate" placeholder="End Date"></td>
               
              <td><input name="submit" type="button" value="Show" onClick='sales_report_fn();'></td>
    	</tr>
   </form>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
     <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <form action="" method="post" name="search" >
             <tr>
                     <td ><strong>By Customer Name</strong></td>
                     <td >
                      <select name="Customer" id="customer"  maxlength="200"     />
                             <option>Select Customer name</option>;
                             <?php
                             $result = $db->query('Select customer_name from customer_details');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->customer_name.'</option>';
                             }
                             ?>
                             </select>
                           </td>
                       
                       <td><input name="submit" type="button" value="Show" onClick='sales_report_name_fn();'></td>
 	         </tr>
          </form>	
      	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
  		</tr>
  		
      <form action="" method="post" name="search" >
         <tr>
                     <td ><strong>By Product Name</strong></td>
                     <td >
                      <select  name="product_sale" id="product_sale"  maxlength="200"    />
                             <option>Select Product name</option>;
                             <?php
                             $result = $db->query('Select name from stock_avail');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->name.'</option>';
                             }
                             
                             
                             ?>
                           </select>
                           </td>
                     
                    <td><input name="submit" type="button" value="Show" onClick='sales_report_product_fn();'></td>
          </tr>
          </form>	
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <form action="" method="post" name="search" >
         <tr>
                     <td ><strong>By Category Name</strong></td>
                     <td >
                      <select  name="category_sale" id="category_sale"  maxlength="200"    />
                             <option>Select Category name</option>;
                             <?php
                             $result = $db->query('Select category_name from category_details');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->category_name.'</option>';
                             }
                             
                            
                             ?>
                           </select>
                           </td>
                     
                    <td><input name="submit" type="button" value="Show" onClick='sales_report_category_fn();'></td>
          </tr>
          </form> 
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
      <form action="" method="post" name="search" >
         <tr>
                     <td ><strong>By Product Name</strong></td>
                     <td ><input name="from_sales_date_s" type="text" id="from_sales_date_s" placeholder="Start Date" ></td>
              		
              		<td ><input name="to_sales_date_s" type="text" id="to_sales_date_s"  placeholder="END Date"></td>
                     <td >
                      <select  name="p_sale" id="p_sale"  maxlength="200"   />
                             <option>Select Product name</option>;
                             <?php
                             $result = $db->query('Select name from stock_avail');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->name.'</option>';
                             }
                             
                             ?>
                           </select>
                           </td>
                    
                    <td><input name="submit" type="button" value="Show" onClick='sales_report_product_date_fn();'></td>
          </tr>
          </form>	
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <form action="" method="post" name="search" >
         <tr>
                     <td ><strong>By Category Name</strong></td>
                     <td ><input name="from_category_sales_date_s" type="text" id="from_category_sales_date_s" placeholder="Start Date" ></td>
                  
                  <td ><input name="to_category_sales_date_s" type="text" id="to_category_sales_date_s"  placeholder="END Date"></td>
                     <td >
                      <select  name="c_sale" id="c_sale"  maxlength="200"   />
                             <option>Select Category name</option>;
                             <?php
                             $result = $db->query('Select category_name from category_details');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->category_name.'</option>';
                             }
                             
                             
                             ?>
                           </select>
                           </td>
                    
                    <td><input name="submit" type="button" value="Show" onClick='sales_report_category_date_fn();'></td>
          </tr>
          </form> 
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<tr >		
            <td>&nbsp;</td>		
                <td>&nbsp;</td>		
                <td ><h1><b>For Report Of Available Stock</b></h1></td>		
          <td>&nbsp;</td>		
        </tr>		
                <td>&nbsp;</td>		
                <td>&nbsp;</td>		
                <td>&nbsp;</td>		
                <td>&nbsp;</td>		
                <td>&nbsp;</td>		
                <td>&nbsp;</td> 		
                <td>&nbsp;</td>		
     </tr>		
     <form action="" method="post" name="search" >		
         <tr>		
                     <td ><strong>By Category Name</strong></td>		
                     <td >		
                      <select  name="category_sale1" id="category_sale1"  maxlength="200"    />		
                             <option>Select Category name</option>;		
                             <?php		
                             	
                             $result = $db->query('Select category_name from category_details');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->category_name.'</option>';
                             }
                             		
                            	
                             ?>		
                           </select>		
                           </td>		
                     		
                    <td><input name="submit" type="button" value="Show" onClick='stock_report_category_fn();'></td>		
          </tr>		
          </form> 
        
    
  		<tr >
        		<td>&nbsp;</td>
                <td>&nbsp;</td>
                <td ><h1><b>For Report Of Purchasing Stock</b></h1></td>
   				<td>&nbsp;</td>
        </tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td> 
                <td>&nbsp;</td>
		 </tr>
 <form action="purchase_report.php" method="post" name="purchase_report" target="_blank">
          <tr>
              <td><strong>From</strong></td>
              <td ><input name="from_purchase_date" type="text" id="from_purchase_date"placeholder="Start Date" ></td>
             
              <td ><input name="to_purchase_date" type="text" id="to_purchase_date" placeholder="End Date"></td>
              
              <td><input name="submit" type="button" value="Show" onClick='purchase_report_fn();'></td>
    </tr> </form>
  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td> 
  </tr>
  <form action="" method="post" name="search" >
             <tr>
             <td ><strong>By Product Name</strong></td>
             <td >
              <select name="product_purchase" id="product_purchase"  maxlength="200"   />
                     <option>Select Product name</option>;
					 <?php
        			 
                                 $result = $db->query('Select name from stock_avail');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->name.'</option>';
                             }
       				
    				 ?>
                     </select>
                   </td>
                   
                  <td><input name="submit" type="button" value="Show" onClick='purchase_report_product_fn();'></td>
                   
          </tr>
          </form>	 
      <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
				    <td>&nbsp;</td>
  </tr>
  
  <form action="" method="post" name="search" >
             <tr >
             <td ><strong>By Supplier Name</strong></td>
             <td >
              <select name="supplier" id="supplier"  maxlength="200"   />
                     <option>Select supplier name</option>;
					 <?php
        			 
                                 $result = $db->query('Select supplier_name from supplier_details');
                             while($row = $db->fetchNextObject($result))
                             {
                                 echo '<option>'.$row->supplier_name.'</option>';
                             }
       				 
    				 ?>
                     </select>
                   </td>
                    
                	<td><input name="submit" type="button" value="Show" onClick='purchase_supplier_report_fn();'></td>
          </tr>
          </form>	 
      <tr>
                        <td>&nbsp;</td> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
  </tr>
 
    <form action="sales_purchase_report.php" method="post" name="sales_purchase_report" target="_blank">
    <tr >  
          <td><strong>Purchase Stocks </strong></td>
          <td>From</td>
          <td><input name="from_sales_purchase_date" type="text" id="from_sales_purchase_date" ></td>
          <td>To</td>
          <td><input name="to_sales_purchase_date" type="text" id="to_sales_purchase_date" ></td>
          <td>&nbsp;</td>
          <td><input name="submit" type="button" value="Show" onClick='sales_purchase_report_fn();'></td>
    </tr>  
    </form>
</table>
           
				
				  </div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p> &copy;Copyright 2016</p>
	
	</div> <!-- end footer -->

</body>
</html>