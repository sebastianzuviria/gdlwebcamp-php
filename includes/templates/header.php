<!doctype html>
<html class="no-js" lang="">

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/all.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@400;700&family=PT+Sans:wght@400;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">
  
  <?php 
  
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace(".php","", $archivo);
  if($pagina == 'invitados' || $pagina == 'index'){
    echo '<link rel="stylesheet" href="css/colorbox.css">';

  } else if($pagina == 'conferencias')
  
  ?>




  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina ?>">

  <!-- Add your site or application content here -->

  <header class="site-header">

    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="info">
            <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12 Dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Buenos Aires, Arg</p>
          </div>
          <h1 class="nombre-sitio">gdlwebcamp</h1>
          <p class="slogan">la mejor conferencia de <span>diseño web</span></p>
        </div>


      </div><!-- Contenido Header -->
    </div><!-- Hero -->

  </header>

  <div class="barra">
    <div class="contenedor contenedor-nav">
      <div class="logo">
        <a href="index.php">
        <img src="img/logo.svg" alt="Logotipo">
        </a>
      </div>
      <div class="menu-movil">
        <i class="fas fa-bars"></i>
      </div>

      <nav class="navegacion">
        <a href="conferencias.php">Conferencias</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>

    </div> <!-- Contenedor -->
  </div> <!-- Barra -->