<?php
include "connection/connection.php";
include "includes/chk_login.php";
include "includes/config.php";

$_SESSION['sal_gen'] = "Y";
	if(isset($_POST['Submit']))		
      {	
		$n = $_POST['n'];
		
		
		for( $i = 1 ; $i < $n ; $i++)

	
		{		
		

		$emp_id = $_POST['eid'.$i];
		$sum = $_POST['sum'.$i];
		$sum_x = $_POST['sum_x'.$i];
		$nod_p = $_POST['nodp'.$i];
        $workb = $_POST['work_b'.$i];
		$allown = $_POST['allown'.$i];
		$ded = $_POST['ded'.$i];
		$g_sal = $_POST['gross'.$i];
		$n_sal = $_POST['salary'.$i];
		$month = $_POST['month'];
		
		$month_array = explode(",",$month);
		$month_name = $month_array[0];
		$month_no = $month_array[1];
	
		
		$sql = "insert into sal_gen (emp_id,sum,sum_div_30,nodp,workb,allown,ded,g_sal,n_sal,month,month_num) values         ('$emp_id','$sum','$sum_x','$nod_p','$workb','$allown','$ded','$g_sal','$n_sal','$month_name','$month_no')";
		mysqli_query($conn,$sql);

		
		
	    }	
	
	
    }
?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">			  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Salary_Generation</title>
<title><?php echo $title;?></title>
<script type="text/javascript" src="js/all.js"> </script>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include "includes/header.php";?></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="63%" height="138" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3" align="center"> Month
            <select name="month" id="month">
                <option selected="selected">--Month--</option>
                <option value="January,1">January</option>
                <option value="February,2">February</option>
                <option value="March,3">March</option>
                <option value="April,4">April</option>
                <option value="May,5">May</option>
                <option value="June,6">June</option>
                <option value="July,7">July</option>
                <option value="August,8">August</option>
                <option value="September,9">September</option>
                <option value="October,10">October</option>
                <option value="November,11">November</option>
                <option value="December,12">December</option>
            </select></td>
        </tr>
        <tr>
          <td width="19%" height="37" align="center"> Employee Name </td>
          <td width="55%" align="center">No. of Days Present </td>
          <td width="26%" align="center">Salary</td>
        </tr>
        <?php
				$lsql = "select * from employee_master";
				$lrec = mysqli_query($conn,$lsql);
				$l = 1;
				while($lres = mysqli_fetch_assoc($lrec))
				{
				     $designation_id = $lres['designation_id'] ;
	 
			

	 				$sql_s = "select * from salary_structure where designation_id = '$designation_id'";
	 				$rec_s = mysqli_query($conn,$sql_s);
	 				$res_s = mysqli_fetch_assoc($rec_s);
	 
				    $basic_sal = $res_s['basic_sal'];
				    $agp = $res_s['agp'];
					$sum = $basic_sal + $agp;
					$sum_x = $sum / 30;
				//	echo $designation_id;
				    
			?>
        <tr>
          <td height="40" align="center"><?php echo $lres['emp_name'];?></td>
          <td align="center"><input name="sum<?php echo $l;?>" type="hidden" id="sum<?php echo $l;?>" value="<?php echo $sum;?>" />
              <input type="hidden" name="allown<?php echo $l;?>" id="allown<?php echo $l;?>" />
              <input type="hidden" name="ded<?php echo $l;?>" id="ded<?php echo $l;?>" />
              <input name="nodp<?php echo $l;?>" type="text" id="nodp<?php echo $l;?>"  size="4"    onblur="get_val(this)" />
              <input type="hidden" name="sum_x<?php echo $l;?>" id="sum_x<?php echo $l;?>" value="<?php echo $sum_x;?>">
              <input type="hidden" name="work_b<?php echo $l;?>" id="work_b<?php echo $l;?>"></td>
          <td align="center"><input name="eid<?php echo $l;?>" type="hidden" id="eid<?php echo $l;?>" value="<?php echo $lres['emp_id'];?>" />
              <input name="salary<?php echo $l;?>" 
	  type="text"  value="" id="salary<?php echo $l;?>" size="14" />
              <input name="gross<?php echo $l;?>" type="hidden" id="gross<?php echo $l;?>"></td>
          <?php

		
		
		
		
 
 
 
     $l++;
			}
		
	$sql_ad = "select * from allown_ded_master";
	$rec_ad = mysqli_query($conn,$sql_ad);
	$i = 1;
	while($res_ad = mysqli_fetch_assoc($rec_ad))
		{
	?>
        </tr>
        <tr>
          <td height="37" align="center"><input name="adname<?php echo $i;?>" type="hidden" id="adname<?php echo $i;?>" value="<?php echo $res_ad['a_d_name'];?>" />
              <input name="adamt<?php echo $i;?>" type="hidden" id="adamt<?php echo $i;?>"   value="<?php echo $res_ad['a_d_amt'];?>" />
              <input name="adcal<?php echo $i;?>" type="hidden" id="adcal<?php echo $i;?>"   value="<?php echo $res_ad['a_d_cal_type'];?>" />
              <input name="adtype<?php echo $i;?>" type="hidden" id="adtype<?php echo $i;?>" value="<?php echo $res_ad['a_d_type'];?>" /></td>
          <td height="37" align="center">&nbsp;</td>
          <td height="37" align="center">&nbsp;</td>
        </tr>
        <?php  
	  $i++;
	}
    
    ?>
      </table>
      <p>&nbsp;</p>
      <p>
        <input name="i" type="hidden" id="i" value="<?php echo $i;?>" />
        <input name="n" type="hidden" id="n" value="<?php echo $l;?>" />
      </p>
      <table width="200" border="1" align="center">
        <tr>
          <td align="center"><input type="submit" name="Submit" value="Submit" /></td>
        </tr>
      </table>
      <p>&nbsp; </p>
      <p>&nbsp; </p>
    </form></td>
  </tr>
  <tr>
    <td><?php include "includes/footer.php";?></td>
  </tr>
</table>
</body>
</html>
