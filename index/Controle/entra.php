<?php
 require_once('../Tabelas/ConexaoBd.php');
 $erros = null;
 $request = array_map('trim', $_REQUEST);
 $request = filter_var_array(
								$request,
								[ 'nomeUsuario' => FILTER_DEFAULT,
									'senha' => FILTER_DEFAULT ]
						);
 $nomeUsuario = $request['nomeUsuario'];
 $senha = $request['senha'];
 if ($nomeUsuario == false)
 {
	 $erros = "Username não informado";
 }
 if ($senha == false)
 {
	 $erros = "Senha não informada";
 }
 // PENDENTE: Concluir a validação
 $db = CriaConexãoBd();
 $sql = $db->prepare(
   "SELECT senha FROM usuario WHERE nomeUsuario = :nomeUsuario;"
 );


  $sql->bindValue(':nomeUsuario', $nomeUsuario );

  $sql->execute();

  $resultado = $sql->fetch();

 if (array_key_exists(':nomeUsuario', $resultado) == false)
 {
	 $erros = "Nenhum usuário cadastrado com esse nome de usuário";
 }

 if (password_verify($senha, $resultado['senha']) == false)
 {
	 $erros = "Senha inválida";
 }
 // PENDENTE: Em caso de sucesso, redirecionar o usuário para a página de inicio
 // PENDENTE: Em caso de erro, redirecionar usuário para a página de login para exibir as mensagens de erro
 if($erros != null){
	 session_start();
	 $_SESSION['erroLogin'] = $erros;
	 header('Location: ../index.php');
 }
 else
 {
   header('Location: ../inicio.php');
 }
?>
