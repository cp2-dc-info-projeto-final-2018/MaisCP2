<?php
  require_once('Tabelas/ConexaoBd.php');
  require_once('Tabelas/TabelaUsuario.php');
  require_once('Tabelas/TabelaThread.php');
  session_start();

  if(array_key_exists('nomeUsuarioLogado', $_SESSION))
  {
    $nomeUsuario = $_SESSION['nomeUsuarioLogado'];
    $usuario = BuscaUsuario($nomeUsuario);
  }
  else
  {
    $nomeUsuario = "Visitante";
    $usuario = null;
  }

  $db = CriaConexãoBd();
  $sql = $db->prepare(
    "SELECT titulo, thread_id, usuario.nomeUsuario AS autor
     FROM thread JOIN usuario ON thread.usuario_id = usuario.usuario_id;"
  );

  $sql->execute();

  $listaThreads = ListaThreads();

  $idThread = $_REQUEST['id'];
  $thread= BuscaThread($idThread);

 ?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>MaisCP2 - Aprendendo Além da Escola</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="CSS/styleInicio.css">
  <link rel="icon" href="Imagens/favi.ico" type="image/ico" sizes="64x64">

</head>

<div class="header">
  <div class="row">
    <div class="col-lg-12">
      <div class="esquerda">
        <a href="index.php"  title="maiscp2.com" class="navBar TextoLink"><img src="Imagens/logoLink.png" class="logoImagem">MaisCP2</a>

        <a class= "navBar TextoLink" href="inicio.php">Início</a>
        <a class= "navBar TextoLink" href="materias.php">Matérias</a>
        <a class= "navBar TextoLink" href="a">Respostas</a>
        <a class= "navBar TextoLink" href="a">Perfil</a>
        <form class="searchBar" action="/action_page.php">
          <input class="textBusca" method="POST" type="text" action="Controle/Threads/pesquisar.php" placeholder="Pesquisar" name="pesquisar">
          <button type="submit"><i class="search fa fa-search"></i></button>
        </form>


      </div>



      <div class="direita">
        <span class="navbar-text ml-auto">Olá, <?= $nomeUsuario?></span>
        <?php if ($nomeUsuario = "Visitante") { ?>
          <a  class= "btn btn-primary botao" href="cadastro.php" title="Cadastrar-se">Cadastre-se</a>
        <?php } ?>
        <a  class= "btn btn-primary botao" href="Controle/sai.php" title="Saia">Sair</a>

      </div>
    </div>
  </div>
</div>


<body>
  <div class="container">
    <div class="row">
        <div class="col-lg-12  forumMod forumMargin">
              <div class=" row forumMod forumPad">
                  <div class="esquerda column">
            			  <h1><?= $thread['titulo'] ?></h1>
            			</div>
            		</div>

                <div class=" row forumMod forumPad">
                  <div class=" column">
                    <h3 id="autor">Autor: <a id="linkAutor"href="perfil.php?id=<?= $thread['usuario_id']?>"><?= $thread['nomeUsuario']?></a></h3>
                    <h3 class="direita disciplina"> Disciplina: <?= $thread['disciplina']?> </h3>
                  </div>
              	</div>

                <div class=" row forumMod forumPad">
                    <div class="column">
                         <!-- <p id="descricao"><?= $thread['descricao'] ?></p> -->
                         <p id="descricao"><?= $thread['descricao'] ?></p>
                    </div>
                </div>

        </div>
    </div>
  </div>


    </div>
  </div>

</body>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"> </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>
</html>
