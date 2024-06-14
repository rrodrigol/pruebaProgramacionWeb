<?php 
session_start();

function agregarProducto($nombre, $cantidad, $valor, $modelo){
    $nombre[] = [
        'cantidad'=> $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];

    return $nombre;
}
function buscarProductoModelo($nombres, $modelo){
    foreach($nombres as $nombre){
        if($nombre['modelo'] == $modelo){
            return "Nombre: " . $producto['nombre'] . "<br>";

        }
    }
    return "Modelo no encontrado.<br>";
}
?>