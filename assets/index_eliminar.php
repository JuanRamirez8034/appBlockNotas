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
        <form action="index_eliminar.php" method="POST" class="fcrear">
            <h3>Eliminar Nota</h3>
            <label for="nombref">Ingrese el nombre de la nota</label>
            <input type="text" name="nombref" id="nombref" placeholder="Name My note Example.txt" require autofocus>
            <input type="submit" value="Eliminar" name="eliminar">
            <input type="button" value="Regresar" onclick="window.location.href = '../index.php'">
        </form>
        <?php include('acciones.php');?>
    </div>
</body>
</html>