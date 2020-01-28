<?php
session_start();
$_SESSION['flag']=0;
$conn='';
$_tmp="";
$emailFlag=0;		
$resume = array('.jpg','.jpeg','.png');
	function extValidateResume($str)
	{
		//echo "this is ".$str;
		return in_array('.pdf', $str);
	}
	function extValidateProfilePicture($profilePicture)
	{
		return in_array($resume,$profilePicture);
	}

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
   			if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['user']['name']))
   			{
   				$_SESSION['error']['nameErr'] = "Only letters and white space allowed";
    			$_SESSION['flag']=1;
    		}
    			// $_SESSION['error']['nameErr'] = '';
  		}
  		if (empty($_POST["email"])) 
  		{
   			$_SESSION['error']['emailErr']= "email is required";
  			$_SESSION['flag']=1;
    			//header("Location:profile.php");
  		}
 		else 
  		{
    		$_SESSION['error']['emailErr'] = test_input($_POST["email"]);
   			$_SESSION['error']['emailErr']='';
   			if (filter_var($_SESSION['error']['emailErr'],FILTER_VALIDATE_EMAIL))
    			{
      				$_SESSION['error']['emailErr']  = "Invalid email";
      				$_SESSION['flag']=1;
    			}			
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
    			$mobNoLength=strlen($_SESSION['user']['mob_no']);
    			mobNo_Validate($mobNoLength);
    			//$_SESSION['error']['mob_noErr']='';
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
  			if(!extValidateProfilePicture($_FILES['profilePicture']['type']))
  			{
  			 	$_SESSION['error']['profilePictureErr']='.png or .jpg or .jpeg files only';
  			 	//$_SESSION['flag']=1;
  			}
  			else
  			{
  			 	$_SESSION['error']['profilePictureErr']='';
  			 	$_tmp=$_FILES['profilePicture']['name'];
  				$_FILES['profilePicture'];
  				
  			}	
  			 
			if(!extValidateResume($_FILES['resume']['type'])) 
			{
				$_SESSION['error']['resumeFileErr']='upload .pdf file only';
				//$_SESSION['flag']=1;
			}
			else
			{
				$_SESSION['error']['resumeFileErr']='';
				echo $tmpName = $_FILES['resume']['tmp_name']; 
				echo $fileName = $_FILES['resume']['name'];
				
			}
  			if ((count($_POST['cb']))< 2) 
  			{
  				 $_SESSION['error']['skillsErr']="minimum 2 skills are manadatory";
  				 $_SESSION['flag']=1;
			}
			else
			{
				$_SESSION['user']['skills']['one']= $_POST['cb'][0];
				$_SESSION['user']['skills']['two']= $_POST['cb'][1];
			    $_SESSION['user']['skills']['three']= $_POST['cb'][2];
			    $_SESSION['error']['skillsErr']="";
			}
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

  		}
  		else
  		{
	
  			header("Location:index.php");exit();
		}
  			// $_tmp="/picture/shubham.jpg";		
		// echo "hey".move_uploaded_file($_FILES['profilePicture']['tmp_name'], $_tmp );
		//	print_r($_FILES);
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
			$_SESSION['flag']=1;
			//header("Location:profile.php");
		}
	}
	function mobNo_Validate($mobNoLength)
	{
		if($mobNoLength!=10)
		{
			$_SESSION['flag']=1;
			$_SESSION['error']['mob_noErr']='invalid mobile number';
		}
	}

		
	if($_SESSION['flag']==1)
	{
		header("Location:profile.php");
	}
	else
	{
		$servername = "localhost";
		$username = "shubham";
		$passwrd = "shubh@m27";
		$msg='';
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=myDb", $username, $passwrd);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo 'Connected successfully';
				
			$sql = "INSERT INTO user VALUES ('".$_SESSION['user']['name']."','".$_SESSION['user']['email']."','".$_SESSION['user']['mob_no']."','".$_SESSION['user']['age']."','".$_SESSION['user']['state']."','".$_SESSION['user']['gender']."','".$_tmp."','".$fileName."',now(),now(),0)";
				$conn->exec($sql);
			
			$msg = "New record created successfully";
			if($msg)
			{
					//header("Location:profile_result.php");
			}

		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}

	}  // else block of if($_SESSION['flag']==1)
?>

<?php require 'header.php'; ?>	
 	<style>
 		td
 		{
 			color:gray;
 		}
 	</style>
<body>

	<div class="container-fluid width=90%"> <!--outer-->
		<!--------------------Head----------------------->
		<div class="container-fluid width=90%" style="background-color:powderblue; padding:20px;">
			<div class="row" border="1px solid">
				<div class="col-sm-3 cols=25%">
					
				</div>
				<div class="col-sm-6 cols=50%">
					<h3 style="padding:20px; text-align: center;">Profile</h3>
						<h3 style="color:gray;"><hr></h3>
				</div>
				<div class="col-sm-3 cols=25%">
					 <img src="<?php echo $_tmp ?>" style="width: 200px;">
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
						<tr>
							<td>Skills : </td>
							<td style="color:red;">
							
								<?php echo $_SESSION['user']['skills']['one']; ?> 
								<?php echo $_SESSION['user']['skills']['two']; ?> 
								<?php echo $_SESSION['user']['skills']['three']; ?>	 	
							</td>
						</tr>
						<tr>
							<td>Age : </td>
							<td style="color:red;"><?php echo $_SESSION['user']['age'];?></td>
						</tr>
						<tr>
							<td></td>
							<td><a href="logout.php" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></td>
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



