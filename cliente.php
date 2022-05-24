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
<html>
<head>	
	<title>Cliente</title>
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
	
	
	
</body>
</html>

