<?php
class IsValid
{

  function test($data) 
  {
       $data = trim($data,"/\-*&#$");
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
      return $data;
  }
  // public $data;

  function validateEmail($email)
  {
  		$data = self::test($email);
     	if (filter_var($data,FILTER_VALIDATE_EMAIL))
		  {
         return 1;  
		  }	
      else
      {
        return 0;
      }
     	
	}	


  function validateName($name)
  {
      $data = self::test($name);
      if(empty($data)) 
      {
        return $msg='name  is required';
      }
      else 
      {
        if (!preg_match("/^[a-zA-Z ]*$/",$data))
        {
          return $msg = 'Only letters and white space allowed';
          
        }
          return 1;
      } 
  } 
   

  
  
} //class
$ob = new IsValid();
  echo $f = $ob->validateName('shu sin');     
?>