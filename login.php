<?php
	include_once 'includes/db-connect.php';
	include_once 'includes/functions.php';

	sec_session_start();
	
	if (login_check($mysqli) == true) {
		$logged = 'ind';
	} else {
		$logged = 'ud';
	}

	// CHECK THE USERS LEVEL ::::
        if (isset( $_SESSION['username'], $_SESSION['login_string'])) {
                $una = $_SESSION['username'];
                $log = $_SESSION['login_string'];

                $prep_stmt = "SELECT level, school FROM GSL_Members WHERE username = ?";
                $inits = $mysqli->stmt_init();
                $stmt=$mysqli->prepare($prep_stmt);
                if ( $stmt ) {
                        $stmt->bind_param("s", $una);
                        $stmt->execute();
                        $stmt->bind_result($level,$school);
                        $stmt->fetch();
                }
        }
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once 'includes/overhead.php'; ?>
	</head>
	<body>
		<div class="container">
			<div class="heading">
				<!-- PAGE HEADER -->
			</div>
			<nav class="navbar navbar-inverse">
				<?php include_once 'includes/menu.php'; ?>
			</nav>
			<section>
				<div class="row featurette">
					<?php
						if (isset($_GET['error'])) {
							echo '<div class="alert alert-warning">';
							echo '<strong>Giv agt!</strong>Fejl ved login...';
							echo '</div>';	
						}?>
					<div class="col-md-7 col-md-push-3">
						<h2 class="featurette-heading">Login p&aring; <span class="text-muted">Gymnalyse</span>.</h2>

						<form id="GymLog" name="GymLog"  
							method="post" class="form-horizontal" 
							action="./includes/process_login.php"  onkeydown = "if (event.keyCode == 13) document.getElementById('login').click()" 
							novalidate="novalidate">
							<div class="form-group">
								<label class="control-label col-xs-4"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
								<div class="col-xs-7">
									<input type="email" class="form-control" name="email" id="email"
										placeholder="Angiv din email adresse" size="30" required/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label"><span class="glyphicon glyphicon-lock"></span> Password:</label>
								<div class="col-xs-7">
									<input type="password" class="form-control" name="pwd" id="pwd"
										placeholder="Angiv dit password" size="30" required/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-10 col-xs-push-4">
									<input type="button" 
									       class="btn btn-primary" 
									       onclick="  formhash(this.form, 
											this.form.pwd);" 
									value="Login" id="login">
								</div>
							</div>
						</form>
						<script type="text/javascript">
							$(document).ready(function() {
								$('#GymLog').formValidation({
									framework: 'bootstrap',
									icon: {
										valid: 'glyphicon glyphicon-ok',
										invalid: 'glyphicon glyphicon-remove',
										validating: 'glyphicon glyphicon-refresh'
									},
									fields: {
										email: {
											validators: {
												notEmpty: {
													message: 'Angiv din email adresse.'
												},
												stringLength: {
													min: 6,
													max: 30,
													message: 'Email adressen skal v&aelig;re mellem 6 og 30 karakterer lang.'
												},
												regexp: {
													regexp: /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i,
													message: 'Den indtastede email er ikke gyldig.'
												}
											}
										},
										password: {
											validators: {
												notEmpty: {
													message: 'Angiv dit password.'
												},
												stringLength: {
													min: 6,
													max: 30,
													message: 'Dit password skal v&aelig;re mellem 6 og 30 karakterer langt.'
												},
												regexp: {
													regexp: /(?:[a-z].*[A-Z].*[0-9])|(?:[A-Z].*[0-9].*[a-z])|(?:[0-9].*[a-z].*[A-Z])/,
													message: 'Dit password skal indeholde mindst et almindeligt bogstav fra a til z, mindst et stort bogstav fra A til Z og mindst et tal mellem 0 og 9.'
												}
											}
										}
									}
									
								});
							});
						</script>
						<?php
							if ($logged == 'ind' ) {
								echo '<div class="alert alert-success">';
								echo '<strong>Success!</strong> Du er nu logget <strong>'.$logged.'</strong> som <strong>'.$una.'</strong>';
								echo '</div>';
							} else {
								echo '<div class="alert alert-warning">';
								echo '<strong>Advarsel!</strong> Du er pt. logget '.$logged.'. Hvis du ikke har et login, s&aring; g&aring; til registringen.';
							}
						?> 
					</div> <!-- COL-MD-7 COL-MD-PUSH-3 END -->
				</div> <!-- ROW FEATURETTE END -->
			</section>
		</div> <!-- CONTAINER END -->
	</body>
</html>
