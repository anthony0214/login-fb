<?php
	// load up global things
	include_once 'autoloader.php';

	if ( isset( $_GET['state'] ) && FB_APP_STATE == $_GET['state'] ) { // coming from facebook
		// try and log the user in with $_GET vars from facebook 
		$fbLogin = tryAndLoginWithFacebook( $_GET );
	}

	// only if you are logged out can you view the login page
	loggedInRedirect();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- title of our page -->
		<title>TMA | Login</title>

		<!-- include fonts -->
		<link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

		<!-- need this so everything looks good on mobile devices -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

	
	</head>
	<body>

	<?php 
	
			if(isLoggedIn()){
				echo "<br>mka login ku!";
			}else{
				echo '<br>ekupa maka login';
			}
		?>
		
	<form id="login_form" name="login_form">
		<div id="error_message" class="error-message">
			<?php if ( isset( $_SESSION['eci_login_required_to_connect_facebook'] ) && $_SESSION['eci_login_required_to_connect_facebook'] ) : // enter password to connect account ?>
				<div style="margin-bottom:10px;">
					An account already exists with that email address. To connect your Facebook account, enter your password.
				</div>
			<?php endif; ?>
		</div>
		
		<div class="section-label">Email</div>
		<?php if ( isset( $_SESSION['fb_user_info']['email'] ) ? $_SESSION['fb_user_info']['email'] : '' ) : // pre populate with facebook email ?>
			<?php $inputEmail = $_SESSION['fb_user_info']['email']; ?>
		<?php else : ?>
			<?php $inputEmail = ''; ?>
		<?php endif; ?>
		<input class="form-input" type="text" name="email" value="<?php echo $inputEmail; ?>" />
		
		
	
		<div class="section-label">Password</div>
		<div><input class="form-input" type="password" name="password" /></div>
		
	</form>

	
	<input type = "button" onclick = "processLogin()" value = "Login2" /> 
	
						
	<div class="section-action-container">
		<div id="error_message_fb_php" class="error-message">
			<?php if ( !empty( $fbLogin['status'] ) && 'fail' == $fbLogin['status'] ) : // we have a facebook error to display ?>
				<?php echo $fbLogin['message']; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="section-action-container">
		<a href="<?php echo getFacebookLoginUrl(); ?>" class="a-fb">
			<div class="fb-button-container">
				Login with Facebook (PHP)
			</div>
		</a>
	</div>
						
	
	<label>Not a member?</label> 
	<a href="signup.php">Sign Up</a>
	
					
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="assets/js/app.js"></script>
	</body>
</html>