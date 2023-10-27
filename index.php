<?php session_start(); ?>
<html>
<head>
	<title>Index</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido A Mi Pagina!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
				Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='view.php'>Ver Y Añadir Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debe iniciar sesión para ver esta página..<br/><br/>";
		echo "<a href='login.php'>Iniciar Sesion</a> | <a href='register.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		Creado Por <a href="https://lgonzalezmendoza.github.io/Proyecto-musical/webmaster.html" title="Master">Leonardo Gonzalez</a>
	</div>
</body>
</html>
