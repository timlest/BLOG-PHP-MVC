<DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>BLOG DE LALEX</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
    <!-- our custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />
	</head>
	<body>
		<header>
			
			<a href='<?php echo constant('URL');?>'>Home</a>
			<a href='<?php echo constant('URL');?>posts/index'>Posts</a>
			<a href='<?php echo constant('URL');?>posts/create'>crear Post</a>
			
		</header>

		<?php require_once('routes.php'); ?>

		<footer>
			<?php require_once('views/layout_footer.php'); ?>
			
		</footer>
	</body>
	</html>