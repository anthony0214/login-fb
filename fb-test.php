<?php

    include_once 'autoloader.php';
$msg = 'default';
if (function_exists('getFacebookLoginUrl')) 
{ 
   

    if ( isset( $_SESSION['eci_login_required_to_connect_facebook'] ) && $_SESSION['eci_login_required_to_connect_facebook'] )
    {
        $status = 1;
        $url = 'error';
    }else{
        $status = 0;
        $url = getFacebookLoginUrl();
        $msg = 'An account already exists with that email address. To connect your Facebook account, login manually first!';
    }
}else{
    $status = 2;
    $url = 'error';
    $msg = 'function not found!';
}


 echo json_encode(
    array(
        'status' => $status,
        'url' => $url,
        'msg'=> $msg
        
        
    )
);

 if ( isset( $_SESSION['eci_login_required_to_connect_facebook'] ) && $_SESSION['eci_login_required_to_connect_facebook'] ) : // enter password to connect account ?>
    <!-- <div style="margin-bottom:10px;">
        An account already exists with that email address. To connect your Facebook account, enter your password.
    </div> -->
    
 <?php endif; ?>



    
