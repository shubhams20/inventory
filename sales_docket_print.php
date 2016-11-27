<?php
include_once("init.php"); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{


	error_reporting (E_ALL ^ E_NOTICE);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sale Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}
</script>
<body>
<?php   
				  $max = $db->maxOfAll("id", "stock_sales");
					 $result1 = $db->query("SELECT * FROM stock_sales where  id = '$max' ");
while ($line1 = mysql_fetch_array($result1)) 
{
	 $transaction_id =  $line1['transactionid'];
	}
					//  $max=$max+1;
					 // $autoid="SD".$max."";
		   ?>
         
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="">
      <div style="width:100%;">
        <div style="float:left;">
                      <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
				 ?>
                  <strong><?php echo $line4->name; ?></strong><br />
                  <?php echo $line4->address; ?><br/>
                  
             Phone<strong>:<?php echo $line4->phone; ?></strong><br />
             Mobile<strong>:<?php echo $line4->mobile; ?></strong><br />
            GST Number<strong>:<?php echo $line4->gst; ?></strong><br /> 
                  <br />
                  <?php ?>
              </div>
        <div style="float:right;">
          <?php 
                $result = $db->query("SELECT * FROM stock_sales where  transactionid = '$transaction_id' ");
 $line = mysql_fetch_array($result) ;
 $customer_id = $line['customer_id'];
   $line['date'];
          $result2 = $db->query("SELECT * FROM customer_details where  customer_name = '$customer_id' ");
          $line2 = mysql_fetch_array($result2) ;
              ?>

              Customer:<strong><?php echo $line['customer_id'] ?></strong><br />
                  Address:<strong><?php echo $line2['customer_address'] ?></strong><br/>
                  
             Phone<strong>:<?php echo $line2['customer_contact1'] ?></strong><br />
             Mobile<strong>:<?php echo $line2['customer_contact2'] ?></strong><br />
                  <br />


            </div>
          </div>
      </td>
       
        <tr>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="center"><strong>Delivery Docket</strong></td>
        </tr>
       
          </table>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td height="20" align="left">
          			  <?php 
	
?>
<table >
<td align="left"> Date <?php echo $line['date'];?></td>  
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>SaleID:<?php echo $line['transactionid']; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right">BillNumber:<?php echo $line['billnumber'] ?></td> 
    </table>      
          <!--<table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"><strong>From</strong></td>
                <td width="393">&nbsp;<?php  //echo $_GET['from_purchase_date']; ?></td>
                <td width="41"><strong>To</strong></td>
                <td width="116">&nbsp;<?php // echo $_GET['to_purchase_date']; ?></td>
              </tr>
          </table>--></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                
              	<td><strong>SrNo </strong></td>
               
                <td><strong>Product</strong></td>
                <td><strong>Category</strong></td>
                <td><strong>Quantity</strong></td>
               
               
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
               </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_sales where  transactionid = '$transaction_id' ");
			  	 $s =1;
while ($line = mysql_fetch_array($result)) {

?>
			
				<tr>
                
               
               <td><?php echo $s ?></td>
                
                <td><?php echo $line['stock_name'] ?></td>
                <td><?php echo $line['category'] ?></td>
                <td><?php echo $line['quantity'] ?></td>
                
              </tr>
			  
<?php
$s=$s+1;
}
			  ?>
              
              
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
    
  </tr>
  
</table></td>
        </tr>
        <tr>
        
          <td width="45"><hr></td>
        </tr>
</table>
<footer>
<p align="left"><i>Terms and Conditions</br>
<ul>
  <li>Upon Receiving goods please check product is not faulty or broken, after delivery we wont be responsible for the products.</li>
  <li>Also ensure goods are as selected in shades,Quantity, color, size and appearance are accepted but claims after installation cannot be accepted. </li>
  <li>Claim only can be done within 14 days after delivery and products should be in resalable condition and in full box only and customer will be responsible for freight charges.</li>
  <li>All products remain the ownership of Tiles & Bathroom BMS until paid for in full. Overdue account shall attract penalties, interest accrued and plus any additional debt recovery costs.</li>
</i>
</ul>
</p>
</footer>

</body>
</html>
<?php
}
?>