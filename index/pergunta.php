<?php
  require_once('Tabelas/ConexaoBd.php');
  require_once('Tabelas/TabelaUsuario.php');
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
    header('Location: index.php');
    echo "Identifique-se para iniciar uma thread";
  }



 ?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>MaisCP2 - Aprendendo Além da Escola</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="CSS/stylePergunta.css">
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
          <input class="textBusca"  type="text" placeholder="Pesquisar" name="pesquisar">
          <button type="submit"><i class="search fa fa-search"></i></button>
        </form>


      </div>



      <div class="direita">
        <span class="navbar-text ml-auto">Olá, <?= $nomeUsuario?></span>
        <a  class= "btn btn-primary botao" href="Controle/sai.php" title="MaisCP2.com">Sair</a>
      </div>
    </div>
  </div>
</div>


<body>
  <div class="container">
    <div class="row">
        <div class="col-lg-12  forumMod forumMargin">
              <div class="esquerda">
                <h1>Faça uma pergunta</h1>
              </div>

              <div class="direita">
                  <a  class= "btn btn-primary botao" href="inicio.php" title="Perguntar">Cancelar</a>
              </div>

              <div class=" row forumMod forumPad">

                  <form id="formulario" method="POST" action='Controle/Threads/adicionar.php' novalidate>

                      <input name="titulo" type="text"  placeholder="Título" style="width:150px;font-size:16px;" width minlenght=3 maxlength=60 required/>


                    <input name="autor" type="text" placeholder="Autor" style="width:150px; font-size:16px;" minlenght=3 maxlength=35 required/><br/>

                    <br/><input name="disciplina" type="password" placeholder="Disciplina" style="width:150px; font-size:16px"  minlenght=6 maxlength=12 required/>

                    <input name="data" type="date" placeholder="Data" style="width:150px; font-size:16px" minlenght=6 maxlength=12 required/><br/>

                    <br/><input name="serie" type="email" placeholder="Série" style="width:150px; font-size:16px" required/><br/>


                    <input name="Descrição" type="textarea" placeholder="Descrição..."/><br/>

                  </br><input class ="botao btn bt primarybutton" type="submit" value="Criar conta"/>

                  </form>

            </div>
        </div>


    </div>


    </div>


</body>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"> </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>
</html>
