<?php
include "includes/chk_login.php";
include "connection/connection.php";

$_SESSION['log'] = "Y";	

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
         <td height="37" colspan="11" align="left" class="<?php echo $slt ;?>" ><a href="slt_emp.php" class="slt_txt" ></a></td>
         </tr>
       <tr class="bg">
          <td width="12%" height="37" align="center"> Employee Name </td>
          <td width="7%" align="center">Date</td>
          <td width="9%" align="center">Log_in Time</td>
          <td width="9%" align="center">Log_out Time</td>
          <td colspan="7" align="center">Pages Visited  </td>
          </tr>
	    <?php
		        
				$lsql = "select * from sal_log ";
				$lrec = mysqli_query($conn,$lsql);
				$l = 1;
				while($lres = mysqli_fetch_assoc($lrec))
				{  	
				
				  $sh_emp_entry = "lt_hide" ;
				  $sh_designation_entry = "lt_hide" ;
				  $sh_sal_entry = "lt_hide" ;
				  $sh_sal_gen = "lt_hide" ;
				  $sh_sal_list = "lt_hide" ;
				  $sh_sal_allow_ded = "lt_hide" ;
				  $sh_log = "lt_hide" ;
  
   				if ($lres['emp_entry'] == "Y")
   				{
    				$sh_emp_entry = "lt_show1";
   				}
				
				if ($lres['designation_entry'] == "Y")
   				{
    				$sh_designation_entry = "lt_show1";
   				}
				
				if ($lres['sal_entry'] == "Y")
   				{
    				$sh_sal_entry = "lt_show1";
   				}
				
				if ($lres['sal_gen'] == "Y")
   				{
    				$sh_sal_gen = "lt_show1";
   				}
				
				if ($lres['sal_list'] == "Y")
   				{
    				$sh_sal_list = "lt_show1"; 
   				}
				
				if ($lres['allow_ded'] == "Y")
   				{
    				$sh_sal_allow_ded = "lt_show1";
   				}
				
				if ($lres['log'] == "Y")
   				{
    				$sh_log = "lt_show1"; 
   				}
				
				
				
				
				
			?>     
	    
        

        <tr>
          <td colspan="11" align="center" height="10" style="border-bottom:1px solid #000000"></td>
          </tr>
		  
        <tr >
          <td width="12%" height="30" align="center"><?php echo $lres['emp_name'];?></td>
          <td width="7%" align="center" ><?php echo $lres['date'];?></td>
          <td width="9%" align="center" ><?php echo $lres['log_in'];?></td>
          <td width="9%" align="center" ><?php echo $lres['log_out'];?></td>
          <td width="9%" align="center" class="<?php echo $sh_emp_entry;?>">Employee Entry</td>
          <td width="9%" align="center" class="<?php echo $sh_designation_entry;?>">Designation Entry</td>
          <td width="9%" align="center" class="<?php echo $sh_sal_entry;?>">Salary Structure</td>
          <td width="9%" align="center" class="<?php echo $sh_sal_gen;?>">Salary Generation</td>
          <td width="9%" align="center" class="<?php echo $sh_sal_list;?>">Salary List</td>
          <td width="9%" align="center" class="<?php echo $sh_sal_allow_ded;?>">Allowance Deduction</td>
          <td width="9%" align="center" class="<?php echo $sh_log;?>">LOGs</td>
        </tr>
		<tr>
          <td colspan="11" align="center" height="10" style="border-bottom:1px dashed #000000"></td>
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
