<?php
// including the database connection file
include_once("config.php");

//getting id from url
$id_cliente = $_GET['id_cliente'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM clientes WHERE id_cliente=$id_cliente");

while($res = mysqli_fetch_array($result))
{
	$id_cliente = $res['id_cliente'];
	$nombre = $res['nombre'];
    $apellidos = $res['apellidos'];
    $email = $res['email'];
    $rfc = $res['rfc'];
    $ine = $res['ine'];
}
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'menu.php'; ?>
    
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
                             echo '<tr>';
                             echo ' <th scope="row">'.$id_cliente.'</th> ';
                             echo ' <td>'.$nombre.'</td>';
                             echo ' <td>'.$apellidos.'</td>';
                             echo ' <td>'.$email.'</td>';
                             echo ' <td>'.$rfc.'</td>';
                             echo ' <td>'.$ine.'</td>';
                             echo "<td><a href=\"clientes.php?id_cliente=$res[id_cliente]\">Edit</a> | <a href=\"deletecliente.php?id_cliente=$res[id_cliente]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                             echo '</tr>';
                     ?>
                 </tbody>
             </table>
         </div>
     </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

   
	

