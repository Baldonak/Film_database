<!doctype html>
<html lang="es">
<head>
	<!-- Informació Meta -->
	<meta charset="utf-8"/>
	<meta name="description" content="Lorem Ipsum">
	<meta name="keywords" content="Lorem, Ipsum">
	<meta name="author" content="Lorem Ipsum">
	
	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel=stylesheet href="../css/style.css" type="text/css"/>
	
	<!--CSS Intern-->
	<style type="text/css">
		
	</style>
	
	<!-- Enllaç a Javascript Extern -->
	<script  type="text/javascript" src="js/javascript.js"></script>
	
	<!-- favicon -->
	<link href="img/favicon.png" rel="icon" type="image/png" />
	
	<!-- Títol de la pàgina -->
	<title>Añadir a base de datos</title>

	<?php 	
			include "../db/pelliculas_list.php";
			include "../db/Desplegable_generos.php";
			include "../db/Desplegable_paises.php";
			include "../functions/Consulta_base_datos.php";
	?>

</head>
<body>
	<header id="header_secondary">
		<ul class="header_ul">
			<li class="header_li"><a class="header_a" href="../functions/01-destroy_session.php">Home</a></li>
			<li class="header_li"><a class="header_a_active" href="#">Add</a></li>
			<li class="header_li"><a class="header_a" href="#contact">Contact</a></li>
			<!--<li class="header_li_right">

				<form action='#' method='POST' id='Form_busqueda'> 
					<input type='text' id='Input_busqueda' name='Texto_busqueda' /> 
					<button type='submit' id='Button_busqueda'><img src='../img/Search.png' id='Icon_search' /></button>
				</form>

			</li>-->
		</ul>

		
	</header>

	<section class="Main_Add_section">
		<article class="Main_Add_article">
			<h1>Añadir a base de datos</h1>

			<form action="functions/Insertar_base_datos.php" method="POST" class="Form_ingreso_base_datos" 
					enctype="multipart/form-data">

				<br>
				<p>Titulo:<input type="text" name="Titulo" /></p>
				<p>Director:<input type="text" name="Director" /></p>
				<p>Año:<input type="number" min="1900" max="2099" step="1" name="Year" /></p>

				<p>Pais: <select name="Pais">

				<?php

					$Resultado = Desplegable_paises();

					if ($Resultado->num_rows > 0) { 

						while($fila = $Resultado->fetch_assoc()) {
							echo '<option value="'.$fila["id"].'">'.$fila["name"].'</option>';
							
						}
					}
				?>

				</select> </p>

				<p>Genero: <select name="Genero">

				<?php

					$Resultado = Desplegable_generos();

					if ($Resultado->num_rows > 0) { 

						while($fila = $Resultado->fetch_assoc()) {
							echo '<option value="'.$fila["id"].'">'.$fila["genre_name"].'</option>';
							
						}
					}
				?>

				</select> </p>
				<p>Puntuacion:<input type="number" min="0" max="10" step="1" 
						name="Puntuacion" /></p>

				<p>Imagen:
				<input type="hidden" name="MAX_FILE_SIZE" value="100000">
				<input type="file" name="User_file" accept=".jpg"></p> 

				<p><button name="Boton_add" type="submit" 
						formaction='../functions/Insertar_base_datos.php'>Añadir</button></p>

			</form>


		</article>
			
	</section>

	<footer>

		<p>Movie DB - 2021 | by Víctor Maynou Gómez</p>

	</footer>
</body>
</html>