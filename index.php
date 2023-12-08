<?php
require_once __DIR__ . '/controller/infoController.php';

$controller = new InfoController($conn);
$clientes = $controller->getClientes();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registrar_pedido'])) {
        $cliente = $_POST['cliente'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $precio_unitario = $_POST['precio_unitario'];
        $fecha_pedido = $_POST['fecha_pedido'];

        $registroExitoso = $controller->registrarPedido($cliente, $descripcion, $cantidad, $precio_unitario, $fecha_pedido);

        if ($registroExitoso) {
            echo "Pedido registrado con éxito";
        } else {
            echo "Error al registrar el pedido";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/indexStyles.css">
    <title>Pedidos</title>
</head>
<body class="body">
    <form class="formu" action="./index.php" method="POST">
        <label class="labels" for="">Cliente</label>
        <select class="inputs" name="cliente" id="cliente">
            <option value="" selected disabled>Selecciona un cliente</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['id']; ?>"><?= $cliente['nombre']; ?></option>
            <?php endforeach; ?>
        </select>

        <label class="labels" for="">Descripcion del Pedido</label>
        <input class="inputs" type="text" name="descripcion" id="descripcion">

        <label class="labels" for="">Cantidad</label>
        <input class="inputs" type="number" name="cantidad" id="cantidad">

        <label class="labels" for="">Precio Unitario</label>
        <input class="inputs" type="number" name="precio_unitario" id="precio">

        <label class="labels" for="">Fecha del Pedido</label>
        <input class="inputs" type="date" name="fecha_pedido" id="fecha">

        <button type="submit" name="registrar_pedido" class="registrar">Registrar Pedido</button>

    </form>
</body>
</html>