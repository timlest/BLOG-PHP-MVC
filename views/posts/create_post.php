<form action="<?php echo constant('URL'); ?>posts/insertar" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>



<tr>
            <td>TITULO</td>
            <td><input type='text' name='titulo' class='form-control' /></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='author' class='form-control' /></td>
        </tr>
        
        <tr>
            <td>Content</td>
            <td><input type='text' name='content' class='form-control' /></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
        
    </table>
</form>