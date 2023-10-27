<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM tienda WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>ver</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Nueva Tienda</a> | <a href="logout.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>id</td>
			<td>Ubicacion</td>
			<td>Nombre</td>
			<td>Numero de telefono</td>
			<td>Numero de Productos en el inventario</td>
			<td>Numero de empleados</td>
			<td>Numero de ventas al mes</td>
			<td>color</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['ubicacion']."</td>";
			echo "<td>".$res['nombre']."</td>";	
			echo "<td>".$res['num_telefono']."</td>";	
			echo "<td>".$res['inventario']."</td>";	
			echo "<td>".$res['empleados']."</td>";
			echo "<td>".$res['ventas']."</td>";
			echo "<td>".$res['color']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Realmente Quieres Borrar La Tienda?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
