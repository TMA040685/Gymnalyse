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
        if (isset( $_SESSION['username'], $_SESSION['login_string'])) {
                $log = $_SESSION['login_string'];
                $una = $_SESSION['username'];

                // GET THE USER AGENT
                $user_browser = $_SERVER['HTTP_USER_AGENT'];

                $prep_stmt = "SELECT level FROM GSL_Members WHERE username = ?";
		$inits = $mysqli->stmt_init();
		$stmt = $mysqli->prepare($prep_stmt);
		if ( $stmt ) {
			$stmt->bind_param("s",$una);
			$stmt->execute();
			$stmt->bind_result($level);
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
	</head>
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
					<?php if($logged == "ind") : ?>
					<div class="col-md-7 col-md-push-3">
						<h2 class="featurette-heading"><span class="text-muted">Gymnalyse</span><br/>  Sp&oslash;rgeskema del 4/7.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> <?php echo date('d.m.Y'); ?><br/>
							<span class="text-muted">Af: </span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead"> 
							P&aring; de n&aelig;ste sider kommer der 22 udsagn som du skal vurderer 
							p&aring; en skala fra 1 til 10, hvor 1 er helt uenig og 10 er helt enig.
						</p>

						<style type="text/css">
							#Q1Q5 .btn-group .form-control-feedback {
								top: 0;
								right: -30px;
							}
						</style>
						<form id="Q1Q5"  
							class="form-horizontal" 
							action="questions5.php" 
							name="Q1Q5" 
							method="post" 
							onkeydown = "if (event.keyCode == 13) document.getElementById('next').click()" novalidate="novalidate">
						<div class="form-group">
							<input type="hidden" name="skole" value="<?php echo $skole; ?>">
							<input type="hidden" name="year" value="<?php echo $year; ?>">
							<input type="hidden" name="klasse" value="<?php echo $klasse; ?>">
							<input type="hidden" name="student" value="<?php echo $student; ?>">
						</div>
						<div class="form-group">
							<label class="control-label" for="Q1"><span class="label label-primary">1</span> Jeg arbejder bedst alene: <span class="text-danger">*</span></label>
							<div class="col-xs-9 col-xs-push-3"> 
								<div class="btn-group" data-toggle="buttons">
									<?php
										for($i=1;$i<=10;$i++) {
											echo '<label class="btn btn-default"><input type="radio" name="Q1" value="'.$i.'"/>'.$i.'</label>';
										}
									?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" for="Q2"><span class="label label-primary">2</span> Jeg synes, tavlenoterne er det vigtigste udbytte fra timerne: <span class="text-danger">*</span></label>
                                                        <div class="col-xs-9 col-xs-push-3">
								<div class="btn-group" data-toggle="buttons">
                                                        		<?php
                                                                		for($i=1;$i<=10;$i++) {
                                                                        		echo '<label class="btn btn-default"><input type="radio" name="Q2" value="'.$i.'"/>'.$i.'</label>';
                                                                		}	
                                                        		?>
								</div>
                                                        </div>
                                                </div>	
						<div class="form-group">
                                                        <label class="control-label" for="Q3"><span class="label label-primary">3</span> Det er vigtigt for mig, at undervisningen rammer mine personlige interesser: <span class="text-danger">*</span></label>
                                                        <div class="col-xs-9 col-xs-push-3">
								<div class="btn-group" data-toggle="buttons">
                                                        		<?php
                                                                		for($i=1;$i<=10;$i++) {
                                                                        		echo '<label class="btn btn-default"><input type="radio" name="Q3" value="'.$i.'"/>'.$i.'</label>';
                                                                		}
                                                        		?>
								</div>
                                                        </div>
                                                </div>
					
						<div class="form-group">
                                                        <label class="control-label" for="Q4"><span class="label label-primary">4</span> For mig er det faglige vigtigere end det sociale i gymnasiet: <span class="text-danger">*</span></label>
                                                        <div class="col-xs-9 col-xs-push-3">
								<div class="btn-group" data-toggle="buttons">
                                                        		<?php
                                                                		for($i=1;$i<=10;$i++) {
                                                                        		echo '<label class="btn btn-default"><input type="radio" name="Q4" value="'.$i.'"/>'.$i.'</label>';
                                                                		}
                                                        		?>
								</div>
                                                        </div>
                                                </div>


						<div class="form-group">
                                                        <label class="control-label" for="Q5"><span class="label label-primary">5</span> F&aelig;llestimer og aktiviteter p&aring; tv&aelig;rs af klasserne er meget vigtige for mig: <span class="text-danger">*</span></label>
                                                        <div class="col-xs-9 col-xs-push-3">
								<div class="btn-group" data-toggle="buttons">
                                                        		<?php
                                                                		for($i=1;$i<=10;$i++) {
                                                                        		echo '<label class="btn btn-default"><input type="radio" name="Q5" value="'.$i.'"/>'.$i.'</label>';
                                                                		}
                                                        		?>
								</div>
                                                        </div>
                                                </div>
						<div class="form-group">
							<div class="col-xs-9 col-xs-offset-3">
								<button class="btn btn-primary" id="next"  type="submit">N&aelig;ste</button>
							</div>
						</div>
					</form>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active" role="progressbar"
								aria-valuenow="57.2" aria-valuemin="0" aria-valuemax="100" style="width:57.2%">
								57,2 % 
							</div>
						</div>
					<script>
						$(document).ready(function() {
							$('#Q1Q5').formValidation( {
								framework: 'bootstrap',
								message: 'V&aelig;rdien er ugyldig.',
								icon: {
									valid: 'glyphicon glyphicon-ok',
									invalid: 'glyphicon glyphicon-remove',
									validating: 'glypbicon glyphicon-refresh'
								},
								excluded: ':disabled',
								fields: {
									Q1: {
										validators: {
											notEmpty: {
												message: 'V&aelig;lg et tal mellem 1 og 10.'
											}
										}
									},
									Q2: {
                                                                                validators: {
                                                                                        notEmpty: {
                                                                                                message: 'V&aelig;lg et tal mellem 1 og 10.'
                                                                                        }
                                                                                }
                                                                        },
									Q3: {
                                                                                validators: {
                                                                                        notEmpty: {
                                                                                                message: 'V&aelig;lg et tal mellem 1 og 10.'
                                                                                        }
                                                                                }
                                                                        },
									Q4: {
                                                                                validators: {
                                                                                        notEmpty: {
                                                                                                message: 'V&aelig;lg et tal mellem 1 og 10.'
                                                                                        }
                                                                                }
                                                                        },
									Q5: {
                                                                                validators: {
                                                                                        notEmpty: {
                                                                                                message: 'V&aelig;lg et tal mellem 1 og 10.'
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
