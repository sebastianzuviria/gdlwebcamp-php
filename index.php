<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>Donec convallis ullamcorper justo, vitae semper lorem blandit sed. Vivamus ipsum felis, vulputate in efficitur
    in, fermentum in diam. Aliquam mollis ipsum eu maximus condimentum. Phasellus faucibus quam non ante ullamcorper
    ultricies. Sed turpis lacus, lobortis at magna eu, iaculis sollicitudin sem. Mauris vestibulum ut lorem at porta
  </p>
</section>
<!--Seccion-->

<section class="programa">
  <div class="contenedor-video">
    <video poster="img/bg-talleres.jpg" autoplay loop>
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogv">
    </video>
  </div>
  <!--Contenedor video-->

  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del Evento</h2>

        <?php
        try {
          require_once('includes/funciones/bd_conexion.php');
          $sql = " SELECT * FROM `categoria_evento` ";
          $sql .= " ORDER BY `orden`";
          $resultado = $conn->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }


        ?>

        <nav class="menu-programa">
          <?php while ($cat = $resultado->fetch_assoc()) { ?>
            <?php $categoria = $cat['cat_evento'] ?>
            <?php $cat_icono = $cat['icono'] ?>
            <a href="#<?php echo strtolower($categoria) ?>"><i class="fa <?php echo $cat_icono ?>"></i> <?php echo $categoria ?></a>
          <?php } ?>
        </nav>

        <?php
        try {
          require_once('includes/funciones/bd_conexion.php');
          $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id";
          $sql .= " AND eventos.id_cat_evento = 3 ";
          $sql .= " ORDER BY evento_id LIMIT 2; ";
          $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id";
          $sql .= " AND eventos.id_cat_evento = 2 ";
          $sql .= " ORDER BY evento_id LIMIT 2; ";
          $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id";
          $sql .= " AND eventos.id_cat_evento = 1 ";
          $sql .= " ORDER BY evento_id LIMIT 2; ";
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>


        <?php $conn->multi_query($sql); ?>
        <?php

        do {
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

          <?php $i = 0; ?>
          <?php foreach ($row as $evento) : ?>

          <?php if($i % 2 == 0) { ?>
            <div id="<?php echo strtolower($evento['cat_evento'])?>" class="info-curso ocultar">
          <?php } ?>  
          
              <div class="detalle-evento">
                <h3><?php echo $evento['nombre_evento']; ?></h3>
                <p><i class="fa fa-clock"></i> <?php echo $evento['hora_evento']; ?></p>
                <p><i class="fa fa-calendar"></i> <?php echo $evento['fecha_evento']; ?></p>
                <p><i class="fa fa-user"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
              </div>
            <!--Talleres-->

            <?php if($i % 2 == 1) { ?>      
               </div>
            <?php } ?> 
          <?php $i++; ?>
          <?php endforeach ?>
          <?php $resultado->free(); ?>
        <?php  } while ($conn->more_results() && $conn->next_result());  ?>



        <div class="contenedor-boton">
          <a href="calendario.php" class="boton">Ver Todos</a>
        </div>
        
        
      <!--Programa-->
    </div>
    <!--Contenedor-->
  </div>
  <!--Seccion Programa-->
</section>

<?php include_once 'includes/templates/invitados.php' ?>

<section class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento">
      <li>
        <p class="numero">0</p>
        Invitados
      </li>
      <li>
        <p class="numero">0</p>
        Talleres
      </li>
      <li>
        <p class="numero">0</p>
        Dias
      </li>
      <li>
        <p class="numero">0</p>
        Conferencias
      </li>
    </ul>
  </div>
</section>
<!--Contador-->

<section class="precios contenedor seccion">
  <h2>Precios</h2>
  <ul class="lista-precios">
    <li>
      <div class="precio">
        <h3>Pase por día</h3>
        <p class="numero">$30</p>
        <ul>
          <li>Bocadillos Gratis</li>
          <li>Todas Las Conferencias</li>
          <li>Todos Los Talleres</li>
        </ul>
        <a href="#" class="boton hollow">Comprar</a>

      </div>
    </li>
    <li>
      <div class="precio">
        <h3>Todos los días</h3>
        <p class="numero">$50</p>
        <ul>
          <li>Bocadillos Gratis</li>
          <li>Todas Las Conferencias</li>
          <li>Todos Los Talleres</li>
        </ul>
        <a href="#" class="boton">Comprar</a>

      </div>
    </li>
    <li>
      <div class="precio">
        <h3>Pase por 2 días</h3>
        <p class="numero">$45</p>
        <ul>
          <li>Bocadillos Gratis</li>
          <li>Todas Las Conferencias</li>
          <li>Todos Los Talleres</li>
        </ul>
        <a href="#" class="boton hollow">Comprar</a>
      </div>
    </li>

  </ul>
</section>

<div id="mapa" class="mapa"></div>
<!--Mapa-->

<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor">
    <div class="testimonial">
      <blockquote>
        <p>Praesent vitae volutpat libero. Cras elit odio, finibus et scelerisque elementum, sollicitudin eu nisi.
          Duis
          pellentesque nec lorem at viverra. Phasellus dictum dictum justo. Suspendisse venenatis felis odio, vel
          cursus
          justo consequat sed.</p>
        <footer>
          <img src="img/testimonial.jpg" alt="Imagen Testimonial">
          <cite>Oswado Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--Fin de Testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>Praesent vitae volutpat libero. Cras elit odio, finibus et scelerisque elementum, sollicitudin eu nisi.
          Duis
          pellentesque nec lorem at viverra. Phasellus dictum dictum justo. Suspendisse venenatis felis odio, vel
          cursus
          justo consequat sed.</p>
        <footer>
          <img src="img/testimonial.jpg" alt="Imagen Testimonial">
          <cite>Oswado Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--Fin de Testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>Praesent vitae volutpat libero. Cras elit odio, finibus et scelerisque elementum, sollicitudin eu nisi.
          Duis
          pellentesque nec lorem at viverra. Phasellus dictum dictum justo. Suspendisse venenatis felis odio, vel
          cursus
          justo consequat sed.</p>
        <footer>
          <img src="img/testimonial.jpg" alt="Imagen Testimonial">
          <cite>Oswado Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--Fin de Testimonial-->
  </div>
</section>
<!--Fin de testimoniales-->

<div class="newsletter parallax">
  <div class="contenido-newsletter contenedor">
    <p>Registrate al Newsletter</p>
    <h3>gdlwebcamp</h3>
    <a href="#mc_embed_signup" class="boton-newsletter boton transparent">Registro</a>
  </div>
</div>
<!--Fin newlleter-->

<section class="seccion">
  <div class="contenedor">
    <h2>Faltan</h2>
    <ul class="cuenta-regresiva">
      <li>
        <p id="dias" class="numero"></p>
        Dias
      </li>
      <li>
        <p id="horas" class="numero"></p>
        Horas
      </li>
      <li>
        <p id="minutos" class="numero"></p>
        Minutos
      </li>
      <li>
        <p id="segundos" class="numero"></p>
        Segundos
      </li>
    </ul>
  </div>
</section>
<!--Fin Cuenta regresiva-->

<?php include_once 'includes/templates/footer.php'; ?>