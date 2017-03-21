<?php

	require_once 'init.php';

	if (! $_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "<script language='javascript' type='text/javascript'>alert('Preencha os campos abaixo.');window.location.href='../login.php';</script>";
		exit;
	}

	// resgata dados digitados no formulario
	$email = isset($_POST['email']) ? $_POST['email']: '';
	$senha = isset($_POST['senha']) ? $_POST['senha']: '';

	// Verifica se os campos do form nao estao vazios
	if(empty($email) || empty($senha)){
	    echo "<script language='javascript' type='text/javascript'>alert('Informe email e senha.');window.location.href='../login.php';</script>";
	    exit;
	}

	$pdo = db_connect();	// Conexão com o banco
	$sql = "SELECT id, nome, senha FROM usuarios WHERE email = :email";	// Query
	$stmt = $pdo->prepare($sql);	// Prepare da query
	$stmt->bindValue(':email', $email);
	// bindValue para jogar infomações da variavel $email, no campo email da query
	$stmt->execute();	// Execute no banco

	$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// Cria array associativo com as informações que retornaram do banco.

	if( ( count($arr) < 1) || (!password_verify( $senha, $arr[0]['senha'])) ) {
    	echo "<script language='javascript' type='text/javascript'>alert('Email ou senha incorreto.');window.location.href='../login.php';</script>";
    	exit;
	}
	   
	// Pega o primeiro usuario do array
	$user = $arr[0];

	// Inicia a sessão
	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['user_name'] = $user['nome'];

	header('Location: ../home.php');
	

/*	
	============ PARA DEBUG ============

	if(count($arr) < 1) {
    echo 'USUARIO NAO EXISTE';
	} else if(password_verify( $senha, $arr[0]['senha'])) {
	    echo 'BEM VINDO AO SISTEMA';
	} else {
	    echo 'SENHA ERRADA';
*/