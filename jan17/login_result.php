<?php
session_start();
session_unset();
session_destroy();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
//echo $email;
$password=$_POST['password'];
//echo $password;
 if($email=="shubhams@mindfiresolutions.com" && $password=="mindfire")
 {
	session_start();
			$_SESSION['user'] = array(
										'email'    => $email,
										'password' => $password,
										'check'    => "true",
										'name'     => "",
										'mob_no'   => "",
										'age'      => "",
										'gender'   => "",
										'skills'   => array(
															'one'   => "",
															'two'   => "",
															'three' => ""
															
														  ),
										'state'    => ""



									); 
									
	header("Location:profile.php");
}
else
{
	session_start();
	/*$_SESSION['user'] = array(
								'check' => "false"
							);	 */

	$_SESSION['user']['check']="false";						
	header("Location:index.php");	
} 
}

?>
