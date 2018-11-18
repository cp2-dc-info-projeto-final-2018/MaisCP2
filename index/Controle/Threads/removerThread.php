<?php
require_once('../../Tabelas/TabelaThread.php');
require_once('../../Tabelas/ConexaoBd.php');

session_start();

if (array_key_exists('idUsuarioLogado', $_SESSION))
{
	$usuario_id = $_SESSION['idUsuarioLogado'];
}
else
{
	$_SESSION['erroLogin'] = "Você precisa entrar com uma conta para excluir uma thread";
	header('Location:../../index.php');
}

$erros = null;

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'local' => FILTER_DEFAULT,
                 'thread_id' => FILTER_VALIDATE_INT ]
           );


$thread_id = $request['thread_id'];
if ($thread_id == false)
{
	$erros = "Thread inválido ou não informado";
}
else{
	$db = CriaConexãoBd();
	$sql = $db->prepare(
		"SELECT usuario_id FROM thread WHERE thread_id = :valthread_id;"
	);

	 $sql->bindValue(':valthread_id', $thread_id );

	 $sql->execute();

	 $resultado = $sql->fetchColumn(0);

	if ($resultado == false)
	{
		$erros = "Esse usuário não fez esta thread";
	}
	else if($usuario_id != $resultado){
		$erros = "Não é possível remover a thread de outro usuário.";
	}
}


if ($erros == null)
{
	RemoveThread($thread_id);
}
else
{
	$_SESSION['erroRemoverThread'] = $erros;
}

header("Location: ../../inicio.php");

?>
