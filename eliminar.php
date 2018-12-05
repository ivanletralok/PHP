<?php

require "conexion.php";

$id = $_GET['id'];

// echo $id;

$query = 'DELETE FROM colores WHERE  id = ?';
$eliminar = $pdo->prepare($query);
$eliminar->execute(array($id));
header("location:index.php");