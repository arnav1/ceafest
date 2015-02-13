<?php
	include('config.php');
	
	
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	
	$q = "SELECT * FROM users WHERE (email='$email' AND hashed_password='$password')";
	$r = mysql_query($q);
	$l = mysql_fetch_assoc($r);
	$fullname = $l['fullname'];
	$name = explode(" ",$fullname);
	$name = $name[0];
	
	$conf_code = $l['conf_code'];
	
	$to = $email;
	$sub = "Verify your email address";
	$msg = '<html><body><div id="email" style="font-family: century gothic;font-size: 16px;">
				<p>Hi '.$name.',</p>
				<p>Thank you for signing up for CEA. Please click the "Verify" button below to verify your email id. This will help us sending you the updates regarding CEA Online Quizzes and other CEA events.</p>
				<a href="http://ceaiitm.org/2013/onlinequiz/verify_email.php?conf_code='.$conf_code.'" target="_blank" style="padding: 5px 20px;background: #28b7ed;margin: 20px 40px;color: white;font-size: 25px;text-decoration: none;border-radius:5px;">Verify</a>
				<p style="font-size:12px;">Please ignore this mail if you did not sign up for CEA.</p
				
				<p>Thank you,<br/>
				Core, <br/>
				Web Operations,<br/>
				CEA IIT Madras.<br/></p>
			</div></body></html>';
	
	$headers = "From:CEA Web Operations <webops@ceaiitm.org>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	if($_POST['submit']){
		mail($to,$sub,$msg,$headers);
		$msg1 = "Check you mail!";
	}
	
	
?>
<html>
	<head>
		<title>CEA email test</title>
	</head>
	<body>
		<?php echo $msg1.", ".$name.", ".$conf_code;?>
		<form action="email_test.php" method="post">
			Email:<input type="text" name="email" value=""/><br/>
			Password:<input type="password" name="password" value=""/><br/>
			<input type="submit" name="submit" value="Submit"/><br/>
		</form>
	</body>
</html>