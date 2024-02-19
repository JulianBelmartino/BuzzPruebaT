<?php
include './database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tickets</h1>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Dificultad</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `tickets`";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("query failed");
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['dificultad'] ?></td>
                        <td>pendiente</td>
                        <td>edtiar</td>
                        <td>borrar</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>

<p>fin</p>