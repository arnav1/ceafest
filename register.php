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
		
		<style type="text/css">
		body{
		background-color:rgb(0,0,0);
		background-image:url(img/tan_textured_background_seamless.jpg);
		background-position:top left;
		background-repeat:repeat;
		background-attachment:fixed;
		}
		.error{color: #FF0000;}
		</style>
	
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img src="img/cea_15.png" alt="CEAfest 2015" style="width:304px;height:144px">
				</div>
			</div>
		</div>
		
		<?php
			// define variables and set to empty values
			$fnameErr = $emailErr = $genderRadioErr = $numberErr = $collegeErr = $accommodationRadioErr ="";
			$fname = $lname = $email = $number = $genderRadio = $accommodationRadio = $college = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["fname"])) {
					$fnameErr = "Name is required";
				} else {
					$fname = test_input($_POST["fname"]);
				// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
						$fnameErr = "Only letters and white space allowed"; 
					}
				}
   
				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				} else {
					$email = test_input($_POST["email"]);
				// check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$emailErr = "Invalid email format"; 
					}
				}
				
				if (empty($_POST["number"])) {
					$numberErr = "Name is required";
				} else {
					$number = test_input($_POST["number"]);
				// check if number has only numbers
					if (!preg_match("/^[0-9]+$/", $number)) {
						$numberErr = "Only numbers allowed"; 
					}
				}
     
				if (empty($_POST["lname"])) {
					$lname = "";
				} else {
					$lname = test_input($_POST["lname"]);
				}

				if (empty($_POST["college"])) {
					$collegeErr = "College is required";
				} else {
					$college =$_POST["college"];
				}

				if (empty($_POST["accommodationRadio"])) {
					$accommodationRadioErr = "Information is required";
				} else {
					$accommodationRadio = test_input($_POST["accommodationRadio"]);
				}
				
				if (empty($_POST["genderRadio"])) {
					$genderRadioErr = "Gender is required";
				} else {
					$genderRadio = test_input($_POST["genderRadio"]);
				}
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4><span class="error">* required fields</span></h4>
					<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						
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
									<option>IIT Madras</option>
									<option>IIT Bombay</option>
									<option>IIT Delhi</option>
									<option>IIT Kharagpur</option>
									<option>IIT Kanpur</option>
								</select><span class="error"><?php echo $collegeErr;?></span>
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
		
		<?php
		// Create connection
			$conn = mysqli_connect("localhost", "ceaiitm", "lightmachaa6$", "ceaiitm_cae2015");
		// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			if (!($fname=="" or $email=="" or $number=="" or $genderRadio=="" or $accommodationRadio=="" or $college==""))	{
				$sql = "INSERT INTO users2015 (fname, lname, email, phone, college, accommodation, gender) 
				VALUES ('$fname', '$lname', '$email', '$number', '$college', '$accommodationRadio', '$genderRadio')";
				echo "<span class=\"error\">New record created successfully!</span>";
			} else {
				echo "<span class=\"error\">Entry not made, waiting for input.</span>";
			}

#			if (mysqli_query($conn, $sql)) {
#				echo "New record created successfully";
#			} else {
#				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
#			}

			mysqli_close($conn);
		?>
		
	</body>
</html>
