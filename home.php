<?php

  session_start();

	require_once 'core/init.php';
  require_once 'core/check.php';

  // abre a conexão
  $pdo = db_connect();
	 
	// SQL para contar o total de registros
	// A biblioteca pdo possui o método rowCount(), mas ele pode ser impreciso.
	// É recomendável usar a função COUNT da SQL
	$sql_count = "SELECT COUNT(*) AS total FROM usuarios ORDER BY nome ASC";
	 
	// SQL para selecionar os registros
	$sql = "SELECT id, nome, email, nasc FROM usuarios ORDER BY nome ASC";
	 
	// conta o toal de registros
	$stmt_count = $pdo->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
	 
	// seleciona os registros
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
?>

<html>
<head lang="en">
<meta charset="utf-8">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>

  
<title>Bem Vindo <?php echo $_SESSION['user_name']; ?>.</title>

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
      	<li><a href="cadastrar.php">	<u>Cadastrar novo usuário</u></a></li>
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
<div class="text-center">
	<h4 class="bg-info"><b>Total de usuários: <?php echo $total ?></b></h4>
</div>
 
        <?php if ($total > 0): ?>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            
            <tbody>
                <?php while ($user = $stmt->fetch(pdo::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['nome'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo calcIdade($user['nasc']) ?> anos</td>
                    <td>
                        <a href="editar.php?id=<?php echo $user['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="core/deletar.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover usuário? Se clicar em OK não sera possível desfazer esta ação');" class="btn btn-danger btn-sm">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
          <p>Nenhum usuário registrado</p>

        <?php endif; ?>
<!-- ==================== TABLE INICIO - BOOTSTRAP ==================== -->
    </body>
</html>