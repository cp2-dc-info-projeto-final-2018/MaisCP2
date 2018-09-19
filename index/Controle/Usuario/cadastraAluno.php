<?php
  require_once('../../Tabelas/TabelaUsuarioAluno.php');

  $erros = [];

  $validar = array_map('trim', $_REQUEST);

  $validar = filter_var_array(
    $validar,
    [
    'nomeCompleto' => FILTER_DEFAULT,

    'nomeUsuario' => FILTER_DEFAULT,

    'email' => FILTER_VALIDATE_EMAIL,

    'senha' => FILTER_DEFAULT,

    'confirmaSenha' => FILTER_DEFAULT,

    'matricula' => FILTER_DEFAULT,

    'alertasEmail' => FILTER_VALIDATE_BOOLEAN,

    'curso' =>  FILTER_VALIDATE_INT,

    'serie' =>  FILTER_VALIDATE_INT

    ]
  );


$nomeCompleto = $validar['nomeCompleto'];
$nomeUsuario = $validar['nomeUsuario'];
$senha = $validar['senha'];
$confirmaSenha = $validar['confirmaSenha'];
$email = $validar['email'];
$matricula = $validar['matricula'];
$alertasEmail = $validar['alertasEmail'];
$curso = $validar['curso'];
$serie = $validar['serie'];


if ($nomeCompleto == false)
{
  $erros[] = "Insira um nome.";
}
else if (strlen($nomeCompleto) < 3 || strlen($nomeCompleto) > 60 )
{
  $erros[] = "Quantidade de caracteres no nome inválido.";
};

if ($nomeUsuario == false)
{
$erros[] = "Insira um username.";
}
else if (strlen($nomeUsuario) < 3 || strlen($nomeUsuario) > 35)
{
$erros[] = "Quantidade de caracteres no username inválido.";
};

if ($senha == false)
{
$erros[] ="Insira uma senha.";
}
else if (strlen($senha) < 6 || strlen($senha) > 12)
{
$erros[] =  "Senha inválida (deve ter no mínimo 6 caracteres e no máximo 12).";
};

if ($confirmaSenha == false)
{
$erros[] = "Confirme sua senha.";
}
else if ($confirmaSenha != $senha)
{
$erros[] = "As senhas devem ser iguais.";
};

$validar['senha'] = password_hash("md5", PASSWORD_DEFAULT);

if ($email == false)
{
$erros[] = "Insira um e-mail válido.";
};

if ($matricula == false)
{
  $erros[] = "Insira uma matrícula.";
}
else if (strlen($matricula) > 9)
{
  $erros[] = "Insira uma matrícula válida";
};

if ($curso == false)
{
$erros[] = "Escolha seu curso.";
}
else if ($curso != 1 && $curso != 2)
{
  $erros[] =  "Opção não encontrada.";
};

if ($serie == false)
{
$erros[] = "Escolha a série que está cursando.";
}
else if ($serie != 1 && $serie != 2 && $serie != 3)
{
  $erros[] =  "Opção não encontrada.";
};



  if ($alertasEmail == null)
  {
    $alertasEmail = false;
  }


  $count = BuscaEmail($email);

  if ($count > 0)
    {
      $erros[] =  "Esse email já está cadastrado";
    }

  $count2 = BuscaMatricula($matricula);

    if ($count2 > 0)
      {
        $erros[] =  "Essa matrícula já está cadastrada";
      }





  if (empty($erros))
  {
	   InsereNovoUsuario($validar);
   }
   else
   {
     foreach ($erros as $e)
     {
       echo "<p>$e</p>";
     }
   }



 ?>
