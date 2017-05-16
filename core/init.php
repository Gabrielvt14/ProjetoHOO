<?php

	// Inclui o arquivo do banco de dados
	require_once 'funcoes.php';
	require_once 'date.php';

	// Constantes com as credenciais para conexão com o banco de dados MySQL
	define('MYSQL_HOST', 'mysql.hostinger.com.br');
	define('MYSQL_USER', 'u649742587_root');
	define('MYSQL_PASS', 'SENHA_BD');
	define('MYSQL_DB_NAME', 'u649742587_hoo');

	// Habilita todas as exibições de erro
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	// Define a timezone
	date_default_timezone_set('America/Sao_Paulo');
