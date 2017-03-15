<?php
		
		
		class Carrera_Modelo{

		private $conn;

		private $ranking;


		//private $info;


		public function __construct(){


			require_once('connection.php');
			
			$this->conn = Connection::dbConnection();

			$this->ranking = array();

			//$this->info = array();

		}

		public function get_info($idCarrera){

			$sql = "SELECT carreras.carrera, des_carrera.img_carrera from carreras JOIN  des_carrera on carreras.id_carrera = des_carrera.id_carrera WHERE carreras.id_carrera =".$idCarrera;
			$result = $this->conn->query($sql);
			$info = $result->fetch(PDO::FETCH_ASSOC);

			return $info;

		}

		public function get_ranking($idCarrera){


			//extraer el ranking de carrera seleccionada

			//$sql = "SELECT * FROM ranking WHERE id_carrera = ".$idCarrera;
			$sql = "SELECT * FROM ranking WHERE id_carrera = ".$idCarrera." ORDER by puntos DESC LIMIT 3";

			$result = $this->conn->query($sql);

			$rows = $result->fetchAll();

			foreach ($rows as $rank) {

				$this->ranking[] = $rank;
			}

			return $this->ranking;

		}



	}

?>