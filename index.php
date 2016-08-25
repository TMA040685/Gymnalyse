<?php
	include_once 'includes/db-connect.php';
	include_once 'includes/functions.php';
	include_once 'modules/getData.php';

	//sec_session_start();

/*	if (login_check($mysqli) == true) {
		$logged = 'ind';
	} else {
		$logged = 'ud';
	}

	// FETCH USER INFO FUNCTION
	if ( isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
		$uid = $_SESSION['user_id'];
		$log = $_SESSION['login_string'];
		$una = $_SESSION['username'];

		$prep_stmt = "SELECT level FROM GSL_Members WHERE username = ?";
		$inits = $mysqli->stmt_init();
		$stmt = $mysqli->prepare($prep_stmt);
		if ( $stmt ) {
			$stmt->bind_param("s", $una);
			$stmt->execute();
			$stmt->bind_result($level);
			$stmt->fetch();
		}
	}*/
	
?>
<!doctype html>
<html>
        <head>
        	<?php include "./includes/overhead.php" ?>
	</head>
	<body>
                <div class="container">
			<div class="heading">
				<!-- THIS IS THE PAGE HEADER -->
			</div>
			<nav class="navbar navbar-inverse">
				<?php include_once 'includes/menu.php'; ?>
			</nav>	<!-- NAV BAR MENU - EDIT INCLUDES/MENU.PHP -->
			<section>
				<div class="row featurette">
					<?php
						if ( isset ($_GET['error'])) {
							echo '<div class="alert alert-warning">';
							echo '<strong>Giv Agt!</strong> Fejl ved login...';
							echo '</div>';
						}
					?>
					<div class="col-md-7 col-md-push-5">
						<h2 class="featurette-heading"><span class="text-muted">Gymnalyse</span> er i luften.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> 08.06.2016 </br>
							<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead">
							S&aring; er Gymnalyse oppe at k&oslash;re. Vi har nu f&aring;et lavet et lille 
							site med et loginsystem som virker, tilsvarende har vi f&aring;et lavet et data system 
							som kan lagre det data som sendes til systemet. Dermed er vi nu klar til at udbygge 
							medlemsomr&aring;det.
						</p>
					</div>
					<div class="col-md-5 col-md-pull-7">
						<img class="featurette-images img-responsive center-block" src="images/online.jpg" alt="Online photo">
					</div>

<!-- NEWS DIVIDER -->			<hr class="featurette-divider">
				
					<div class="col-md-7">
						<h2 class="featurette-heading">Grafisk test p&aring; <span class="text-muted">Gymnalyse</span>.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> 08.06.2016 </br>
							<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead">
							 Denne figur viser et eksempel på hvordan en klasse fordelig. Dataene til figuren til venstre herfor
                                        		er 30 tilf&aelig;ldige punkter. Figuren viser hvorledes en simuleret klasse vil fordele sig i modellen
                                        		som Gymnalyse er baseret p&aring;. Den grafiske model p&aring; Gymnalyse er udarbejdet med udgangspunkt.
							i bogen "<span class="text-primary">Unges motivation og l&aelig;ring</span>", og figuren dannes p&aring; baggrund 
							af elevbesvarelser
                                        </p>
						</p>
					</div>
					<div class="col-md-5">
							<div id="chart_div" style="width: 90%; height: 400px; margin-left: 1%; margin-bottom:40px;"></div>
					</div>			
				</div> <!-- ROW FEATURETTE -->
			</section> <!-- ENDING SECTION -->	
		</div> <!-- CONTAINER CLASS -->

		<!--Start Cookie Script--> 
			<script type="text/javascript" 
				charset="UTF-8" 
				src="http://chs03.cookie-script.com/s/686d1f7ff1c4f631dab8727bd385c75f.js">
			</script> 
		<!--End Cookie Script-->
	</body>
</html>
