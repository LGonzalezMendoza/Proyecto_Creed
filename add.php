<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>añadir Info</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$ubicacion = $_POST['ubicacion'];
	$nombre = $_POST['nombre'];
	$num_telefono = $_POST['num_telefono'];
	$inventario = $_POST['inventario'];
	$empleados = $_POST['empleados'];
	$ventas = $_POST['ventas'];
	$color = $_POST['color'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($ubicacion) || empty($nombre) || empty($num_telefono) || empty($inventario) || empty($empleados) || empty($ventas) || empty($color)) {
				
		if(empty($ubicacion)) {
			echo "<font color='red'> El campo de ubicación está vacío..</font><br/>";
		}
		
		if(empty($nombre)) {
			echo "<font color='red'> El campo de nombre está vacío..</font><br/>";
		}
		
		if(empty($num_telefono)) {
			echo "<font color='red'> El campo de num_telefono está vacío..</font><br/>";
		}

		if(empty($inventario)) {
			echo "<font color='red'> El campo de inventario está vacío..</font><br/>";
		}
		
		if(empty($empleados)) {
			echo "<font color='red'> El campo de empleados está vacío..</font><br/>";
		}
		
		if(empty($ventas)) {
			echo "<font color='red'> El campo de ventas está vacío..</font><br/>";
		}

		if(empty($color)) {
			echo "<font color='red'> El campo de color está vacío..</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Reintentar</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO tienda(ubicacion, nombre, num_telefono, inventario, empleados, ventas, color, login_id) VALUES('$ubicacion','$nombre','$num_telefono','$inventario','$empleados','$ventas','$color', '$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='view.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>
