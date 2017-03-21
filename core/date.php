<?php

	require_once 'init.php';
	
	// Calcula a idade a partir da data de nascimento

	function calcIdade($nasc){
	    $now = new DateTime();
	    $diff = $now->diff(new DateTime($nasc));
	     
	    return $diff->y;
	}