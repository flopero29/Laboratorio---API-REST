<?php
class Producto {
    private $conn;
    private $table = "productos";

    public $id;
    public $nombre;
    public $precio;
    public $stock;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear producto
    public function crear() {
        $query = "INSERT INTO " . $this->table . " SET nombre=:nombre, precio=:precio, stock=:stock";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":stock", $this->stock);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Obtener todos los productos
    public function listar() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Actualizar producto
    public function actualizar() {
        $query = "UPDATE " . $this->table . " SET nombre=:nombre, precio=:precio, stock=:stock WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":stock", $this->stock);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>