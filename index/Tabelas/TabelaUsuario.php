<?php
  require_once('ConexaoBd.php');

	function InsereNovoUsuario(array $novoUsuario)
	{

		$db = CriaConexãoBd();

		$sql = $db->prepare(
			'INSERT INTO usuario (nomeCompleto, nomeUsuario, senha, matricula, email)
			 VALUES (:nomeCompleto, :nomeUsuario, :senha, :matricula, :email)'
		);


		$sql->bindValue(':nomeCompleto',  $novoUsuario['nomeCompleto']);
		$sql->bindValue(':nomeUsuario',  $novoUsuario['nomeUsuario']);
		$sql->bindValue(':matricula',  $novoUsuario['matricula']);
		$sql->bindValue(':senha', $novoUsuario['senha']);
  	$sql->bindValue(':email', $novoUsuario['email']);


		$sql->execute();
	}

  function BuscaMatricula(string $matricula)
  {

    $db = CriaConexãoBd();

    $sql = $db->prepare(
      "SELECT * FROM usuario WHERE matricula = :matricula;"
    );

    	$sql->bindValue(':matricula', $matricula );


    	$sql -> execute();

      return $sql -> rowCount();


  }

  function BuscaEmail(string $email)
  {

    $db = CriaConexãoBd();

    $sql = $db->prepare(
      "SELECT * FROM usuario WHERE email = :email;"
    );

      $sql->bindValue(':email', $email );


      $sql -> execute();

      return $sql -> rowCount();


  }


?>
