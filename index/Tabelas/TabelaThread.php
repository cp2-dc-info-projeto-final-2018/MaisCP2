<?php
  require_once('ConexaoBd.php');

	function InsereNovaThread(array $novaThread)
	{

		$db = CriaConexãoBd();

		$sql = $db->prepare(
			'INSERT INTO thread (titulo, disciplina, serie, descricao)
			 VALUES (:titulo, :disciplina, :serie, :descricao)'
		);


		$sql->bindValue(':titulo',  $novaThread['titulo']);
		$sql->bindValue(':disciplina',  $novaThread['disciplina']);
		$sql->bindValue(':serie', $novaThread['serie']);
    $sql->bindValue(':descricao', $novaThread['descricao']);


		$sql->execute();
	}


?>
