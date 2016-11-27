<?php
include_once "init.php"; 
// Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
	header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
	
	error_reporting (E_ALL ^ E_NOTICE);
	if(isset($_REQUEST['id']) && isset($_REQUEST['table']))
	{
		$id=$_REQUEST['id'];
		$tablename=$_REQUEST['table'];
		$return=$_REQUEST['return'];
		
		if($tablename=="stock_entries")
		{			
					$id=$_REQUEST['id'];
					
					$difference=$db->queryUniqueValue("SELECT quantity FROM stock_entries WHERE id=$id");
					$amount=$db->queryUniqueValue("SELECT total FROM stock_entries WHERE id=$id");
					$subtotal=$db->queryUniqueValue("SELECT subtotal FROM stock_entries WHERE id=$id");
					$balance=$db->queryUniqueValue("SELECT balance FROM stock_entries WHERE id=$id");
					$payment=$db->queryUniqueValue("SELECT payment FROM stock_entries WHERE id=$id");
					$sid=$db->queryUniqueValue("SELECT stock_id FROM stock_entries WHERE id=$id");
					
					
					$name=$db->queryUniqueValue("SELECT stock_name FROM stock_entries WHERE id=$id");
					$result=$db->query("SELECT * FROM stock_entries where id > $id");
					while ($line2 = $db->fetchNextObject($result)) {
						$osd=$line2->opening_stock - $difference;
						$csd=$line2->closing_stock - $difference;
						$cid=$line2->id;
						$db->execute("UPDATE stock_entries SET opening_stock=".$osd.",closing_stock=".$csd." WHERE id=$cid");
		 					
						}
					$newsubtotal = $subtotal - $amount;
					if($payment>$newsubtotal) {
						$payment=$newsubtotal;
					} 
					$balance = $newsubtotal-$payment;

					$result2=$db->query("SELECT * FROM stock_entries where stock_id='$sid'");
					while($db->fetchNextObject($result2)) {
						$db->execute("UPDATE stock_entries SET subtotal=$newsubtotal, payment=$payment, balance=$balance WHERE stock_id='$sid'");
					}

					$total = $db->queryUniqueValue("SELECT quantity FROM stock_avail WHERE name='$name'");
					$ntotal = (int) $total - (int) $difference;
					if($ntotal<0) {
						$ntotal=0;
					}
					$db->execute("UPDATE stock_avail SET quantity=$ntotal WHERE name='$name'");
					$db->execute("DELETE FROM $tablename WHERE id=$id");
		}
		if($tablename=="stock_sales")
		{			
					$id=$_REQUEST['id'];
					$difference=$db->queryUniqueValue("SELECT quantity FROM stock_sales WHERE id=$id");	
					$sid=$db->queryUniqueValue("SELECT transactionid FROM stock_sales WHERE id=$id");
					$amount=$db->queryUniqueValue("SELECT amount FROM stock_sales WHERE id=$id");
					$discount=$db->queryUniqueValue("SELECT discount FROM stock_sales WHERE id=$id");
					$subtotal=$db->queryUniqueValue("SELECT subtotal FROM stock_sales WHERE id=$id");
					$grandtotal=$db->queryUniqueValue("SELECT grand_total FROM stock_sales WHERE id=$id");
					$balance=$db->queryUniqueValue("SELECT balance FROM stock_sales WHERE id=$id");
					$payment=$db->queryUniqueValue("SELECT payment FROM stock_sales WHERE id=$id");
					$name= $db->queryUniqueValue("SELECT stock_name FROM stock_sales WHERE id=$id");

					$result=$db->query("SELECT * FROM stock_entries where id > $id");
					while ($line2 = $db->fetchNextObject($result)) {
						$osd=$line2->opening_stock + $difference;
						$csd=$line2->closing_stock + $difference;
						$cid=$line2->id;
						$db->execute("UPDATE stock_entries SET opening_stock=".$osd.",closing_stock=".$csd." WHERE id=$cid");
		 					
					}

					$newgrandtotal = $grandtotal - $amount;
					$dis_amount = $newgrandtotal*($discount/100);
					$newsubtotal = $newgrandtotal - $dis_amount;
					$tax = $newgrandtotal*0.15;
					if($payment>$newsubtotal) {
						$payment=$newsubtotal;
					} 
					$balance = $newsubtotal-$payment;
				
					$result2=$db->query("SELECT * FROM stock_sales where transactionid='$sid'");
					while($db->fetchNextObject($result2)) {
						$db->execute("UPDATE stock_sales SET dis_amount=$dis_amount, subtotal=$newsubtotal, payment=$payment, balance=$balance, tax=$tax, grand_total=$newgrandtotal WHERE transactionid='$sid'");
					}
					
					$total = $db->queryUniqueValue("SELECT quantity FROM stock_avail WHERE name='$name'");
					$ntotal = (int) $total + (int) $difference;
					$db->execute("UPDATE stock_avail SET quantity=$ntotal WHERE name='$name'");
					$db->execute("DELETE FROM $tablename WHERE id=$id");
		}
		$id=$_REQUEST['id'];
		
		$db->execute("DELETE FROM $tablename WHERE id=$id");
		
		header("location:$return?msg=Record Deleted Successfully!&id=$id");
	}
	if(isset($_REQUEST['table']) && isset($_REQUEST['checklist']))
	{
            $data=$_REQUEST['checklist'];
            $tablename=$_POST['table'];
            if($tablename == 'stock_sales') {
	            $return =$_REQUEST['return'];
	            for($i=0;$i<count($data);$i++){
	            	$id = $data[$i];
	        		$difference=$db->queryUniqueValue("SELECT quantity FROM stock_sales WHERE id=$id");	
					$sid=$db->queryUniqueValue("SELECT transactionid FROM stock_sales WHERE id=$id");
					$amount=$db->queryUniqueValue("SELECT amount FROM stock_sales WHERE id=$id");
					$discount=$db->queryUniqueValue("SELECT discount FROM stock_sales WHERE id=$id");
					$subtotal=$db->queryUniqueValue("SELECT subtotal FROM stock_sales WHERE id=$id");
					$grandtotal=$db->queryUniqueValue("SELECT grand_total FROM stock_sales WHERE id=$id");
					$balance=$db->queryUniqueValue("SELECT balance FROM stock_sales WHERE id=$id");
					$payment=$db->queryUniqueValue("SELECT payment FROM stock_sales WHERE id=$id");
					$name= $db->queryUniqueValue("SELECT stock_name FROM stock_sales WHERE id=$id");

					$newgrandtotal = $grandtotal - $amount;
					$dis_amount = $newgrandtotal*($discount/100);
					$newsubtotal = $newgrandtotal - $dis_amount;
					$tax = $newgrandtotal*0.15;
					if($payment>$newsubtotal) {
						$payment=$newsubtotal;
					} 
					$balance = $newsubtotal-$payment;
				
					$result2=$db->query("SELECT * FROM stock_sales where transactionid='$sid'");
					while($db->fetchNextObject($result2)) {
						$db->execute("UPDATE stock_sales SET dis_amount=$dis_amount, subtotal=$newsubtotal, payment=$payment, balance=$balance, tax=$tax, grand_total=$newgrandtotal WHERE transactionid='$sid'");
					}

					$total = $db->queryUniqueValue("SELECT quantity FROM stock_avail WHERE name='$name'");
					$ntotal = (int) $total + (int) $difference;
					$db->execute("UPDATE stock_avail SET quantity=$ntotal WHERE name='$name'");
					$db->execute("DELETE FROM $tablename WHERE id=$id"); 
	           	}
	        }
	        else {
		       	$data=$_REQUEST['checklist'];
	            $tablename=$_POST['table'];
	            $return =$_REQUEST['return'];
	            for($i=0;$i<count($data);$i++){
	            	$id = $data[$i];
	        		$difference=$db->queryUniqueValue("SELECT quantity FROM stock_entries WHERE id=$id");
					$amount=$db->queryUniqueValue("SELECT total FROM stock_entries WHERE id=$id");
					$subtotal=$db->queryUniqueValue("SELECT subtotal FROM stock_entries WHERE id=$id");
					$balance=$db->queryUniqueValue("SELECT balance FROM stock_entries WHERE id=$id");
					$payment=$db->queryUniqueValue("SELECT payment FROM stock_entries WHERE id=$id");
					$sid=$db->queryUniqueValue("SELECT stock_id FROM stock_entries WHERE id=$id");
					
					
					$name=$db->queryUniqueValue("SELECT stock_name FROM stock_entries WHERE id=$id");
					$result=$db->query("SELECT * FROM stock_entries where id > $id");
					
					$newsubtotal = $subtotal - $amount;
					if($payment>$newsubtotal) {
						$payment=$newsubtotal;
					} 
					$balance = $newsubtotal-$payment;

					$result2=$db->query("SELECT * FROM stock_entries where stock_id='$sid'");
					while($db->fetchNextObject($result2)) {
						$db->execute("UPDATE stock_entries SET subtotal=$newsubtotal, payment=$payment, balance=$balance WHERE stock_id='$sid'");
					}

					$total = $db->queryUniqueValue("SELECT quantity FROM stock_avail WHERE name='$name'");
					$ntotal = (int) $total - (int) $difference;
					if($ntotal<0) {
						$ntotal=0;
					}
					$db->execute("UPDATE stock_avail SET quantity=$ntotal WHERE name='$name'");
					$db->execute("DELETE FROM $tablename WHERE id=$id");
	           	}
	           	
	        }
			header("location:$return?msg=Record Deleted Successfully!");
	}
	
	echo $_REQUEST['return'];
	if(isset($_REQUEST['return'])){
	    header("location:$return");
	}
}
?>