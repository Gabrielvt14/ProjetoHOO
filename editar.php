<?php

  session_start();

	require_once 'core/init.php';
  require_once 'core/check.php';

	// Pega o id da URL
	$id = isset($_GET['id']) ? (int)$_GET['id']: null;

	// Valida o id
	if (empty($id)) {
		echo 'ID para alteração nao definido';
		exit;
	}

	// Busca os dados do usuario a ser editado
	$pdo = db_connect();
	$sql = "SELECT nome, nasc, email, senha FROM usuarios WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	$stmt->execute();

	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	// Se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
	if(!is_array($user)){
		echo 'Nenhum usuario encontrado.';
		exit;
	}

?>
<!DOCTYPE html>
<html>
<head lang="en">

<meta charset="utf-8">

  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>

	<title>Edição de usuario | <?php echo $_SESSION['user_name']; ?>.</title>

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
      	<li><a href="home.php"><u>Home</u></a></li>
  	  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="core/logout.php">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- ==================== NAVBAR FIM - BOOTSTRAP ==================== -->


<!-- ==================== TABLE INICIO - BOOTSTRAP ==================== -->
<div class="panel panel-success	" style="width: 60%; margin: 0 auto; padding: 20px">
		<div class="panel-heading">
			<center>
				<b>EDITAR USUÁRIO</b>
			</center>
		</div>

		<div class="panel-body">

			<form method="POST" action="core/editar.php">
  				<div class="form-group">
   					 <input type="hidden" value="" name="id" class="form-control" id="exampleInputId1"></a>
   				</div>
   				<div class="form-group">
    				<label for="nome">Nome</label>
   					 <input type="text" value="<?php echo $user['nome'] ?>" name="nome" class="form-control" id="nome" placeholder="Nome"></a>
  				</div>

  				<div class="form-group">
    				<span class="label label-default">Data de nascimento</span>
    				<input type="date" value="<?php echo $user['nasc'] ?>" data-date="" data-date-format="DD MMMM YYYY" class="form-control" for="nasc" name="nascimento">
  				</div>

  				<div class="form-group">
    				<label for="email">E-MAIL</label>
    				<input type="email" value="<?php echo $user['email'] ?>" name="email" class="form-control" id="email" placeholder="E-MAIL">
  				</div>

  				<div class="form-group">
    				<label for="senha">Senha</label>
    				<input type="password" value="<?php echo $user['senha'] ?>" name="senha" class="form-control" id="senha" placeholder="Senha">
  				</div>

  				<input type="hidden" name="id" value="<?php echo $id ?>">

  			<button type="submit" class="btn btn-default">Finalizar edição</button>
			</form>
		</div>
	</div>
<!-- ==================== TABLE INICIO - BOOTSTRAP ==================== -->
</body>
</html>