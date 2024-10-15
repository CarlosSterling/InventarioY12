<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Registros</title>
</head>

<body>
    <h1>Lista de Registros</h1>

    <a href="index.php?action=create">Crear nuevo registro</a>
    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="search">
        <input type="text" name="buscar" placeholder="Buscar">
        <button type="submit">Buscar</button>
    </form>

    <a href="index.php" style="margin-top: 10px; display: inline-block;">
        Mostrar productos
    </a>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Marca(s)</th>
                <th>Numero de placa(s)</th>
                <th>Responsable</th>
                <th>Observacion</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato): ?>
                <tr>
                    <td><?php echo htmlspecialchars($dato['id']); ?></td>
                    <td><?php echo htmlspecialchars($dato['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($dato['marca']); ?></td>
                    <td><?php echo htmlspecialchars($dato['numPlaca']); ?></td>
                    <td><?php echo htmlspecialchars($dato['responsable']); ?></td>
                    <td><?php echo htmlspecialchars($dato['observacion']); ?></td>
                    <td>
                        <a href="index.php?action=update&id=<?php echo $dato['id']; ?>">Editar</a>
                        <a href="index.php?action=delete&id=<?php echo $dato['id']; ?>" onclick="return confirm('¿Está seguro de eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>