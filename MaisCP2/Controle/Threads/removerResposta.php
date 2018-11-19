<?php
require_once('../../Tabelas/TabelaResposta.php');
require_once('../../Tabelas/ConexaoBd.php');

session_start();

if (array_key_exists('idUsuarioLogado', $_SESSION))
{
	$usuario_id = $_SESSION['idUsuarioLogado'];
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
                 'postagem_id' => FILTER_VALIDATE_INT ]
           );


$postagem_id = $request['postagem_id'];
if ($postagem_id == false)
{
	$erros = "Thread inválido ou não informado";
}
else{
	$db = CriaConexãoBd();
	$sql = $db->prepare(
		"SELECT usuario_id FROM postagem WHERE postagem_id = :valpostagem_id;"
	);

	 $sql->bindValue(':valpostagem_id', $postagem_id );

	 $sql->execute();

	 $resultado = $sql->fetchColumn(0);

	if ($resultado == false)
	{
		$erros = "Esse usuário não efetuou esta resposta";
	}
	else if($usuario_id != $resultado){
		$erros = "Não é possível remover a postagem de outro usuário.";
	}
}


if ($erros == null)
{
	RemoveResposta($postagem_id);
}
else
{
	$_SESSION['erroRemoverAvaliação'] = $erros;
}

//header("Location:../../thread.php?thread_id=$thread_id");

$local = $request['local'];
header("Location: $local");

?>
