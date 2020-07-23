<?php
include "includes/chk_login.php";
include "includes/config.php";
include "connection/connection.php";
    
  $emp_id = $_SESSION['eid'] ;
  $sql_chk = "select * from employee_master where emp_id='$emp_id'";    
  $rec_chk = mysqli_query($conn,$sql_chk);
  $res_chk = mysqli_fetch_assoc($rec_chk);
  $login_type = $res_chk['login_type'];
  
   if ($login_type == "A")
   {
    $lt_A = "lt_show";
	$lt_E = "lt_hide";

   }
   else 
   {
    $lt_A = "lt_hide";
	$lt_E = "lt_show";
   } 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?></title>
<script type="text/javascript" src="js/all.js"> </script>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="bod" >
  <tr>
    <td><?php include "includes/header1.php";?></td>
  </tr>
  
  <tr>
    <td align="center">
	<table width="80%" border="0" cellspacing="1" cellpadding="1" class="<?php echo $lt_A ; ?>">
      <tr class="bg">
        <td width="25%" height="150" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bod">
          <tr>
            <td height="90" align="center"><a href="designation_entry.php" class="maintxtB"><img src="images/38.gif" width="75" height="48" border="0" /></a></td>
          </tr>
          <tr>
            <td height="35" align="center"><a href="designation_entry.php" class="maintxtB">Designation Entry</a> </td>
          </tr>
        </table></td>
        <td width="25%" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bod">
          <tr>
            <td height="100" align="center"><a href="salary_generation.php" class="maintxtB"><img src="images/13.gif" width="75" height="48" /></a></td>
          </tr>
          <tr>
            <td height="25" align="center"><a href="salary_generation.php" class="maintxtB">Salary Generation</a> </td>
          </tr>
        </table></td>
        <td width="25%" align="center"><table width="80%" border="0" cellspacing="1" cellpadding="1" class="bodB">
          <tr>
            <td height="100" align="center"><a href="sal_list.php" class="maintxtB"><img src="images/13.gif" alt="altimage" width="75" height="48" /></a></td>
          </tr>
          <tr>
            <td height="25" align="center"><a href="slt_emp.php" class="maintxtB">Salary LIST </a> </td>
          </tr>
        </table></td>
        <td width="25%" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bod">
          <tr>
            <td height="100" align="center"><a href="employee_entry.php" class="maintxtB"><img src="images/18.gif" width="75" height="48" border="0" /></a></td>
          </tr>
          <tr>
            <td height="25" align="center" ><a href="employee_entry.php" class="maintxtB">Employee Entry</a></td>
          </tr>
        </table></td>
      </tr>
      <tr class="bg">
        <td width="25%" height="150" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bod">
          <tr>
            <td height="100" align="center"><a href="allowance_deduction_entry.php" class="maintxtB"><img src="images/33.gif" width="75" height="48" /></a></td>
          </tr>
          <tr>
            <td height="25" align="center"><a href="allowance_deduction_entry.php" class="maintxtB">Allowance Deduction</a> </td>
          </tr>
        </table></td>
        <td width="25%" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bod">
          <tr>
            <td height="100" align="center"><a href="salary_structure_entry.php" class="maintxtB"><img src="images/52.gif" alt="alttext" width="75" height="48" /></a></td>
          </tr>
          <tr>
            <td height="25" align="center" ><a href="salary_structure_entry.php" class="maintxtB">Salary Structure</a> </td>
          </tr>
        </table></td>
        <td width="25%" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bod">
          <tr>
            <td height="100" align="center"><a href="salary_structure_entry.php" class="maintxtB"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" ><a href="sal_log.php" class="maintxtB">LOGs</a> </td>
          </tr>
        </table></td>
        <td width="25%" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0" class="bodB">
          <tr>
            <td height="100" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="25" align="center"><a href="#" onclick="conf('logout.php')" class="maintxtB">Logout</a> </td>
          </tr>
        </table></td>
      </tr>
    </table>
	</td>
  </tr>
 
 
 
 
  <tr>
    <td align="center">
	<table width="80%" border="0" cellspacing="0" cellpadding="0" class="<?php echo $lt_E ; ?>">
      <tr class="bg">
        <td width="33%" height="150" align="center">&nbsp;</td>
        <td width="33%" align="center"><table width="80%" border="0" cellspacing="1" cellpadding="1" class="bodB">
          <tr>
            <td height="100" align="center"><a href="sal_list.php" class="maintxtB"><img src="images/13.gif" width="75" height="48" /></a></td>
          </tr>
          <tr>
            <td height="25" align="center"><a href="sal_list.php" class="maintxtB">Salary LIST </a> </td>
          </tr>
        </table></td>
        <td width="33%" align="center">&nbsp;</td>
      </tr>
      <tr class="bg">
        <td width="33%" height="150" align="center">&nbsp;</td>
        <td width="33%" align="center"><table width="80%" border="0" cellspacing="1" cellpadding="1" class="bodB">
          <tr>
            <td height="100" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="25" align="center"><a href="#" onclick="conf('logout.php')" class="maintxtB">Logout</a> </td>
          </tr>
        </table></td>
        <td width="33%" align="center">&nbsp;</td>
      </tr>
    </table>
	</td>
  </tr>
  
  <tr>
    <td><?php include "includes/footer.php";?></td>
  </tr>
</table>
</body>
</html>
