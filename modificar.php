<?php
include('conexion.php');

$codEquipo = $_POST['codEquipo'];
$consulta1 = $pdo->prepare("SELECT * FROM equipos WHERE codEquipo = ($codEquipo)");
$consulta2 = $pdo->prepare("SELECT * FROM ligas");
$consulta1->execute();
$consulta2->execute();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Modificar un equipo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container p-4 text-center">
        <h2>Alberto Barroso Carrillo</h2>
        <h3>Modificar un equipo</h3>

        <p class="py-4">
            <?php
            echo "Cod equipo:  " . $codEquipo;
            ?>
        </p>

        <form method="POST" class="p-4 bg-dark text-white" action="/AED-EquiposFutbol/modificar_equipo.php">
            <?php
            $equipo = $consulta1->fetchAll()[0];
            $codLiga = $equipo['codLiga'];

            ?>
            <div class="form-row text-center">
                <label class="col-4 p-1" for="codEquipo">codEquipo</label>
                <div class="col-6">
                    <input type="number" id="codEquipo" name="codEquipo" class="form-control" value="<?php echo intval($equipo['codEquipo']); ?>">
                </div>
            </div>

            <div class="form-row text-center">
                <label class="col-4 p-1" for="nomEquipo">nomEquipo</label>
                <div class="col-6">
                    <input type="text" id="nomEquipo" name="nomEquipo" class="form-control" value="<?php echo $equipo['nomEquipo']; ?>">
                </div>
            </div>

            <div class="form-row py-1">
                <label class="col-4 p-1" for="codLiga">CodLiga</label>
                <select class="form-control col-6" name="codLiga" id="codLiga">
                    <?php
                        while ($row = $consulta2->fetch()) {
                            echo "<option ";
                            if($codLiga == $row['codLiga']){ echo 'selected'; } ;
                            echo  "> "; 
                            echo $row['codLiga'];
                            echo '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-row text-center">
                <label class="col-4 p-1" for="localidad">Localidad</label>
                <div class="col-6">
                    <input type="text" id="localidad" name="localidad" class="form-control" value="<?php echo $equipo['localidad']; ?>">
                </div>
            </div>

            <div class="form-row text-center">
                <div class="form-check text-right col-6 px-3">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="internacional" id="internacional"
                    value="1" <?php if(intval($equipo['internacional']) == 1){ echo 'checked';} ?>>
                    SI
                  </label>
                </div>
                <div class="form-check text-left col-6 px-3">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="internacional" id="internacional"
                    value="0" <?php if(intval($equipo['internacional']) == 0){ echo 'checked';} ?>>
                    NO
                  </label>
                </div>
                
            </div>

            <div class="p-3">
                <button type="submit" class="btn btn-success col-3">Modificar</button>
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