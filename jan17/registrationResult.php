<?php

session_start();
session_unset();
session_destroy();



if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST['email'];
echo $email;
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
echo $password;

$servername = "localhost";
$username = "shubham";
$passwrd = "shubh@m27";
$msg='';
try {
    $conn = new PDO("mysql:host=$servername;dbname=myDb", $username, $passwrd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully';
       $sql = "INSERT INTO registration VALUES (0,'$email','$password')";
        $conn->exec($sql);
    echo $msg = "New record created successfully";
    	if($msg)
    	{
    		header("Location:index.php");
    	}
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

}



?>