<?php
	include_once 'functions.php';
	sec_session_start();

	// UNSET ALL SESSION VALUES
	$_SESSION = array();

	// GET THE CURRENT SESSION PARAMETERS
	$params = session_get_cookie_params();

	// DELETE THE ACTUAL COOKIE
	setcookie(session_name(),
		'', time() - 42000,
		$params["path"],
		$params["domain"],
		$params["secure"],
		$params["httponly"]);

	// DESTROY THE SESSION
	session_destroy();
	header('location: ../index.php');
