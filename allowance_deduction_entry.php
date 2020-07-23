<?php
include "connection/connection.php";
include "includes/chk_login.php";
include "includes/config.php";

$_SESSION['allow_ded'] = "Y";
if(isset($_POST['Submit']))
	{
		$a_d_name = $_POST['a_d_name'];
		$a_d_amt = $_POST['a_d_amt'];
		$a_d_cal_type = $_POST['a_d_cal_type'];
		$a_d_type = $_POST['a_d_type'];
	 if($_POST['Submit'] == "Submit") 	
	 {		
		
		$sql = "insert into allown_ded_master (a_d_name,a_d_amt,a_d_cal_type,a_d_type)  
		values ('$a_d_name','$a_d_amt','$a_d_cal_type','$a_d_type')";
		mysqli_query($conn,$sql);
		
		echo "
		<script> 
		alert('Data submission complete !!');
		location.replace('allowance_deduction_entry.php')
        </script>
		";  
    
	}
	else if($_POST['Submit'] == "Update")
	{
		$pk = $_POST['pk'];
		
		
		$usql = "update allown_ded_master set a_d_name = '$a_d_name', a_d_amt = '$a_d_amt', a_d_cal_type = '$a_d_cal_type' , a_d_type = '$a_d_type' where a_d_id='$pk'";
		$urec = mysqli_query($conn,$usql);
		echo "<script>
					alert('Data Updated !!');
					location.replace('allowance_deduction_entry.php')	
				</script>";
	}
   }
	
	
	
		
	
	if(isset($_GET['E']))
{
	$E = $_GET['E'];
	
	$esql = "select * from allown_ded_master where a_d_id='$E'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
    
}
	
	if(isset($_GET['D']))
{
	$D = $_GET['D'];
	
	$dlsql = "delete from allown_ded_master where a_d_id='$D'";
	$dlrec = mysqli_query($conn,$dlsql);
	if($dlrec)
	{
		echo "<script>
					alert('Data Deleted !!');
					location.replace('allowance_deduction_entry.php')	
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
      <td align="center"><table width="530" height="284" border="0" align="center">
        <tr>
          <td width="260" height="53" align="right">ALLON_DED_NAME</td>
          <td width="127" align="center">:</td>
          <td width="578" align="left"><input name="a_d_name" type="text" id="a_d_name"  value="<?php echo $eres['a_d_name'];?>" /></td>
        </tr>
        <tr>
          <td height="51" align="right">ALLON_DED_AMT</td>
          <td align="center">:</td>
          <td align="left"><input name="a_d_amt" type="text" id="a_d_amt" value="<?php echo $eres['a_d_amt'];?>" /></td>
        </tr>
        <tr>
          <td height="66" align="right">ALLON_DED_NAME_CAL_TYPE</td>
          <td align="center">:</td>
          <td align="left"><select name="a_d_cal_type" id="a_d_cal_type">
              <option value="%">%</option>
              <option value="+">+</option>
              <option value="-">-</option>
            </select>
          </td>
        </tr>
        <tr>
          <td height="65" align="right">ALLON_DED_TYPE</td>
          <td align="center">:</td>
          <td align="left"><p>
              <label>
              <input type="radio" name="a_d_type" value="a" />
                Allowance </label>
              <br />
              <label>
              <input type="radio" name="a_d_type" value="d" />
                Deduction </label>
              <br />
          </p></td>
        </tr>
        <tr>
          <td align="right"><input name="pk" type="hidden" id="pk" value="<?php echo $_GET['E']?>" /></td>
          <td align="center"><input type="submit" name="Submit"  <?php if(isset($_GET['E'])){echo "value='Update'";}else{?>value="Submit"<?php }?> /></td>
          <td align="left">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
	  <?php 
	  				$lsql = "select * from allown_ded_master ";
				$lrec = mysqli_query($conn,$lsql);
				$fnum  = mysqli_num_rows($lrec);
		if($fnum > 0)
		{
				  ?>
      <table width="95%" height="30%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="bg">
          <td width="116" align="center">Allowance / Deduction Name </td>
          <td width="116" align="center">Allowance / Deduction (amt) </td>
          <td width="116" align="center">Cal Type </td>
          <td width="116" height="37" align="center">Type</td>
          <td colspan="2" align="center">Option</td>
        </tr>
        <?php

				while($lres = mysqli_fetch_assoc($lrec))
				{

				 
				 
			?>
        <tr>
          <td colspan="6" align="center" height="10" style="border-bottom:1px solid #000000"></td>
        </tr>
        <tr >
          <td align="center"><?php echo $lres['a_d_name'];?></td>
          <td align="center"><?php echo $lres['a_d_amt'];?></td>
          <td align="center"><?php echo $lres['a_d_cal_type'];?></td>
          <td height="30" align="center"><?php echo $lres['a_d_type'];?></td>
          <td width="47" align="center" ><a href="allowance_deduction_entry.php?E=<?php echo $lres['a_d_id'];?>">Edit</a></td>
          <td width="55" align="center" ><a href="#" onclick="conf('allowance_deduction_entry.php?D=<?php echo $lres['a_d_id'];?>')">Delete</a></td>
        </tr>
        <tr>
          <td colspan="6" align="center" height="10" style="border-bottom:1px dashed #000000"></td>
        </tr>
        <?php
     $l++;
			}
		?>
      </table>      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td><?php include "includes/footer.php";?></td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>
