<?php
	include_once 'db-connect.php';
	include_once 'psl-config.php';
 
	$error_msg = "";
//	echo "OK";

	if (isset($_POST['username'], $_POST['email'], $_POST['skole'], $_POST['p'], $_POST['g-recaptcha-response'])) {
//	echo "<br>OK - IF ISSET";
		// VALIDATE THE RECAPTCHA
		$captcha = $_POST['g-recaptcha-response'];
		$secKeys = "6LcxrSATAAAAANLCpZjlWR6EaohDQaWjv4tBWBWg";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secKeys."&response=".$captcha."&remoteip=".$ip);
		$respKeys = json_decode($response,true);
		if ( intval($respKeys["success"] != 1)) {
//	echo "<br> RECAPTCHA - NOT OK">	
			header('Location: ./robot.php');

		} else {
//	echo "<br> OK - RECAPTCHA";
			// Sanitize and validate the data passed in
    			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        			// Not a valid email
        			$error_msg .= '<p class="error">The email address you entered is not valid</p>';
    			}
 		
			$school = filter_input(INPUT_POST, 'skole', FILTER_SANITIZE_STRING);
			$level = 'student';
//	echo '<br>Brugernavn: '.$username.' <br>Email: '.$email.' <br>Skole: '.$school.' <br>Rettigheder: '.$level;		
			$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    			if (strlen($password) != 128) {
        			// The hashed pwd should be 128 characters long.
        			// If it's not, something really odd has happened
        			$error_msg .= '<p class="error">Invalid password configuration.</p>';
  //  	echo "<br>PASSWORD - NOT OK";		
			}
//	echo "<br>PASSWORD - OK";
    			// Username validity and password validity have been checked client side.
    			// This should should be adequate as nobody gains any advantage from
    			// breaking these rules.
    			//
			$prep_stmt = "SELECT id FROM GSL_Members WHERE email = ? LIMIT 1";
			$inits = $mysqli->stmt_init();
    			$stmt = $mysqli->prepare($prep_stmt);
   			// check existing email  
			if ($stmt) {
        			$stmt->bind_param('s', $email);
        			$stmt->execute();
        			$stmt->store_result();
        			if ($stmt->num_rows == 1) {
            				// A user with this email address already exists
            				$error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        		$stmt->close();
       	 			}
    			} else {
        			$error_msg .= '<p class="error">Database error Line 39</p>';
                		$stmt->close();
    			}
    			// check existing username
    			$prep_stmt = "SELECT id FROM GSL_Members WHERE username = ? LIMIT 1";
    			$stmt = $mysqli->prepare($prep_stmt);
 
    			if ($stmt) {
        			$stmt->bind_param('s', $username);
        			$stmt->execute();
        			$stmt->store_result();
 
                		if ($stmt->num_rows == 1) {
                        		// A user with this username already exists
                       			$error_msg .= '<p class="error">A user with this username already exists</p>';
                        		$stmt->close();
                		}
        		} else {
                		$error_msg .= '<p class="error">Database error line 55</p>';
                		$stmt->close();
        		}
    		// TODO: 
    		// We'll also have to account for the situation where the user doesn't have
    		// rights to do registration, by checking what type of user is attempting to
    		// perform the operation.
 
    		if (empty($error_msg)) {
 
        		// Create hashed password using the password_hash function.
        		// This function salts it with a random salt and can be verified with
        		// the password_verify function.
        		$password = password_hash($password, PASSWORD_BCRYPT);
 
        		// Insert the new user into the database 
        		if ($insert_stmt = $mysqli->prepare("INSERT INTO GSL_Members (username, email,school,level, password) VALUES (?, ?, ?, ?, ?)")) {
            			$insert_stmt->bind_param('sssss', $username, $email,$school,$level, $password);
            			// Execute the prepared query.
            			if (! $insert_stmt->execute()) {
                			header('Location: ../error.php?err=Registration failure: INSERT');
            			}
        		}
        		header('Location: ./signup_success.php');
    		}
	}}
?>
