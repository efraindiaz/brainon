<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Juega:</title>
    <script type="text/javascript" src="public/js/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/game.js"></script>
	<link rel="stylesheet" type="text/css" href="public/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/game.css">
    <link rel="stylesheet" type="text/css" href="public/css/icon.css">
    <link rel="stylesheet" type="text/css" href="public/css/default.css">        
    <script type="text/javascript" src="public/js/materialize.min.js"></script>

    <style>
             

    </style>

</head>
<body>
	<header class="header h-game-pad blue">
        <strong>Brain-On</strong>
    </header>

      <div class="container container-game-pad">
        
          <div class="conf-preloader">
            <div class="preloader-wrapper big active">
              <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                  <div class="circle"></div>
                </div><div class="gap-patch">
                  <div class="circle"></div>
                </div><div class="circle-clipper right">
                  <div class="circle"></div>
                </div>
              </div>
          </div>
          </div>
             
    </div>
    <!-- FIN CONTENEDOR CENTRAL JUEGO -->


    <!--Modal Descripcion concepto-->

    <div id="modalShowInfo" class="modal">
        <div class="modal-content">
          <h4>Una Pista</h4>
          <p id="setTexto"></p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <!--Modal se termino el tiempo-->

    <div id="modalFinTiempo" class="modal">
        <div class="modal-content">
          <h4>Se termino el tiempo</h4>
          <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    

    <!--Modal completado -->

    <div id="modalMatchCompleto" class="modal">
        <div class="modal-content">
          <h4>Completado</h4>
          <p>Informacion de puntuacion</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <!--Modal ingresar nombre -->
    <div id="modalPerdedor" class="modal">
        <div class="modal-content">
          <h4>Gracias por jugar</h4>
          <p>Infor perdedor jaja</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    

    <!--Modal fin del juego GANA-->

    <div id="modalMatchExito" class="modal">
        <div class="modal-content">
          <h4>Felicidades has terminado</h4>
          <p>Informacion de puntuacion</p>
          <p>input para nombre</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>


    <script>
                   
    </script>

</body>
</html> 