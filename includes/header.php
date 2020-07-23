<?php
include "includes/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="../js/all.js">

</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="bg"><img src="images/logo.jpg" width="300" height="150" /><span class="maintxtB">WELCOME :- &nbsp; <?php echo $_SESSION['ename']; ?></span></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr align="center" valign="middle">
        <td width="17%" height="30" class="nav_bg"><a href="dashboard.php" class="maintxtB">DASHBOARD</a></td>
        <td width="16%" class="nav_bg">&nbsp;</td>
        <td width="17%" class="nav_bg">&nbsp;</td>
        <td width="16%" class="nav_bg">&nbsp;</td>
        <td width="17%" class="nav_bg">&nbsp;</td>
        <td width="17%" class="nav_bg"><a href="#" onclick="conf('logout.php')" class="maintxtB">Logout</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
</table>
</body>
</html>
