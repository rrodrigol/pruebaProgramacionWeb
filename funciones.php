<?php 
session_start();

function agregarProducto($productos, $nombre, $cantidad, $valor, $modelo){
    $productos[] = [
        'nombre' => $nombre,
        'cantidad'=> $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];

    return $nombre;
}
function buscarProductoModelo($productos, $modelo){
    foreach($productos as $producto){
        if($producto['modelo'] == $modelo){
            return "Producto: " . $producto['nombre'] . "<br>";

        }
    }
    return "Modelo no encontrado.<br>";
}

function mostrarProducto($productos){
    $result  = '';
    foreach($productos as $producto){
        $result .= "Nombre: " . $producto['nombre'] . "<br>";

    }
    return $result;
}

function actualizarProducto($productos, $nombre, $cantidad, $valor, $modelo){
    foreach($productos as $producto){
        if ($producto['modelo'] == $modelo) {
            $producto['nombre'] == $nombre;
            $producto['valor'] == $valor;
            $producto['cantidad'] == $cantidad;
            break;
        }
    }
    return $productos;
}

function calcularValor($productos, $valor, $cantidad){
    $suma = 0;
    foreach($productos as $producto){
        $suma += $producto['cantidad']*$producto['valor'];
 }
    return $suma;
}
function filtrarPorValor($productos, $valor){
    foreach($productos as $producto){
        if($producto['valor'] > $valor){
            return "Producto: " . $producto['nombre'] . "<br>";
        }
    }
    return "No existen productos con ese fltro.<br>";
}

function modeloDisponible($productos, $cantidad){
    foreach($productos as $producto){
        if($cantidad != 0){
            return "Modelos disponibles: " . $producto['modelo'] . "<br>";
        }
    }
    return "No hay productos";
}

function calcularPromedio($productos, $valor, $cantidad){
    $total = 0;
    $cant = 0;
    foreach($productos as $producto){
        $total += $producto['valor'];
        $cant ++;

    }
    return $total/$cant;
}

if (!isset($_SESSION['productos'])){
    $_SESSION['productos'] = [];
}

$productos = $_SESSION['productos'];
$resultado = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $accion = $_POST['accion'];
    $nombre = $_POST['nombre'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $modelo = $_POST['modelo'] ?? '';

    switch ($accion) {

        case 'agregar':
            $productos = agregarProducto($productos, $nombre, $cantidad, $valor, $modelo);
            $resultado = "Producto agregado correctamente";
            break;

        case 'buscar':
            $resultado = buscarProductoModelo($productos, $modelo);
            break;
        
        case 'mostrar':
            $resultado = mostrarProducto($productos);
            break;
        
        case 'actualizar':
            $productos = actualizarProducto($productos, $nombre, $cantidad, $valor, $modelo);
            $resultado = "Producto actualizado correctamente";
            break;

        case 'calcular':
            $resultado = calcularValor($productos, $valor, $cantidad);
            break;

        case 'filtrar':
            $resultado = filtrarPorValor($productos, $valor);
            break;

        case 'listar':
            $resultado = modeloDisponible($productos, $cantidad);
            break;

        case 'calcular-promedio':
            $resultado = calcularPromedio($productos, $valor, $cantidad);
            break;

        case 'limpiar':
            $_SESSION['usuarios'] = [];
            $resultado = "Resultados limpiados correctamente.<br>";
            session_destroy();
            break;
    
        default:
            $resultado = "Acción no válida.";
    }

    $_SESSION['productos'] = $productos;
    $_SESSION['resultado'] = $resultado;
}

header("Location: index.php");
exit();
?>