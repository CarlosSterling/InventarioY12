<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar productos</title>
</head>

<body>
    <h1>Actualizar productos</h1>
    <form action="index.php?action=update" method="post">

        <label for="id">
            <strong>Id: </strong>
        </label>
        <input type="text" name="id" value="<?php echo htmlspecialchars($registro['id']); ?>" required readonly><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($registro['nombre']); ?>" required><br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?php echo htmlspecialchars($registro['marca']); ?>" required><br>

        <label for="numPlaca">Numero de Placa:</label>
        <input type="text" name="numPlaca" value="<?php echo htmlspecialchars($registro['numPlaca']); ?>" required><br>

        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" value="<?php echo htmlspecialchars($registro['responsable']); ?>" required><br>

        <label for="observacion">Observacion:</label>
        <input type="text" name="observacion" value="<?php echo htmlspecialchars($registro['observacion']); ?>" required><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver al listado</a>
</body>

</html>