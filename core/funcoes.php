<?php

	require_once 'init.php';

	// Função que chama a classe PDO
	function db_connect(){
			// Tentativa de conexão com o banco com tratativa de erro
		try {
			$pdo = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASS);
		} catch (PDOException $e) {
			die('Erro ao conectar com a base de dados: '.$e->getMessage());
		}
		return $pdo;
	}

	// função que verifica se o usuarios esta logado
	function isLoggedIn(){
	    if (! isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
	        return false;
	    }
	 
	    return true;
	}

/*	
	// SELECT no banco de dados
	echo '<pre>';

	$sql = "SELECT * FROM usuarios";
	$result = $pdo->query($sql);
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	 
	print_r( $rows );
*/