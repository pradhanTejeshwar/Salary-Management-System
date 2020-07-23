<?php
session_start();
if($_SESSION['eid'] == "")
{
	echo "<script>
		alert('Please Log In');
		location.replace('index.php');
		</script>";
}
?>