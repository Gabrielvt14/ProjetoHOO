<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="utf-8">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>

  
	<title>Cadastre - se aqui</title>

	<script
	src="http://code.jquery.com/jquery-1.12.4.min.js"
	integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
	crossorigin="anonymous">
	</script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<!-- ==================== NAVBAR INICIO - BOOTSTRAP ==================== -->
	<nav class="navbar navbar-inverse">
  <div id="inicio" class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#inicio"><b>Hoo</b></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li><a href="login.php"><u>Página de login</u></a></li>
  	  </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- ==================== NAVBAR FIM - BOOTSTRAP ==================== -->

<!-- ==================== TABLE INICIO - BOOTSTRAP ==================== -->
<form action="core/cadastrar_novo_user.php" method="POST">
<div class="text-center">
<p class="bg-primary">Preencha o formulário abaixo para se cadastrar</p></div>
<div class="panel panel-primary	" style="width: 60%; margin: 0 auto; padding: 20px">
  <!-- Nome -->
  <div class="form-group">
    <input type="text" class="form-control" for="nome" name="nome" placeholder="Nome">
  </div>

  <!-- Data de nascimento -->
  <div class="form-group">
  	<span class="label label-default">Data de nascimento</span>
    <input type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control" for="nasc" name="nascimento">
  </div>

  <!-- Email -->
  <div class="form-group">
    <input type="email" class="form-control" for="email" name="email" placeholder="Email">
  </div>

  <!-- Senha -->
  <div class="form-group">
    <input type="password" class="form-control" for="senha" name="senha" placeholder="Senha">
  </div>

  <!-- Botão cadastrar -->
  <button type="submit" class="btn btn-default">Cadastrar</button>	
</div>
</form>
<!-- ==================== TABLE FIM - BOOTSTRAP ==================== -->

</body>
</html>