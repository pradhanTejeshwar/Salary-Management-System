<?php
session_start();
include "connection/connection.php";


			
			$_SESSION['eid'] = $res['emp_id'];
			
			$ename = $_SESSION['ename'] ;
			$sal_date = $_SESSION['date'] ;
			$log_in = $_SESSION['log_in'] ;
	
			$emp_entry = $_SESSION['emp_entry'] ;
			$designation_entry = $_SESSION['designation_entry'] ;
			$sal_entry = $_SESSION['sal_entry'];
			$sal_gen = $_SESSION['sal_gen'] ;
			$sal_list = $_SESSION['sal_list'] ;
			$allow_ded = $_SESSION['allow_ded'];
			$sal_log = $_SESSION['log'];
			
			$log_out = date("h:i:sa") ;
			
$sql = "insert into sal_log (emp_name,date,log_in,log_out,emp_entry,designation_entry,sal_entry,sal_gen,sal_list,allow_ded,log)  
values('$ename','$sal_date','$log_in','$log_out','$emp_entry','$designation_entry','$sal_entry','$sal_gen','$sal_list','$allow_ded','$sal_log')";
mysqli_query($conn,$sql);






session_destroy();
echo "<script>
		alert('Successfully Logged Out');
		location.replace('index.php');
		</script>";
?>