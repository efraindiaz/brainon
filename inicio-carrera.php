<?php require_once('controller/ControladorCarrera.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inicio Carrera</title>
    <link rel="stylesheet" type="text/css" href="public/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/icon.css">
    <link rel="stylesheet" type="text/css" href="public/css/default.css">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <header class="header blue">
        <strong>Nombre carrera</strong>
    </header>
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card  z-depth-5">
                    <div class="card horizontal" style="margin-bottom:0px; ">
                    <div class="card-image">
                        <img class="imgProfile" src="public/images/img-carrera.png">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content" style="text-align:center; padding-top: 0px !important; padding-bottom: 0px !important;">
                            <span class="card-title">Mejores puntuaciones</span>
                            <table class="centered">
                                <thead>
                                  <tr>
                                      <th data-field="id">Posición</th>
                                      <th data-field="name">Nombre</th>
                                      <th data-field="price">Puntuación</th>
                                  </tr>
                                </thead>

                                <tbody>

                                    <?php 
                                        foreach ($globalRanking as $rk) {
                                    ?>
                                        <tr>
                                            <td><?php print "1";?></td>
                                            <td><?php print $rk['nombre'] ?></td>
                                            <td><?php print $rk['puntos'] ?></td>
                                        </tr>

                                    <?php
                                        }
                                    ?>
                                </tbody>
                              </table>
            
                        </div>

                    </div>
                                        
                         
                </div>
                <div class="row">
                        <div class="col s12" style="text-align:center;">
                            <div class="col s6" >
                                <div class="card-action">
                                  <a href="#">Regresar</a>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="card-action">
                                  <a href="#">Jugar</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
        </div>        
    </div>
</body>
<script type="text/javascript" src="public/js/materialize.min.js"></script>
<script type="text/javascript" src="public/js/jquery.min.js"></script>

</html>
