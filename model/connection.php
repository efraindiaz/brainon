<?php 
//Conexion agenda
	class connection{

		public static function dbConnection(){

			$conn =	null;
		 	$host = 'localhost';
		 	$db = 	'brainon';
		 	$user = 'root';
		 	$pwd = 	'';
		 	
			try {
			   	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
			   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->exec("SET CHARACTER SET UTF8");	
			}
			catch (PDOException $e) {
				echo '<p>Cannot connect to database !!</p>';
			    exit;
			}
			return $conn;	
		}
	}
 ?>