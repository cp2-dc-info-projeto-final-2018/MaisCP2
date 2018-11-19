<?php
require_once('ConexaoBd.php');

$db = CriaConexãoBd();

$pesquisa = $_POST['pesquisar'];

$sql = $db->prepare(
  "SELECT * FROM thread WHERE titutlo LIKE '%$pesquisa'"
);

$resultado = $sql->execute();

?>
























?>
