<?php
  require_once('ConexaoBd.php');

	function InsereNovoUsuario(array $novoUsuario)
	{

		$db = CriaConexãoBd();

		$cmdSql = $db->prepare(
			'INSERT INTO usuario (nome, usuario, senha, matricula)
			 VALUES (:nome, :usuario, :senha, :matricula)'
		);


		$cmdSql->bindValue(':nome',  $novoUsuario['nome']);
		$cmdSql->bindValue(':usuario',  $novoUsuario['usuario']);
		$cmdSql->bindValue(':matricula',  $novoUsuario['matricula']);
		$cmdSql->bindValue(':senha', $novoUsuario['senha']);


		$cmdSql->execute();
	}

  function BuscaMatricula(string $matricula)
  {

    $db = CriaConexãoBd();

    $cmdSql = $db->prepare(
        "SELECT * FROM usuario WHERE matricula = :matricula;"

    );

    	$cmdSql->bindValue(':matricula', $matricula );


    	$cmdSql -> execute();

      return $cmdSql -> rowCount();


  }


?>
