<?php
  require_once('TabelaUsuario.php');

  $erros = [];

  $validar = array_map('trim', $_REQUEST);

  $validar = filter_var_array(
    $validar,
    [
    'nome' => FILTER_DEFAULT,

    'usuario' => FILTER_DEFAULT,

    'senha' => FILTER_DEFAULT,

    'confirmaSenha' => FILTER_DEFAULT,

    'matricula' => FILTER_DEFAULT


    ]
  );


$nome = $validar['nome'];
$usuario= $validar['usuario'];
$senha = $validar['senha'];
$confirmaSenha = $validar['confirmaSenha'];
$matricula = $validar['matricula'];




if ($nome == false)
{
  $erros[] = "Insira seu nome.";
}
else if (strlen($nome) < 3 || strlen($nome) > 35)
{
  $erros[] = "Quantidade de caracteres no nome inválido.";
};

if ($usuario == false)
{
$erros[] = "Insira um sobrenome.";
}
else if (strlen($usuario) < 3 || strlen($usuario) > 35)
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

if ($matricula == false)
{
$erros[] = "Insira uma matrícula válida.";
};



  $count = BuscaMatricula($matricula);

  if ($count > 0)
    {
      $erros[] =  "Essa matriculal já está cadastrada";
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
