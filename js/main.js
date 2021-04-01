(function () {
  "use strict";
  document.addEventListener('DOMContentLoaded', function () {
    console.log("funcionando");


    //Campos Datos Usuarios
    var nombre = document.querySelector('#nombre');
    var apellido = document.querySelector('#apellido');
    var email = document.querySelector('#email');


    //Campos de los Pases
    var paseDia = document.querySelector('#pase_dia');
    var paseCompleto = document.querySelector('#pase_completo');
    var paseDosDias = document.querySelector('#pase_dosdias');


    //Botones y Divs
    var calcular = document.querySelector('#botonCalcular');
    var pagar = document.querySelector('#botonPagar');
    var errorDiv = document.querySelector('#error');
    var resumen = document.querySelector('#lista-productos');
    var sumaTotal = document.querySelector('#suma-total');

    //Regalo y extras
    var regalo = document.querySelector('#regalo');
    var camisas = document.querySelector('#camisa_evento');
    var etiquetas = document.querySelector('#etiquetas');

    //Boton Pagar
    pagar.disabled = true;
    

    //Validacion de pagina
if (document.querySelector('#botonCalcular')) {

      calcular.addEventListener('click', calcularMontos);

      paseDia.addEventListener('blur', mostrarDias);
      paseDosDias.addEventListener('blur', mostrarDias);
      paseCompleto.addEventListener('blur', mostrarDias);


      //Validaciones de Campos

      nombre.addEventListener('blur', function () {
        errorDiv.style.display = "none";
        if (this.value == "") {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "Necesitamos tu nombre para validar el pago";
          errorDiv.style.border = ".2rem solid red"
        }
      })
      apellido.addEventListener('blur', function () {
        errorDiv.style.display = "none";
        if (this.value == "") {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "Necesitamos tu apellido para validar el pago"
          errorDiv.style.border = ".2rem solid red"
        }
      })
      email.addEventListener('blur', function () {
        errorDiv.style.display = "none";
        if (this.value == "") {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "Necesitamos tu email para validar el pago";
          errorDiv.style.border = ".2rem solid red";
        } else if (this.value.indexOf('@') == -1) {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "Su email es incorrecto";
          errorDiv.style.border = ".2rem solid red";
        }
      })

      function calcularMontos(evt) {
        evt.preventDefault();
        if (regalo.value === '') {
          alert("Debes elegir un regalo");
          regalo.focus();
        } else {
          var boletosDia = parseInt(paseDia.value, 10) || 0,
            boletosDosDias = parseInt(paseDosDias.value, 10) || 0,
            boletosCompleto = parseInt(paseCompleto.value, 10) || 0,
            cantCamisas = parseInt(camisas.value, 10),
            cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

          var totalPagar = (boletosDia * 30) + (boletosDosDias * 45) + (boletosCompleto * 50) + ((cantCamisas * 500) * 0.85) + (cantEtiquetas * 150);
          console.log(totalPagar.toFixed(2));

          var listadoProductos = [];

          if (boletosDia > 0) {
            if (boletosDia > 1) {
              listadoProductos.push(boletosDia + " Pases por día");
            } else {
              listadoProductos.push(boletosDia + " Pase por día")
            }
          }
          if (boletosDosDias > 0) {
            if (boletosDosDias > 1) {
              listadoProductos.push(boletosDosDias + " Pases por 2 días");
            } else {
              listadoProductos.push(boletosDosDias + " Pase por 2 días")
            }
          }
          if (boletosCompleto > 0) {
            if (boletosCompleto > 1) {
              listadoProductos.push(boletosCompleto + " Pases Completos");
            } else {
              listadoProductos.push(boletosCompleto + " Pase Completo")
            }
          }
          if (cantCamisas > 0) {
            if (cantCamisas > 1) {
              listadoProductos.push(cantCamisas + " Camisas");
            } else {
              listadoProductos.push(cantCamisas + " Camisa")
            }
          }
          if (cantEtiquetas > 0) {
            if (cantEtiquetas > 1) {
              listadoProductos.push(cantEtiquetas + " Paquetes de 10 Etiquetas");
            } else {
              listadoProductos.push(cantEtiquetas + " Paquete de 10 Etiquetas")
            }
          }


          resumen.innerHTML = ""; //Evita que al cambiar algun valor se vuelva a repetir debajo la lista, entonces primero vacia y vuelve a cargarla

          listadoProductos.map(function (producto) {
            resumen.innerHTML += producto + "<br/>";
          });

          sumaTotal.innerHTML = "$ " + totalPagar.toFixed(2);

          pagar.disabled = false;
          document.getElementById('total_pedido').value = totalPagar;



        } //Fin else de funcion calcular montos
      } //Fin funcion calcular montons

      function mostrarDias() {
        var boletosDia = parseInt(paseDia.value, 10) || 0,
          boletosDosDias = parseInt(paseDosDias.value, 10) || 0,
          boletosCompleto = parseInt(paseCompleto.value, 10) || 0;

        var diasElegidos = [];
        document.querySelector('.eventos').style.display = "none";
        document.querySelector("#viernes").style.display = "none";
        document.querySelector("#sabado").style.display = "none";
        document.querySelector("#domingo").style.display = "none";

        if (boletosDia > 0) {
          diasElegidos.push("viernes");
        }
        if (boletosDosDias > 0) {
          diasElegidos.push("viernes", "sabado");
        }
        if (boletosCompleto > 0) {
          diasElegidos.push("viernes", "sabado", "domingo");
        }

        console.log(diasElegidos);


        diasElegidos.map(function (dia) {
          document.querySelector('.eventos').style.display = "block";
          document.querySelector(`#${dia}`).style.display = "block";
        })

      } // Fin funcion mostrar dias

    }

  }); // DOM CONTENT LOADED
})();


//Funciones JQuery

$(function () {

  //Lettering Titulo
  $('.nombre-sitio').lettering();

  //Agregar clase a menu

  $('body.conferencias .navegacion a:contains("Conferencias")').addClass('nav-activo');
  $('body.calendario .navegacion a:contains("Calendario")').addClass('nav-activo');
  $('body.invitados .navegacion a:contains("Invitados")').addClass('nav-activo');
  $('body.registro .navegacion a:contains("Reservaciones")').addClass('nav-activo-reservaciones');

  //Menu fijo
  var windowHeight = $(window).height();
  var barraHeight = $('.barra').innerHeight();

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({
        'margin-top': barraHeight + 'px'
      });
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({
        'margin-top': '0px'
      });
    }

  });

  //Menu Responsive

  $('.menu-movil').on('click', function () {
    $('.navegacion').slideToggle();
  });

  //Programa de talleres conferencias y seminarios
  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click', function () {
    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');
    var enlacePresionado = $(this);
    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');
    var enlace = enlacePresionado.attr('href');
    $('.ocultar').hide();
    $(enlace).fadeIn(600);
    $

    return false;
  });



  //Animaciones de Contador
  var resumenLista = $('.resumen-evento');
  if(resumenLista.length > 0) {
      $('.resumen-evento').waypoint(function(){
        $('.resumen-evento li:nth-child(1) p').animateNumber({
            number: 6
          }, 1100);
          $('.resumen-evento li:nth-child(2) p').animateNumber({
            number: 15
          }, 1500);
          $('.resumen-evento li:nth-child(3) p').animateNumber({
            number: 3
          }, 1300);
          $('.resumen-evento li:nth-child(4) p').animateNumber({
            number: 9
          }, 1200);

      }, {
          offset: '80%'
      });
  }

 

  //Cuenta Regresiva
  $('.cuenta-regresiva').countdown('2021/12/10 09:00:00', function (evt) {
    $('#dias').html(evt.strftime('%D'));
    $('#horas').html(evt.strftime('%H'));
    $('#minutos').html(evt.strftime('%M'));
    $('#segundos').html(evt.strftime('%S'));
  });

  //ColorBox

  $('.invitado-info').colorbox({inline:true, width:"50%"});
  $('.boton-newsletter').colorbox({inline:true, width:"50%"});

});
