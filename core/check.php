<?php
	
	require_once 'init.php';
	require_once 'funcoes.php';

	// chamada de função que verifica se o usuário não esta logado
	 if (!isLoggedIn()){
    	echo "<script language='javascript' type='text/javascript'>alert('Você não esta logado no sistema, por favor, realize o login ou crie uma conta.');window.location.href='index.php';</script>";
	}