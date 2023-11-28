<main>
        <h1>Administrador de Videojuegos</h1>
        <?php
            if($resultado){
                $mensaje = mostrarNotificacion(intval($resultado));
                if($mensaje){?>
                    <p><?php echo s($mensaje);?></p>
                <?php }
            }
        ?>
            
        <a href="/admin">Nuevo Juego</a>
        <a href="/admin">Nuevo Género</a>
        <h2>Juegos</h2>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Link</th>
                <th>Género(s)</th>
            </thead>
            <tbody><!--Mostrar los resultados-->
                <?php foreach($juegos as $key=>$juego):?>
                <tr>
                    <td><?php echo $juego->id; ?></td>
                    <td><?php echo $juego->nombre; ?></td>
                    <td><?php echo $juego->autor; ?></td>
                    <td><a target="_BLANK" href="<?php echo $juego->link; ?>"><?php echo $juego->link; ?></a></td>
                    <td><?php echo $juegos_generos[$key]["generos"]; ?></td>
                    <!--<td>-->
                    <!--    <form method="POST" class="w-100" action="/propiedades/eliminar">-->
                    <!--        <input type="hidden" name="id" value="<?php echo $juego->id?>">-->
                    <!--        <input type="hidden" name="tipo" value="propiedad">-->
                    <!--        <input type="submit" class="boton-rojo-block" value="Eliminar">-->
                    <!--    </form>-->
                    <!--    <a href="/propiedades/actualizar?id=<?php echo $juego->id;?>" class="boton-amarillo-block">Actualizar</a>-->
                    <!--</td>-->
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <h2>Generos</h2>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
            </thead>
            <tbody><!--Mostrar los resultados-->
                <?php foreach($generos as $genero):?>
                <tr>
                    <td><?php echo $genero->id; ?></td>
                    <td><?php echo $genero->nombre; ?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</main>