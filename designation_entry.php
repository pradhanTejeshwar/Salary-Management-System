<?php
include "connection/connection.php";
include "includes/chk_login.php";
include "includes/config.php";

$_SESSION['designation_entry'] = "Y";
if(isset($_POST['Submit']))
	{
		$designation = $_POST['designation'];
		
	 if($_POST['Submit'] == "Submit") 	
	 {		
		$sql = "insert into designation_master (designation) values ('$designation')";
		mysqli_query($conn,$sql);
		
		echo "
		<script> 
		alert('Data submission complete !!');
		location.replace('designation_entry.php')
        </script>
		";  
    
	}	
	else if($_POST['Submit'] == "Update")
	{
	 $pk = $_POST['pk'];
		
		
		$usql = "update designation_master set designation = '$designation' where designation_id='$pk'";
		$urec = mysqli_query($conn,$usql);
		echo "<script>
					alert('Data Updated !!');
					location.replace('designation_entry.php')	
				</script>";
	}	
}		
	
	
if(isset($_GET['E']))
{
	$E = $_GET['E'];
	
	$esql = "select * from designation_master where designation_id='$E'";
	$erec = mysqli_query($conn,$esql);
	$eres = mysqli_fetch_assoc($erec);
    
}
	
	if(isset($_GET['D']))
{
	$D = $_GET['D'];
	
	$dlsql = "delete from designation_master where designation_id='$D'";
	$dlrec = mysqli_query($conn,$dlsql);
	if($dlrec)
	{
		echo "<script>
					alert('Data Deleted !!');
					location.replace('designation_entry.php')	
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
      <td align="center"><table width="447" height="130" border="0" align="center">
        <tr>
          <td width="151" height="98" align="right">DESIGNATION</td>
          <td width="71" align="center">:</td>
          <td width="211" align="left"><input name="designation" type="text" id="designation" value="<?php echo $eres['designation'];?>" /></td>
        </tr>
        <tr>
          <td height="26" align="right"><input name="pk" type="hidden" id="pk" value="<?php echo $_GET['E']?>" /></td>
          <td align="center"><input type="submit" name="Submit" <?php if(isset($_GET['E'])){echo "value='Update'";}else{?>value="Submit"<?php }?>/></td>
          <td align="left">&nbsp;</td>
        </tr>
        <?php
		        
				$lsql = "select * from designation_master ";
				$lrec = mysqli_query($conn,$lsql); 
				$fnum  = mysqli_num_rows($lrec);
		if($fnum > 0)
		{

				
		?>		   
	
	  </table>
      <p>&nbsp;</p>
      <table width="95%" height="30%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="bg">
          <td width="116" height="37" align="center">Designation</td>
          <td colspan="2" align="center">Option</td>
        </tr>
        <?php
		        
				while($lres = mysqli_fetch_assoc($lrec))
				{
				
				 
				 
				 
			?>
        <tr>
          <td colspan="3" align="center" height="10" style="border-bottom:1px solid #000000"></td>
        </tr>
        <tr >
          <td height="30" align="center"><?php echo $lres['designation'];?></td>
          <td width="47" align="center" ><a href="designation_entry.php?E=<?php echo $lres['designation_id'];?>">Edit</a></td>
          <td width="55" align="center" ><a href="#" onclick="conf('designation_entry.php?D=<?php echo $lres['designation_id'];?>')">Delete</a></td>
        </tr>
        <tr>
          <td colspan="3" align="center" height="10" style="border-bottom:1px dashed #000000"></td>
        </tr>
        <?php
     $l++;
			}
		?>
      </table>      <p>&nbsp;</p></td>
    <?php } ?>
	</tr>
    <tr>
      <td><?php include "includes/footer.php";?></td>
    </tr>
  </table>
</form>
</body>
</html>

