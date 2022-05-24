<!doctype html>
<html lang="es">
  <head>
    <title>Casa de Bolsa - Divisas</title>
    </head>
  <body>
  
  <?php
    include_once 'menu.php';
    include_once("config.php");
    $result = mysqli_query($mysqli, "SELECT * FROM tb_divisas ORDER BY id_div ASC"); // using mysqli_query instead
  ?>
  

    <div class="row mt-5 justify-content-center">
        <div class="col-9 text-center">
            <h2>Divisas</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Abrev</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Reserva</th>
                    <th scope="col">Fecha Actualización</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res = mysqli_fetch_array($result)) { 
                            echo '<tr>';
                            echo ' <th scope="row">'.$res[0].'</th> ';
                            echo ' <td>'.$res[1].'</td>';
                            echo ' <td>'.$res[2].'</td>';
                            echo ' <td>'.$res[3].'</td>';
                            echo ' <td>'.$res[4].'</td>';
                            echo ' <td>'.$res[5].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
   

  </body>
</html>
