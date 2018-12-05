<?php

    $id = $_GET['id'];
    $color = $_GET['color'];
    $descripcion = $_GET['descripcion'];

    echo $id;
    echo "</br>";
    echo $color;
    echo "</br>";
    echo $descripcion;
    echo "</br>";

    require "conexion.php";
    $query = 'update colores set color =?, descripcion=? where id=?';
    $edit = $pdo->prepare($query);
    $edit->execute(array($color, $descripcion, $id));

    header("location:index.php");