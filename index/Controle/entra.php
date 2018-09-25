<?php
 require_once('../Tabelas/TabelaUsuario.php');
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
	 else if ($senha == false)
 {
	 $erros = "Senha não informada";
 }
 // PENDENTE: Concluir a validação
 else if (array_key_exists($nomeUsuario, $novoUsuarios) == false)
 {
	 $erros = "Nenhum usuário cadastrado com esse username";
 }

 else if (password_verify($senha, $novoUsuario['nomeUsuario']['senha']) == false)
 {
	 $erros = "Senha inválida";
 }
 // PENDENTE: Em caso de sucesso, redirecionar o usuário para a página de pedidos
 // PENDENTE: Em caso de erro, redirecionar usuário para a página de login para exibir as mensagens de erro
 if($erros != null){
	 session_start();
	 $_SESSION['erroLogin'] = $erros;
	 header('Location: ../index.php');
 }
?>
