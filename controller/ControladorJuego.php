

<?php 

require_once('../model/ModeloJuego.php');

//Controlador busqueda siguiente Match

if(isset($_POST['carrera'])){


	$siguienteMatch = $_POST['siguiente'];

	$carrera = $_POST['carrera'];

	$modeloJuego = new Modelo_juego();

	if($carrera == 1){
		$concepto = $modeloJuego->getInfoConceptoTerapia($carrera, $siguienteMatch);		
	}
	if($carrera == 2){
		$concepto = $modeloJuego->getInfoConceptoBiotecnologia($carrera, $siguienteMatch);			
	}
	if($carrera == 3){
		$concepto = $modeloJuego->getInfoConceptoBiomedica($carrera, $siguienteMatch);		
	}

	$imagenes = $modeloJuego->getImg($carrera, $siguienteMatch);
	require_once('../view/VistaDisplayJuego.php');

}

if(isset($_POST['carreraForConcepto'])){

	//Busca solo el concepto para mostrar en el modal

	//necesitamos el id de la palabra y la carrera

	$siguienteMatch = $_POST['soloConcepto'];

	$carrera = $_POST['carreraForConcepto'];

	$modeloJuego = new Modelo_juego();

	if($carrera == 1){
		$concepto = $modeloJuego->getInfoConceptoTerapia($carrera, $siguienteMatch);		
	}
	if($carrera == 2){
		$concepto = $modeloJuego->getInfoConceptoBiotecnologia($carrera, $siguienteMatch);			
	}
	if($carrera == 3){
		$concepto = $modeloJuego->getInfoConceptoBiomedica($carrera, $siguienteMatch);		
	}

	print $concepto['concepto'];


}

?>