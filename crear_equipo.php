<?php

include("conexion.php");

$nomEquipo = $_POST['nomEquipo'];
$codLiga = $_POST['codLiga'];
$localidad = $_POST['localidad'];
$internacional = $_POST['internacional'];

$sql = "call actividad2 (:nomEquipo, :codLiga, :localidad, :internacional, @a, @b)";
$update = $pdo->prepare($sql);
$update->execute(array('nomEquipo' => $nomEquipo, 'codLiga' => $codLiga, 'localidad' => $localidad, 'internacional' => $internacional));


header('Location: /AED-EquiposFutbol/equipos.php');
