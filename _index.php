<!doctype html>
<html lang="es">
<head>
	<!-- Informació Meta -->
	<meta charset="utf-8"/>
	<meta name="description" content="Lorem Ipsum">
	<meta name="keywords" content="Lorem, Ipsum">
	<meta name="author" content="Lorem Ipsum">
	
	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" /> <!--Añadido-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> <!--Añadido-->
	
	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel=stylesheet href="css/style.css" type="text/css"/>
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script> <!--Añadido-->
	
	<!--CSS Intern-->
	<style type="text/css">

	.flex-caption { /*Añadido*/
		width: 96%;
		padding: 2%;
		left: 0;
		bottom: 0;
		background: rgba(0,0,0,.5);
		color: #fff;
		text-shadow: 0 -1px 0 rgba(0,0,0,.3);
		font-size: 14px;
		line-height: 18px;
		}
		li.css a {
		border-radius: 0;
		}
			
	</style>
	
	<!-- Enllaç a Javascript Extern -->
	<script  type="text/javascript" src="js/javascript.js"></script>
	
	<!-- favicon -->
	<link href="img/favicon.png" rel="icon" type="image/png" />
	
	<!-- Títol de la pàgina -->
	<title>Listado de películas</title>

	<?php 	include "db/pelliculas_list.php";
			include "functions/Consulta_base_datos.php"; ?>

</head>
<body>
	<header>
		
		<ul class="header_ul">
			<li class="header_li"><a class="header_a_active" href="#home">Home</a></li>
			<li class="header_li"><a class="header_a" href="url/Add_database_entry.php">Add</a></li>
			<li class="header_li"><a class="header_a" href="#contact">Contact</a></li>
			<li class="header_li_right">

				<form action='functions/01-start_session.php' method='POST' id='Form_busqueda'> 
					<input type='text' id='Input_busqueda' name='Texto_busqueda' /> 
					<button type='submit' id='Button_busqueda'><img src='img/Search.png' id='Icon_search' /></button>
				</form>

			</li>
		</ul>

		<section>

			<div id="main" role="main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<img src="img/El_viaje_de_chihiro_banner.jpg" />
							<p class="flex-caption">El viaje de Chihiro</p>
								</li>
								<li>
								<img src="img/La_princesa_mononoke_banner.jpg" />
							<p class="flex-caption">La princesa Mononoke</p>
								</li>
								<li>
								<img src="img/Coco_banner.jpg" />
							<p class="flex-caption">Coco</p>
								</li>
								<li>
								<img src="img/Pesadilla_antes_de_navidad_banner.jpg" />
							<p class="flex-caption">Pesadilla antes de Navidad</p>
								</li>
						</ul>
					</div>
				</section>
			</div>

		</section>

	</header>

	<section class="main_container">
		<article>
			<h1>Listado de películas</h1>

			<?php 	

			session_start();
			
			if(isset($_SESSION['Texto_busqueda']))
			{
				pelliculas_list($_SESSION['Texto_busqueda']);
			}
			else {pelliculas_list('');}
						 
			?>
		</article>

	</section>

	<footer>

		<p>Movie DB - 2021 | by Víctor Maynou Gómez</p>

	</footer>

	<!--Añadidos para slider-->

	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  	<!-- FlexSlider -->
  	<script defer src="js/jquery.flexslider.js"></script>

  	<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>

</body>
</html>