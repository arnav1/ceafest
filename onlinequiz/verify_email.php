<?php
	include('config.php');
	
	$conf_code = $_GET['conf_code'];
	
	$q = "UPDATE users SET confirmed=1 WHERE conf_code='$conf_code'";
	$r = mysql_query($q);
	if(mysql_affected_rows() == 1){
		header("Location: index.php");
	}
	else{
		echo "An error has occured. Please contact: webops@ceaiitm.org.";
	}
?>