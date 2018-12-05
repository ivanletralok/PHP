<?php

$link = 'mysql:host=localhost;dbname=yt_colores';
$usuario = 'root';
$pass = '';

try{
    $pdo = new PDO($link, $usuario, $pass);
    // echo "conectado";
} catch (PDOExeption $e){
    print "error". $e->getMessage(). "</br>";
    die();

}

?>