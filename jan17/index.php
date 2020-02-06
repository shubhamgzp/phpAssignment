<?php
$error='';
session_start();
session_unset();
if($_SESSION['user']['check']=='false')
{
	echo "email id or password is incorrect : try again";
	session_destroy();
}
?>
<?php require 'header.php'; ?>
<body style="background-color: aliceblue;">
	<!-------------------------------------------------------------------------------------->
	<!-- outer -->
<div class="container-fluid" style="border:0px solid; width:100%;">
	<!------------------------------>
	<!-- head -->
	<div class="container-fluid" style="padding:15px;">
		<div class="row width:90%" style="; padding:30px;"> <!-- heaad row -->
			<div class="col-md-4 col-sm-4 col-sm-pull-4"> </div><!--head col1 -->	
			
			<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col2 -->
				  <h3 style="color:cadetblue;padding-left:25%;">Login Page</h3>
			</div>
			<div class="col-md-4 col-sm-4 col-sm-pull-4"> </div><!--head col3 -->		
		</div>	
	</div>
<!----------------------------------------------------------------------------------------->
<!-- Login bottom -->
	<div class="container-fluid" style="padding:6%;">
		<div class="container-fluid" style="width:90%; padding:10%px;">
		<form action="login_result.php" method="post" onsubmit=" return formValidation()">
		    <!-------------------------------->
			<table class="table " style="padding:1%; background-color: cadetblue; border-radius:1%">
				<p style="color:red;">
					<?php 
					if($error == "email id or password is incorrect : try again")
					{
						echo $error;
					}
					?>								 	
		    	</p>
				<tbody>
					<tr>
						<td style="padding-top:2%">Email</td>
						<td style="padding-top:2%"><input type="email" class="form-control" required placeholder="Enter email address" name="email" id="email">
							<span class="error" style="color:red;">
				              		<?php  
				              			if(!empty($_SESSION['error']['emailErr']))
				                        {
				                            echo $_SESSION['error']['emailErr']. "*"; 
				                        }
				                    ?>
				              </span>
				              <span style="color:red" id="errorEmail"></span>
						</td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" class="form-control" required placeholder="Enter password" name="password" id="password" >
						<span style="color:red" id="errorPassword"></span>
						</td>
						
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-default">LogIn</button>
							<a href="registration.php">register here</a>
						</td>
					</tr>
				</tbody>	
			</table>
			<!------------------------------------------------>
		</div>
	</div>
</div> <!-- outer -->
<script type="text/javascript" src="javaScript/javaScript.js"></script>
</body>
</html>