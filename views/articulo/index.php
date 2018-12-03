


<p><strong>Listado de los Articulos:</strong></p>
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
echo "<th onclick='sortTable(0)'>Nombre</th>";
echo "<th onclick='sortTable(1)'>Apellidos</th>";
echo "<th onclick='sortTable(2)'>Revista</th>";
echo "<th onclick='sortTable(3)'>Numero</th>";
echo "<th>OPCIONES</th>";
echo"</tr>";



?>

<?php foreach($articulo as $articulos) { 
	echo"<tr>";
	echo "<td >$articulos->nombre</td>";
	echo "<td >$articulos->apellido</td>";
	echo "<td >$articulos->revista</td>";
	echo "<td >$articulos->numero</td>";
	echo "<td>";

	?>
	<a href='<?php echo constant('URL'); ?>articulo/show/<?php echo $articulos->id; ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span>Ver contenido</a>
	

	<a href='<?php echo constant('URL'); ?>articulo/modificar/<?php echo $articulos->id; ?>' class='btn btn-primary left-margin''><span class='glyphicon glyphicon-edit'></span>modificar Articulo</a>

	<a href='<?php echo constant('URL'); ?>articulo/delete/<?php echo $articulos->id; ?>' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> Delete </a>



<?php
	echo "</td>";
	echo"</tr>";

} ;

echo"</table>";

?>