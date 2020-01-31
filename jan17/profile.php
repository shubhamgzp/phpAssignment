<?php
session_start();
require 'dbms.php';
$dbmsObject = new Irud();
if($_SESSION['user']['id'])
{
	$tableName='registration';
	$attributeName='userId';
	$attributeValue=$_SESSION['user']['id'];

	$row=$dbmsObject->get($tableName,$attributeName,$attributeValue );
	$_SESSION['user']['email']=$row['email'];
}
else
{
	echo "session destroyed.......";
	session_destroy();
	header("Location:index.php");
}	
if($_SESSION['flag']==0)
{
	$_SESSION['error'] = array  (
									'nameErr'          => '',
									'emailErr'         => '',
									'mob_noErr'        => '',
									'ageErr'           => '',
									'genderErr'   	   => '',
									'stateErr'         => '',
									'skillsErr'        => '',
									'resumeFileErr'    => '',
									'profilePictureErr'=> ''
								);
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
<body style="background-color: aliceblue";>
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
		<form action="profile_result.php" method="post" enctype="multipart/form-data">
			<table class="table">
				<tbody>
					<tr>
						<td>Name:</td>
						<td>
							<input type="text" class="form-control form-control-lg form-control-sm" id="name" placeholder="Enter Name" value="<?php echo $_SESSION['user']['name']; ?>" name="name">
					              <span class="error" style="color:red;">
						              	<?php
						              	    if(!empty($_SESSION['error']['nameErr']))
						                    {
						                        echo $_SESSION['error']['nameErr']. "*"; 
				                    	    }
						                ?>                      
					              </span>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input type="email" class="form-control form-control-lg form-control-sm" readonly placeholder="<?php echo $_SESSION['user']['email'];?>" name="email">
				              <span class="error" style="color:red;">
				              		<?php  
				              			if(!empty($_SESSION['error']['emailErr']))
				                        {
				                            echo $_SESSION['error']['emailErr']. "*"; 
				                        }
				                    ?>
				              </span>
						</td>
					</tr>

					<tr>
						<td>Mobile No.</td>
						<td>
							<input type="text" class="form-control form-control-lg form-control-sm" id="mob_no" placeholder="Enter Mobile No." value="<?php echo $_SESSION['user']['mobNo']; ?>" name="mob_no">
             						<span class="error" style="color:red;">
             							<?php  
             								if(!empty($_SESSION['error']['mob_noErr']))
											{                              			
                              					echo $_SESSION['error']['mob_noErr']. "*"; 
                       						}
                       					?>
                          
             						</span>
						</td>
					</tr>
					
					<tr>
						<td>State</td>
						<td>
							<select class="form-control" id="state" name="state">
								<option></option>
						        <option 
						        	<?php 
						        		if($_SESSION['user']['state'] == 'Uttar Pradesh')
						        			echo selected;

						        	 ?>
						        >Uttar Pradesh</option>
						        <option 
						        	<?php 
						        		if($_SESSION['user']['state'] == 'ODISHA')
						        			echo selected;

						        	 ?>
						        >ODISHA</option>
						        <option
						        	<?php 
						        		if($_SESSION['user']['state'] == 'DELHI')
						        			echo selected;

						        	 ?>
						        >DELHI</option>
						        <option
						        	<?php 
						        		if($_SESSION['user']['state'] == 'MUMBAI')
						        			echo selected;

						        	 ?>
						        >MUMBAI</option>
						        </select>
						        	<span class="error" style="color:red;">
						        		<?php
						        		    if($_SESSION['error']['stateErr']== "state is required")
						                    {
						                        echo $_SESSION['error']['stateErr']."*"; 
						                    }
						                ?>              
						            </span>
						</td>
					</tr>

					<tr>
						<td>Age</td>
						<td>
							<input type="number" class="form-control" placeholder="" value="<?php echo $_SESSION['user']['age']; ?>" name="age">
              				<span class="error" style="color:red;">
              					<?php  
                          			if($_SESSION['error']['ageErr'] == "age is required and should be between 20 to 30")
									{
											//$error=" enter age between 20 to 30";
											echo $_SESSION['error']['ageErr']."*";
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
        					<input type="radio" name="gender" value="other">Other
         				 		<span class="error" style="color:red;">
         				 			<?php  
         				 				if($_SESSION['error']['genderErr']== "gender is required")
         				 				{	
  											echo $_SESSION['error']['genderErr']."*"; 
										}
									?>
              					</span>
						</td>
					</tr>

					<tr>
						<td>Skills</td>
						<td>
	  						<input type="checkbox" value="C" value="<?php echo $_SESSION['user']['skills']['one']; ?>" name="cb[]">C
							<input type="checkbox" value="C++" value="<?php echo $_SESSION['user']['skills']['two']; ?>"  name="cb[]">C++
							<input type="checkbox" value="python" value="<?php echo $_SESSION['user']['skills']['three']; ?>" name="cb[]">Python
								<span class="error" style="color:red;">
									<?php
									    if(!empty($_SESSION['error']['skillsErr']))
									    {
  											echo $_SESSION['error']['skillsErr']."*"; 
									    }
									?>
              					</span>	
						</td>
					</tr>

					<tr>
						<td>Profile Picture</td>
						<td><input type="file" name="profilePicture">
							<span class="error" style="color:red;">
								<?php
								  	if(!empty($_SESSION['error']['profilePictureErr']))
									{
										echo $_SESSION['error']['profilePictureErr']."*"; 
									}
								?>
      						</span>
						</td>
					</tr>

					<tr>
						<td>Resume</td>
						<td><input type="file" name="resume">
								<span class="error" style="color:red;">
									<?php  
										if(!empty($_SESSION['error']['resumeFileErr']))
  										{
  											echo $_SESSION['error']['resumeFileErr']."*"; 
  										}
									?>
      							</span>	
						</td>
					</tr>

					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-default">Submit</button>
								<a href="logout.php" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-log-out"></span> Log out</a>
						</td>
					</tr>	
				
				</tbody>
			</table>
		</form>	
	</div> <!-- outer -->
</body>
</html>