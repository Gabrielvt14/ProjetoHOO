<?php
		
	require_once 'init.php';

	if (! $_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "<script language='javascript' type='text/javascript'>alert('Preencha os campos abaixo.');window.location.href='../login.php';</script>";
		exit;
	}

	// Pega dados do formulário
	$nome = isset($_POST['nome']) ? $_POST['nome']: null;
	$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento']: null;
	$email = isset($_POST['email']) ? $_POST['email']: null;
	$senha = isset($_POST['senha']) ? $_POST['senha']: null;
	$senha_segura = addslashes($senha);	// Proteção contra SQL Injection
	// Senha criptografada
	$seg_senha = password_hash($senha_segura, PASSWORD_DEFAULT);

	// Proteção contra SQL Injection
	$seg_nome = preg_replace('/[^[:alnum:]_.-]/', '', $nome);

	// Verificação de campos vazios
	if (empty($nome) || empty($nascimento) || empty($email) || empty($senha)) {
		echo "<script language='javascript' type='text/javascript'>alert('Volte e preencha todos os campos.');window.location.href='../login.php';</script>";
		exit;
	}

	// Inseri dados no banco
	$pdo = db_connect();
	$sql = "INSERT INTO usuarios(nome, nasc, email, senha)
			VALUES(:nome, :nasc, :email, :senha)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':nome', $seg_nome);
	$stmt->bindParam(':nasc', $nascimento);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':senha', $seg_senha);

	if ($stmt->execute()) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso, por favor, faça login na página a seguir.');window.location.href='../login.php';</script>";
	}else{
		echo 'Não foi possível cadastrar seus dados no banco.';
		print_r($stmt->errorInfo());
	}