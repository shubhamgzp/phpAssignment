<?php
$error="";
session_start();

if($_SESSION['user']['check']=="false")
{
	echo "email id or password is incorrect : try again";
	session_destroy();
}
session_unset();
session_destroy();
?>
<!doctype html>
<html>
<head>
	<title>resume.com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
		
	<!-- outer -->
	<div class="container-fluid" style="border:0px solid; width:100%; background-color:powderblue;">
		<!------------------------------>
		<!-- head -->
		<div class="container-fluid" style="padding:15px;">


			<div class="row width:90%" style="background-color:white; padding:30px;"> <!-- heaad row -->
 				<div class="col-md-4 col-sm-4 col-sm-pull-4-"> <!--head col1 -->
 					
 				</div>
 				<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col2 -->
 					  <h3 style="color:gray">Login Page</h3>
 				</div>
 				<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col3 -->
 					
 				</div>

 			</div>	
			
		</div>
<!------------------------------>
<!-- Login bottom -->
<div class="container-fluid" style="padding:15px;">
	<div class="container-fluid" style="width:90%; padding:20px; background-color: powderblue;">
		<p style="color:red;"><?php 
										if($error == "email id or password is incorrect : try again")
											{echo $error;}
								?>
											 	
	    </p>



<form action="login_result.php" method="post">
	    <!-------------------------------->
		<table class="table " style="padding:40px;">
			<tbody>
				<tr>
					<td>Email</td>
					<td><input type="email" class="form-control" required placeholder="Enter email address" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="form-control" required placeholder="Enter password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" class="btn btn-default">Submit</button></td>
				</tr>
			</tbody>
			
		</table>
		<!------------------------------------------------>
	</div>
</div>

	</div> <!-- outer -->

</body>
</html>