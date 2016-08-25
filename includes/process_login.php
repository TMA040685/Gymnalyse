<?php
	include_once 'db-connect.php';
	include_once 'functions.php';

	sec_session_start();
	


	if ( isset ( $_POST['email'], $_POST['p'])) {
		$email = $_POST['email'];
		$password = $_POST['p'];
		
		if ( login($email,$password,$mysqli) == true ) {
			// LOGIN SUCCESS
			header('location: ../members.php');
		} else {
			// LOGIN FAILED
			$msg = 'Du har angivet en forkert email adresse eller et forkert password.';
			header('location: ../error.php?err='.$msg);
		}
	} else {
		// INCORRECT NUMBER OF VARIABLES
		$msg = 'Det korrekte antale data blev ikke sendt til... ';
		header('location: ../error.php?err='.$msg);
	}
