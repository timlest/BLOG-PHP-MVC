<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>BLOG DE LALEX</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- our custom CSS -->
      <link rel="stylesheet" href="css/estilos2.css">
      <link rel="stylesheet" href="../css/estilos.css">
      
	</head>
	<body>
		<header>
			
	
			
		</header>

    <!--Barra de menu color negro para personalizar un poco el estilo.-->
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo constant('URL');?>">INICIO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">POSTS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo constant('URL');?>posts/index">LISTADO DE POSTS</a></li>
            <li><a href="<?php echo constant('URL');?>posts/create">CREAR POSTS</a></li>
          
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">ARTICULOS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo constant('URL');?>articulo/index">Lista de creadores</a></li>
            <li><a href="<?php echo constant('URL');?>articulo/create">Nuevo Redactor </a></li>
          
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

		<?php 
//llamamos a las rutas para que haga la redireccion adecuada
    require_once('routes.php'); ?>

		<footer class="piedepagina">
			<?php require_once('views/layout_footer.php'); ?>
      <div>

        PATATAS
      </div>
			
		</footer>
	</body>
	</html>