<?php

session_start();
session_unset();
require 'dbms.php';
require 'validate.php';
$obValidate = new IsValid();
$dbmsObject = new Irud();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
	$_SESSION['error']['emailErr']='';
	if(!$obValidate->validateEmail($email))
	{
			$_SESSION['error']['emailErr']='invalid email id or password';
			header("Location:index.php");
			exit();
	}
	$password=$_POST['password'];
	$_SESSION['user']['id']=NULL;
	
	$tableName='registration';
	$attributeName='email';
	$attributeValue=$email;
 	
 	$row=$dbmsObject->get($tableName,$attributeName,$attributeValue);
	$_SESSION['user']['id']=$row['userId'];

	if(password_verify($password, $row['password']))
	{
				
	
		if($_SESSION['user']['id'])
		{
		// echo "helooo..........";
		// echo $_SESSION['user']['id'];
 			$_SESSION['user'] = array(
 										'id'	   => $_SESSION['user']['id'],
 										'email'    => $email,
 										'name'     => '',
 										'check'	   => 'true',
 										'mobNo'    => '',
 										'age'      => '',
 										'gender'   => '',
 										'skills'   => array(
 															'one'   => '',
 															'two'   => '',
 															'three' => ''
															
 														  ),
 										'state'    => ''
 									);
 			// echo $_SESSION['user']['email'];

 			// echo $_SESSION['user']['id'];
 			//					echo "helloppppppppppppppp";				
 			header("Location:profile.php");
 		}	
 	}
 	else
	{
		//echo "hello";
		session_start(); 
		$_SESSION['user']['check']='false';	
		header("Location:index.php");
	}	
}
else
{
	//echo "hiii";
	session_start(); 
	$_SESSION['user']['check']='false';						
	header("Location:index.php");	
}
?>