<?php
require_once('../../Tabelas/TabelaResposta.php');


session_start();

if (array_key_exists('idUsuarioLogado', $_SESSION))
{
	$usuario_id = $_SESSION['idUsuarioLogado'];
}
else
{
	$_SESSION['erroLogin'] = "Você precisa entrar com uma conta para responder uma thread";
  header("Location: ../../index.php");
}


$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [
							   'thread_id' => FILTER_VALIDATE_INT,
                 'resposta' => FILTER_DEFAULT ]
           );


$thread_id = $request['thread_id'];

if ($thread_id == false)
{
	$erros[] = "Thread inválida ou não informada";
}


if (empty($erros))
{
	InsereResposta(	$usuario_id,
	                $request['thread_id'],
	                 $request['resposta']);

	$âncora = "resposta_$usuario_id";
}
else
{
	$_SESSION['errosResposta'] = $erros;
	$âncora = "formResposta";
}

header("Location:../../thread.php?thread_id=$thread_id#$âncora");

?>
