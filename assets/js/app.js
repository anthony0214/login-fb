//$(document).ready(function onDocumentReady() { /*magic here */ });
function logout() 
{  
	$.ajax( {
		url: 'php/process_logout.php',
		type: 'post',
		dataType: 'json',
		success: function( data ) 
		{
			//window.location.href = "index.php";
			window.location.href = "http://localhost/login-fb/auth-signin.php";
		}
	});
} 

function processLogin() {
	// clear error message and red borders on signup click
	
	$( '#error_message' ).html( '' );
	$( '#error_message_fb_php' ).html( '' );
	$( 'input' ).removeClass( 'invalid-input' );
	

	// assume no fields are blank
	var allFieldsFilledIn = true;

	$( 'input' ).each( function() { // simple front end check, loop over inputs
		if ( '' == $( this ).val() ) { // input is blank, add red border and set flag to false
			$( this ).addClass( 'invalid-input ');
			allFieldsFilledIn = false;	
		}
	} );

	if ( allFieldsFilledIn ) { // all fields are filled in!
		

		// server side login
		$.ajax( {
			url: 'php/process_login.php',
			data: $( '#login_form' ).serialize(),
			type: 'post',
			dataType: 'json',
			success: function( data ) {
				if ( 'ok' == data.status ) {
					window.location.href = "index.php";
				} else if ( 'fail' == data.status ) {
					$( '#error_message' ).html( data.message );
					error_msg(data.message);
					
				}
			}
		} );
	} else { // some fields are not filled in, show error message and scroll to top of page
		$( '#error_message' ).html( 'All fields must be filled in.' );
		$( window ).scrollTop( 0 );
	}
}



function processSignup() {
	// clear error message and red borders on signup click
	$( '#error_message' ).html( '' );
	$( 'input' ).removeClass( 'invalid-input' );

	// assume no fields are blank
	var allFieldsFilledIn = true;

	$( 'input' ).each( function() { // simple front end check, loop over inputs
		if ( '' == $( this ).val() ) { // input is blank, add red border and set flag to false
			$( this ).addClass( 'invalid-input ');
			allFieldsFilledIn = false;
		}
	} );

	if ( allFieldsFilledIn ) { // all fields are filled in!
		

		$.ajax( {
			url: 'php/process_signup.php',
			data: $( '#signup_form' ).serialize(),
			type: 'post',
			dataType: 'json',
			success: function( data ) {
				if ( 'ok' == data.status ) {
					//window.location.href = "login.php";
					$stats = 'ok';
					window.location.href = "auth-signin.php";
				} else if ( 'fail' == data.status ) {
					$( '#error_message' ).html( data.message );
					error_msg(data.message);
					
				}
			}
		} );
	} else { // some fields are not filled in, show error message and scroll to top of page
		$( '#error_message' ).html( 'All fields must be filled in.' );
		$( window ).scrollTop( 0 );
	}
}

function error_msg(msg){

toastr.options = 
{
	"closeButton": true,
	"debug": false,
	"newestOnTop": false,
	"progressBar": false,
	"positionClass": "toast-top-right",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "1000",
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
}


	toastr.error(msg);


}


//********************************************************* */

function fbLogin() {
	$.ajax({
            url:"fb-test.php",    
            type: "post",    
            dataType: 'json',
            success: function( data ) {
			/*	
				if ( 0 == data.status ) {
					//window.location.href = data.url;
				} 
				
				
				else if ( 'fail' == data.status ) {
					console.log('function doesnt exist!')
				}
			*/	

				switch (data.status) {
					case 0:
						window.location.href = data.url;
					  break;
					case 1:
					  console.log('already registered');
					  error_msg(data.msg)
					  break;
					default:
						console.log('function not found')
				  }
			}

			
        });
}



function processSignup2() {
	

	// assume no fields are blank





		

		$.ajax( {
			url: 'php/process_signup.php',
			data: $( '#signup_form' ).serialize(),
			type: 'post',
			dataType: 'json',
			success: function( data ) {
				if ( 'ok' == data.status ) {
					//window.location.href = "login.php";
					$stats = 'ok';
					window.location.href = "auth-signin.php";
				} else if ( 'fail' == data.status ) {
					$( '#error_message' ).html( data.message );
					error_msg(data.message);
					
				}
			}
		} );

 // some fields are not filled in, show error message and scroll to top of page
 /*
		$( '#error_message' ).html( 'All fields must be filled in.' );
		$( window ).scrollTop( 0 );
*/
	
}
