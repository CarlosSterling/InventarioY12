<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
</head>

<body>
    <h1>Registrar un nuevo producto</h1>

    <form action="index.php?action=create" method="post">

        <label for="identificacion">Nombre Producto:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="marca">Marca del Producto</label>
        <input type="text" name="marca" id="marca" required><br>

        <label for="numPlaca">Num placa producto:</label>
        <input type="text" name="numPlaca" id="numPlaca" required><br>

        <label for="responsable">Responsable del equipo</label>
        <input type="text" name="responsable" id="responsable" required><br>

        <label for="observacion">Observacion:</label>
        <input type="text" name="observacion" id="observacion" required><br>

        <button type="submit">Registrar</button>
    </form>
    <a href="index.php">Volver al listado</a>

    </form>

</body>

</html>