<!--form de crear un article-->

<form action="<?php echo constant('URL'); ?>articulo/insertar" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>



<tr>
            <td>NOMBRE</td>
            <td><input type='text' name='nombre' class='form-control' /></td>
        </tr>
        <tr>
            <td>APELLIDOS</td>
            <td><input type='text' name='apellido' class='form-control' /></td>
        </tr>
        
        <tr>
            <td>REVISTA</td>
            <td><input type='text' name='revista' class='form-control' /></td>
        </tr>
        <tr>
            <td>NUMERO</td>
            <td><input type="number" name="numero" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
        
    </table>
</form>