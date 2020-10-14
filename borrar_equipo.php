<?php
    include("conexion.php");

    $codEquipo = $_POST['codEquipo'];

    $sql = "DELETE FROM `equipos` WHERE codEquipo = :codEquipo";
    $delete = $pdo->prepare($sql);
    $delete->execute(array('codEquipo' => $codEquipo));
    echo $codEquipo;

    header('Location: /AED-EquiposFutbol/equipos.php');
?>