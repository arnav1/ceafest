<?php
	session_start();
	include('config.php');
	if($_SESSION['auth'] == 1) {
		header("location:index.php");
	}
	else{
		if($_GET['conf_code']){
			$conf_code = $_GET['conf_code'];
			$q = "UPDATE users SET confirmed=1 WHERE conf_code='$conf_code'";
			$r = mysql_query($q);
			$q = "SELECT * FROM users WHERE conf_code='$conf_code'";
			$r = mysql_query($q);
			if(mysql_num_rows($r) == 1){
				$l = mysql_fetch_assoc($r);
				$_SESSION['auth'] = 1;
				$_SESSION['name'] = $l['fullname'];
				$_SESSION['id'] = $l['id'];
				$_SESSION['email'] = $l['email'];
				$_SESSION['college'] = $l['college'];
				header("Location: index.php");
			}
			else{
				echo "An error has occured. Please contact: webops@ceaiitm.org.";
			}
		}
		if($_POST['submit']){
			$email = $_POST['email'];
			$password = sha1($_POST['password']);
			if($email && $password){
				$q = "SELECT email FROM users WHERE email='$email'";
				$r = mysql_query($q);
				if(mysql_num_rows($r) > 0){
					$q = "SELECT * FROM users WHERE (email='$email' AND hashed_password='$password')";
					$r = mysql_query($q);
					if(mysql_num_rows($r) > 0){
						$l = mysql_fetch_assoc($r);
						if($l['confirmed'] == 1){
							$_SESSION['auth'] = 1;
							$_SESSION['name'] = $l['fullname'];
							$_SESSION['id'] = $l['id'];
							$_SESSION['email'] = $l['email'];
							$_SESSION['college'] = $l['college'];
							/*$user_id = $_SESSION['id'];
							$q2 = "INSERT INTO users_quizzes (user_id,quiz_id,registered) VALUES ($user_id,1,1)";
							$r2 = mysql_query($q2);*/
							header("location:index.php");
						}
						elseif($l['confirmed'] == 0){
							$conf_code = $l['conf_code'];
							$fullname = $l['fullname'];
							$name = explode(" ",$fullname);
							$name = $name[0];
							$to = $email;
							$sub = "Verify your email address";
							$msg4 = '<html><body><div id="email" style="font-family: century gothic;font-size: 16px;">
										<p>Hi '.$name.',</p>
										<p>Thank you for signing up for CEA. Please click the "Verify" button below to verify your email id. This will help us sending you the updates regarding CEA Online Quizzes and other CEA events.</p>
										<a href="http://ceaiitm.org/2013b/onlinequiz/login.php?conf_code='.$conf_code.'" target="_blank" style="padding: 5px 20px;background: #28b7ed;margin: 20px 40px;color: white;font-size: 25px;text-decoration: none;border-radius:5px;">Verify</a>
										<p style="font-size:12px;">Please ignore this mail if you did not sign up for CEA.</p
										
										<p>Thank you,<br/>
										Core, <br/>
										Web Operations,<br/>
										CEA IIT Madras.<br/></p>
									</div></body></html>';
							
							$headers = "From:CEA Web Operations <webops@ceaiitm.org>\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
							mail($to,$sub,$msg4,$headers);
							$msg3 = 'Just one more step. Please check your mail <span style="color:green;">('.$email.')</span> to verify your email address.';
						}
					}
					else{
						$msg = "Incorrect email/password.";
					}
				}
				else{
					$msg = "You have not signed up yet. Please visit the <a href='http://ceaiitm.org' target='_blank'>CEA website</a> and sign up.";
				}
			}
			else{
				$msg = "Please fill all the fields.";
			}
		}
		else if($_POST['submit2']){
			$fullname = $_POST['fullname'];
            $college= $_POST['college'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			
			
			if($fullname && $email && $phone && $password && $repassword){
				if(filter_var($email,FILTER_VALIDATE_EMAIL)){
					if($password == $repassword){
						$select = "SELECT * FROM users WHERE email='$email'";
						$query = mysql_query($select);
						$numrows = mysql_num_rows($query);
						
						if($numrows != 0){
							$msg2 = "<span style='color:green;'>You have already sign up with CEA. Please login above.</span>";
						}
						else{
							$hashed_password = sha1($password);
                                                        $conf_code = md5(uniqid(rand()));
							$insert = "INSERT INTO users (fullname,email,phone,college,hashed_password,conf_code) VALUES('$fullname','$email','$phone','$college','$hashed_password','$conf_code')";
							$query=mysql_query($insert);

							
							
							if(!$query){
								$msg2 = "An error has occurred. Contact : webops@ceaiitm.org";
							}
							else{
								$name = explode(" ",$fullname);
							$name = $name[0];
							$to = $email;
							$sub = "Verify your email address";
							$msg4 = '<html><body><div id="email" style="font-family: century gothic;font-size: 16px;">
										<p>Hi '.$name.',</p>
										<p>Thank you for signing up for CEA. Please click the "Verify" button below to verify your email id. This will help us sending you the updates regarding CEA Online Quizzes and other CEA events.</p>
										<a href="http://ceaiitm.org/2013b/onlinequiz/login.php?conf_code='.$conf_code.'" target="_blank" style="padding: 5px 20px;background: #28b7ed;margin: 20px 40px;color: white;font-size: 25px;text-decoration: none;border-radius:5px;">Verify</a>
										<p style="font-size:12px;">Please ignore this mail if you did not sign up for CEA.</p
										
										<p>Thank you,<br/>
										Core, <br/>
										Web Operations,<br/>
										CEA IIT Madras.<br/></p>
									</div></body></html>';
							
							$headers = "From:CEA Web Operations <webops@ceaiitm.org>\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
							mail($to,$sub,$msg4,$headers);
							$msg3 = 'Just one more step. Please check your mail <span style="color:green;">('.$email.')</span> to verify your email address.';
                                                                  
							}
						}
						//mysql_close($server_connect);
					}
					else{
						$msg2 = "Passwords entered do not match.";
					}
				}
				else{
					$msg2 = "Please enter a valid email id.";
				}
			}
			else{
				$msg2 = "Please fill all the fields.";
			}
		}
	}
?>
<html>
<head>
	<title>Login | CEA Online Quiz</title>
	<link rel="shortcut icon" href="../images/favicon.ico" />
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<style>
		body{
			font-family: century gothic;
		}
	</style>
</head>
<body>
	<?php include('header.php'); ?>
	<div id="login">
		<h3>Login with your CEA Quiz credentials</h3>
		<div id="msg3" style="color:green;"><p><?php echo $msg3; ?></p></div>
		<div id="msg" style="color:red;"><?php echo $msg; ?></div>
		<form id="login_form" action="login.php" method="post">
			<input type="text" name="email" value="" placeholder="Email"/>
			<input type="password" name="password" value="" placeholder="Password"/><br/>
			<input type="submit" id="submit" name="submit" value="Login"/>
		</form>
		<h4>Don't have a CEA Quiz account? Sign up below.</h4>
		<div id="msg2" style="color:red;"><?php echo $msg2; ?></div>
		<form id="sign_up_form" action="login.php" method="post">
			<input type="text" name="fullname" value="<?php echo $fullname;?>" placeholder="Fullname"/>
                        <input type="text" name="college" value="<?php echo $college;?>" placeholder="College"/>
			<input type="text" name="email" value="<?php echo $email;?>" placeholder="Email"/>
			<input type="text" name="phone" value="<?php echo $phone;?>" placeholder="Phone"/>
			<input type="password" name="password" value="" placeholder="Password"/>
			<input type="password" name="repassword" value="" placeholder="Repeat password"/><br/>
			<input type="submit" id="submit" name="submit2" value="Sign up"/>
		</form>
		<p>Contact <a href="mailto://webops@ceaiitm.org" target="_blank" style="color:blue;">webops@ceaiitm.org</a> in case you forgot password or for any other queries.</p>
	</div>
</body>
</html>