<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
  <?php
    include_once 'menu.php';
    include_once("config.php");
    $result = mysqli_query($mysqli, "SELECT * FROM tb_venta_divisas 
                                     JOIN clientes 
                                     ON clientes.id_cliente = tb_venta_divisas.id_cliente 
                                     WHERE tipo_operacion = 1 and clientes.activo=1 
                                     ORDER BY id_venta ASC"); // using mysqli_query instead
  ?>
  

    <div class="row mt-5 justify-content-center">
        <div class="col-9 text-center">
            <h2>Reporte de Ventas</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">id_cliente</th>
                    <th scope="col">Abrev</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Fecha operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res = mysqli_fetch_array($result)) { 
                            echo '<tr>';
                            echo ' <th scope="row">'.$res[0].'</th> ';
                            echo ' <td> <a href=cliente.php?id_cliente='.$res[1].'>'.$res[1].'</a> </td>';
                            echo ' <td>'.$res[2].'</td>';
                            echo ' <td>'.$res[3].'</td>';
                            echo ' <td>'.$res[4].'</td>';
                            echo ' <td>'.$res[5].'</td>';
                            echo ' <td>'.$res[6].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 

  <?php     $result = mysqli_query($mysqli, "SELECT * FROM tb_venta_divisas WHERE tipo_operacion = 2 ORDER BY id_venta ASC"); // using mysqli_query instead
  ?>

    <div class="row mt-5 justify-content-center">
        <div class="col-9 text-center">
            <h2>Reporte de Compras</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">id_cliente</th>
                    <th scope="col">Abrev</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Fecha operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res = mysqli_fetch_array($result)) { 
                            echo '<tr>';
                            echo ' <th scope="row">'.$res[0].'</th> ';
                            echo ' <td> <a href=cliente.php?id_cliente='.$res[1].'>'.$res[1].'</a> </td>';
                            echo ' <td>'.$res[2].'</td>';
                            echo ' <td>'.$res[3].'</td>';
                            echo ' <td>'.$res[4].'</td>';
                            echo ' <td>'.$res[5].'</td>';
                            echo ' <td>'.$res[6].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

 