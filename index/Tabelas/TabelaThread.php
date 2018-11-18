<?php
  require_once('ConexaoBd.php');

	function InsereNovaThread(array $novaThread)
	{

		$db = CriaConexãoBd();

		$sql = $db->prepare(
			'INSERT INTO thread (titulo, disciplina, descricao, usuario_id)
			 VALUES (:titulo, :disciplina, :descricao, :usuario_id)'
		);

		$sql->bindValue(':titulo',  $novaThread['titulo']);
		$sql->bindValue(':disciplina',  $novaThread['disciplina']);
    $sql->bindValue(':descricao', $novaThread['descricao']);
    $sql->bindValue(':usuario_id', $novaThread['usuario_id']);


		$sql->execute();
	}

  function ListaThreads() : array
  {
  	$bd = CriaConexãoBd();

  	$resultado = $bd->query
    ('SELECT thread.*, usuario.nomeUsuario AS nomeUsuario
      FROM thread
      INNER JOIN usuario ON usuario.usuario_id = thread.usuario_id');

  	return $resultado->fetchAll();
  }

  function ListaThreadsPorUsuario(int $usuario_id) : array
  {
    $bd = CriaConexãoBd();

    $sql = $bd->prepare
    ('SELECT thread.*, usuario.nomeUsuario AS nomeUsuario
      FROM thread
      INNER JOIN usuario ON usuario.usuario_id = thread.usuario_id
      WHERE usuario.usuario_id = :usuario_id');

      $sql->bindValue(':usuario_id', $usuario_id);

      $sql->execute();
      return $sql->fetchAll();
  }

  function ListaThreadsPorDisciplina($disciplina) {

  $where = null;

  if ($disciplina != null )
  {
    $where = "WHERE disciplina = $disciplina";
  }
  else if ($busca != null)
  {
    $where = "WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%'";
  }

  $bd = CriaConexãoBd();

  $resultado = $bd->query
  ("SELECT thread.*, usuario.nomeUsuario AS nomeUsuario
    FROM thread
    INNER JOIN usuario ON usuario.usuario_id = thread.usuario_id
    $where");

  return $resultado->fetchAll();
}


  function BuscaThread(int $thread_id)
  {
  	$bd = CriaConexãoBd();

  	$sql = $bd->prepare('SELECT thread.*, usuario.nomeUsuario, disciplina.nome as disciplina
  	                     FROM thread
  	                     INNER JOIN disciplina ON thread.disciplina = disciplina.disciplina_id
                         INNER JOIN usuario ON thread.usuario_id = usuario.usuario_id
  	                     WHERE thread.thread_id = :thread_id');

  	$sql->bindValue(':thread_id', $thread_id);

  	$sql->execute();

  	return $sql->fetch();
  }

  function RemoveThread(int $thread_id)
  {
  	$bd = CriaConexãoBd();

  	$sql = $bd->prepare('DELETE FROM postagem WHERE thread_id = :valthread_id;
                         DELETE FROM thread   WHERE thread_id = :valthread_id'
                       );

  	$sql->bindValue(':valthread_id', $thread_id);

  	$sql->execute();
  }


?>
