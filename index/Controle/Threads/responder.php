<?php
require_once('../../Tabelas/TabelaResposta.php');


session_start();

if (array_key_exists('nomeUsuarioLogado', $_SESSION))
{
	$nomeUsuarioLogado = $_SESSION['nomeUsuarioLogado'];
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
               [ 'usuario_id' => FILTER_VALIDATE_INT,
							   'thread_id' => FILTER_VALIDATE_INT,
                 'resposta' => FILTER_DEFAULT ]
           );


$thread_id = $request['thread_id'];
$usuario_id = $request['usuario_id'];

if ($thread_id == false)
{
	$erros[] = "Thread inválida ou não informada";
}


if (empty($erros))
{
	InsereResposta($request['usuario_id'],
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
