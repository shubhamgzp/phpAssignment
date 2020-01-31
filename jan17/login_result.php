<?php

session_start();
session_unset();
//session_destroy();

require 'dbms.php';

$dbmsObject = new Irud();
$conn='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
	//echo $email;
	$password=$_POST['password'];
	//echo $password;
	session_start();
	$_SESSION['user']['id']=NULL;
 	$id=$dbmsObject->getUserId('userId','registration',$email,$password);
	echo $_SESSION['user']['id']=$id;
	if($_SESSION['user']['id'])
	{
		echo "helo";
		echo $_SESSION['user']['id'];
 			$_SESSION['user'] = array(
 										'id'	   => $id,
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
 			echo $_SESSION['user']['email'];

 			echo $_SESSION['user']['id'];
 			//					echo "helloppppppppppppppp";				
 			header("Location:profile.php");
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