<html>
	<head>
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
		</style>
	
	</head>
	<body>
		<br/><br/><br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal" action="registered.php" method="POST">
						
						<div class="form-group">
							<label for="firstname" class="col-sm-2 control-label">First Name:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" placeholder="Enter First Name"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Last Name:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" placeholder="Enter Last Name"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">E-mail:</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" placeholder="Enter E-mail"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="contact" class="col-sm-2 control-label">Contact number:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" placeholder="+919999999999"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="college" class="col-sm-2 control-label">Select your college:</label>
							<div class="col-sm-6">
								<select class="form-control">
									<option>IIT Madras</option>
									<option>IIT Bombay</option>
									<option>IIT Delhi</option>
									<option>IIT Kharagpur</option>
									<option>IIT Kanpur</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="accommodation" class="col-sm-2 control-label">Accommodation Needed?</label>
							<div class="col-sm-6">
								<label class="radio-inline">
									<input type="radio" name="accommodationRadio" value="yes"/>Yes
								</label>
								<label class="radio-inline">
									<input type="radio" name="accommodationRadio" value="no"/>No
								</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="gender" class="col-sm-2 control-label">Gender:</label>
							<div class="col-sm-6">
								<label class="radio-inline">
									<input type="radio" name="genderRadio" value="male"/>Male
								</label>
								<label class="radio-inline">
									<input type="radio" name="genderRadio" value="female"/>Female
								</label>
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
