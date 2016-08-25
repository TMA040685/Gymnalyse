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
					<div class="col-md-8 col-md-push-2">
						<h2 class="featurette-heading">Cookie policy p&aring; <span class="text-muted">Gymnalyse</span>.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> 08.06.2016 </br>
							<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead">
							<span class="text-primary">What Are Cookies</span><br><br>
							As is common practice with almost all professional websites this site uses cookies, 
							which are tiny files that are downloaded to your computer, to improve your experience. 
							This page describes what information they gather, how we use it and why we sometimes 
							need to store these cookies. We will also share how you can prevent these cookies from 
							being stored however this may downgrade or 'break' certain elements of the sites 
							functionality.<br>
							<br>
							For more general information on cookies see the Wikipedia article on HTTP Cookies...<br>
							<br>
							<span class="text-primary">How We Use Cookies</span><br><br>
							We use cookies for a variety of reasons detailed below. Unfortunately in most cases 
							there are no industry standard options for disabling cookies without completely disabling 
							the functionality and features they add to this site. It is recommended that you leave 
							on all cookies if you are not sure whether you need them or not in case they are used to 
							provide a service that you use.<br>
							<br>
							<span class="text-primary">Disabling Cookies</span><br><br>
							You can prevent the setting of cookies by adjusting the settings on your browser (see your 
							browser Help for how to do this). Be aware that disabling cookies will affect the 
							functionality of this and many other websites that you visit. Disabling cookies will usually 
							result in also disabling certain functionality and features of the this site. Therefore 
							it is recommended that you do not disable cookies.<br>
							<br>
							<span class="text-primary">The Cookies We Set</span><br><br>
							We use cookies when you are logged in so that we can remember this fact. This prevents you 
							from having to log in every single time you visit a new page. These cookies are typically 
							removed or cleared when you log out to ensure that you can only access restricted features 
							and areas when logged in.<br>
							<br>
							When you submit data to through a form such as those found on contact pages or comment 
							forms cookies may be set to remember your user details for future correspondence.
							<br><br>
							<span class="text-primary">Third Party Cookies</span><br><br>
							In some special cases we also use cookies provided by trusted third parties. The following 
							section details which third party cookies you might encounter through this site.
							<br>
							This site uses Google Analytics which is one of the most widespread and trusted analytics 
							solution on the web for helping us to understand how you use the site and ways that we can 
							improve your experience. These cookies may track things such as how long you spend on the 
							site and the pages that you visit so we can continue to produce engaging content.
							<br>
							For more information on Google Analytics cookies, see the official Google Analytics page.
							<br><br>
							<span class="text-primary">More Information</span><br><br>
							Hopefully that has clarified things for you and as was previously mentioned if there is 
							something that you aren't sure whether you need or not it's usually safer to leave cookies 
							enabled in case it does interact with one of the features you use on our site. However if 
							you are still looking for more information then you can contact us through one of our 
							preferred contact methods.
							<br><br>
							<span class="text-primary">Email:</span> TA-at-mgym.dk
						</p>
					</div>
				</div>
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
