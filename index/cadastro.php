<!DOCTYPE html>
<style>
  body
  {
    background-image: url("background.png");

  }

  #login-box
  {
    background-color:white;
    width: 350px;
    height: 520px;
    margin: 99px auto 0px;
    border-radius: 5px;
    box-shadow: 0px 0px 5px black;

  }

  #login-logo
  {

    height: 170px;


  }

  #logo
  {
    width:180px;
    height:170px;
    position:absolute;
    top:26%;
    left:47%;
    margin-top:-73px;
    margin-left:-50px;
    display: block;

  }

  #login-descricao
  {
    height: 300px;
    width: 260px;
    margin-left: 15px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-right-color:  black;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center
  }

  .formulario{
    justify-content: center;
    align-items: center;
    margin-left: 30%;
  }

.botao{
  margin-left: 26%;

}



</style>

<html>
<head>
  <meta charset="UTF-8"/>
  <title>MaisCP2 - Aprendendo além da escola</title>
  <link rel="icon" href="favi.ico" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="icon" href="imagens/favi.ico" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
  <div id="login-box">


    <div id="login-logo">
      <img src="maiscp2.jpg" id="logo" alt="+CP2">
    </div>

    <div id="login-descricao">

      <!--Criar uma conta-->
      <form method="POST" action='Tabelas\cadastraUsuario.php' novalidate class="formulario"> <b> Criar conta</b>

      </br><input name="nome" type="text" placeholder="Nome" style="width:100px;font-size: 13px;"  minlenght=3 maxlength=35 required/>

      <input name="usuario" type="text" placeholder="Nome de Usuário" style="width:150px;font-size: 13px"  minlenght=3 maxlength=35 required/><br/>

    </br><input name="matricula" type="text" placeholder="Matrícula" style="width:255px;font-size: 13px" minlenght=9 maxlength=9 required/><br/>

      </br><input name="senha" type="password" placeholder="Senha" style="width:125px;font-size: 13px" minlenght=6 maxlength=12 required/>

        <input name="confirmaSenha" type="password" placeholder="Confirmar senha" style="width:125px;font-size: 13px"  minlenght=6 maxlength=12 required/><br/>

        </br><label>
          Escolha o seu tipo de usuário:
          <select name="tipoUsuario">
            <option value="" disabled>Selecione</option>
            <option value="1">Aluno</option>
            <option value="2">Professor</option>
          </select>
        </label><br/>

      </br><input type="submit" class= "botao btn btn-primary botao" value="Criar conta"/>
      </form>
    </div>


  </div>

</body>

</html>
