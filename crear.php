<?php
include("conexion.php");
$consulta2 = $pdo->prepare("SELECT * FROM ligas");
$consulta2->execute();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Crear un equipo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="container p-4 text-center">
        <h2>Alberto Barroso Carrillo</h2>
        <h3>Crear un equipo</h3>



        <form method="POST" class="p-4 bg-dark text-white" action="/AED-EquiposFutbol/crear_equipo.php">

            <div class="form-row text-center">
                <label class="col-4 p-1" for="nomEquipo">nomEquipo</label>
                <div class="col-6">
                    <input type="text" id="nomEquipo" name="nomEquipo" class="form-control" value="">
                </div>
            </div>

            <div class="form-row py-1">
                <label class="col-4 p-1" for="codLiga">CodLiga</label>
                <select class="form-control col-6" name="codLiga" id="codLiga">
                    <?php
                    while ($row = $consulta2->fetch()) {
                        echo "<option>";
                        echo $row['codLiga'] . " | " . $row['nomLiga'];
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-row text-center">
                <label class="col-4 p-1" for="localidad">Localidad</label>
                <div class="col-6">
                    <input type="text" id="localidad" name="localidad" class="form-control">
                </div>
            </div>

            <div class="form-row text-center">
                <label class="text-center col-4" for=""> Internacional</label>
                <div class="form-check text-right col-2 px-3">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="internacional" id="internacional"
                    value="1">
                    SI
                  </label>
                </div>
                <div class="form-check text-left col-2 px-3">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="internacional" id="internacional"
                    value="0">
                    NO
                  </label>
                </div> 
            </div>

            <div class="p-3">
                <button type="submit" class="btn btn-success col-3">Crear</button>
                <a href="equipos.php" class="btn btn-danger col-3">Cancelar</a>
            </div>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>