<?php
	// load up global things
	include_once 'autoloader.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- title of our page -->
		<title>TMA - Dashboard</title>

		<!-- include fonts -->
		<link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">

		<!-- need this so everything looks good on mobile devices -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />


		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
	<body>

	<?php if ( isLoggedIn() ) : ?>
		<div class="logged-in-text">Logged in as <b><?php echo $_SESSION['user_info']['first_name']; ?></b></div>
	<?php else : ?>
		<a href="signup.php">
			<div class="button-container">
				<div class="button-container-pad">
					SIGN UP
				</div>
			</div>
		</a>
		<a href="login.php">LOGIN</a>
	<?php endif; ?>	
		
	
		
			
				
		
	
					
					
					
				
			
		
		<hr>



		
		<div class="footer-container">
			<?php if ( isLoggedIn() ) : ?>
				<?php echo 'yes im LOG in'; ?>
				<?php if ( isAdmin() ) : ?>
					<?php echo 'yes im ADMIN in'; ?>
					<div>
						<a class="a-default" href="adminpanel.php">Admin Panel</a>
					</div>
				<?php endif; ?>
				<a class="a-default" href="myaccount.php">My Account</a>			
				<input type = "button" onclick = "logout()" value = "Logout" /> 
				<div>
					
				</div>
			<?php endif; ?>
		</div>


		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		

		<script src="assets/js/app.js"></script>
	</body>

</html>