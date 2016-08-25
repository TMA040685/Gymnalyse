<?php
	include_once 'includes/db-connect.php';
	include_once 'includes/functions.php';
	include_once 'modules/getData.php';

	//sec_session_start();
	
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
					<div class="col-md-8 col-md-push-2">
						<h2 class="featurette-heading">Om <span class="text-muted">Gymnalyse</span>.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> 08.06.2016 </br>
							<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead">
							Gymnalyse startede som f&oslash;lge af et m&oslash;de i p&aelig;dagogik i praksis, 
							i daglig tale blot kaldet - PIP. PIP er et samarbejde mellem fire gymnaier som er 
							fordelt ud over det danske land. Gymnalyse er en platform hvor man kan analysere 
							klassers motivation.
						</p>
					</div>

<!-- NEWS DIVIDER -->			<hr class="featurette-divider">
				
					<div class="col-md-7 col-md-push-1">
						<h2 class="featurette-heading">Kontakt <span class="text-muted">Gymnalyse</span>.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> 08.06.2016 </br>
							<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
						</p>
						<p class="lead">
							Att: Thomas M. Amby<br>
							Marselisborg Gymnasium<br>
							Birketinget 9 <br>
							8000 Aarhus C <br>
							MRK: Gymnalyse
						</p>
					</div>
					<div class="col-md-5">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2223.012022181573!2d10.198210215467737!3d56.139604980658596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sda!2sdk!4v1465803392118" 
							width="400" 
							height="300" 
							frameborder="0" 
							style="border:0;margin-left:-50px;margin-top:80px;" allowfullscreen></iframe>
					</div>

					<hr class="featurette-divider">

					<div class="col-md-7 col-md-push-5">
						<h2 class="featurette-heading" id="Cookies">Om Cookies p&aring; <span class="text-muted">Gymnalyse</span>.</h2>
						<p class="small">
                                                        <span class="text-muted">Udgivet den: </span> 13.06.2016 </br>
                                                        <span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
                                                </p>
						<p class="lead">
							Her p&aring; siden anvendes cookies i forbindelse med login. Derfor er det vigtigt at du accepterer vores cookies.
							Vores cookies gemmer p&aring; f&oslash;lgende informationer: dit brugernavn, en levetid for cookien samt en sti og 
							det dom&aelig;gne du logger ind fra. Vores cookie er sat op til at blive renset n&aring;r du logger ud hvorfor det
							ogs&aring; er vigtigt at du logger ud hver gang du anvender systemet.
							
						</p>
					</div>
					<div class="col-md-5 col-md-pull-7">
						<img class="featurette-images img-responsive center-block" style="margin-top:20px;" src="images/cookie.jpg" alt="cookie photo">	
					</div>
				</div> <!-- ROW FEATURETTE -->
			</section> <!-- ENDING SECTION -->	
		</div> <!-- CONTAINER CLASS -->
	</body>
</html>
