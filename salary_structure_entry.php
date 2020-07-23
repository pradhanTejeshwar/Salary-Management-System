<?php
include "includes/chk_login.php";
include "includes/config.php";
include "connection/connection.php";

$_SESSION['sal_entry'] = "Y";
if(isset($_POST['Submit']))
	{
		$designation = $_POST['designation'];
		$basic_sal = $_POST['basic_sal'];
		$agp = $_POST['agp'];
	          
		$sql_d = "select * from designation_master where designation = '$designation'";
		$rec_d = mysqli_query($conn,$sql_d);
		$res_d = mysqli_fetch_assoc($rec_d);
		$designation_id = $res_d['designation_id'];
	 
	 if($_POST['Submit'] == "Submit") 	
	 {				
		$sql = "insert into salary_structure (designation_id,basic_sal,agp)  
		values('$designation_id','$basic_sal','$agp')";
		mysqli_query($conn,$sql);
		
		echo "
		<script> 
		alert('Data submission complete !!');
		location.replace('salary_structure_entry.php')
        </script>
		";  
    
	}
	else if($_POST['Submit'] == "Update")
	{
	 $pk = $_POST['pk'];
		
		
		$usql = "update salary_structure set basic_sal = '$basic_sal', agp = '$agp', designation_id = '$designation_id'  where struc_id='$pk'";
		$urec = mysqli_query($conn,$usql);
		echo "<script>
					alert('Data Updated !!');
					location.replace('salary_structure_entry.php')	
				</script>";
	}	
}		
	
	
	if(isset($_GET['E']))
{
	$E = $_GET['E'];
	
	$esql = "select * from salary_structure where struc_id='$E'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
    
}
	
	if(isset($_GET['D']))
{
	$D = $_GET['D'];
	
	$dlsql = "delete from salary_structure where struc_id='$D'";
	$dlrec = mysqli_query($conn,$dlsql);
	if($dlrec)
	{
		echo "<script>
					alert('Data Deleted !!');
					location.replace('salary_structure_entry.php')	
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
      <td align="center"><table width="489" height="275" border="0" align="center">
        <tr>
          <td width="260" align="right">DESIGNATION</td>
          <td width="127" align="center">:</td>
          <td width="578" align="left"><select name="designation" id="designation">
              <option selected="selected">--Designation--</option>
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
            </select>          </td>
        </tr>
        <tr>
          <td align="right">BASIC_SAL</td>
          <td align="center">:</td>
          <td align="left"><input name="basic_sal" type="text" id="basic_sal" value="<?php echo $eres['basic_sal'];?>" />          </td>
        </tr>
        <tr>
          <td align="right">AGP</td>
          <td align="center">:</td>
          <td align="left"><input name="agp" type="text" id="agp" value="<?php echo $eres['agp'];?>" /></td>
        </tr>
        <tr>
          <td align="right"><input name="pk" type="hidden" id="pk" value="<?php echo $_GET['E']?>" /></td>
          <td align="center"><input type="submit" name="Submit" <?php if(isset($_GET['E'])){echo "value='Update'";}else{?>value="Submit"<?php }?> /></td>
          <td align="left">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
	  <?php
		        
		$lsql = "select * from salary_structure ";
		$lrec = mysqli_query($conn,$lsql);
        $fnum  = mysqli_num_rows($lrec);
		if($fnum > 0)
		{
		?>	
      <table width="95%" height="30%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="bg">
          <td width="116" align="center">Designation</td>
          <td width="116" align="center">Basic SAl <span class="foot_txt">(Rs.)</span></td>
          <td width="116" height="37" align="center">AGP<span class="foot_txt">(Rs.)</span></td>
          <td colspan="2" align="center">Option</td>
        </tr>
        <?php
		        

			
				while($lres = mysqli_fetch_assoc($lrec))
				{
				   $designation_id = $lres['designation_id'];
				
				$dsql = "select * from designation_master where designation_id = '$designation_id' ";
				$drec = mysqli_query($conn,$dsql);
				$dres = mysqli_fetch_assoc($drec)
				 
				 
				 
			?>
        <tr>
          <td colspan="5" align="center" height="10" style="border-bottom:1px solid #000000"></td>
        </tr>
        <tr >
          <td align="center"><?php echo $dres['designation'];?></td>
          <td align="center"><?php echo $lres['basic_sal'];?></td>
          <td height="30" align="center"><?php echo $lres['agp'];?></td>
          <td width="47" align="center" ><a href="salary_structure_entry.php?E=<?php echo $lres['struc_id'];?>">Edit</a></td>
          <td width="55" align="center" ><a href="#" onclick="conf('salary_structure_entry.php?D=<?php echo $lres['struc_id'];?>')">Delete</a></td>
        </tr>
        <tr>
          <td colspan="5" align="center" height="10" style="border-bottom:1px dashed #000000"></td>
        </tr>
        <?php
     $l++;
			}
		?>
      </table> 
	  <?php } ?>     <p>&nbsp;</p></td>
    </tr>
    
    <tr>
      <td><?php include "includes/footer.php";?></td>
    </tr>
  </table>
</form>
</body>
</html>
