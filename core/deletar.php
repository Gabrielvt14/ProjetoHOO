<?php

	require_once 'init.php';
	require_once 'check.php';

	// Pega a URL
	$id = isset($_GET['id']) ? $_GET['id']: null;

	// Valida o id
	if (empty($id)) {
		echo 'Id informado não é válido.';
		exit;
	}

	// Remove do banco
	$pdo = db_connect();
	$sql = "DELETE FROM usuarios WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	if ($stmt->execute()) {
		header('Location: ../home.php');
	}else{
		echo 'Erro ao deletar usuario do banco.';
		print_r($stmt->errorInfo());
	}