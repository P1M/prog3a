<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Sistema de Controle de Atividades Complementares</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="../../style.css" media="screen" type="text/css" />

</head>

<body>

	<br><br>
  <div class="login-card">
  
    <h2>Login Aluno</h2><br>
	
  <form action="login_aluno.php" method="post">
    <input type="text" name="ra" placeholder="RA">
    <input type="password" name="senha" placeholder="Password">
    <input type="submit" name="enviar" id="enviar" class="login login-submit" value="Login">
  </form>

  <br>
  <div class="login-help">
    <a href="#">Registrar-se</a>
  </div>
  <br>
    <div class="login-help">
    <a href="index2.html">Acessar como Coordenador</a>
  </div>
  
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>