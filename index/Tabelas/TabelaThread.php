<?php
  require_once('ConexaoBd.php');

	function InsereNovaThread(array $novaThread)
	{

		$db = CriaConexãoBd();

		$sql = $db->prepare(
			'INSERT INTO thread (titulo, disciplina, serie, descricao, usuario_id)
			 VALUES (:titulo, :disciplina, :serie, :descricao, :usuario_id)'
		);


		$sql->bindValue(':titulo',  $novaThread['titulo']);
		$sql->bindValue(':disciplina',  $novaThread['disciplina']);
		$sql->bindValue(':serie', $novaThread['serie']);
    $sql->bindValue(':descricao', $novaThread['descricao']);
    $sql->bindValue(':usuario_id', $novaThread['usuario_id']);


		$sql->execute();
	}


?>
