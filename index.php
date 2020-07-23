<?php
include "includes/config.php";
include "connection/connection.php";
if(isset($_POST['Submit']))
{
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	
	$sql = "select * from employee_master where emp_email='$email'";
	$rec = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($rec);
	if($num > 0)
	{
		
		$res = mysqli_fetch_assoc($rec);
		$db_mob = $res['password'];
		if($db_mob == $mob)
		{
			session_start();
			
			$_SESSION['eid'] = $res['emp_id'];
			$_SESSION['ename'] = $res['emp_name'];
			$_SESSION['etype'] = $res['login_type'];
			$_SESSION['emp_entry'] = "N";
			$_SESSION['designation_entry'] = "N" ;
			$_SESSION['sal_entry'] = "N";
			$_SESSION['sal_gen'] = "N";
			$_SESSION['sal_list'] = "N";
			$_SESSION['allow_ded'] = "N";
			$_SESSION['log'] = "N";
			$_SESSION['date'] = date("Y-m-d") ;
			$_SESSION['log_in'] = date("h:i:sa") ;
									
									
								
									
			
			echo "<script>
					alert('Successfully Logged In');
					location.replace('dashboard.php?')
				</script>";
		}else
		{
			echo "<script>
					alert('Wrong Credential');
					location.replace(login.php)
				</script>";
		}
	}else
	{
		echo "
		<script> 
		alert('Email Not Found  !!');
	    location.replace(login.php)
        </script>
		";
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="bod">
  <tr>
    <td><?php include "includes/header0.php";?></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="46%" align="right">Email</td>
          <td width="8%" align="center">:</td>
          <td width="46%" height="30" align="left"><input name="email" type="text" id="email" /></td>
        </tr>
        <tr>
          <td align="right">Password</td>
          <td align="center">:</td>
          <td height="30" align="left"><input name="mob" type="password" id="mob" /></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td height="30" align="left"><input type="submit" name="Submit" value="Submit" class="txt_box" /></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
  <tr>
    <td><?php include "includes/footer.php";?></td>
  </tr>
</table>
</body>
</html>
