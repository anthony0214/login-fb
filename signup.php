<?php
	// load up global things
	include_once 'autoloader.php';

	

	// only if you are logged out can you view the signup page
	loggedInRedirect();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- title of our page -->
		<title>TMA | Sign Up</title>

		<!-- include fonts -->
		<link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

		<!-- need this so everything looks good on mobile devices -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

	</head>
	<body>
						<form id="signup_form" name="signup_form">
							<div id="error_message" class="error-message">
							</div>
							<div>
								<div class="section-label">Email</div>
								<div><input class="form-input" type="text" name="email" value="test@gmail.com"/></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">First Name</div>
								<div><input class="form-input" type="text" name="first_name" value="test"/></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Last Name</div>
								<div><input class="form-input" type="text" name="last_name" value="test"/></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Password</div>
								<div><input class="form-input" type="password" name="password" value="welcome@123"/></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Confirm Password</div>
								<div><input class="form-input" type="password" name="confirm_password" value="welcome@123" /></div>
							</div>
						</form>
						
						<input type = "button" onclick = "processSignup()" value = "Signup2" /> 
						
						<a href="<?php echo getFacebookLoginUrl(); ?>" class="a-fb">
							<div class="fb-button-container">
								Login with Facebook (PHP)
							</div>
						</a>
						
						
						<label>Already a member?</label> <a class="a-default" href="login.php">Login</a>
						
					
				
			
		
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script src="assets/js/app.js"></script>
	</body>
</html>