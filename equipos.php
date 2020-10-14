<?php
include('conexion.php');
?>

<!doctype html>
<html lang="en">

<head>
  <title>Equipos(PHP)</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    td:hover {
      background: lightgray;
      font-weight: bold;
      transition: 0.4s background, 0.4s font-weight;
    }

    td.withForm {
      font-weight: normal;
      background-color: white;
      width: 10%;
    }
  </style>

</head>

<body>

  <div class="container p-4">

    <div class="text-center py-4">
      <h3>Autor: Alberto Barroso Carrillo</h3>

      <h2>Equipos</h2>
    </div>

    <table class="table text-center table-bordered">
      <thead>
        <tr class="bg-warning">
          <th>codEquipo</th>
          <th>nomEquipo</th>
          <th>codLiga</th>
          <th>localidad</th>
          <th>internacional</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $consulta = $pdo->prepare('SELECT * FROM equipos');
        $consulta->execute();


        while ($row = $consulta->fetch()) {
          echo '<tr>';
          echo '<td>' . $row['codEquipo'] . "</td>";
          echo '<td>' . $row['nomEquipo'] . "</td>";
          echo '<td>' . $row['codLiga'] . "</td>";
          echo '<td>' . $row['localidad'] . "</td>";
          echo '<td>';
          if ($row['internacional'] == 1) {
            echo 'SI';
          } else {
            echo 'NO';
          }
          echo "</td>";

          echo "<td class='withForm'>";
          echo '<form method="POST" action="modificar.php">
                  <input type="hidden" name="codEquipo" value="' . $row['codEquipo'] . '">
                  <input class="btn btn-success" type="submit" value="Modificar">
                </form>';
          echo "</td>";

          echo "<td class='withForm'>";
          echo '<form method="POST" action="borrar.php">
                  <input type="hidden" name="codEquipo" value="' . $row['codEquipo'] . '">
                  <input class="btn btn-danger" type="submit" value="Borrar">
                </form>';
          echo "</td>";

          echo '</tr>';
        }

        ?>


      </tbody>
    </table>

    <div class="col-12">
        <a href="crear.php" class="btn btn-secondary btn-block">Insertar un equipo</a>
    </div>
  </div>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>