<?php
session_start();
session_unset();
//session_destroy();

require 'dbms.php';
require 'validate.php';
$operation = new Irud();
$obValidate = new IsValid();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
	//echo $email;
	$_SESSION['error']['emailErr']='';
	 if(!$obValidate->validateEmail($email))
	 {
			echo $_SESSION['error']['emailErr']='invalid email id';
			header("Location:registration.php");
			exit();
	 }
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
	//echo $password;
	$arr= array(
				'email' => $email,
				'password'=>$password
			  );



	//$insert = Irud::insertInto('registration',$arr);
	
	$_SESSION['user']['id']=$operation->insertInto('registration',$arr);
	header("Location:profile.php");


}
?>