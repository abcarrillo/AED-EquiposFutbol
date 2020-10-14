<?php
    include("conexion.php");
    $codEquipo = $_POST['codEquipo'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Borrar un equipo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>



    <div class="container p-4 text-center">
        <h2>Alberto Barroso Carrillo</h2>
        <h3>Borrar un equipo</h3>
        <h5> ¿De verdad quieres borrar este equipo? </h5>

        <?php
            $consulta = $pdo->prepare("SELECT * FROM equipos WHERE codEquipo = $codEquipo");
            $consulta->execute();
    
    
            $equipo = $consulta->fetchAll()[0];
            echo $equipo['codEquipo'] . ' | ' . $equipo['nomEquipo'] .  ' | ' . $equipo['codLiga'] . ' | ' . $equipo['localidad'] . ' | ' . $equipo['internacional'];
            
        ?>

        <form class="py-3" action="/AED-EquiposFutbol/borrar_equipo.php" method="POST">
            <input type="text" name="codEquipo" id="codEquipo" value="<?php echo $_POST['codEquipo']; ?>" readonly>
            <button class="btn btn-danger" type="submit">BORRAR</button>
            <a href="/AED-EquiposFutbol/equipos.php" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>