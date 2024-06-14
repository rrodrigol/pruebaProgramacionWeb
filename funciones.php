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


?>