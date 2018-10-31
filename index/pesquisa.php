<?php
require_once('ConexaoBd.php');
function BuscaThreadsPorTermo($pesquisar){
$db = CriaConexãoBd();

$sql = $db->prepare(
  "SELECT * FROM thread WHERE titulo LIKE :termoPesquisa"
);

$sql->bindValue(':termoPesquisa', "%$pesquisar%");

$sql->execute();

return $sql->fetchAll();
}
?>

























?>
