<?php
session_start();
session_unset();
session_destroy();
$conn="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
	//echo $email;
	$password=$_POST['password'];
	//echo $password;
	print_r($_POST);
	$servername = "localhost";
	$username = "shubham";
	$passwrd = "shubh@m27";

	try
	{
    	$conn = new PDO("mysql:host=$servername;dbname=myDb", $username, $passwrd);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully";
    }
	catch(PDOException $e)
    {
   		// echo "Connection failed: " . $e->getMessage();
    }
	
	$query = "SELECT * FROM registration where email='".$email."'";
	
	if($result = $conn->query($query))
	{		
		$userdata=$result->fetchAll();
		//$str = $userdata->fetch();
		//print "<pre>";print_r($userdata);
		//echo $userdata[0]['password'];
		if(password_verify($password, $userdata[0]['password']))
		{
			echo "hello";
			session_start();
			$_SESSION['user'] = array(
										'email'    => $email,
										'check'    => 'true',
										'name'     => '',
										'mob_no'   => '',
										'age'      => '',
										'gender'   => '',
										'skills'   => array(
															'one'   => '',
															'two'   => '',
															'three' => ''
															
														  ),
										'state'    => ''
									);					
			 header("Location:profile.php");
		}
		else
		{
			session_start(); 
			$_SESSION['user']['check']='false';	
			header("Location:index.php");
		}
	}
}	
else
{
	session_start(); 
	$_SESSION['user']['check']='false';						
	header("Location:index.php");	
}
?>