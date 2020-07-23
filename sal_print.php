<?php
include "includes/chk_login.php";
include "connection/connection.php";
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<style type="text/css">
<!--
.style1 {
	font-family: tahoma;
	font-weight: bold;
}
.style2 {font-family: tahoma}
-->
</style>
<body onload="window.print()" title="Click For Print" style="cursor:pointer">

<form name="form1" method="post" action="">
  <?php
		        $emp_id =  $_SESSION['eid'] ; 
				$lsql = "select * from sal_gen where sg_id = '$_GET[SID]' ";
				$lrec = mysqli_query($conn,$lsql);
				$l = 1;
				$lres = mysqli_fetch_assoc($lrec);

				$esql = "select * from employee_master where emp_id = '$emp_id' "; 
				$erec = mysqli_query($conn,$esql);
				$eres = mysqli_fetch_assoc($erec);
				$des_id = $eres['designation_id'];
				
				$sql = "select * from employee_master where emp_id = '$emp_id' "; 
				$erec = mysqli_query($conn,$esql);
				$eres = mysqli_fetch_assoc($erec);
				$des_id = $eres['designation_id'];

                
				
				$ssql = "select * from salary_structure where designation_id = '$des_id' "; 
				$srec = mysqli_query($conn,$ssql);
				$sres = mysqli_fetch_assoc($srec);

				
				
				 $wb = $lres['workb'];
			?> 


  <table width="373" border="3" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="158" align="right"><span class="style2">Employee Name</span> </td>
      <td width="20" align="center"><strong>:</strong></td>
      <td width="173"><label></label>
     <?php echo $eres['emp_name'];?></td>
    </tr>
    <tr>
      <td align="right"><span class="style2">Selected Month</span></td>
      <td align="center"><strong>:</strong></td>
      <td><span style="padding-left:10px"><?php echo $lres['month'];?></span></td>
    </tr>
    <tr>
      <td align="right"><span class="style2">No of Days 
      Worked</span></td>
      <td align="center"><strong>:</strong></td>
      <td><label></label>
      <?php echo $lres['nodp'];?></td>
    </tr>
  </table>
  
  <hr>
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td align="center" class="style1"><span class="style2">Basic(Rs)</span></td>
      <td align="center" class="style1"><span class="style2">AGP(Rs)</span></td>
    </tr>
    <tr>
      <td align="center"><?php echo $sres['basic_sal'];?></td>
      <td align="center"><?php echo $sres['agp'];?></td>
    </tr>
  </table>
  
  <hr>
  <table width="50%" height="150" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td align="center"><span class="style1">Working Basic (Rs) </span></td>
    </tr>
    <tr>
      <td height="50" align="center"><?php echo $lres['workb'];?></td>
    </tr>
  </table>
  <br>
  <table width="100%" height="150" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="50%" align="center"><span class="style1">Allowances (Rs) <?php echo $lres['allown'];?></span></td>
      <td width="50%" align="center"><span class="style1">Deductions (Rs)<?php echo $lres['ded'];?></span></td>
    </tr>
    <tr>
      <td height="50" align="center"><table width="468" height="58" border="0">
        <tr>
          <td width="241" align="center">Allowance Name </td>
          <td width="217" align="center">Amount </td>
        </tr>
	    <?php
		$asql = "select * from allown_ded_master where a_d_type = 'a' ";
		$arec = mysqli_query($conn,$asql);
		while( $ares = mysqli_fetch_assoc($arec))
		
		{
		  $cal_type = $ares['a_d_cal_type'];
		  $amt_type = $ares['a_d_amt'];
		  
		  $amt = $amt_type; 
		  if ($cal_type == '%' )
		  {
		  $amt = ($wb * $amt_type )/ 100; 
		  }		
	     ?>
        <tr>
          <td align="center"> <?php echo $ares['a_d_name']; ?>   </td>
          <td align="center"><?php echo $amt; ?></td>
        </tr>
       <?php  
	   	}
	   ?>
      </table></td>
      <td align="center"><table width="468" height="58" border="0">
        <tr>
          <td width="245" align="center">Deduction Name </td>
          <td width="213" align="center">Amount </td>
        </tr>
    <?php
		$dsql = "select * from allown_ded_master where a_d_type = 'd' ";
		$drec = mysqli_query($conn,$dsql);
		while( $dres = mysqli_fetch_assoc($drec))
		
		{
		  $cal_type = $dres['a_d_cal_type'];
		  $amt_type = $dres['a_d_amt'];
		  
		  $amt = $amt_type; 
		  if ($cal_type == '%' )
		  {
		  $amt = ($wb * $amt_type )/ 100; 
		  }		
	     ?>
		
        <tr>
          <td align="center"><?php echo $dres['a_d_name']; ?></td>
          <td align="center"><?php echo $amt; ?></td>
        </tr>
		<?php }  ?>
      </table></td>
    </tr>
  </table>
  <hr color="#6666FF" size="10px">
  <table width="100%" height="150" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td align="center" class="style1"><span class="style2">Gross Salary (Rs) </span></td>
      <td align="center" class="style1">Net Salary (Rs) </td>
    </tr>
    <tr>
      <td width="50%" align="center"><?php echo $lres['g_sal'];?></td>
      <td width="50%" height="50" align="center"><?php echo $lres['n_sal'];?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
