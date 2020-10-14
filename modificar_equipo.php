<?php

    include("conexion.php");

    $codEquipo = $_POST['codEquipo'];
    $nomEquipo = $_POST['nomEquipo'];
    $codLiga = $_POST['codLiga'];
    $localidad = $_POST['localidad'];
    $internacional = $_POST['internacional'];

    $sql = "UPDATE `equipos` SET nomEquipo=:nomEquipo, codLiga=:codLiga, localidad=:localidad, internacional=:internacional WHERE codEquipo =$codEquipo ";
    $update = $pdo->prepare($sql);
    $update->execute(array('nomEquipo' => $nomEquipo, 'codLiga' => $codLiga, 'localidad' => $localidad, 'internacional' => $internacional));


    header('Location: /AED-EquiposFutbol/equipos.php');
?>