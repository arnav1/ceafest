<!DOCTYPE html>
<html>
	<head profile="http://www.w3.org/2005/10/profile">
		<link rel="icon"
			type="image/ico"
			href="img/300_1.ico"> <!--change the hyper link reference here to Global settings while deploying-->
			
		<meta charset="UTF-8">
		<title>CEAfest|Payment</title>
		
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
		.error{color: #FF0000;}
		.error1{
			color: #FF0000;
			font-size: 20px;
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
				<h1>CEAFest 2015: Payments</h1>
			</div>
		</div>
	</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4><span class="error">* required fields</span></h4>
					<form class="form-horizontal" action="paymentconfirm.php" method="post">
						
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
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59208647-1', 'auto');
  ga('send', 'pageview');

</script>
	</body>
</html>
