<?php
	$json = array();
	$prep_stmt = "SELECT svarx, svary FROM GSL_MEM_Data WHERE aargang = 2014";
	$stmt = $mysqli->query($prep_stmt);
	while ( $row = $stmt->fetch_row() ) {
		$json[] = $row;
	}
	//echo json_encode($json, JSON_NUMERIC_CHECK);
?>
