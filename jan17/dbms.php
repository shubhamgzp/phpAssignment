<?php
require 'dbmsObject.php';
$dbms_obj = database::getObject();
class Irud
{
	    // prepare sql and bind parameters
	    function insertInto($tableName,	$arr )
	    {
	    	//echo $attribute = implode(" ," ,array_keys($values));
	    	 //echo(explode(" ," ,$attribute));
	    	$attributes=array_keys($arr);
			$values=array_values($arr);
	    	
				$query="INSERT INTO $tableName (".implode(',',$attributes).") VALUES ('" . implode("', '", $values) . "' )";

				//echo($query);	
				if(	$result = $GLOBALS['dbms_obj']->query(	$query	)	)
				{

					 $last_id = $GLOBALS['dbms_obj']->insert_id;
					 return $last_id;
				}
				else 	
				{

					error_log("Query is not executed $query");
				}	
		}
		function get($tableName,$attributeName,$attributeValue)
		{
			 $query="SELECT * FROM $tableName WHERE $attributeName='$attributeValue'";
			// echo $query;
			if( $result = $GLOBALS['dbms_obj']->query($query ) )
			{
				$row	= $result->fetch_assoc();
				return $row;
				
			}	
		}
		function getSkillId($getId,$tableName,$attribute,$attribueValue) // select id from user where skill='c';
		{
			// 				SELECT * FROM skill     WHERE skillName='c++'hello 2
					$query = "SELECT * FROM $tableName WHERE $attribute='$attribueValue'";
					//echo $query;
			if($result=$GLOBALS['dbms_obj']->query($query))
			{
				$row = $result->fetch_assoc();
						////skillId
				if($row["$getId"])
				{
								//skillId	
					return $row["$getId"];
				}
			}
		}
}


 $ob = new Irud();
 $tname='user';
 $email='u@gmail.com';
// $arr = array(
// 			'email' => 'i@gmail.com',
// 			'password' => 'i@gmail.com'
			
// 		  );	

// //$val=emplode(","$arr);



 //$a=$ob->get($tname,'email','kd@gmail.com');
// echo "hello ";
// echo $a;
//echo $a['name'];

?>