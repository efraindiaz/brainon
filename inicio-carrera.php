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
        <?php if(isset($infoCarrera)) {?>
        <strong><?php print $infoCarrera['carrera'] ?></strong>
        <?php } else{?>
        <strong> :(</strong>
        <?php } ?>
    </header>

    <?php if(isset($globalRanking)){  ?>
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card  z-depth-5">
                    <div class="card horizontal no-bootom-card">
                    <div class="card-image">
                        <img class="imgProfile" src="public/images/<?php print $infoCarrera['img_carrera'] ?>">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content card-content-table center-align" style="">
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

                                        if($globalRanking != null){ //verificamos que no llege vacia 
                                        foreach ($globalRanking as $rk) {
                                    ?>
                                        <tr>
                                            <td><?php print "1";?></td>
                                            <td><?php print $rk['nombre'] ?></td>
                                            <td><?php print $rk['puntos'] ?></td>
                                        </tr>

                                    <?php
                                        }
                                    }else{ //Si llega vacio el ranking imprimimos un mensaje indicandolo?> 
                                                                                
                                        <td></td>
                                        <td>Aun no hay registros, se el primero :)</td>
                                        <td></td>
                                    <?php    
                                    }
                                    ?>
                                </tbody>
                              </table>
            
                        </div>

                    </div>
                                        
                         
                </div>
                <div class="row">
                        <div class="col s12 center-align">
                            <div class="col s6" >
                                <div class="card-action">
                                  <a href="carreras.html">Regresar</a>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="card-action">
                                  <a href="game-pad.php">Jugar</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
        </div>        
    </div>

    <?php }?>

     <?php if(isset($error)) {?>
    <div class="row">
        <div class="col s4 offset-s4 center-align">
        
            <strong><?php print $error ?></strong>
            <br>
            <br>
            <strong><a href="carreras.html">Regresar a Carreras</a></strong>
        </div>
    </div>
    <?php }?>
</body>
<script type="text/javascript" src="public/js/materialize.min.js"></script>
<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script>
    $(function(){
        var carrera = 0;
        var contador;
        var arr = [];
        var arrayPalabra = new Array();

        function llenarAleatorios(a){
            var v = Math.floor(Math.random() * (11 - 1) + 1);
            if(!a.some(function(e){return e == v})){
                a.push(v);
            }
        }

        while(arr.length < 10 && 10 < 11){
            llenarAleatorios(arr);
        }

        for (var i = 0; i < arr.length; i++) {
            arrayPalabra.push({"posicion": arr[i]});
        }

        if(window.localStorage){

            localStorage.setItem('ordenTF', JSON.stringify(arrayPalabra));  

            localStorage.setItem("contador", 1);
            localStorage.setItem("vidas", 3);
            localStorage.setItem("puntos", 0);
            localStorage.setItem("puntosExtra", 0);
        }

        $(document).ready(function(){
            console.log(arrayPalabra)
        });
    })
</script>

</html>