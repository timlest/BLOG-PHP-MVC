


<p><strong>Listado de los posts:</strong></p>
<?php
echo "<table id='taula' class='table table-hover table-responsive table-bordered'>";
echo"<tr>";
echo "<th >Titulo</th>";
echo "<th >Autor</th>";
echo "<th >Contenido</th>";
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