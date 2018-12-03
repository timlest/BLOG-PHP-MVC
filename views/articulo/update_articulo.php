<!--Form de creacion de Articulo-->

<form action="<?php echo constant('URL'); ?>articulo/update" method="post" enctype="multipart/form-data"> 
    <table class='table table-hover table-responsive table-bordered'>


<input type='hidden' name='id' value="<?php echo $articulo->id; ?>" class='form-control'  />
        <tr>
            <td>NOMBRE</td>
            <td><input type='text' name='nombre' value='<?php echo $articulo->nombre; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>APELLIDO</td>
            <td><input type='text' name='apellido' value='<?php echo $articulo->apellido; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>REVISTA</td>
            <td><input type='text' name='revista' value='<?php echo $articulo->revista; ?>' class='form-control' /></td>
        </tr>
                <tr>
            <td>NUMERO</td>
            <td><input type='number' name='numero' value='<?php echo $articulo->numero; ?>' class='form-control' /></td>
        </tr>


        
        <!----/*aver aqui */-->

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>

    </table>
</form>