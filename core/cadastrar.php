<?php

	session_start();
	require_once 'init.php';
	require_once 'check.php';

	if (! $_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "<script language='javascript' type='text/javascript'>alert('Preencha os campos abaixo.');window.location.href='../login.php';</script>";
		exit;
	}

	// TODO: Pega os dados do formulario
	$nome = isset($_POST['nome']) ? $_POST['nome']: null;
	$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento']: null;
	$email = isset($_POST['email']) ? $_POST['email']: null;
	$senha = isset($_POST['senha']) ? $_POST['senha']: null;
	$senha_segura = addslashes($senha);	// Proteção contra SQL Injection
	$seg_senha = password_hash($senha_segura, PASSWORD_DEFAULT);
	// Senha criptografada com PASSWORD API

	// Proteção contra SQL Injection
	$seg_nome = preg_replace('/[^[:alnum:]_.-]/', '', $nome);
	

	// TODO: valida os campos vazios
	if(empty($nome) || empty($nascimento) || empty($email) || empty($senha)){
		echo "<script language='javascript' type='text/javascript'>alert('Volte e preencha todos os campos.');window.location.href='../home.php';</script>";
		exit;
	}

	// TODO: inserir os dados no banco
	$pdo = db_connect();	// Abre conexão com o banco de dados
	$sql = "INSERT INTO usuarios(nome, nasc, email, senha)
			VALUES(:nome, :nasc, :email, :senha)";	// Comando SQL a ser executado
	$stmt = $pdo->prepare($sql);	// PREPARE do comando SQL com statement
	$stmt->bindParam(':nome', $seg_nome);
	// bindParam para definir o campo do banco que vai receber o valor da variavel $nome
	$stmt->bindParam(':nasc', $nascimento);
	// bindParam para definir o campo do banco que vai receber o valor da variavel $nascimento
	$stmt->bindParam(':email', $email);
	// bindParam para definir o campo do banco que vai receber o valor da variavel $email
	$stmt->bindParam(':senha', $seg_senha);
	// bindParam para definir o campo do banco que vair receber o valor da variavel $seg_senha

	if ($stmt->execute()) {	// Executa todos os dados da variavel $stmt no banco de dados
		header('Location: ../home.php');
	}else{
		echo 'Erro ao conectar com o banco de dados';
		print_r($stmt->errorInfo());
	}