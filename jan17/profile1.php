<?php
session_start();
if($_SESSION["email"]=="shubhams@mindfiresolutions.com" && $_SESSION["password"]=="mindfire")
{

}
else
{
	echo "session destroyed.......";
	session_destroy();
	header("Location:index.php");
}

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
		<div class="container-fluid">


			<div class="row width:90%" style="background-color:white; padding:30px;"> <!-- heaad row -->
 				<div class="col-md-4 col-sm-4 col-sm-pull-4-"> <!--head col1 -->
 					
 				</div>
 				<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col2 -->
 					  <h3 style="color:gray">Profile</h3>
 				</div>
 				<div class="col-md-4 col-sm-4 col-sm-pull-4"> <!--head col3 -->
 					
 				</div>

 			</div>	
			
		</div>
<!------------------------------>
<!-- Login bottom -->
<div class="container-fluid">
	
		<form action="profile_result.php" method="post" class="form-horizontal">
			<table class="table">
				<tbody>
					<tr>
						<td>Name:</td>
						<td>
							<input type="text" class="form-control form-control-lg form-control-sm" id="name" placeholder="Enter Name" name="name">
					              <span class="error" style="color:red;"><?php  if($_SESSION["nameErr"]== "name is required")
					                              echo $_SESSION["nameErr"]. "*"; 
					                        ?>                      
					              </span>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input type="email" class="form-control form-control-lg form-control-sm" id="email" placeholder="Enter email address" name="email">
				              <span class="error" style="color:red;"><?php  if($_SESSION["emailErr"]== "email is required")
				                              echo $_SESSION["emailErr"]. "*"; 
				                        ?>
				              </span>

						</td>
					</tr>

					<tr>
						<td>Mobile No.</td>
						<td>
							<input type="number" class="form-control form-control-lg form-control-sm" id="mob_no" placeholder="Enter Mobile No." name="mob_no">
             						<span class="error" style="color:red;"><?php  if($_SESSION["mob_noErr"]== "mobile no. is required")
                              							echo $_SESSION["mob_noErr"]. "*"; 
                       												 ?>
                          
             						 </span>
						</td>

					</tr>
					
					<tr>
						<td>State</td>
						<td>
							<select class="form-control" id="state" name="state">
								<option></option>
						        <option>Uttar Pradesh</option>
						        <option>ODISHA</option>
						        <option>DELHI</option>
						        <option>MUMBAI</option>
						        </select>
						        	<span class="error" style="color:red;"><?php  if($_SESSION["stateErr"]== "state is required")
						                              echo $_SESSION["stateErr"]."*"; 
						                        ?>
						                          
						            </span>
						</td>
					</tr>

					<tr>
						<td>Age</td>
						<td>
							<input type="number" class="form-control" id="age" placeholder="" name="age">
              				<span class="error" style="color:red;"><?php  
                          												if($_SESSION["ageErr"] == "age is required and should be between 20 to 30")
                        												{
                          													//$error=" enter age between 20 to 30";
                          													echo $_SESSION["ageErr"]."*";
                        												}
                    												?>
 		         			</span>
						</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							
							<input type="radio" name="gender" value="male">Male
        					<input type="radio" name="gender" value="female">Female
        					<input type="radio" name="gender" value="other">Other</label>
         				 		<span class= style="color:red;"><?php  if($_SESSION["genderErr"]== "gender is required")
                              											echo $_SESSION["genderErr"]."*"; 
                        										?>
                          
              					</span>

						</td>

					</tr>
					<tr>
						<td>Skills</td>
						<td>
							<label for="skills">Skills:</label>
          						<input type="checkbox" value="C" name="cb1">C
								<input type="checkbox" value="C++" name="cb2">C++
								<input type="checkbox" value="python" name="cb2">Python	
						</td>

					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-default">Submit</button></td>
					</tr>
					
				</tbody>
			</table>
		</form>	
		
	
	</div> <!-- outer -->

</body>
</html>