<?php
session_start();
?>
<div id="header">
	<div id="online_quiz"><h2>CEA Online Quiz</h2></div>
	<div id="user_name"><span><?php if($_SESSION['auth'] == 1){echo "Logged in as ".$_SESSION['name'];} ?></span></div>
</div>