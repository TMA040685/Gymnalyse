<?php
	include_once './includes/db-connect.php';
	include_once './includes/functions.php';
	
	sec_session_start();
	
	if (login_check($mysqli) == true) {
		$logged = 'ind';			
	} else {
		$logged = 'ud';
	}
	 // Funkrions tjekker
        if (isset($_SESSION['username'], $_SESSION['login_string'])) {
                $log = $_SESSION['login_string'];
                $una = $_SESSION['username'];

                // GET THE USER AGENT
                $user_browser = $_SERVER['HTTP_USER_AGENT'];

                $prep_stmt = "SELECT level,school FROM GSL_Members WHERE username = ?";
		$inits = $mysqli->stmt_init();
		$stmt = $mysqli->prepare($prep_stmt);
		if ( $stmt ) {
			$stmt->bind_param("s",$una);
			$stmt->execute();
			$stmt->bind_result($level,$school);
			$stmt->fetch();
			$stmt->close();
		}
	}
	// CHECK THE VALUES OF FORM 1 -- IF ANY BANK SPACES ARE FOUND REDIRECT TO PAGE 1 
	if (isset($_POST['skole'])) {
		if(empty($_POST['skole'])) {
			// SET ERROR MESSAGE
			$_SESSION['error'] = "Du har ikke angivet din skole..";
			header("Location: questions1.php"); // redirect to questions1.php
		} else {
			if(!preg_match("/^[A-Z]{2}$/", $_POST['skole'])) {
				$_SESSION['error'] = "Du har agivet noget forkert";
				header ("Location: questions1.php");
			}
		}
	}
	foreach ($_POST as $key => $value) {
		$_SESSION['post'][$key] = $value;
	}
	extract($_SESSION['post']);

	session_start();
?>
<!doctype html>
<html>
 	<head>
	       <?php include 'includes/overhead.php'; ?>
	<head>
	<body>
		<div class="container">
			<div class="header">
				<!-- PAGE HEADER -->
			</div>
			<nav class="navbar navbar-inverse">
                        	<?php include("./includes/menu.php"); ?>
			</nav>
			<section>
				<div class="row featurette">
					<?php if(login_check($mysqli) == true) : ?>
					<div class="col-md-7 col-md-push-3">
						<h2 class="featurette-heading"><span class="text-muted">Gymnalyse</span><br/>  Sp&oslash;rgeskema del 3/7.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> <?php echo date('d.m.Y'); ?><br/>
							<span class="text-muted">Af: </span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead"> 
							Du skal nu v&aelig;lge din studieretning og dit elevnummer.
						</p>

						<style type="text/css">
							#StudKlas .btn-group .form-control-feedback {
								top: 0;
								right: -30px;
							}
							#StudKlas .selectContainer .form-control-feedback {
								right: -15px;
							}
						</style>
						<form id="StudKlas"  
							class="form-horizontal" 
							action="questions4.php" 
							name="StudKlas" 
							method="post" 
							onkeydown = "if (event.keyCode == 13) document.getElementById('next').click()" novalidate="novalidate">
						<div class="form-group">
							<input type="hidden" name="skole" value="<?php echo $school; ?>">
							<input type="hidden" name="year" value="<?php echo $year; ?>">
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="klasse">V&aelig;lg din studieretning: <span class="text-danger">*</span></label>
							<div class="col-xs-9 col-xs-push-2">
							<div class="btn-group" data-toggle="buttons">
							<?php
								$prep_stmt = 'SELECT DISTINCT `klasse` FROM `GSL_Class` WHERE `skole`= "'.$skole.'" && SUBSTRING(year,3,2) = "'.$year.'" ORDER BY `klasse';
								$result = $mysqli->query($prep_stmt);
								if ($result->num_rows >= "1") {
									while($row=$result->fetch_assoc()) {
										echo '<label class="btn btn-default"><input type="radio" name="klasse" value="'.$row["klasse"].'">'.$row["klasse"].'</label>';
									}
								}
							?>
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="student">V&aelig;lg dit elevnummer: <span class="text-danger">*</span></label>
							<div class="col-xs-9 col-xs-push-2">
							<div class="selectContainer">
								<select class="form-control" name="student" id="student" required>
									<option value="" selected> - V&aelig;lg elev nummer - </option>
									<?php 
										for ($i=1;$i <= 35; $i++) {
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									?>
								</select>
							</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-9 col-xs-offset-3">
								<button class="btn btn-primary" id="next" type="submit">N&aelig;ste</button>
							</div>
						</div>
					</form>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active" role="progressbar"
								aria-valuenow="42.9" aria-valuemin="0" aria-valuemax="100" style="width:42.9%">
								42,9 % 
							</div>
						</div>
					<script>
						$(document).ready(function() {
							$('#StudKlas').formValidation( {
								framework: 'bootstrap',
								message: 'V&aelig;rdien er ugyldig.',
								icon: {
									valid: 'glyphicon glyphicon-ok',
									invalid: 'glyphicon glyphicon-remove',
									validating: 'glypbicon glyphicon-refresh'
								},
								excluded: ':disabled',
								fields: {
									klasse: {
										validators: {
											notEmpty: {
												message: 'Angiv din &aring;rgang.'
											}
										}
									},
									student: {
										validators: {
											notEmpty: {
												message: 'V&aelig;lg dit elevnummer.'
											},
											choise: {
												min: 1,
												max: 1,
												message: 'Du skal v&aelig;lge et nummer.'
											}
										}
									}		
								}
							});
						});
					</script>
				<?php else :?>
				<div class="col-md-7">
					<h2 class="featurette-heading">Der er sket en fejl mvh <span class="text-muted">Gymnalyse</span>.</h2>
					<p class="small">
						<span class="text-muted">Udgivet den:</span> <?php echo date("d. F Y"); ?><br/>
						<span class0"text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
					</p>
					<p class="lead">
						<span class="text-danger">Du er ikke logget ind og har derfor ikke adgang til siden.</span>
					</p>
				</div>
				<div class="col-md-5">
					<img class="featurette-images img-responsive center-block" src="images/Warning.jpg" alt="Error msg">
				</div>
				<?php endif;?>
			</div>
                </section>
                </div> <!-- containter -->
	</body>
</html>
