<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function permissionChecker($roles = array(), $isInController = false){
	$isValid = true;
	if(!in_array($_SESSION['role_code'], $roles)){
		if($isInController){
			show_404();	
		}
		$isValid = false;
	}
	return $isValid;
}

function sessionChecker(){
	if(!isset($_SESSION) && $_SESSION['user_id']==null||$_SESSION['user_id']==''){
		redirect("auth/loginPage");
	}
}

function emailRegistrationBody($username, $siteurl){

	return "<html>
				<body>
					<h3>Please click the link below to activate your account:</h3>
					<p><a href='".$siteurl."'>" . $siteurl . "</a></p>
				</body>
			</html>";

}

function emailForgotPasswordBody($username,$password){
	return "<html>
				<body>
					<h2>Hi ".$username."</h2>
					<h3>You can now login by using the temporary password given below:</h3>
					<h3>Password:<b>".$password."</b></h3>
					<br/><br/>
					<h4>Note: You can change your password once you logged-in:</h4>
				</body>
			</html>";
}

function emailActivationBody($username){

	return "<html>
				<body>
					<h3>Hi " . $username . ",</h3>
					<p>You can now log in to your St. Joseph's Caravan Tours and Packages account to update your profile and book your flights, hotels and vehicles. To log in, just enter your username and the password you have chosen.</p>  
					<p>We would like to remind you of the following:</p>				
					<p>Please confirm that the log in details you provided are updated and correct.</p>
					<p>Should you have other queries or additional instructions, don’t hesitate to tell us.</p>
					<p>Thank you!</p>
				</body>
			</html>";

}