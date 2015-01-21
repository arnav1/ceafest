<!DOCTYPE html>
<html>
	<head profile="http://www.w3.org/2005/10/profile">
		<link rel="icon"
			type="image/ico"
			href="img/300_1.ico"> <!--change the hyper link reference here to Global settings while deploying-->
			
		<meta charset="UTF-8">
		<title>CEAfest|Register</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/styles.css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="script.js"></script>
		
		<style type="text/css">
		body{
		background-color:#EECD86;
	<!--	background-image:url(img/tan_textured_background_seamless.jpg);
		background-position:top left;
		background-repeat:repeat;
		background-attachment:fixed; -->
		}
		.error{color: #FF0000;}
		.error1{
			color: #FF0000;
			font-size: 20px;
		}
		</style>
	
	</head>
	<body onload="myFunction">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id='cssmenu'>
					<ul>
						<li><a href='index.html'><span>Home</span></a></li>
						<li><a href='event.html'><span>Events</span></a></li>
						<li><a href='#'><span>Workshops</span></a></li>
						<li class='active'><a href='#'><span>Register</span></a></li>
						<li><a href='#'><span>Hospitality</span></a></li>
						<li><a href='sponspage.html'><span>Sponsors</span></a></li>
						<li class='last'><a href='#'><span>Contact Us</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="img/cea_15.png" alt="CEAfest 2015" style="width:304px;height:144px">
			</div>
			<div class="col-md-5 col-md-offset-1">
				<h1>CEAFest 2015: Register</h1>
			</div>
		</div>
	</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4><span class="error">* required fields</span></h4>
					<form class="form-horizontal" action="registered.php" method="post">
						
						<div class="form-group">
							<label for="firstname" class="col-sm-2 control-label">First Name:<span class="error">*</span></label>
							<div class="col-sm-6 input-append">
								<input type="text" class="form-control" placeholder="Enter First Name" name="fname" value="<?php echo $fname;?>"/> <span class="error"><?php echo $fnameErr;?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Last Name:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" placeholder="Enter Last Name" name="lname" value="<?php echo $lname;?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">E-mail:<span class="error">*</span></label>
							<div class="col-sm-6">
								<input type="email" class="form-control" placeholder="Enter E-mail" name="email" value="<?php echo $email;?>"/><span class="error"><?php echo $emailErr;?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="contact" class="col-sm-2 control-label">Contact number:<span class="error">*</span></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" placeholder="+919999999999" name="number" value="<?php echo $number;?>"/><span class="error"><?php echo $numberErr;?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="college" class="col-sm-2 control-label">Select your college:<span class="error">*</span></label>
							<div class="col-sm-6">
								<select class="form-control" name="college" value="<?php echo $college;?>">
									<option>A C CLG OF ENGG AND TECH</option>
									<option>Aalim Muhammed Salegh College of Engineering</option>
									<option>Acharya Nagarjuna University College of Engg. & Tech.</option>
									<option>Aditya Engineering College</option>
									<option>Andhra Loyala Institute of Engineering & Technology</option>
									<option>ANDHRA UNIVERSITY</option>
									<option>Andhra University College of Engineering</option>
									<option>APIIT,RGUKT,RKVALLEY</option>
									<option>Balaji Institute Of Technology And Science</option>
									<option>Bapatla Engineering college</option>
									<option>Bharath University, Chennai</option>
									<option>BITS HYD</option>
									<option>CBIT</option>
									<option>Chaitanya Institute Of Technology & Science</option>
									<option>Chalapathi Institute of Engineering& Technology</option>
									<option>Chalapathi Institute of Technology</option>
									<option>COASTAL INSTITUTE OF TECHNOLOGY</option>
									<option>Dadi Institute of Engineering & Technology</option>
									<option>Daita Mahdusudana Sastry Sri Venkateswara Hindu (DMSSVH) College of Engineering</option>
									<option>Department of Civil Engineering, B.S. Abdur Rahman University</option>
									<option>Department of Civil Engineering, St.Peter's University</option>
									<option>Devineni Venkataramana & Dr. Hima Sekhar MIC College of Technology</option>
									<option>DHANISH AHMED CLG OF ENGG</option>
									<option>DVPSIT</option>
									<option>ERODE SENGUTHAR ENGG CLG</option>
									<option>Gandhiji Institute of Science & Technology</option>
									<option>GAYATRI VIDYA PARISHAD</option>
									<option>Gayatri Vidya Parishad College of Engineering</option>
									<option>GCE SALEM</option>
									<option>GITAM Institute of Technology</option>
									<option>GITAM UNIVERSITY</option>
									<option>Gokaraju Rangaraju Institute of Engineering and Technology</option>
									<option>GOVT CLG OF ENGG</option>
									<option>Gurunank </option>
									<option>Hindustan College of Engineering</option>
									<option>IIT Hyderabad</option>
									<option>IIT Madras</option>
									<option>JERUSALEM CLG OF ENGG</option>
									<option>JNTU</option>
									<option>JNTU COLLEGE OF ENGINEERING</option>
									<option>JNTU Kakinada</option>
									<option>Kakathiya Institute of Technolgy and sciences</option>
									<option>Kallam Haranadh Reddy Institute Of Tech</option>
									<option>Karunya University</option>
									<option>KKR & KSR Institute of Technology & Sciences</option>
									<option>KLU University</option>
									<option>LENDI COLLEGE OF ENGINEERING</option>
									<option>Magna College of Engineering</option>
									<option>Meenakshi Sundararajan Engineering College</option>
									<option>MS RAMAIH INSTITUTE OF TECH</option>
									<option>MVGR COLLEGE OF ENGINEERING</option>
									<option>MVSR</option>
									<option>Narasaraopeta Engineering College</option>
									<option>NEW PRINCE SHRI BHAVANI CLG</option>
									<option>NIT Warangal</option>
									<option>Noble Institute of Science & Technology</option>
									<option>NRI Institute of Technology</option>
									<option>Osmania University</option>
									<option>Pragathi Engineering College</option>
									<option>Prasad V Potluri Siddhartha Institute of Technology</option>
									<option>PRIME Engineering College</option>
									<option>PSG TECH</option>
									<option>Pydah College of Engineering</option>
									<option>RAGHU ENGINEERING COLLEGE</option>
									<option>Raghu Institute of Technology</option>
									<option>RVR & JC College of Engineering</option>
									<option>Sasi Institute of Technology & Engineering</option>
									<option>Sathyabama University</option>
									<option>SENGUTHAR ENGG CLG</option>
									<option>SHIVANI CLG OF ENGG</option>
									<option>SNS CLG OF ENGG</option>
									<option>SOE,CUSAT</option>
									<option>SONA CLG OF TECH</option>
									<option>SR engineering college</option>
									<option>SREE VIDYANIKETAN ENGG CLG</option>
									<option>Sri. Venkateswara College of Engineering</option>
									<option>SRK INSTITUTE OF TECH</option>
									<option>SRK Institute of Technology</option>
									<option>SRM University</option>
									<option>SVUCE</option>
									<option>TCE</option>
									<option>Tirumala Engineering College</option>
									<option>UNIVERSITY CLG OF ENGG,DINDIGUL</option>
									<option>University departments of Anna University, Chennai - CEG Campus</option>
									<option>VASAVI</option>
									<option>Vasireddy Venkatadri Institute of Technology</option>
									<option>VIGNAN CLG OF ENGG</option>
									<option>Vignans Institute of Information Technology</option>
									<option>Viswanadha Institute of Technology & Management</option>
									<option>Vizag Institute of Technology</option>
									<option>VNR</option>
									<option>VR Siddhartha Engineering College</option>
								</select><span class="error"><?php echo $collegeErr;?></span>
								<span class="help-text">Your college not on the list? Send us an email at cea15reg@gmail.com!</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="accommodation" class="col-sm-2 control-label">Accommodation Needed?<span class="error">*</span></label>
							<div class="col-sm-6">
								<label class="radio-inline">
									<input type="radio" name="accommodationRadio" <?php if (isset($accommodationRadio) && $accommodationRadio=="yes") echo "checked";?> value="yes"/>Yes
								</label>
								<label class="radio-inline">
									<input type="radio" name="accommodationRadio" <?php if (isset($accommodationRadio) && $accommodationRadio=="no") echo "checked";?> value="no"/>No
								</label>
								<span class="error"><?php echo $accommodationRadioErr;?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="gender" class="col-sm-2 control-label">Gender:<span class="error">*</span></label>
							<div class="col-sm-6">
								<label class="radio-inline">
									<input type="radio" name="genderRadio" <?php if (isset($genderRadio) && $genderRadio=="male") echo "checked";?> value="male"/>Male
								</label>
								<label class="radio-inline">
									<input type="radio" name="genderRadio" <?php if (isset($genderRadio) && $genderRadio=="female") echo "checked";?> value="female"/>Female
								</label>
								<span class="error"><?php echo $genderRadioErr;?></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
								<button type="submit" class="btn btn-success">Submit</button>
								<button type="reset" class="btn btn-primary">Clear</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>
