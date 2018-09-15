<!DOCTYPE html>
<style>
  body
  {
    background-image: url("background.png");

  }

  #login-box
  {
    background-color:white;
    width: 650px;
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
    float: left;
    width: 260px;
    margin-left: 15px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-right-color:  black;
  }

  #login{
    height: 300px;
    float: right;
    width: 260px;
    margin-right: 15px;
    margin-top: 180px;
    display: block;
    box-sizing: border-box;
    border-left-color: black;





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

    <div id="login">
      <form method="POST" action='' novalidate> <b> Fazer login</b>

        </br><input name="email" type="email" placeholder="E-Mail" style="width:255px;font-size: 13px" required/><br/>
        </br><input name="senha" type="password" placeholder="Senha" style="width:125px;font-size: 13px" minlenght=6 maxlength=12 required/>
      </br><input type="submit" class= "btn btn-primary botao" style=" margin-top: 7px; height: 35px;"value="Login"/>

      </form>
    </div>



    <div id="login-logo">
      <img src="maiscp2.jpg" id="logo" alt="+CP2">
    </div>

    <div id="login-descricao">
      <form method="POST" action='' novalidate class="formulario"> <b> Criar conta</b>

      </br><input name="nome" type="text" placeholder="Nome" style="width:100px;font-size: 13px;"  minlenght=3 maxlength=35 required/>

      <input name="sobrenome" type="text" placeholder="Sobrenome" style="width:150px;font-size: 13px"  minlenght=3 maxlength=35 required/><br/>

      </br><input name="email" type="email" placeholder="E-Mail" style="width:255px;font-size: 13px" required/><br/>

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

      </br><input type="submit" class= "btn btn-primary botao" value="Criar conta"/>
      </form>
    </div>


  </div>

</body>

</html>
