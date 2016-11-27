<?php
include_once("init.php"); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
if(isset($_GET['supplier'])  && $_GET['supplier']!='' )
{

	error_reporting (E_ALL ^ E_NOTICE);
			$supplier=$_GET['supplier'];
		  	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Purchase Report</title>
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
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
        <div align="right">
                      <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
				 ?>
                  <strong><?php echo $line4->name; ?></strong><br />
                  <?php echo $line4->address; ?><br/>
                  
             Phone<strong>:<?php echo $line4->phone; ?></strong>
                  <br />
                  <?php ?>
              </div>
      <table width="595" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td height="30" align="center"><strong>Purchase Report</strong></td>
        </tr>
        
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"><strong>Supplier : </strong></td>
                <td width="393">&nbsp;<?php echo $_GET['supplier']; ?></td>
                
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>Purchase ID </strong></td>
                <td><strong>Product</strong></td>
                
                <td><strong>Quantity</strong></td>
                <td><strong>Product Total</strong></td>
                
                <td><strong>Total Bill</strong></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_entries where  type='entry' AND stock_supplier_name='$supplier' ");
while ($line = mysql_fetch_array($result)) {
?>
			
				<tr>
                <td><?php echo $line['date']; ?></td>
                <td><?php echo $line['stock_id']; ?></td>
                <td><?php echo $line['stock_name'] ?></td>
               
                 <td><?php echo $line['quantity'] ?></td>
                <td><?php echo $line['total'] ?></td>
               
                <td><?php echo $line['subtotal'] ?></td>
              </tr>
			  	

<?php
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
          <tr>
          <td align="center"><table width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150"><strong>Total Purchase</strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_entries where count1=1 AND type='entry' AND stock_supplier_name='$supplier' ");?></td>
            </tr>
            <tr>
              <td><strong>Paid Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_entries where count1=1 AND type='entry' AND stock_supplier_name='$supplier' ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Pending Payment </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_entries where count1=1 AND type='entry' AND stock_supplier_name='$supplier' ");?></td>
            </tr>
          </table></td>
        </tr>

</table>

</body>
<footer>
<p align="left"><i>Terms and Conditions</br>
<ul>
  <li>Upon Receiving goods please check product is not faulty or broken, after delivery we wont be responsible for the products.</li>
  <li>Also ensure goods are as selected in shades,Quantity, color, size and appearance are accepted but claims after installation cannot be accepted. </li>
  <li>Claim only can be done within 14 days after delivery and products should be in resalable condition and in full box only and customer will be responsible for freight charges.</li>
  <li>All products remain the ownership of Tiles & Bathroom Direct until paid for in full. Overdue account shall attract penalties, interest accrued and plus any additional debt recovery costs.</li>
</i>
</ul>
PS:- Payment can also be made by bank transfer into Account No- <b>060405025919200 ANZ Bank</b> Account name- <b>Building Materials Supply Limited</b>
</p>
</footer>

</html>
<?php
}
else
echo "Please Enter Supplier Name to process report";
}
?>