<?php 
//Controlador para inicio-carrera.php

//get carrera info -> nombre, imagen

require_once('model/ModeloCarrera.php');

	if (isset($_GET['rq-car'])) {

	    $idCarrera =  $_GET['rq-car'];

		$buscarCarrera = new Carrera_modelo();

		$infoCarrera = $buscarCarrera->get_info($idCarrera);

		$globalRanking = $buscarCarrera->get_ranking($idCarrera);

		/*$numLetras = strlen($concepto['palabra']); 

        setcookie('totalLetras', $numLetras, time()+4800);

        print $_COOKIE['totalLetras'];*/


	}else{
	    // Fallback behaviour goes here

	    $error = 'Algo a salido mal :(';

	}



	

	//$infoCarrera = $buscarCarrera->get_info_cerrera($idCarrera);

//get ranking de jugadores

//require_once('../inicio-carrera.php');

 ?>