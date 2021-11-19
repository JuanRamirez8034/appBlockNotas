<?php
    //aca van las funciones de la aplicacion
    //crear eliminar ver editar
    //crear archivo
    if(isset($_POST['crear'])){
        $nombre_fichero = $_POST['nombre'];
        $contenido_fichero = $_POST['texto'];
        if($nombre_fichero != "" && $contenido_fichero != ""){
            if(!file_exists('../notas/'.$nombre_fichero.'.txt')){
                $_crear_fichero = fopen('../notas/'.$nombre_fichero.'.txt', 'a') or die('Error al crear el arcivo');
                $_almacernar_informacion = fwrite($_crear_fichero, $contenido_fichero);
                ?><script>alert('Fichero '+ <?php echo '"'.$nombre_fichero .'"';?> +' creado')</script><?php
                fclose($_crear_fichero);
                ?> <script>window.location.href = '../index.php'</script> <?php
            }else{
                ?>
                    <script>
                        //alert('Este archivo ya existe')
                        //window.location.href = 'index_crear.php';
                    </script>
                <?php
                ?>
                <div>
                    <span class="escoje">Ya existe el archivo ¿Desea verlo?</span>
                    <input type="button" value="ACEPTAR" onclick="window.location.href = '../assets/index_ver.php'">
                </div>
                <?php
            }
        }else{
            ?>
                <script>
                    alert('Los campos no puedesn estar vacios.\nNo se permiten notas en blanco.')
                    window.location.href = 'index_crear.php';
                </script>
            <?php
        }
       
    }
    //Leer archivos
    if(isset($_POST['verarchivo'])){
        //si existe el post guardar variable
        $nombre_fichero = $_POST['ver'];
        //no puede estar vacia o null la variable
        if(!empty($nombre_fichero)){
            if(file_exists('../notas/'.$nombre_fichero.'.txt')){
                //llamamos al fichero y lo almacenamos en una variable
                $_fichero = fopen('../notas/'.$nombre_fichero.'.txt', 'r') or die('No existe esta nota');
                //mientras el puntero que lee el fichero no llegue al final se lee el archivo
                ?>
                <div class="verNota">
                <p>
                <?php
                while(!feof($_fichero)){
                    //por cada vuelta vamos trayendo la informacion y sus saltos de lineas
                    $extraer = fgets($_fichero);
                    //imprimimos y hacemos salto de linea
                    echo $extraer . '<br>';
                }
                ?>
                </p>
                </div>
                <?php
                //cerramos el fichero
                fclose($_fichero);
            }else{
                ?>
                    <div>
                    <span class="escoje">No existe la nota ¿Desea crearla?</span>
                    <input type="button" value="ACEPTAR" onclick="window.location.href = '../assets/index_crear.php'">
                </div>
                <?php
            }
        }else{
            ?>
                <span class="escoje" style="color: red;">El campo no puede estar vacio</span>
            <?php
        }
    }

    //editar archivos
    
    if(isset($_POST['buscaedita'])){
        $_salve = '';
        $nombre_fichero = $_POST['editar'];
        if(!empty($nombre_fichero)){
            if(file_exists('../notas/'.$nombre_fichero.'.txt')){
                $_fichero = fopen('../notas/'.$nombre_fichero.'.txt', 'r') or die('Error al abrir el archivo ->'.$nombre_fichero);
                while(!feof($_fichero)){
                    $_salve = $_salve . fgets($_fichero);
                    //echo  $_salve;
                }
                fclose($_fichero);
            ?>
                <form action="acciones.php" method="POST" class="fcrear">
                    <span>Su archivo: <?php  echo ' '.$nombre_fichero.' ' ;?> </span>
                    <input type="text" name="nombreArchivo" id="" value="<?php  echo $nombre_fichero;?>">
                    <textarea name="infArchivo" id="inf" cols="30" rows="10" autofocus><?php echo $_salve; ?></textarea>
                    <input type="submit" value="Guardar" name="guardanew">
                </form>
            <?php
            }else{
                ?>
                <div>
                    <span class="escoje">No existe la nota ¿Desea crearla?</span>
                    <input type="button" value="ACEPTAR" onclick="window.location.href = '../assets/index_crear.php'">
                </div>
            <?php
            }
        }else{
            ?> 
            <script>
                window.location.href = 'index_editar.php';
                alert('El campo no puede estar vacio')</script>
            <?php
        }
        
        
    }
    //editar inf recrear
    if(isset($_POST['guardanew'])){
        $nombre_fichero = $_POST['nombreArchivo'];
        $contenido_fichero = $_POST['infArchivo'];
        if($nombre_fichero != "" && $contenido_fichero != ""){
            $_crear_fichero = fopen('../notas/'.$nombre_fichero.'.txt', 'w') or die('Error al crear el arcivo');
            $_almacernar_informacion = fwrite($_crear_fichero, $contenido_fichero);
            ?><script>alert('Fichero  actualizado')</script><?php
            fclose($_crear_fichero);
            ?> <script>window.location.href = '../index.php'</script> <?php
        }else{
            ?>  <script>
                    window.location.href = '../assets/index_editar.php'
                    alert('error al Reconstruir');
                </script> 
            <?php
        }
       
    }
    //eliminar archivo
    if(isset($_POST['eliminar'])){
        $nombre_fichero = $_POST['nombref'];
        if(!empty($nombre_fichero)){
            $_fichero = '../notas/'.$nombre_fichero.'.txt';
            if(file_exists($_fichero)){
                unlink($_fichero);         
                ?> 
                <script>
                    alert('Eliminado correctamente')
                </script>
                <?php
            }else{
                ?> <script>alert('Nota no encontrada')</script><?php
            }
        }else{
            ?> <script>alert('El campo no puede estar en blanco')</script><?php
        }
        
    }
?>