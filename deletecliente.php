<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id_cliente = $_GET['id_cliente'];

//deleting the row from table
$result = mysqli_query($mysqli, "UPDATE clientes SET activo=0  WHERE id_cliente=$id_cliente");

//redirecting to the display page (index.php in our case)
header("Location:verclientes.php");
?>