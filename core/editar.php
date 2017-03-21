<?php

	session_start();

	require_once 'init.php';
  	require_once 'check.php';

  	if (! $_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "<script language='javascript' type='text/javascript'>alert('Preencha os campos abaixo.');window.location.href='../login.php';</script>";
		exit;
	}

	// resgata os valores do formulario
	$nome = isset($_POST['nome']) ? $_POST['nome']: null;
	$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento']: null;
	$email = isset($_POST['email']) ? $_POST['email']: null;
	$senha = isset($_POST['senha']) ? $_POST['senha']: null;
	$senha_segura = addslashes($senha);	// Proteção contra SQL Injection
	$seg_senha = password_hash($senha_segura, PASSWORD_DEFAULT);
	$id = isset($_POST['id']) ? $_POST['id']: null;

	// Proteção contra SQL Injection
	$seg_nome = preg_replace('/[^[:alnum:]_.-]/', '', $nome);
	$seg_id = preg_replace('/[^[:alnum:]_.-]/', '', $id);

	// Validação para evitar dados vazios
	if (empty($nome) || empty($nascimento) || empty($email) || empty($senha) || empty($id)) {
		echo "<script language='javascript' type='text/javascript'>alert('Por favor, preencha todos os campos.');window.location.href='../editar.php';</script>";
		exit;
	}

	// Atualiza o banco
	$pdo = db_connect();
	$sql = "UPDATE usuarios SET nome = :nome, nasc = :nasc, email = :email, senha = :senha WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':nome', $seg_nome);
	$stmt->bindParam(':nasc', $nascimento);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':senha', $seg_senha);
	$stmt->bindParam(':id', $seg_id, PDO::PARAM_INT);

	if ($stmt->execute()){
		echo "<script language='javascript' type='text/javascript'>alert('Usuário atualizado com sucesso!');window.location.href='../home.php';</script>";
	}else{
		echo 'Erro ao atualizar usuario.';
		print_r($stmt->errorInfo());
	}