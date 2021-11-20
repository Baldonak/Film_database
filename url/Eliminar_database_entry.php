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

	<?php 	include "../db/pelliculas_list.php";
			include "../functions/Consulta_base_datos.php" ?>

</head>
<body>
	<header id="header_secondary">

	<ul class="header_ul">
			<li class="header_li"><a class="header_a" href="../_index.php">Home</a></li>
			<li class="header_li"><a class="header_a" href="Add_database_entry.php">Add</a></li>
			<li class="header_li"><a class="header_a" href="#contact">Contact</a></li>
			<!--<li class="header_li_right">

				<form action='#' method='POST' id='Form_busqueda'> 
					<input type='text' id='Input_busqueda' name='Texto_busqueda' /> 
					<button type='submit' id='Button_busqueda'><img src='../img/Search.png' id='Icon_search' /></button>
				</form>

			</li>-->
	</ul>

	</header>
	<section id="Section_eliminar">

		<h1>¿Quiere eliminar esta entrada de la base de datos?</h1>

		<article id="Article_eliminar">	

				<form action="functions/Eliminar_entrada_base_datos.php" method="POST" class="Formulario_ingreso_base_datos">
				
					<input type="hidden" name="Id" value= <?php echo $_GET['Id']; ?> > 

					<p><button name="Boton_add" type="submit" 
							formaction='../functions/Eliminar_entrada_base_datos.php'>Si</button></p>

				</form>

				<form action="../_index.php" method="POST" class="Formulario_ingreso_base_datos">
				
					<input type="hidden" name="Id" value= <?php echo $_GET['Id']; ?> > 

					<p><button name="Boton_add" type="submit" 
							formaction='../_index.php'>No</button></p>

				</form>

		</article>
			</section>	 


			<?php 	
			
				
						 
			?>
		</article>
	</section>
	<footer>

		<p>Movie DB - 2021 | by Víctor Maynou Gómez</p>

	</footer>
</body>
</html>