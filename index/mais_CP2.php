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
    height:160px;
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
    width: 340px;
    margin-left: 10px;
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
  <title>MaisCPII - Aprendendo além da escola</title>
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
      <form method="POST" action='Controle/Usuario/cadastraUsuario.php' novalidate>

      </br><input name="nomeCompleto" type="text"  placeholder="Nome completo" style="width:150px;font-size:16px;" width minlenght=3 maxlength=60 required/>

        <input name="nomeUsuario" type="text" placeholder="Username" style="width:150px; font-size:16px;" minlenght=3 maxlength=35 required/><br/>

        <br/><input name="senha" type="password" placeholder="Senha" style="width:150px; font-size:16px"  minlenght=6 maxlength=12 required/>

        <input name="confirmaSenha" type="password" placeholder="Confirmar senha" style="width:150px; font-size:16px" minlenght=6 maxlength=12 required/><br/>


       <br/><input name="matricula" type="text" placeholder="Matrícula" style="width:150px; font-size:16px"; maxlength=9 required/></br>

        <br/><input name="email" type="email" placeholder="E-mail" style="width:150px; font-size:16px" required/><br/>


        <label><input name="alertasEmail" type="checkbox"/>Receber alertas por e-mail.</label><br/>

      </br><input class ="btn bt primarybutton" style="margin-left:90px; background-color:#316AB2; " type="submit" value="Criar conta"/>
      </form>
    </div>


  </div>

</body>

</html>
