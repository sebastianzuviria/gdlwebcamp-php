<?php include_once 'includes/templates/header.php' ?>

<section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento ";
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= " INNER JOIN invitados ";
        $sql .= " ON eventos.id_inv = invitados.invitado_id";
        $sql .= " ORDER BY evento_id ";
        $resultado = $conn->query($sql);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


    ?>

    <div class="calendario">
        <?php

        $calendario = array();
        while ($eventos = $resultado->fetch_assoc()) {

            $fecha = $eventos['fecha_evento'];

            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fa' . ' ' . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
            );

            $calendario[$fecha][] = $evento;
        ?>
        <?php  }  // while de fetch_assoc() ?>

        <?php
        //imprime todos los eventos
        foreach ($calendario as $dia => $lista_eventos) {   ?>
            <h3 class="fecha-calendario">
                <i class="fa fa-calendar"></i>
                <?php
                //Formateo de fecha Unix
                setlocale(LC_TIME, 'es_ES.UTF-8');

                //Formateo para windows de fecha
                setlocale(LC_TIME, 'spanish');

                echo strftime("%d de %B del %Y", strtotime($dia)); ?>
            </h3>
            <div class="listado-eventos">
            <?php foreach ($lista_eventos as $evento) {  ?>
                <div class="dia">
                    <p class="titulo"><?php echo $evento['titulo']; ?></p>
                    <p class="hora"><i class="fa fa-clock" aria-hidden="true"></i>
                    <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                    </p>
                    <p>
                    <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i>    
                    <?php echo $evento['categoria']; ?></p>
                    <p>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?php echo $evento['invitado']; ?>
                    </p>

                </div>


            <?php } //fin foreach evento
            ?>
            </div>

        <?php } //fin foreach dia 
        ?>





    </div>

    <?php
    $conn->close();
    ?>


</section>


<?php include_once 'includes/templates/footer.php' ?>