


<form action="<?php echo constant('URL'); ?>posts/update" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>


<input type='hidden' name='id' value="<?php echo $posts->id; ?>" class='form-control'  />
        <tr>
            <td>TITULO</td>
            <td><input type='text' name='titulo' value='<?php echo $posts->titulo; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='author' value='<?php echo $posts->author; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Content</td>
            <td><input type='text' name='content' value='<?php echo $posts->content; ?>' class='form-control' /></td>
        </tr>
        <?php
        echo "<tr>";
        echo "<td>Image</td>";
        echo "<td>";
        ?>
        <?php $foto = constant('URL')."/uploads/".$posts->image;?>
            <?php echo $posts->image ? "<img src='$foto' style='width:150px;' />" : "No image found."; 

        echo "</td>";
        echo "</tr>";
        ?>

        
        <!----/*aver aqui */-->
        <tr>
            <td>Nueva Photo</td>
            <td><input type="file" name="image" value="<?php echo $posts->image;?>" /></td>
            <td><input type="hidden" name="imageHiden" value="<?php echo $posts->image;?>"  /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>

    </table>
</form>