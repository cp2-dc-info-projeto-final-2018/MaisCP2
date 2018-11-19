<?php

require_once('Tabelas/ConexaoBd.php');
function BuscaThreadsPorTermo($pesquisar){
$db = CriaConexãoBd();

$sql = $db->prepare(
  "SELECT thread.*, usuario.nomeUsuario AS nomeUsuario
   FROM thread INNER JOIN usuario ON usuario.usuario_id = thread.usuario_id
   WHERE titulo LIKE :termoPesquisa"
);

$sql->bindValue(':termoPesquisa', "%$pesquisar%");

$sql->execute();

return $sql->fetchAll();
}

?>
