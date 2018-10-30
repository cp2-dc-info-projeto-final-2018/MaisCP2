<?php
require_once('ConexaoBd.php');

function ListaRespostaThread(int $thread_id) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT postagem.*,
	                            usuario.nomeUsuario AS nomeUsuario,
	                            usuario.nomeCompleto AS nomeCompleto
	                     FROM postagem
	                     INNER JOIN usuario ON usuario.usuario_id = postagem.usuario_id
	                     WHERE thread_id = :valthread_id');

	$sql->bindValue(':valthread_id', $thread_id);

	$sql->execute();

	return $sql->fetchAll();
}

function ListaRespostaUsuario(int $usuario_id) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT postagem.*,
	                            thread.titulo as titulo,
	                            thread.disciplina as disciplina
	                     FROM postagem
	                     INNER JOIN thread ON thread.thread_id = postagem.thread_id
	                     WHERE usuario_id = :valusuario_id');

	$sql->bindValue(':valusuario_id', $usuario_id);

	$sql->execute();

	return $sql->fetchAll();
}

function InsereResposta(int $usuario_id, int $thread_id, string $resposta)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('REPLACE INTO postagem (usuario_id, thread_id, resposta)
	                     VALUES (:valusuario_id, :valthread_id, :valresposta)');

	$sql->bindValue(':valusuario_id', $usuario_id);
	$sql->bindValue(':valthread_id', $thread_id);
	$sql->bindValue(':valresposta', $resposta);

	$sql->execute();
}

function RemoveResposta(int $usuario_id, int $thread_id)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('DELETE FROM postagem
	                     WHERE usuario_id = :valusuario_id
	                     AND thread_id = :valthread_id');

	$sql->bindValue(':valusuario_id', $usuario_id);
	$sql->bindValue(':valthread_id', $thread_id);

	$sql->execute();
}

function CalculaNota(array $respostas) : ?float
{
	if (empty($respostas))
	{
		return null;
	}

	$nota = 0;
	foreach ($respostas as $a)
	{
		$nota += $a['nota'];
	}

	$média = $nota / count($respostas);

	return round($média, 1);
}

?>
