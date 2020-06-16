<?php
  require 'db.php';
  define('RUTA', 'http://localhost/PROYECTOS/crud');
  if (isset($_POST['funcion']) && !empty($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch($funcion) {
      case 'crear':
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];

        $sql = "INSERT INTO productos(nombre,descripcion,cantidad) VALUES (?,?,?);";
        $data = array($nombre, $descripcion, $cantidad);
      	$result = db_query($sql, $data, false, false);

        if($result === false) {
      	  echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Ha ocurrido algún error ".$conexion->rollback()."<h5></div></div>";
      	} else {
      	  echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Se han introducido los nuevos datos</h5></div></div>";
      	}
        break;

      case 'actualizar':
        $idProducto = $_POST['idProducto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];

        $sql = "UPDATE productos SET nombre=?,descripcion=?,cantidad=? WHERE id=?";
        $data = array($nombre,$descripcion,$cantidad,$idProducto);
      	$result = db_query($sql, $data, false, false);

        if($result === false) {
      	  echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Ha ocurrido algún error.<h5></div></div>";
      	}	else {
      	  echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Se han actualizado los datos</h5></div></div>";
      	}
        break;

      case 'borrar':
        $idProducto = $_POST['idProducto'];

        $sql = "DELETE FROM productos WHERE id=?";
        $data = array($idProducto);
      	$result = db_query($sql, $data, false, false);

        if($result === false) {
      	  echo "Ha ocurrido algún error ";
      	}	else {
      	  echo "<td colspan='4' style='text-align:center;'>Se han eliminado los datos</td>";
      	}
        break;
    }
  }
?>
