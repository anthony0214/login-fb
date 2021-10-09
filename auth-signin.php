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
<html lang="en">

<head>

	<title>TMA | Login</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
	<meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
	<meta name="author" content="DashboardKit ">


	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="assets/fonts/feather.css">
	<link rel="stylesheet" href="assets/fonts/fontawesome.css">
	<link rel="stylesheet" href="assets/fonts/material.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css" id="main-style-link">

	<!-- custom css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
	<link rel="stylesheet" href="assets/css/app.css"> 




</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
					<form id="login_form" name="login_form" autocomplete="off" method="POST">
						<!-- <img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4"> -->
						<p class="lead">TMA | Login</p>
						<!-- <h4 class="mb-3 f-w-400">Signin</h4> -->

						
						
							
						

						<div class="input-group mb-3">
						<span class="input-group-text"><i data-feather="mail"></i></span>
							<?php if ( isset( $_SESSION['fb_user_info']['email'] ) ? $_SESSION['fb_user_info']['email'] : '' ) : // pre populate with facebook email ?>
								<?php $inputEmail = $_SESSION['fb_user_info']['email']; ?>
							<?php else : ?>
								<?php $inputEmail = ''; ?>
							<?php endif; ?>
							<!-- <input class="form-input" type="text" name="email" value="<?php echo $inputEmail; ?>" /> -->
							<input type="email" class="form-control" placeholder="Email address" name="email">
						</div>

						<div class="input-group mb-4">
							<span class="input-group-text"><i data-feather="lock"></i></span>
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>


						
					</form>
					<button class="btn btn-block btn-primary mb-4" onclick ="processLogin()">Signin</button>

					
					<div class="align-items-center text-center mb-3">-OR-</div>


					<!-- <a href="<?php echo getFacebookLoginUrl(); ?>" class="fb btn mb-4">
						<i data-feather="facebook" ></i> Login with Facebook
					</a> -->

					<button class="btn btn-block btn-primary mb-4 fb" onclick ="fbLogin()">
					<i data-feather="facebook" ></i>Login with Facebook 
					</button>

	

					
					<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.php" class="f-w-400">Signup</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

	<!-- Custom Js -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="assets/js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script>
    $("body").append('<div class="fixed-button active"><a href="https://gumroad.com/dashboardkit" target="_blank" class="btn btn-md btn-success"><i class="material-icons-two-tone text-white">shopping_cart</i> Upgrade To Pro</a> </div>');
</script>




<script>
    $("body").append('<div class="fixed-button active"><a href="https://gumroad.com/dashboardkit" target="_blank" class="btn btn-md btn-success"><i class="material-icons-two-tone text-white">shopping_cart</i> Upgrade To Pro</a> </div>');
</script>


</body>

</html>
