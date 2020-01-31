<?php
session_start();
session_unset();
//session_destroy();

require 'dbms.php';
$operation = new Irud();


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
	echo $email;
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
	echo $password;
	$arr= array(
				'email' => $email,
				'password'=>$password
			  );



	//$insert = Irud::insertInto('registration',$arr);
	
	$_SESSION['user']['id']=$operation->insertInto('registration',$arr);
	header("Location:profile.php");


}
?>