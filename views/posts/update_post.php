


<form action="?controller=posts&action=update&id=<?php echo $post->id; ?>" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>



        <tr>
            <td>TITULO</td>
            <td><input type='text' name='titulo' value='<?php echo $post->titulo; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='author' value='<?php echo $post->author; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Content</td>
            <td><input type='text' name='content' value='<?php echo $post->content; ?>' class='form-control' /></td>
        </tr>
        <?php
        echo "<tr>";
        echo "<td>Image</td>";
        echo "<td>";
        echo $post->image ? "<img src='uploads/{$post->image}' style='width:300px;' />" : "No image found.";
        echo "</td>";
        echo "</tr>";
        ?>
        <!----/*aver aqui */-->
        <tr>
            <td>Nueva Photo</td>
            <td><input type="file" name="image" value="<?php echo $post->image;?>" /></td>
            <td><input type="hidden" name="imageHiden" value="<?php echo $post->image;?>"  /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>

    </table>
</form>