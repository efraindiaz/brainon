<?php 
//Controlador para inicio-carrera.php

//get carrera info -> nombre, imagen

require_once('model/ModeloCarrera.php');

	$idCarrera =  $_GET['rq-car'];

	$buscarCarrera = new Carrera_modelo();

	$globalRanking = $buscarCarrera->get_ranking($idCarrera);

	//$infoCarrera = $buscarCarrera->get_info_cerrera($idCarrera);

//get ranking de jugadores

//require_once('../inicio-carrera.php');

 ?>