<?php
	include_once 'includes/db-connect.php';
	include_once 'includes/functions.php';
	include_once 'modules/getData.php';

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
			$stmt->close();
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
					<?php if ($logged == "ind") :?>
						<div class="col-md-7 col-md-push-5">
							<h2 class=featurette-heading">Velkommen <span class="text-muted"><?php echo $una; ?></span>.</h2>
							<p class="small">
                                                        	<span class="text-muted">Udgivet den:</span> <?php echo date("d.m.Y"); ?></br>
                                                        	<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
                                                	</p>
							<div class="alert alert-success">
								<strong> Succes! </strong> Du er nu logget ind og du har rettigheder som svarende til <em><?php echo $level; ?></em>
							</div>
						</div>
						<div class="col-md-5 col-md-pull-7">
							<img class="featurette-images img-responsive center-block" src="images/login-Success.jpg" alt="Login Success">
						</div>
						<?php
							if ($level == 'admin') {
								include_once 'modules/admn-cl.php';
								
							}
							if ($level == 'admin' || $level == 'teacher') {
								include_once 'modules/teac-cl.php';
							}
						?>
									
						<div class="col-md-12">
						<hr class="featurette-divider">
						</div>

						<div class="col-md-7">
							<h2 class="featurette-heading"><span class="text-muted">Gymnalyse</span> er nu i luften.</h2>
							<p class="small">
                                                                <span class="text-muted">Udgivet den:</span> <?php echo date("d.m.Y"); ?></br>
                                                                <span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
                                                        </p>
							<p class="lead">
								S&aring; er Gymnalyse oppe at k&oslash;re. Vi har nu f&aring;et lavet et lille 
							site med et loginsystem som virker, tilsvarende har vi f&aring;et lavet et data system 
							som kan lagre det data som sendes til systemet. Dermed er vi nu klar til at udbygge 
							medlemsomr&aring;det.
						</div>
						<div class="col-md-5">
							<img class="featurette-images img-responsive center-block" src="images/online.jpg" alt="Gymnalyse Now Online">
						</div>						

						<div class="col-md-12">
						<hr class="featurette-divider">
						</div>
						<div class="col-md-6 col-md-push-6">
							<h2 class="featurette-heading">Grafisk test p&aring; <span class="text-muted">Gymnalyse</span>.</h2>
							<p class="small">
                                                                <span class="text-muted">Udgivet den:</span> <?php echo date("d.m.Y"); ?></br>
                                                                <span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
                                                        </p>
							<p class="lead">
								Denne figur viser et eksempel på hvordan en klasse fordelig. Dataene til figuren til venstre herfor
                                        		er 30 tilf&aelig;ldige punkter. Figuren viser hvorledes en simuleret klasse vil fordele sig i modellen
                                        		som Gymnalyse er baseret p&aring;. Den grafiske model p&aring; Gymnalyse er udarbejdet med udgangspunkt.
							i bogen "<span class="text-primary">Unges motivation og l&aelig;ring</span>", og figuren dannes p&aring; baggrund 
							af elev besv&aelig;relser
							</p>
						</div>
						<div class="col-md-5 col-md-pull-6">
							<div id="chart_div" style="width:90; height: 400px; margin-right:1%; margin-top:40px;"></div>
							<!--<button type="button" class="btn btn-primary" id="bz" name="bz">zoom</button>-->
						</div>
					<?php else :?>
						<!-- ILLIGAL ACCESS TO THE PAGE -->
						<div class="col-md-7">
						<h2 class0"featurette-heading"> Der er sket en <span class="text-muted">fejl</span>.</h2>
							<p class="small">
								<span class="text-muted">Udgivet den: </span> <?php echo date("d.m.Y"); ?><br/>
								<span class="text-muted">Af: </span> <span class="text-primary">Gymnalyse</span>
							</p>
							<div class="alert alert-danger">
								<strong>Advarsel !</strong> Du er ikke logget ind og har derfor ikke adgang til denne side. Pr&oslash;v at logge ind igen.
							</div>
						</div>
						<div class="col-md-5">
							<img class="featurette-images img-responsive center-block" src="images/Error-Proofing.jpg" alt="Error msg">

						</div>
					<?php endif; ?>
				</div><!-- ROW FEATURETTE END -->
			</section> <!-- SECTION END -->
		</div> <!-- CONTAINER END -->
	</body>
</html>
