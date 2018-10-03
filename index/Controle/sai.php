<?php
  	// PENDENTE: Redirecionar o usuário para a página de login
    	session_start();
    	unset($_SESSION['nomeUsuarioLogado']);
      header('Location: ../index.php');
?>
