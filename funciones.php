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

?>