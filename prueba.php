<?php

function agregarProducto(){
    $nombre[] = [
        'cantidad'=> 2,
        'valor' => 3,
        'modelo' => 'patas'
    ];

    return $nombre;
}
$funcion= agregarProducto();
echo $funcion;

?>