<!DOCTYPE html>
<html>
	<head profile="http://www.w3.org/2005/10/profile">
		<link rel="icon"
			type="image/ico"
			href="img/300_1.ico"> <!--change the hyper link reference here to Global settings while deploying-->
			
		<meta charset="UTF-8">
		<title>CEAfest|Register</title>
		
		<link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Amaranth">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/styles.css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="script.js"></script>
		
		<style type="text/css">
		body {
		font-family: 'Amaranth',serif;
		}
		.bgimage{
			opacity: 0.9;
			filter: alpha(opacity=90);
		}
		.error1{
			color: #FF0000;
			font-size: 40px;
			text-align: center;
		}
		#fb{
                position: fixed;
                top: 92%;
                left: 3%;
                height: 35px;
                }
            
            #yt{
                position: fixed;
                top: 92%;
                left: 5%;
                height: 35px;
            }
            
             #cea{
                position: fixed;
                top: 92%;
                left: 7%;
                height: 35px;
            }
			h1 {
			text-align:center;
			font-weight:bold;
			color:#781E18;
		}
		</style>
	
	</head>
	<body>
	
	<div style='position:absolute;z-index:-1;left:0;top:0;width:100%;height:100%' class="bgimage">
		<img src='green.jpg' style='width:100%;height:100%' alt='[]' />
	</div>
	
	<a href="https://www.facebook.com/ceaiitm"><img src="dark/appbar.social.facebook.png" id="fb"></a>
	<a href="https://www.youtube.com/channel/UCB6WxnHloUrulRgfWoXYYIA"><img src="dark/appbar.youtube.png" id="yt"></a>
	<a href="http://www.ceaiitm.org/cea"><img src="dark/appbar.social.wordpress.png" id="cea"></a>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id='cssmenu'>
					<ul>
						<li><a href='index.html'><span>Home</span></a></li>
						<li><a href='event.html'><span>Events</span></a></li>
						<li><a href='workshop.html'><span>Workshops</span></a></li>
						<li class='active'><a href='#'><span>Register</span></a></li>
						<li><a href='hospi.html'><span>Hospitality</span></a></li>
						<li><a href='Sponspage.html'><span>Sponsors</span></a></li>
						<li><a href='contact.html'><span>Contact Us</span></a></li>
						<li class="last"><a href="../cea/NC3_Problem_Statement.pdf" target="_blank">NCCC</a></li>
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
					if (!preg_match("/^[0-9+]+$/", $number)) {
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
				if (mysqli_query($conn, $sql)) {
				echo "<span class=\"error1\">New record created successfully</span>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			} else {
				echo "<span class=\"error1\">Please complete all the fields.</span>";
			}

			

			mysqli_close($conn);
		?>
	</body>
</html>
