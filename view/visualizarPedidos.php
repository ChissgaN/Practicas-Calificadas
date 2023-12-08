<?php
require_once __DIR__ . '/../controller/infoController.php';

$controller = new InfoController($conn);
$pedidos = $controller->getPedidos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/pedidosStyles.css">
    <title>Visualizar Pedidos</title>
</head>
<body class="body">
    <a href="../index.php">Back</a>
<table class="tabla">
    <thead class="tHead">
        <tr class="barr">
            <th class="proof">ID Pedido</th>
            <th class="proof">Cliente</th>
            <th class="proof">Descripción</th>
            <th class="proof">Cantidad</th>
            <th class="proof">Precio Unitario</th>
            <th class="proof">Fecha del Pedido</th>
        </tr>
    </thead>
    <tbody class="tb">
    <?php
        foreach ($pedidos as $pedido) {
            echo "<tr>";
            echo "<td class='datos'>" . $pedido['id'] . "</td>";
            echo "<td class='datos'>" . $pedido['cliente_id'] . "</td>";
            echo "<td class='datos'>" . $pedido['descripcion'] . "</td>";
            echo "<td class='datos'>" . $pedido['cantidad'] . "</td>";
            echo "<td class='datos'>" . $pedido['precio_unitario'] . "</td>";
            echo "<td class='datos'>" . $pedido['fecha_pedido'] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>