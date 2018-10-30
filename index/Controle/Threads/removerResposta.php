<?php
require_once('../../Tabelas/TabelaResposta.php');


session_start();

if (array_key_exists('nomeUsuarioLogado', $_SESSION))
{
	$nomeUsuarioLogado = $_SESSION['nomeUsuarioLogado'];
}
else
{
	$_SESSION['erroLogin'] = "Você precisa entrar com uma conta para excluir a resposta de uma thread";
	Redireciona('../../index.php');
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
	$erros = "Filme inválido ou não informado";
}

if ($erros == null)
{
	RemoveResposta($nomeUsuarioLogado, $thread_id);
}
else
{
	$_SESSION['erroRemoverAvaliação'] = $erros;
}

header("Location: $request['local']");

?>
