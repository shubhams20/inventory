<?php
include_once("init.php");// Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
if(isset($_GET['sellid'])  && $_GET['sellid']!=''  ){
$userid=$_GET['sellid'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Sale Report
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>
  <style type="text/css" media="print">
    .hide{
      display:none}
  </style>
  <script type="text/javascript">
    function printpage() {
      document.getElementById('printButton').style.visibility="hidden";
      window.print();
      document.getElementById('printButton').style.visibility="visible";
    }
  </script>
  <body>
    <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">
          <div align="right">
            <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
?>
            <strong>
              <?php echo $line4->name; ?>
            </strong>
            <br />
            <?php echo $line4->address; ?>
            <br/>
            Phone
            <strong>:
              <?php echo $line4->phone; ?>
            </strong>
            <br />
            GST Number
            <strong>:
              <?php echo $line4->gst; ?>
            </strong>
            <br />
            <br />
            <?php ?>
          </div>
          <table width="595" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30" align="center">
                <strong>Sales Invoice
                </strong></td>
            </tr>
           
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td height="20" align="left">
                  <?php 
                  $result2 = $db->queryUniqueObject("SELECT * FROM stock_sales where transactionid=$userid ");
                  $customer = $result2->customer_id;
                  $cust_details = $db->queryUniqueObject("SELECT * FROM customer_details where customer_name='$customer' ");
          
?>
<table >
<td align="left"> Customer:- <strong><?php echo $customer?></strong></td>     <td>&nbsp;</td> <td align="center">Contact:- <strong><?php echo $cust_details->customer_contact1 ?></strong></td>  
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Address:- <strong><?php echo $cust_details->customer_address;?></strong></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
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
<tr><td><br>&nbsp;Description:- <?php echo $result2->description;?></td>
</tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
            <tr>
              <td>
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <strong>Date
                      </strong>
                    </td>
                    <td>
                      <strong>Sales ID 
                      </strong>
                    </td>
                    <td>
                      <strong>Customer
                      </strong>
                    </td>
                    <td>
                      <strong>Product 
                      </strong>
                    </td>
                    <td>
                      <strong>Price 
                      </strong>
                    </td>
                    <td>
                      <strong>Quantity
                      </strong>
                    </td>
                    <td>
                      <strong>Total
                      </strong>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                  </tr>
                  <?php 
$result = $db->query("SELECT * FROM stock_sales where transactionid=$userid ");
while ($line = $db->fetchNextObject($result)) {
?>
                  <tr>
                    <td>
                      <?php  $mysqldate=$line->date;
$phpdate = strtotime( $mysqldate );
$phpdate = date("d/m/Y",$phpdate);
echo $phpdate; ?>
                    </td>
                    <td>
                      <?php echo $line->transactionid; ?>
                    </td>
                    <td>
                      <?php echo $line->customer_id; ?>
                    </td>
                    <td>
                      <?php echo $line->stock_name; ?>
                    </td>
                    <td>
                      <?php echo ($line->amount)/($line->quantity); ?>
                    </td>
                    <td>
                      <?php echo $line->quantity; ?>
                    </td>
                    <td>
                      <?php echo $line->amount; ?>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
              </td>
            </tr>
            <tr>
              <td>&nbsp;
              </td>
            </tr>
            <tr>
              <td>&nbsp;
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table>
<tr>
              <td width="150"><strong>Total</strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT DISTINCT grand_total FROM stock_sales where transactionid = $userid");?></td>
            </tr>
             <tr>
              <td width="150"><strong>Discount </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT DISTINCT dis_amount FROM stock_sales where transactionid = $userid");?></td>
            </tr>
            <tr>
              <td><strong>Payable Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT DISTINCT subtotal FROM stock_sales where transactionid = $userid");?></td>
            </tr>
            
            <tr>
              <td><strong>Paid Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT DISTINCT payment FROM stock_sales where transactionid = $userid");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Pending Payment </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT DISTINCT balance FROM stock_sales where transactionid = $userid");?></td>
            </tr>
           <tr>
              <td width="150"><strong>Tax 15% included</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT DISTINCT tax FROM stock_sales where transactionid = $userid");?></td>
            
            
          </table></td>
        </tr>
        <tr>
        
          <td width="45"><hr></td>
        </tr>
</table>
    
  </body>
 <footer>
<p align="left"><i>Terms and Conditions</br>
<ul>
  <li>Upon Receiving goods please check product is not faulty or broken, after delivery we wont be responsible for the products.</li>
  <li>Also ensure goods are as selected in shades,Quantity, color, size and appearance are accepted but claims after installation cannot be accepted. </li>
  <li>Claim only can be done within 14 days after delivery and products should be in resalable condition and in full box only and customer will be responsible for freight charges.</li>
  <li>All products remain the ownership of Tiles & Bathroom BMS until paid for in full. Overdue account shall attract penalties, interest accrued and plus any additional debt recovery costs.</li>
</i>
</ul>
PS:- Payment can also be made by bank transfer into Account No- <b>060405025919200 ANZ Bank</b> Account name- <b>Building Materials Supply Limited</b>
</p>
</footer>
</html>
<?php
}

else{
echo "Please Select transiction i.d to process report";
}
}
?>
