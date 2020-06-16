<?php
  date_default_timezone_set('America/Caracas');
  function conectar() {
    $controlador = 'mysql';
    $bd_nombre = 'crud';
    $bd_usuario = 'root';
    $bd_clave = '';
    $bd_host = 'localhost';
    try {
      $conexion = new PDO("$controlador:host=$bd_host;dbname=$bd_nombre", $bd_usuario, $bd_clave);
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    } catch(PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }
  function db_query($sql, $data = array(), $visualizar = false, $visualizar_uno = false) {
    $conexion = conectar();
    try {
      $mysql = $conexion->prepare( $sql );
      $mysql->execute( $data );
    } catch(Exception $e) { return false; }
    if ( $visualizar ) {
      if ($visualizar_uno) {
        $result = $mysql->fetch(PDO::FETCH_OBJ);
      } else {
        $result = $mysql->fetchAll(PDO::FETCH_ASSOC);
      }
      $conexion = null;
      return $result;
    } else {
      $result = null;
      return true;
    }
  }
?>
