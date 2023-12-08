<?php
require_once __DIR__ . '/../model/cone.php';


class InfoController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getClientes() {
        $query = "SELECT * FROM clientes";
    
        try {
            $stm = $this->conn->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function registrarPedido($cliente_id, $descripcion, $cantidad, $precio_unitario, $fecha_pedido) {
        $query = "INSERT INTO pedidos (cliente_id, descripcion, cantidad, precio_unitario, fecha_pedido) VALUES (:cliente_id, :descripcion, :cantidad, :precio_unitario, :fecha_pedido)";
    
        try {
            $stm = $this->conn->prepare($query);
            $stm->bindParam(':cliente_id', $cliente_id);
            $stm->bindParam(':descripcion', $descripcion);
            $stm->bindParam(':cantidad', $cantidad);
            $stm->bindParam(':precio_unitario', $precio_unitario);
            $stm->bindParam(':fecha_pedido', $fecha_pedido);
    
            $resultado = $stm->execute();
    
            if ($resultado) {
                echo "Inserción exitosa";
                header("Location: ../view/visualizarPedidos.php");
            } else {
                throw new Exception("Error al insertar el pedido: " . implode(", ", $stm->errorInfo()));
            }
        } catch (PDOException $e) {
            throw new Exception("Error de PDO: " . $e->getMessage());
        }
    }

    public function getPedidos() {
        $query = "SELECT * FROM pedidos";

        try {
            $stm = $this->conn->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>