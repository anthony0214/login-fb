<?php
	// load up global things
	include_once '../autoloader.php';

	// check for user with email address
	$userInfo = getUserWithEmailAddress( trim( $_POST['email'] ) );

	if ( '' == $_POST['email'] || empty( $userInfo ) ) { // no email or password is invalid
		$status = 'fail';
		$message = 'Invalid Email or Password'; //invalid email
	} elseif ( '' == $_POST['password'] || !password_verify( $_POST['password'], $userInfo['password'] ) ) { // password check
		$status = 'fail';
		$message = 'Invalid Email or Password'; //invalid password
	} else { // all good
		$status = 'ok';
		$message = '';

		if ( isset( $_SESSION['fb_user_info']['id'] ) ) { // if we have facebook id save it
			updateRow( 'users', 'fb_user_id', $_SESSION['fb_user_info']['id'], $userInfo['id'] );
		}

		if ( isset( $_SESSION['fb_access_token'] ) ) { // if we have an access token save it
			updateRow( 'users', 'fb_access_token', $_SESSION['fb_access_token'], $userInfo['id'] );
		}

		if ( isset( $_SESSION['oauth_token'] ) ) { // if we have an access token save it
			updateRow( 'users', 'oauth_token', $_SESSION['oauth_token'], $userInfo['id'] );
		}

		if ( isset( $_SESSION['oauth_token_secret'] ) ) { // if we have an access token secret save it
			updateRow( 'users', 'oauth_token_secret', $_SESSION['oauth_token_secret'], $userInfo['id'] );
		}


		// get updated info
		$userInfo = getUserWithEmailAddress( trim( $_POST['email'] ) );

 		// save info to php session
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_info'] = $userInfo;
	}

	echo json_encode(
		array(
			'status' => $status,
			'message' => $message
		)
	);