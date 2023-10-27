<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{
	if(!empty($_POST['id'])||!empty($_POST['ubicacion'])||!empty($_POST['nombre'])||!empty($_POST['num_telefono'])||!empty($_POST['inventario'])||!empty($_POST['empleados'])||!empty($_POST['ventas'])||!empty($_POST['color'])){
		$id=$_POST['id'];
		$ubicacion = $_POST['ubicacion'];
		$nombre = $_POST['nombre'];
		$num_telefono = $_POST['num_telefono'];
		$inventario = $_POST['inventario'];
		$empleados = $_POST['empleados'];
		$ventas = $_POST['ventas'];
		$color = $_POST['color'];		
	}	

	
		
	
	// checking empty fields
	if(empty($ubicacion) || empty($nombre) || empty($num_telefono) || empty($inventario) || empty($empleados) || empty($ventas) || empty($color)) {
				
		if(empty($ubicacion)) {
			echo "<font color='red'> El campo de ubicación está vacío.</font><br/>";
		}
		
		if(empty($nombre)) {
			echo "<font color='red'> El campo de nombre está vacío.</font><br/>";
		}
		
		if(empty($num_telefono)) {
			echo "<font color='red'> El campo de num_telefono está vacío.</font><br/>";
		}

		if(empty($inventario)) {
			echo "<font color='red'> El campo de inventario está vacío.</font><br/>";
		}
		
		if(empty($empleados)) {
			echo "<font color='red'> El campo de empleados está vacío.</font><br/>";
		}
		
		if(empty($ventas)) {
			echo "<font color='red'> El campo de ventas está vacío.</font><br/>";
		}

		if(empty($color)) {
			echo "<font color='red'> El campo de color está vacío.</font><br/>";
		}	
		?>
		<a href="view.php">Sin llenar</a>
		<?php
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE tienda SET ubicacion='$ubicacion', nombre='$nombre', num_telefono='$num_telefono', inventario='$inventario', empleados='$empleados', ventas='$ventas', color='$color' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
if(!empty($_GET['id'])){
	$id = $_GET['id'];
}


//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tienda WHERE id=$id");
if($result){
while($res = mysqli_fetch_array($result))
{
	
	$ubicacion = $res['ubicacion'];
	$nombre = $res['nombre'];
	$num_telefono = $res['num_telefono'];
	$inventario = $res['inventario'];
	$empleados = $res['empleados'];
	$ventas = $res['ventas'];
	$color = $res['color'];
}
}
?>
<html>
<head>	
	<title>Editar Informacion</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">Ver Productos</a> | <a href="logout.php">Cerrar Sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		<tr> 
				<td>ubicacion</td>
				<td><input type="text" name="ubicacion" value="<?php echo $ubicacion;?>"></td>
			</tr>
			<tr> 
				<td>nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>Numero de telefono</td>
				<td><input type="text" name="num_telefono" value="<?php echo $num_telefono;?>"></td>
			</tr>
			<tr> 
				<td>Numero de Productos en el inventario</td>
				<td><input type="text" name="inventario" value="<?php echo $inventario;?>"></td>
			</tr>
			<tr> 
				<td>Numero de empleados</td>
				<td><input type="text" name="empleados" value="<?php echo $empleados;?>"></td>
			</tr>
			<tr> 
				<td>Numero de ventas al mes</td>
				<td><input type="text" name="ventas" value="<?php echo $ventas;?>"></td>
			</tr>
			<tr> 
				<td>color</td>
				<td><input type="text" name="color" value="<?php echo $color;?>"></td>
			</tr>
		
			
			<tr>
				<?php if(!empty($_GET["id"])){ ?>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<?php } ?>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
