<!doctype html>
<html lang="es">
  <head>
    <title>Casa de Bolsa - Divisas</title>
    </head>
  <body>
  
  <?php
    include_once 'menu.php';
    include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM clientes WHERE activo=1 ORDER BY id_cliente ASC"); // using mysqli_query instead
  ?>
  

    <div class="row mt-5 justify-content-center">
        <div class="col-9 text-center">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">RFC</th>
                    <th scope="col">INE</th>
					<th scope="col">Update</th>
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
							echo "<td><a class='btn btn-primary' href=\"clientes.php?id_cliente=$res[id_cliente]\">Edit</a>  <a class='btn btn-danger' href=\"deletecliente.php?id_cliente=$res[id_cliente]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
   

  </body>
</html>
