        <?php 

            //Creando array para incrustarlo en inputs
            $letrasPalabra = array();
            $letrasPalabra = str_split($concepto['palabra']);
            $cantLetras = strlen($concepto['palabra']);   

         ?>

        <div id="progreso-contenedor" class="row no-margin-bottom">
            <div class="col s9 offset-s3 no-padding-left">

                <div class="col s8 inter-progreso">
                    <p class="segundos-numero"><span id="segundos">30</span> seg</p>
                    <div id="myProgress" class="z-depth-3">
                      <div id="myBar"></div>
                    </div>
                </div>

                <div class="col s4 no-padding-left">                    
                    <p id="vidas-icon"><!--i class="material-icons">grade</i><i class="material-icons">grade</i><i class="material-icons">grade</i--></p>
                    <strong id="puntos"></strong>
                </div>

            </div>
        </div>

        <!-- FIN CONTENEDOR BARRA PROGRESO Y VIDA -->

        <!-- CONTENEDOR PARA EL MANEJO DE IMAGENES -->
        <div id="img-contenedor" class="row no-margin-bottom">

            <div class="col s6 offset-s3 cont-general-img ">                                
                <div class="row row-img-uno no-margin-bottom">
                    <div class="col s6 img-izq z-depth-3">
                        <img src="public/img/<?php print $imagenes[0]['name_img']?>" alt="" class="img-concepto">
                    </div>
                    <div class="col s6 img-der z-depth-3">
                        <img src="public/img/<?php print $imagenes[1]['name_img']?>" alt="" class="img-concepto">
                    </div>
                </div>
                <div class="row row-img-dos no-margin-bottom">
                    <div class="col s6 img-izq z-depth-3">
                        <img src="public/img/<?php print $imagenes[2]['name_img']?>" alt="" class="img-concepto">
                    </div>
                    <div class="col s6 img-der z-depth-3">
                        <img src="public/img/<?php print $imagenes[3]['name_img']?>" alt="" class="img-concepto">
                    </div>
                </div>
            </div>                    
        </div>
        <!-- FIN CONTENEDOR MANEJO DE IMAGENES -->

        <!-- CONTENEDOR INPUT PALABRAS SELECCIONADAS -->

        <div id="input-palabra-contenedor" class="row no-margin-bottom">
            <div class="col s12">                                
                <div class="row test-box" style="">                    
                    
                    <?php foreach ($letrasPalabra as $letra) { ?>
                        <div class="input-field col s1 hack-width-s1t z-depth-4">
                            <input type="text" class="hack-input" value="" name="input-letra" onchange="onChangeInputLetra()">
                        </div>

                    <?php } ?>                                    
                </div>

            </div>     
        </div>

        <!-- FIN CONTENEDOR INPUT PALABRAS SELECCIONADAS -->

        <!-- CONTENEDOR CONTROL SELECCION DE PALABRAS Y HERRAMIENTAS DE AYUDA -->
        <div id="control-letras-contenedor" class="row no-margin-bottom">
            <div class="col s6 offset-s3 no-padding-left no-paddign-right inter-control-letras-contenedor z-depth-5">                                                
                <div class="col s10">
                    <div class="row test-box">
                        <!-- RANDOM LETRAS BOTONES -->        
                        <?php foreach ($letrasPalabra as $letra) { ?>

                            <div class="col s1 contendor-btn-letras">
                                <a class="btn btn-letras" href="#" onclick="miLetra('<?php print $letra ?>');"><?php print $letra ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col s2">                    
                    <div class="col s12 help-inter-contenedor no-padding-left z-depth-2">
                        <a class="btn btn-help" href=""><i class="material-icons">search</i></a>
                    </div>
                    <div class="col s12 help-inter-contenedor no-padding-left z-depth-2">
                        <a class="btn btn-help" href="#" onclick="borraLetra();"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>     
        </div>

        <!-- FIN CONTENEDOR CONTROL SELECCION DE PALABRAS Y HERRAMIENTAS DE AYUDA -->

        <script>
            var palabraC = '<?php print $concepto['palabra'];?>';
            var cLet ='<?php print $cantLetras;?>';

            localStorage.setItem("palabra", palabraC);
            localStorage.setItem("cantidadLetras", cLet);
        </script>