<?php
class validate
{
  function test_input($data) 
  {
       $data = trim($data,"/\-*&#$");
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
      return $data;
  }

  function validateEmail($email)
  {
    $flag =1;
    if (empty($email)) 
		{
 			$msg="email is required";
			return $msg;
		}
		  else 
		{
  		$email = test_input($email);
 		
 			if (filter_var($email,FILTER_VALIDATE_EMAIL))
		  {
				$msg = "Invalid email";
			return $msg;
		  }	
      return $flag;		
		}	
  } 
  $ob = new validate();
  echo $f=$ob->validateEmail('shubham@33#.com');
}      
?>