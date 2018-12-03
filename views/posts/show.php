<!--Mostramos el POST seleccionado -->

<p><strong>Post #<?php echo $posts->id; ?></strong></p>
<p><strong>TITULO: </strong><?php echo $posts->titulo; ?></p>
<p><strong>Autor: </strong><?php echo $posts->author; ?></p>
<p><strong>Post: </strong><?php echo $posts->content; ?></p>
<p><strong>IMAGEN: </strong>
	<?php $foto = constant('URL')."/uploads/".$posts->image;?>
			<?php echo $posts->image ? "<img src='$foto' style='width:150px;' />" : "No image found."; ?>

