<?php 
session_start();

function agregarProducto($producto, $nombre, $cantidad, $valor, $modelo){
    $producto[] = [
        'nombre' => $nombre,
        'cantidad'=> $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];

    return $nombre;
}
function buscarProductoModelo($producto, $modelo){
    foreach($productos as $producto){
        if($producto['modelo'] == $modelo){
            return "Producto: " . $producto['producto'] . "<br>";

        }
    }
    return "Modelo no encontrado.<br>";
}

function mostrarProducto($productos){
    $resultado  = '';
    foreach($productos as $producto){
        $resultado .= "Nombre: " . $producto['nombre'] . "<br>";

    }
    return $resultado;
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
?>