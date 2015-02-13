<?php
//continue last session
session_start(); //this is removed because this is being included in the index page
//stop session
session_destroy();
header("location:login.php");

?>
