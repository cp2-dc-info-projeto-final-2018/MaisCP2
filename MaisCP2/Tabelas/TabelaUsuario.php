<?php
  require_once('ConexaoBd.php');

	function InsereNovoUsuario(array $novoUsuario)
	{

		$db = CriaConexãoBd();

		$sql = $db->prepare(
			'INSERT INTO usuario (nomeCompleto, nomeUsuario, senha, email)
			 VALUES (:nomeCompleto, :nomeUsuario, :senha, :email)'
		);


		$sql->bindValue(':nomeCompleto',  $novoUsuario['nomeCompleto']);
		$sql->bindValue(':nomeUsuario',  $novoUsuario['nomeUsuario']);
		$sql->bindValue(':senha', $novoUsuario['senha']);
  	$sql->bindValue(':email', $novoUsuario['email']);


		$sql->execute();
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

  function BuscaUsuario(string $nomeUsuario)
  {

    $db = CriaConexãoBd();

    $sql = $db->prepare(
      "SELECT * FROM usuario WHERE nomeUsuario = :nomeUsuario;"
    );

      $sql->bindValue(':nomeUsuario', $nomeUsuario );


      $sql -> execute();

      return $sql -> fetch();
  }

  function BuscaUsuarioPorId(int $id)
  {

    $db = CriaConexãoBd();

    $sql = $db->prepare(
      "SELECT * FROM usuario WHERE usuario_id = :id;"
    );

      $sql->bindValue(':id', $id );


      $sql -> execute();

      return $sql -> fetch();
  }

?>
