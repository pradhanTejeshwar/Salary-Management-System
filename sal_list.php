<?php
include "includes/chk_login.php";
include "connection/connection.php";

$_SESSION['sal_list'] = "Y";	
    
  $emp_id = $_SESSION['eid'] ;
  $sql_chk = "select * from employee_master where emp_id='$emp_id'";    
  $rec_chk = mysqli_query($conn,$sql_chk);
  $res_chk = mysqli_fetch_assoc($rec_chk);
  $login_type = $res_chk['login_type'];
  
   if ($login_type == "A")
   {
    $slt = "lt_show1";
	$sh_hd = "lt_hide";
	$emp_id =  $_SESSION['slt_eid'] ; 
   }
   else 
   {
    $slt = "lt_hide";
	$sh_hd = "lt_show1";
	$emp_id =  $_SESSION['eid'] ; 
	} 
   	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?>Salary_Generation</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/all.js"> </script>
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="bod">
  <tr>
    <td width="1088" height="33"><?php include "includes/header.php";?></td>
  </tr>
  
  <tr>
    <td height="129"><form id="form1" name="form1" method="post" action="">
    
	
	
	  <table width="95%" height="30%" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr >
         <td height="37" colspan="10" align="left" class="<?php echo $slt ;?>" ><a href="slt_emp.php" class="slt_txt" >  Select&nbsp;Employee </a></td>
         </tr>
       <tr class="bg">
          <td width="7%" height="37" align="right"> Basic <span class="foot_txt">(Rs.)</span></td>
          <td width="6%" align="right">AGP<span class="foot_txt">(Rs.)</span></td>
          <td width="18%" align="center">No.Of.Days.Worked</td>
          <td width="14%" align="right">Working Basic<span class="foot_txt">(Rs.)</span></td>
          <td width="10%" align="right">Allowances<span class="foot_txt">(Rs.)</span></td>
          <td width="11%" align="right">Gross Salary<span class="foot_txt">(Rs.)</span></td>
          <td width="9%" align="right">Deduction<span class="foot_txt">(Rs.)</span></td>
          <td width="16%" align="right" class="paddR">Net Salary <span class="foot_txt">(Rs.)</span> </td>
          <td width="9%" align="center" class="<?php echo $slt;?>" >Option</td>
          <td width="9%" align="center" class="<?php echo $sh_hd;?>" >Option</td>
       </tr>
	    <?php
		        
				$lsql = "select * from sal_gen where emp_id = '$emp_id' ";
				$lrec = mysqli_query($conn,$lsql);
				$l = 1;
				while($lres = mysqli_fetch_assoc($lrec))
				{
				  		$sql_d = "select * from employee_master where emp_id = '$emp_id'";
						$rec_d = mysqli_query($conn,$sql_d);
						$res_d = mysqli_fetch_assoc($rec_d);
						$designation_id = $res_d['designation_id'];
						
						$sql_s = "select * from salary_structure where designation_id = '$designation_id'";
						$rec_s = mysqli_query($conn,$sql_s);
						$res_s = mysqli_fetch_assoc($rec_s);;
				
				 
			?>     
	    <tr>
          <td height="31" colspan="10" align="left" style="padding-left:10px"><?php echo $lres['month'];?></td>
          </tr>
        

        <tr>
          <td colspan="10" align="center" height="10" style="border-bottom:1px solid #000000"></td>
          </tr>
		  
        <tr >
          <td height="30" align="right"><?php echo $res_s['basic_sal'];?></td>
          <td align="right"><?php echo $res_s['agp'];?></td>
          <td align="center"><?php echo $lres['nodp'];?></td>
          <td align="right"><?php echo $lres['workb'];?></td>
          <td align="right"><?php echo $lres['allown'];?></td>
          <td align="right"><?php echo $lres['g_sal'];?></td>
          <td align="right"><?php echo $lres['ded'];?></td>
          <td align="right"><?php echo $lres['n_sal'];?></td>
          <td align="center" class="<?php echo $slt;?>"><a href="#">Delete</a></td>
          <td align="center" class="<?php echo $sh_hd;?>"><a href="#" onclick="window.open('sal_print.php?SID=<?php echo $lres['sg_id'];?>','print_window','width=700,height=500')">Print</a></td>
        </tr>
		<tr>
          <td colspan="10" align="center" height="10" style="border-bottom:1px dashed #000000"></td>
          </tr>
        <?php
     $l++;
			}
		?>
      </table>
	  
	  

	  
	  
	  
	  
	  </form></td>
  </tr>
  <tr>
    <td height="18"><?php include "includes/footer.php";?></td>
  </tr>
</table>
 </body>
</html>
