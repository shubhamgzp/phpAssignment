<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>resume.com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:aliceblue;">	
	<div style="border-style:1px solid; background-color:gray">
		
	</div>
	<div style="width:60%" style="background-color:red;">
		<form action="registrationResult.php" method="post">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col1 -->
					<h3 style="color:cadetblue;padding-left:25%;">Email</h3>
				</div>
				<div class="col-md-8 col-sm-8 col-sm-pull-8"> <!--head col2 -->
					<input type="email" class="form-control" required placeholder="Enter email address" name="email">
					<span class="error" style="color:red;">
				              		<?php  
				              			if(!empty($_SESSION['error']['emailErr']))
				                        {
				                            echo $_SESSION['error']['emailErr']. "*"; 
				                        }
				                    ?>
				              </span>
				</div>	
		</div>

		<div class="row">
			<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col1 -->
					<h3 style="color:cadetblue;padding-left:25%;">Password</h3>
				</div>
				<div class="col-md-8 col-sm-8 col-sm-pull-8"> <!--head col2 -->
					<input type="password" class="form-control" required placeholder="Enter Password" name="password">
				</div>	
		</div>

		<div class="row">
			<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col1 -->	
				</div>
				<div class="col-md-8 col-sm-8 col-sm-pull-8"> <!--head col2 -->
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
		</div>

	</div>
</body>
</html>