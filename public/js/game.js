
var contador = 30;
var contadorLetras = 1;
var auxNumLetras = 0;
var interval = null;
var palabra='';
var arrayPalabra = [];

$(window).load(function(){
    //Vamos por le primer match, via Ajax solicitamos info del primer concepto
    buscaPrimerMatch();
})

$(function(){


    //Modal de informacion sobre el concepto
    $('#modalShowInfo').modal({
          dismissible: false,
          opacity: .5,
          inDuration: 300,
          outDuration: 200,
          startingTop: '4%',
          endingTop: '10%',
          ready: function(modal, trigger) {
           
            buscaSoloConcepto();
            setVidas();
            resetAuxiliares();
          },
          complete: function() { 
          timer();
          
          } // Callback for Modal close
          //EMPEZAR CONTEO 
          //QUITAR BLUR
        }
      );
    /**************************************/
    //modal se acabo el tiempo
    $('#modalFinTiempo').modal({
          dismissible: false, 
          opacity: .5,
          inDuration: 300,
          outDuration: 200,
          startingTop: '4%',
          endingTop: '10%',
          ready: function(modal, trigger) {
            //Cuando se inicializa el modal
            //Quitar una vida
            var vida = parseInt(localStorage.getItem("vidas")) - 1;
            localStorage.setItem("vidas", vida);
            resetAuxiliares();
          },
          complete: function() {
            //Ver si aun tiene vidas
            if(parseInt(localStorage.getItem("vidas")) === 0){
                $('#modalPerdedor').modal('open');

            }
            else{
                buscaPrimerMatch();    
            }
          
          }

        }
      );
    /********************************************/
     //modal match completado
    $('#modalMatchCompleto').modal({

          dismissible: false,
          opacity: .5, 
          inDuration: 300, 
          outDuration: 200, 
          startingTop: '4%', 
          endingTop: '10%', 
          ready: function(modal, trigger) { 
            stopTimer();                         
            var next = parseInt(localStorage.getItem("contador")) + 1;
            localStorage.setItem("contador", next);
            //set item local storage
            resetAuxiliares();

          },
          complete: function() {
            resetCountDown(); //Restablecemos el contador para barra de tiempo 
            if(parseInt(localStorage.getItem("contador")) === 6){
                $('#modalMatchExito').modal('open');
            } 
            else{ 
                buscaPrimerMatch();
            }
          } // Callback for Modal close
        }
      );
    /*******************************************/
    $('#modalPerdedor').modal({
          dismissible: false,
          opacity: .5,
          inDuration: 300, 
          outDuration: 200,
          startingTop: '4%',
          endingTop: '10%',
          ready: function(modal, trigger) {
            //localStorage.setItem("contador", 1);
            //set item local storag
            resetAuxiliares();
            stopTimer();                                
          },
          complete: function() {}
        }
      );

    /******************************************/
    //Modal match exito, stage completado 
    $('#modalMatchExito').modal({
          dismissible: false, 
          opacity: .5,
          inDuration: 300, 
          outDuration: 200,
          startingTop: '4%',
          endingTop: '10%',
          ready: function(modal, trigger) {
            localStorage.setItem("contador", 1);
            //set item local storag
            resetAuxiliares();
            stopTimer();
          },
          complete: function() {}
        }
      );

        

})


//inicializa el timer

function timer(){

   interval =  setInterval(countdown,1000);

}

//Realiza el conteo y modifica los segundos
function countdown(){
    var porcentajeXSeg = 100/30;

    var elem = document.getElementById("myBar");

    $('#segundos').text(contador);

    width = contador * porcentajeXSeg; 
    elem.style.width = width + '%';

    //Si el tiempo es igual a 10 cambia la barra a rojo
    if(contador === 10 ){
      elem.style.backgroundColor = "#f44336";
    } 
    //console.log(width);

    //console.log("hola mundo" + "__ " + contador);
    
    contador = contador - 1;

    if(contador == -1){
        resetCountDown() //Restablecemos el contador para barra de tiempo     
        clearInterval(interval);
        $('#modalFinTiempo').modal('open');


    }

}

function setVidas(){

    var aux = parseInt(localStorage.getItem("vidas"));
    var puntos = parseInt(localStorage.getItem("puntos"));

    var renderVidas = '';
    for (var i = 0; i < aux; i++) {
        renderVidas = renderVidas + '<i class="material-icons">grade</i>';
    };

    $('#vidas-icon').html(renderVidas);

    $('#puntos').text(puntos+" puntos");
}

//Busca informacion del match
//Render a todo el contenedor del juego
function buscaPrimerMatch(){

    var next = localStorage.getItem("contador");
    var carrera = localStorage.getItem("carrera");

    $.ajax({
        type:'POST',
        url: 'controller/ControladorJuego.php',
        data: {siguiente:next, carrera:carrera },
        success: function(resp){
            if(resp!=""){                   
                $('.container-game-pad').html(resp);
                $('#modalShowInfo').modal('open');
                //console.log(resp);
                console.log($('#testInput1').text())
            }
        }
    });
}

//Busca solo el concepto para mostrarlo en el modal de pista
function buscaSoloConcepto(){

    var next = localStorage.getItem("contador");
    var carrera = localStorage.getItem("carrera");

    $.ajax({
        type:'POST',
        url: 'controller/ControladorJuego.php',
        data: {soloConcepto:next, carreraForConcepto:carrera },
        success: function(resp){
            if(resp!=""){                   
                $('#setTexto').text(resp);
            }
        }
    });

}


//Agrega una letra a los inputs vacios al precional el boton 
function miLetra(letra){

   $('input[name^="input-letra"]').each(function() {

        var defPalabra = localStorage.getItem("palabra");

        var totalLetras = parseInt(localStorage.getItem("cantidadLetras"));
        //saber cuantos caracteres tiene defPalabra
        console.log(defPalabra)

        if($(this).val() === null || $(this).val() === ''){     

            $(this).val(letra);

            arrayPalabra.push(letra);

            auxNumLetras = auxNumLetras + 1;

            console.log(arrayPalabra);

            console.log("hay " + auxNumLetras + "letras clickeadas");

            palabra = arrayPalabra.join('');
            //Si completa la plalabra
            console.log("------- " + palabra); 
            if(palabra === defPalabra){
                palabra = '';
                console.log("match palabra")
                console.log("segundos: ----"+contador+"-----");
                matchPalabraCompleta();
            }
            //Si no esta correcta la palabra
            else if(auxNumLetras === totalLetras && palabra !== defPalabra){
              matchError();
            }

            return false;

        }
        
        
    });            

}

//Borramos la ultima letra ingresada

function borraLetra(){

  var auxBorrar = 0;

   $('input[name^="input-letra"]').each(function(){

    auxBorrar = auxBorrar + 1;

      if(auxBorrar === auxNumLetras){

          $(this).val('');
          auxNumLetras = auxNumLetras - 1;
          arrayPalabra.pop();
          return false;                  
      }
    //Recorremos todos los inputs y vaciamos el ultimo

   });

}

//Si completo la palabra muestra modal completado
function matchPalabraCompleta(){

    //Pintamos de verde los inputs letras
    $('.hack-input').css("color" ,"#38a03c");
    //Contador contiene los puntos restantes al completar la palabra
    //los guardamos como puntos extra  
    var masPuntos = parseInt(localStorage.getItem("puntos")) + 10;

    var extraPT = parseInt(localStorage.getItem("puntosExtra")) + contador;

    localStorage.setItem("puntos", masPuntos);
    localStorage.setItem("puntosExtra", extraPT); 

     
                         
     $('#modalMatchCompleto').modal('open');
}

//palabra erronea, pinta las letras de rojo
function matchError(){
    $('.hack-input').css("color" ,"#f44336");            
}

function resetAuxiliares(){

  arrayPalabra = [];
  palabra = '';
  auxNumLetras = 0;
}

function resetCountDown(){

  contador = 30;

}

function stopTimer(){
  clearInterval(interval);
}

         