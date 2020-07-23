<?php
include "includes/chk_login.php";
include "includes/config.php";
include "connection/connection.php";

if(isset($_POST['Submit']))
	{
		$emp_id = $_POST['emp_id'];
		

	
		session_start();
			
		$_SESSION['slt_eid'] = $emp_id;
		
		echo "
		<script> 
		location.replace('sal_list.php')
        </script>
		";		

    
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
<form id="form1" name="form1" method="post" action="">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="bod" >
    <tr>
      <td><?php include "includes/header.php";?></td>
    </tr>
    <tr>
      <td align="center"><table width="447" height="130" border="0" align="center">
        <tr>
          <td width="151" height="98" align="right">Employee Name </td>
          <td width="71" align="center">:</td>
          <td width="211" align="left"><select name="emp_id" id="emp_id">
              <option selected="selected">---Employee--</option>
              <?php
				$lsql = "select * from employee_master";
				$lrec = mysqli_query($conn,$lsql);
				while($lres = mysqli_fetch_assoc($lrec))
				{
			?>
              <option value="<?php echo $lres['emp_id'];?>"><?php echo $lres['emp_name'];?> </option> 
              <?php
			}
			?>
          </select></td>
        </tr>
        <tr>
          <td height="26" align="right">&nbsp;</td>
          <td align="center"><input type="submit" name="Submit" value="View" /></td>
          <td align="left">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><?php include "includes/footer.php";?></td>
    </tr>
  </table>
</form>
</body>
</html>

