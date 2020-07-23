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
 
 
	
	$_SESSION['emp_entry'] = "Y";
	
	if(isset($_POST['Submit']))
	{
		$emp_name = $_POST['emp_name'];
		$emp_designation = $_POST['emp_designation'];
		$emp_email = $_POST['emp_email'];
		$emp_mobile = $_POST['emp_mobile'];
		$emp_address = $_POST['emp_address'];
		$emp_login_type = $_POST['rg'];
		$emp_pass = $_POST['emp_pass'];
		
		$sql_d = "select * from designation_master where designation = '$emp_designation'";
		$rec_d = mysqli_query($conn,$sql_d);
		$res_d = mysqli_fetch_assoc($rec_d);
		$designation_id = $res_d['designation_id'];
	 if($_POST['Submit'] == "Submit") 	
	 {	
		$sql = "insert into employee_master (emp_name,designation_id,emp_email,emp_mobile,emp_address,login_type,password)  
		values('$emp_name','$designation_id','$emp_email','$emp_mobile','$emp_address','$emp_login_type','$emp_pass')";
		mysqli_query($conn,$sql);
		
		echo "
		<script> 
		alert('Data submission complete !!');
		location.replace('employee_entry.php')
        </script>
		";  
   } 	
	else if($_POST['Submit'] == "Update")
	{
		$pk = $_POST['pk'];
		
		
		$usql = "update employee_master set emp_name = '$emp_name', designation_id = '$designation_id', emp_email = '$emp_email' , emp_mobile = '$emp_mobile', emp_address = '$emp_address',login_type = '$emp_login_type', password = '$emp_pass' where emp_id='$pk'";
		$urec = mysqli_query($conn,$usql);
		echo "<script>
					alert('Data Updated !!');
					location.replace('employee_entry.php')	
				</script>";
	}
   }
	
	if(isset($_GET['E']))
{
	$E = $_GET['E'];
	
	$esql = "select * from employee_master where emp_id='$E'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
    
}
	
	if(isset($_GET['D']))
{
	$D = $_GET['D'];
	
	$dlsql = "delete from employee_master where emp_id='$D'";
	$dlrec = mysqli_query($conn,$dlsql);
	if($dlrec)
	{
		echo "<script>
					alert('Data Deleted !!');
					location.replace('employee_entry.php')	
				</script>";
	}
	
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
      <td align="center"><table width="547" height="588" border="0" align="center">
        <tr>
          <td width="214" height="35" align="right">EMP_NAME</td>
          <td width="91" align="center">:</td>
          <td width="228" align="left"><input name="emp_name" type="text" id="emp_name" value="<?php echo $eres['emp_name'];?>" /></td>
        </tr>
        <tr>
          <td height="47" align="right">EMP_DESIGNATION</td>
          <td align="center">:</td>
          <td align="left"><select name="emp_designation" id="emp_designation">
              <option selected="selected">---DESIGNATION--</option>
              <?php
				$lsql = "select * from designation_master";
				$lrec = mysqli_query($conn,$lsql);
				while($lres = mysqli_fetch_assoc($lrec))
				{
			?>
              <option><?php echo $lres['designation'];?></option>
              <?php
			}
			?>
          </select></td>
        </tr>
        <tr>
          <td height="60" align="right">EMP_EMAIL</td>
          <td align="center">:</td>
          <td align="left"><input name="emp_email" type="text" id="emp_email" value="<?php echo $eres['emp_email'];?>" /></td>
        </tr>
        <tr>
          <td height="54" align="right">EMP_MOBILE</td>
          <td align="center">:</td>
          <td align="left"><input name="emp_mobile" type="text" id="emp_mobile" value="<?php echo $eres['emp_mobile'];?>" /></td>
        </tr>
        <tr>
          <td height="72" align="right">EMP_ADDRESS</td>
          <td align="center">:</td>
          <td align="left"><input name="emp_address" type="text" id="emp_address" value="<?php echo $eres['emp_address'];?>" /></td>
        </tr>
        <tr>
          <td height="72" align="right">AUTHORISATION</td>
          <td align="center">:</td>
          <td align="left"><p>
            <label>
              <input name="rg" type="radio" value="E" />
              E</label>
            <br />
            <label>
            <input type="radio" name="rg" value="A" />
              A</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td height="72" align="right">PASSWORD</td>
          <td align="center">:</td>
          <td align="left"><input name="emp_pass" type="password" id="emp_pass" /></td>
        </tr>
        <tr>
          <td height="72" align="right">RE-PASSWORD</td>
          <td align="center">:</td>
          <td align="left"><input name="emp_repass" type="password" id="emp_repass" /></td>
        </tr>
        <tr>
          <td height="84" align="center"><input name="pk" type="hidden" id="pk" value="<?php echo $_GET['E']?>" /></td>
          <td align="center"><input type="submit" name="Submit" <?php if(isset($_GET['E'])){echo "value='Update'";}else{?>value="Submit"<?php }?> onclick=" return pass_chk() " /></td>
          <td align="left">&nbsp;</td>
        </tr>
      </table>
        <p>&nbsp;</p>
		<?php
		        
				$lsql = "select * from employee_master ";
				$lrec = mysqli_query($conn,$lsql);
			    $fnum  = mysqli_num_rows($lrec);
		if($fnum > 0)
		{
		?>
        <table width="95%" height="30%" border="0" align="center" cellpadding="0" cellspacing="0" class="<?php echo $lt_A ; ?>">
          <tr class="bg">
            <td width="79" height="37" align="center"> Emp Name</td>
            <td width="116" align="center">Designation</td>
            <td width="117" align="center">Email</td>
            <td width="128" align="center">Mobile</td>
            <td width="100" align="center">Address</td>
            <td width="100" align="center">Authorisation</td>
            <td colspan="2" align="center">Option</td>
          </tr>
          <?php
		        
		
				$l = 1;
				while($lres = mysqli_fetch_assoc($lrec))
				{
				 $designation_id = $lres['designation_id'];
				
				$dsql = "select * from designation_master where designation_id = '$designation_id' ";
				$drec = mysqli_query($conn,$dsql);
				$dres = mysqli_fetch_assoc($drec)
				
				 
				 
				 
			?>
          <tr>
            <td colspan="8" align="center" height="10" style="border-bottom:1px solid #000000"></td>
          </tr>
          <tr >
            <td height="30" align="center"><?php echo $lres['emp_name'];?></td>
            <td align="center"><?php echo $dres['designation'];?></td>
            <td align="center"><?php echo $lres['emp_email'];?></td>
            <td align="center"><?php echo $lres['emp_mobile'];?></td>
            <td align="center"><?php echo $lres['emp_address'];?></td>
            <td align="center"><?php echo $lres['login_type'];?></td>
            <td width="47" align="center" ><a href="employee_entry.php?E=<?php echo $lres['emp_id'];?>">Edit</a></td>
            <td width="55" align="center" ><a href="#" onclick="conf('employee_entry.php?D=<?php echo $lres['emp_id'];?>')">Delete</a></td>
          </tr>
          <tr>
            <td colspan="8" align="center" height="10" style="border-bottom:1px dashed #000000"></td>
          </tr>
          <?php
     $l++;
			}
		?>
        </table></td>
    </tr>
    <tr>
      <td><?php include "includes/footer.php";?></td>
    </tr>
  </table>
        <?php }  ?>
  <p>&nbsp;</p>
</form>
</body>
</html>
