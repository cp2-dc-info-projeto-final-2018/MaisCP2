<?php
  require_once('../../Tabelas/TabelaThread.php');

  session_start();
  $usuario_id = $_SESSION['idUsuarioLogado'];

  $erros = [];

  $validar = array_map('trim', $_REQUEST);

  $validar = filter_var_array(
    $validar,
    [

    'titulo' => FILTER_DEFAULT,

    'disciplina' => FILTER_VALIDATE_INT,

    'serie' => FILTER_VALIDATE_INT,

    'descricao' => FILTER_DEFAULT,

    'usuario_id' => FILTER_DEFAULT

    ]
  );

$titulo = $validar['titulo'];

$disciplina = $validar['disciplina'];
$serie = $validar['serie'];
$descricao = $validar['descricao'];
$validar['usuario_id'] = $usuario_id;




if ($titulo == false)
{
  $erros[] = "Insira um título.";
}
else if (strlen($titulo) < 3 || strlen($titulo) > 60)
{
  $erros[] = "Quantidade de caracteres no título inválido.";
};


if ($disciplina == false)
{
$erros[] ="Insira uma disciplina.";
}
else if ($disciplina != 1 && $disciplina != 2 && $disciplina != 3)
{
  $erros[] =  "Opção não encontrada.";
};

if ($serie == false)
{
$erros[] = "Insira a série da pergunta.";
}
else if ($serie != 1 && $serie != 2)
{
  $erros[] =  "Opção não encontrada.";
};

  if (empty($erros))
  {
	   InsereNovaThread($validar);
     header("Location: ../../inicio.php");
   }
   else
   {
     foreach ($erros as $e)
     {
       echo "<p>$e</p>";
     }
   }



 ?>
