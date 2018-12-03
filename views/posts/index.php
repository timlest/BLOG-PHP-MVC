


<p><strong>Listado de los posts:</strong></p>
<?php

echo "<form role='search' action='search.php'>";
echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
$search_value=isset($search_term) ? "value='{$search_term}'" : "";
echo "<input type='text' class='form-control' placeholder='Que vols buscar?' name='s' id='srch-term' required {$search_value} />";
echo "<div class='input-group-btn'>";
echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
echo "</div>";
echo "</div>";
echo "</form>";







echo "<table id='taula' class='table table-hover table-responsive table-bordered'>";
echo"<tr>";
echo "<th onclick='sortTable(0)'>Titulo</th>";
echo "<th onclick='sortTable(1)'>Autor</th>";
echo "<th onclick='sortTable(2)'>Contenido</th>";
echo "<th>OPCIONES</th>";
echo"</tr>";



?>

<?php foreach($posts as $post) { 
	echo"<tr>";
	echo "<td >$post->titulo</td>";
	echo "<td >$post->author</td>";
	echo "<td >$post->content</td>";
	echo "<td>";

	?>
	<a href='<?php echo constant('URL'); ?>posts/show/<?php echo $post->id; ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span>Ver contenido</a>
	

	<a href='<?php echo constant('URL'); ?>posts/modificar/<?php echo $post->id; ?>' class='btn btn-primary left-margin''><span class='glyphicon glyphicon-edit'></span>modificar Post</a>

	<a href='<?php echo constant('URL'); ?>posts/delete/<?php echo $post->id; ?>' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> Delete </a>



<?php
	echo "</td>";
	echo"</tr>";

} ;

echo"</table>";
 
?>