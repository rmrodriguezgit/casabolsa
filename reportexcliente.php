<?php
// including the database connection file
include_once("config.php");

//getting id from url
if(isset($_POST['submit'])) {	
    $id_cliente = mysqli_real_escape_string($mysqli, $_POST['id_cliente']);
//$id_cliente = $_GET['id_cliente'];

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
    <title>Reporte por Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'menu.php'; ?>
    
    <div class="row mt-5 justify-content-center">
         <div class="col-9 text-center">
         <h2>Cliente</h2>
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
                             echo "<td><a class='btn btn-primary' href=\"clientes.php?id_cliente=$res[id_cliente]\">Edit</a>  <a class='btn btn-danger' href=\"deletecliente.php?id_cliente=$res[id_cliente]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                             echo '</tr>';
                     ?>
                 </tbody>
             </table>
         </div>
     </div> 
 
     <div class="row mt-5 justify-content-center">
         <div class="col-9 text-center">
             <h2>Reporte de Compras y Ventas</h2>
             <table class="table">
                 <thead>
                     <tr>
                     <th scope="col">#</th>
                     <th scope="col">Abrev</th>
                     <th scope="col">Valor</th>
                     <th scope="col">Cantidad</th>
                     <th scope="col">Total</th>
                     <th scope="col">Fecha operaci??n</th>
                     <th scope="col">Tipo operaci??n</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         $result = mysqli_query($mysqli, "SELECT * FROM tb_venta_divisas WHERE id_cliente=$id_cliente ORDER BY id_venta ASC"); // using mysqli_query instead
                         while($res = mysqli_fetch_array($result)) { 
                             echo '<tr>';
                             echo ' <th scope="row">'.$res[0].'</th> ';
                             echo ' <td>'.$res[2].'</td>';
                             echo ' <td>'.$res[3].'</td>';
                             echo ' <td>'.$res[4].'</td>';
                             echo ' <td>'.$res[5].'</td>';
                             echo ' <td>'.$res[6].'</td>';
                             if ($res[7] == 1) {
                                 echo '<td><div class="alert alert-primary" role="alert">
                                         Compra
                                       </div></td>';
                             } elseif ($res[7] == 2) {
                                 echo '<td><div class="alert alert-danger" role="alert">
                                         Venta
                                       </div></td>';
                             }
                             
                             echo '</tr>';
                         }
                     ?>
                 </tbody>
             </table>
         </div>
     </div> 
 <?php
 }
 ?>
 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

   	

