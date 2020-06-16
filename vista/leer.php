<div class="card" id="resultado">
  <div class="card-content">
    <table id="datos">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th style="text-align:center;">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include '../funciones/db.php';
          $sql = "SELECT * FROM productos ORDER BY nombre;";
          $data = array();
          $productos = db_query($sql, $data, true, false);
        ?>
        <?php foreach ($productos as $producto) :?>
        <tr id="<?php echo $producto['id'];?>">
          <td hidden><?php echo $producto['id'];?></td>
          <td><?php echo $producto['nombre'];?></td>
          <td><?php echo $producto['descripcion'];?></td>
          <td><?php echo $producto['cantidad'];?></td>
          <td class='center'>
            <a class='btn-flat' id='actualizar' title='Actualizar'>Actualizar</a>
            <a class='btn-flat' id='eliminar' title='Eliminar'>Eliminar</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(document).on('click', '#actualizar', function() {
    var currentRow = $(this).closest("tr");
    var idCombustible = currentRow.find("td:eq(0)").text();
    var objeto = {
      idProducto : currentRow.find("td:eq(0)").text()
    };
    $.ajax({
      type:"POST",
      url:"./vista/actualizar.php",
      data: objeto,
      success:function(data){
        $('#resultado').html(data);
      }
    });
  });
  $(document).on('click', '#eliminar', function() {
    var currentRow = $(this).closest("tr");
    var idCombustible = currentRow.find("td:eq(0)").text();
    var objeto = {
      idProducto : currentRow.find("td:eq(0)").text(),
      funcion : "borrar"
    };
    $.ajax({
      type: 'POST',
      url: "./funciones/index.php",
      data: objeto,
      success:function(data){
        $('#'+idCombustible).html(data);
      }
    });
  });
</script>
