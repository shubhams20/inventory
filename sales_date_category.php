<?php
include_once("init.php");// Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
 if( isset($_GET['from_category_sales_date_s']) && isset($_GET['to_category_sales_date_s']) && $_GET['from_category_sales_date_s']!='' && $_GET['to_category_sales_date_s']!=''&&  isset($_GET['c_sale'])  && $_GET['c_sale']!=''  ){

	error_reporting (E_ALL ^ E_NOTICE);
		$selected_date=$_GET['from_category_sales_date_s'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
$startdate=$mysqldate;
			$selected_date=$_GET['to_category_sales_date_s'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );

$enddate=$mysqldate;
			$categoryname=$_GET['c_sale'];
			
		  	

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
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
          <div align="right">
                      <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
				 ?>
                  <strong><?php echo $line4->name; ?></strong><br />
                  <?php echo $line4->address; ?><br/>
                  
             Phone<strong>:<?php echo $line4->phone; ?></strong><br >
             GST Number<strong>:<?php echo $line4->gst; ?></strong><br />
                  <br />
                  <?php ?>
              </div>
      <table width="595" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td height="30" align="center"><strong>Sales Report </strong></td>
        </tr>
        
       
        <tr>
          <td ><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
               
                <td  width="15%"><strong>Category</strong></td>
                <td width="15%"><?php echo $_GET['c_sale']; ?></td>
               <td width="0%"><strong>From</strong></td>
               <td width="15%"><?php echo $_GET['from_category_sales_date_s']; ?></td>
               <td width="10%"><strong>To</strong> </td>
               <td width="15%"><?php echo $_GET['to_category_sales_date_s']; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%"><strong>Date</strong></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td width="10%"><strong>Sales ID </strong></td>
                <td width="25%"><strong>Product Name </strong></td>
                <td width="15%"><strong>Customer</strong></td>
                 <td width="12%"><strong>Quantity</strong></td>
                <td width="14%"><strong>Selling Price</strong></td>
                <td width="14%"><strong>Amount</strong></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              
              </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_sales where date BETWEEN '$startdate' AND '$enddate'  AND category='$categoryname' ");
	   
	   ?>
    
	<?php
  		  
 $total = '';
while ($line = $db->fetchNextObject($result)) {
$total = $total +  $line->amount;
?>
			
				<tr>
                <td>
				<?php  
		$mysqldate=$line->date;
 		$phpdate = strtotime( $mysqldate );
 		$phpdate = date("d/m/Y",$phpdate);
		echo $phpdate;
		 ?>
        </td>
                <td><?php echo "<td>".$line->transactionid."</td>"; ?></td>
                 <td><?php echo $line->stock_name; ?></td>
                <td><?php echo $line->customer_id; ?></td>
                <td><?php echo $line->quantity; ?></td>
               <td><?php echo $line->amount/$line->quantity; ?></td>
                
                <td><?php echo $line->amount; ?></td>
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
              <td width="150"><strong>Total Sales </strong></td>
              <td width="150">&nbsp;<?php echo  $total;?></td>
            </tr>
            
          </table></td>
        </tr>
</table>

</body>
<footer>

</footer>
</html>
<?php

}

else{
echo "Please from and to date and Product name to process report";

}
}

?>