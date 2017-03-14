 
	<?php

	//include_once("obj_contact.php");

	class Carrera_modelo{

		private $conn;

		private $ranking;


		public function __construct(){

			require_once('connection.php');
			
			$this->conn = Connection::dbConnection();

			$this->ranking = array();




		}

		public function get_ranking($idCarrera){

			//extraer el ranking de carrera seleccionada

			$sql = "SELECT * FROM ranking WHERE id_carrera = ".$idCarrera;

			$result = $this->conn->query($sql);

			$rows = $result->fetchAll();
	
			foreach ($rows as $rank) {

				$this->ranking[] = $rank;
			}

			return $this->ranking;

		}

	}


 ?>