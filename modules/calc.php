<?php
	include_once '../includes/db-connect.php';
	include_once '../includes/functions.php';
	
	sec_session_start();

	foreach ( $_POST as $key => $value) {
		$_SESSION['post'][$key] = $value;
	}
	extract( $_SESSION['post'] );

	if(isset($skole, $klasse, $year, $student, $Q1, $Q2,$Q3, $Q4,$Q5, $Q6,$Q7, $Q8,$Q9, $Q10, $Q11,
                                        $Q12, $Q13, $Q14, $Q15, $Q16, $Q17, $Q18, $Q19, $Q20, $Q21, $Q22)) {
	
		$sk = $skole;
		$kl = $klasse;
		$yr = $year;
		$st = $student;

		// GENERATE STUDENT AND CLASS ID //
		$KID = $sk.$yr.$kl;
		$SID = $KID.$st;

		// GET YEAR AND TIMESTAMP //
		$year2 = date('Y');
		$date = date('Y-m-d H:i:s');

		// SET THE SCALING PARAMETERS //
		$Nx = 5.4;
		$Ny = 4.5;

		// CALCULATE THE X-VALUE //
		$x = (-$Q1-$Q2-$Q3-$Q4+$Q5+$Q6+$Q7+$Q8+$Q9-$Q10-$Q11+$Q12)/$Nx;
	
		// CALCULATE THE Y-VALUE //
		$y = ($Q13+$Q14+$Q15-$Q16+$Q17+$Q18-$Q19-$Q20-$Q21-$Q22)/$Ny;
	
		// THE RAW DATA //
		$insert_stmt = "INSERT INTO GSL_RAW (sid,kid,sp1,sp2,sp3,sp4,sp5,sp6,sp7,sp8,sp9,sp10,sp11,sp12,sp13,sp14,sp15,sp16,sp17,sp18,sp19,sp20,sp21,sp22,year, tid) VALUES (
			'$SID','$KID','.$Q1.','.$Q2.','.$Q3.','.$Q4.','.$Q5.','.$Q6.','.$Q7.','.$Q8.','.$Q9.','.$Q10.','.$Q11.','.$Q12.'
			,'.$Q13.','.$Q14.','.$Q15.','.$Q16.','.$Q17.','.$Q18.','.$Q19.','.$Q20.','.$Q21.','.$Q22.','.$yr.',date('Y-m-d H:i:s'));";
		
		$insert_stmt .= "INSERT INTO GSL_Motivation (sid, kid, x, y, aar, tid) VALUES ( '$SID', '$KID', '$x', '$y', '$yr', date('Y-m-d H:i:s'))"; 
		$mysqli->multi_query($insert_stmt); 

		header("location: ../tak.php?x=$x&y=$y");
	} else {
		echo 'Invalid Request';
	}	
?>
