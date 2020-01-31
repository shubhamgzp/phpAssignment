<?php
class database
{
private $servername = "localhost";
private $username = "shubham";
private $passwrd = "shubh@m27";
private $dbname = "myDb";
private static $conn = null;
		private function __construct()
		{
		}
			
		public static function getObject
		{
			if($conn==null){
				
				$conn = new mysqli($servername, $username, $passwrd);
			}

			return $conn;
		}
		
}
?>		
