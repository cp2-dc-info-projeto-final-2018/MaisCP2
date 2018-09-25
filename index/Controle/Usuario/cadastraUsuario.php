<?php
  require_once('../../Tabelas/TabelaUsuario.php');

  $erros = [];

  $validar = array_map('trim', $_REQUEST);

  $validar = filter_var_array(
    $validar,
    [
    'nomeCompleto' => FILTER_DEFAULT,

    'nomeUsuario' => FILTER_DEFAULT,

    'senha' => FILTER_DEFAULT,

    'confirmaSenha' => FILTER_DEFAULT,

    'email' => FILTER_VALIDATE_EMAIL


    ]
  );


$nomeCompleto = $validar['nomeCompleto'];
$nomeUsuario = $validar['nomeUsuario'];
$senha = $validar['senha'];
$confirmaSenha = $validar['confirmaSenha'];
$email= $validar['email'];




if ($nomeCompleto == false)
{
  $erros[] = "Insira seu nome.";
}
else if (strlen($nomeCompleto) < 3 || strlen($nomeCompleto) > 60)
{
  $erros[] = "Quantidade de caracteres no nome inválido.";
};

if ($nomeUsuario == false)
{
$erros[] = "Insira um nome de usuário.";
}
else if (strlen($nomeUsuario) < 3 || strlen($nomeUsuario) > 35)
{
$erros[] = "Quantidade de caracteres no nome de usuário inválido.";
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

if ($email == false)
{
$erros[] = "Insira um email válido.";
};



  $count = BuscaEmail($email);

  if ($count > 0)
    {
      $erros[] =  "Esse email já está cadastrado";
    }

    $count2 = BuscaUsuario($nomeUsuario);

    if ($count2 > 0)
      {
        $erros[] =  "Esse nome de usuário já está cadastrado";
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
