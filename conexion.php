<?php
/*Datos de conexion a la base de datos*/
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bdfutbol";

 
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
}catch(PDOException $e){
    echo $e->getMessage();
}


 
?>