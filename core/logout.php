<?php

	require_once 'init.php';
	require_once 'check.php';

	// Inicia sessão
	session_start();

	// Muda o valor de logged_in para FALSE
	$_SESSION['logged_in'] = false;

	// Finaliza a sessão
	session_destroy();

	// Retorna para pagina de login
	header('Location: ../index.php');