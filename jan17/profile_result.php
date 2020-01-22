<?php

session_start();
$_SESSION['flag']=0;


		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
  			if (empty($_POST["name"])) 
  			{
    			$_SESSION['error']['nameErr']= "name is required";
    			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  			}
  			else 
  			{
    			$_SESSION['user']['name'] = test_input($_POST["name"]);
    			$_SESSION['error']['nameErr'] = '';
  			}

  			if (empty($_POST["email"])) 
  			{
    			$_SESSION['error']['emailErr']= "email is required";
    			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  			}
  			else 
  			{
    			$_SESSION['user']['email'] = test_input($_POST["email"]);
    			$_SESSION['error']['emailErr']='';
  			}

  			if (empty($_POST["mob_no"])) 
  			{
    			$_SESSION['error']['mob_noErr']= "mobile no. is required";
    			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  			}
  			else 
  			{
    			$_SESSION['user']['mob_no'] = test_input($_POST["mob_no"]);
    			$_SESSION['error']['mob_noErr']='';
  			}

  			if (empty($_POST["gender"])) 
  			{
    			$_SESSION['error']['genderErr']= "gender is required";
    			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  			}
  			else 
  			{
    			$_SESSION['user']['gender'] = test_input($_POST["gender"]);
    			$_SESSION['error']['genderErr']='';
  			}

  			if (empty($_POST["state"])) 
  			{
    			$_SESSION['error']['stateErr']= "state is required";
    			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  			}
  			else 
  			{
    			$_SESSION['user']['state'] = test_input($_POST["state"]);
    			$_SESSION['error']['stateErr']='';
  			}


  			// if ((count($_POST['cb']) < 2) 
  				// echo "erro";
  			// {

  			// 	// $_SESSION['user']['skills']['one']=$

    	// 		$_SESSION['error']['skillsErr']= "Min 2 skills are required";
    	// 		$flag=1;
    	// 		//header("Location:profile.php");
  			// }
  			// else 
  			// {
    	// 		// $_SESSION['user']['skills'] = $_POST['cb'];
    	// 		// print_r($_SESSION['user']['skills']);
    	// 		// $_SESSION['error']['skillsErr']='';
  			// }

  			if (empty($_POST["age"])) 
  			{
  				
    			$_SESSION['error']['ageErr']= "age is required and should be between 20 to 30";
    			
    			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  			}
  			else 
  			{

    			$_SESSION['user']['age'] = test_input($_POST["age"]);
    			age_validate($_SESSION['user']['age']);
    			$_SESSION['error']['ageErr']='';
  			}

  		}else{
	
  			header("Location:index.php");exit();
}
  		if($_SESSION['flag']==0)
  		{
  			// header("Location:profile_result.php");
  		}
		else
		{
			
			header("Location:profile.php");
		}

	function test_input($data) 
	{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
	function age_validate($age)  // start from here validating mob no;
	{
		if($age >30 || $age <20)
		{
			$_SESSION['error']['ageErr']="age is required and should be between 20 to 30";
			header("Location:profile.php");
		}
	}
?>
<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>resume.com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<style>
 		td
 		{
 			color:gray;
 		}
 	</style>
</head>
<body>

	<div class="container-fluid width=90%"> <!--outer-->
		<!--------------------Head----------------------->
		<div class="container-fluid width=90%" style="background-color:powderblue; padding:20px;">
			<div class="row" border="1px solid">
				<div class="col-sm-3 cols=25%">
					A
				</div>
				<div class="col-sm-6 cols=50%">
					<h3 style="padding:20px; text-align: center;">Profile</h3>
						<h3 style="color:gray;"><hr></h3>
				</div>
				<div class="col-sm-3 cols=25%">
					C
				</div>
			</div>
			
		</div>
		<!-------------------------------------------->
		<!--------------------Bottom------------------------>
		<div class="container-fluid width=90%" style="">
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>Name : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['name'];   ?></td>
						</tr>
						<tr>
							<td>Email : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['email'];   ?></td>
						</tr>
						<tr>
							<td>Mob No : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['mob_no'];   ?></td>
						</tr>
						<tr>
							<td>Gender : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['gender'];   ?></td>
						</tr>
						<tr>
							<td>State : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['state'];   ?></td>
						</tr>
						<!--<tr>
							<td>Skills : </td>
							<td style="color:red;"><?php// echo $cb1;   ?></td>
							<td style="color:red;"><?php// echo $cb2;   ?></td>
							<td style="color:red;"><?php// echo $cb3;   ?></td>
						</tr>-->
						<tr>
							<td>Age : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['age'];   ?></td>
						</tr>
						
						
					</tbody>
					
				</table>
			</div>

		</div>

		<!--------------------Bottom------------------------>


		<!--------------------Outer------------------------>
	</div>  <!--outer-->

</body>
</html>



