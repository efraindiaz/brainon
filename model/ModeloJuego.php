<?php 

	class Modelo_juego{


		private $conn;

		private $infoConcepto;

		private $imagesConcepto;


		public function __construct(){

			require_once('connection.php');
			
			$this->conn = Connection::dbConnection();

			$this->infoConcepto = array();

			$this->imagesConcepto = array();

		}


		public function getInfoConcepto($carrera, $siguienteMatch){

			$sql = "SELECT * FROM palabra WHERE id_palabra = ".$siguienteMatch." AND id_carrera = ".$carrera;
			$result = $this->conn->query($sql);
			$info = $result->fetch(PDO::FETCH_ASSOC);

			return $info;

		}



		public function getInfoConceptoTerapia($carrera, $siguienteMatch){

			$sql = "SELECT * FROM palabra_terapia  WHERE id_palabra = ".$siguienteMatch." AND id_carrera = ".$carrera;
			$result = $this->conn->query($sql);
			$info = $result->fetch(PDO::FETCH_ASSOC);

			return $info;

		}


		public function getInfoConceptoBiotecnologia($carrera, $siguienteMatch){

			$sql = "SELECT * FROM palabra_biotecnologia WHERE id_palabra = ".$siguienteMatch." AND id_carrera = ".$carrera;
			$result = $this->conn->query($sql);
			$info = $result->fetch(PDO::FETCH_ASSOC);

			return $info;

		}

		public function getInfoConceptoBiomedica($carrera, $siguienteMatch){

			$sql = "SELECT * FROM palabra_biomedica WHERE id_palabra = ".$siguienteMatch." AND id_carrera = ".$carrera;
			$result = $this->conn->query($sql);
			$info = $result->fetch(PDO::FETCH_ASSOC);

			return $info;

		}

		public function getImg($carrera, $siguienteMatch){

			$sql = "SELECT * FROM imagenes WHERE id_palabra = ".$siguienteMatch;

			$result = $this->conn->query($sql);

			$rows = $result->fetchAll();

			foreach ($rows as $nameImg) {

				$this->imagesConcepto[] = $nameImg;
			}

			return $this->imagesConcepto;
		}


	}

 ?>