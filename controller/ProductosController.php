<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../model/Producto.php';

$database = new Database();
$db = $database->getConnection();
$producto = new Producto($db);

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'POST':
        // Crear producto
        $data = json_decode(file_get_contents("php://input"));
        $producto->nombre = $data->nombre;
        $producto->precio = $data->precio;
        $producto->stock = $data->stock;

        if($producto->crear()) {
            http_response_code(201);
            echo json_encode(array("message" => "Producto creado."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Error al crear producto."));
        }
        break;

    case 'GET':
        // Listar productos
        $stmt = $producto->listar();
        $num = $stmt->rowCount();

        if($num > 0) {
            $productos_arr = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $producto_item = array(
                    "id" => $id,
                    "nombre" => $nombre,
                    "precio" => $precio,
                    "stock" => $stock
                );
                array_push($productos_arr, $producto_item);
            }
            http_response_code(200);
            echo json_encode($productos_arr);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "No se encontraron productos."));
        }
        break;

    case 'PUT':
        // Actualizar producto
        $data = json_decode(file_get_contents("php://input"));
        $producto->id = $data->id;
        $producto->nombre = $data->nombre;
        $producto->precio = $data->precio;
        $producto->stock = $data->stock;

        if($producto->actualizar()) {
            http_response_code(200);
            echo json_encode(array("message" => "Producto actualizado."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Error al actualizar producto."));
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(array("message" => "Método no permitido."));
        break;
}
?>