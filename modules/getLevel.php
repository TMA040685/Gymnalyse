<?php
// CHECK THE USERS LEVEL :::::
if ( isset ( $_SESSION['username'], $_SESSION['login_string'])) {
	$una = $_SESSION['username'];
	$log = $_SESSION['login_string'];

	$prep_stmt = "SELECT level, school FROM GSL_Members WHERE username = ?";
	$inits = $mysqli->stmt_init();
	$stmt = $mysqli->prepare($prep_stmt);
	if ( $stmt ) {
		$stmt->bind_param("s", $una);
		$stmt->execute();
		$stmt->bind_result($level, $school);
		$stmt->fetch();
		$stmt->close();
	}
}
