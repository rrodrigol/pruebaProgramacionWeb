<?php
session_start();
$resultado = '';

if (isset($_SESSION['resultado'])){

    $resultado = $_SESSION['resultado'];
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <form action="procesamiento.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        
        <input type="radio" id="agregar" name="accion" value="agregar">
        <label for="agregar">Agregar</label><br>
        
        <input type="radio" id="buscar" name="accion" value="buscar">
        <label for="buscar">Buscar</label><br>
        
        <input type="radio" id="mostrar" name="accion" value="mostrar">
        <label for="mostrar">Mostrar</label><br>
        
        <input type="radio" id="actualizar" name="accion" value="actualizar">
        <label for="actualizar">Actualizar</label><br>

        <input type="radio" id="calcular" name="accion" value="calcular">
        <label for="calcular">Calcular</label><br>

        <input type="radio" id="filtrar" name="accion" value="filtrar">
        <label for="filtrar">Filtrar</label><br>

        <input type="radio" id="listar" name="accion" value="listar">
        <label for="listar">Listar</label><br>

        <input type="radio" id="calcular-promedio" name="accion" value="calcular-promedio">
        <label for="calcular-promedio">Calcular Promedio</label><br>


        <input type="submit" value="Enviar">
    </form>

    <form action="funciones.php" method="POST">
        <input type="hidden" name="accion" value="limpiar">
        <input type="submit" value="Limpiar Resultados">
    </form>

    <!-- <div id="resultados">
    
       
    </div> -->

    <div id="resultados">
    <?php echo $resultado; 
   
    ?>
    
    </div>

    
</body>
</html>

