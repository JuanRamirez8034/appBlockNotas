<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>BLOCK DE NOTAS</title>
</head>
<body>
    <h1>Aplicación de block de notas</h1>
    <div class="principal">
        <form action="index_crear.php" method="POST" class="fcrear">
            <h3>Crea tu  nota</h3>
            <label for="nombre">Nombre para la nota</label>
            <input type="text" id="nombre" name="nombre" placeholder="Name my note" require autofocus>  
            <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
            <input type="submit" value="Crear" name="crear">
            <input type="button" value="Regresar" onclick="window.location.href = '../index.php'">
        </form>
        <?php include('acciones.php');?>
    </div>
</body>
</html>