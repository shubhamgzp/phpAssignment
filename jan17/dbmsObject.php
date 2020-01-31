<?php
class database {

	private $servername ;
	private $username 	;
	private $passwrd 	;
	private $dbname 	;
	private static $conn 	= null;


		private function __construct()
		{


		}
			
		public static function getObject()
		{
			if( $conn == null ){

				 $servername 	= "localhost";
				 $username 		= "shubham";
				 $passwrd 		= "shubh@m27";
				 $dbname 		= "myDb";
				


				
				$conn = new mysqli($servername, $username, $passwrd, $dbname);
			}

			return $conn;
		}

}

// $obj = database::getObject();
// 	if ($obj->connect_error)
// 		echo " connect_error";


?>		
