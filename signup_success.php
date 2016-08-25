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
					<div class="col-md-7 col-md-push-5">
						<h2 class=featurette-heading"><span class="text-muted">registring</span> gennemf&oslash;rt.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den:</span> <?php echo date("d.m.Y"); ?></br>
							<span class0"text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
						</p>
						<div class="alert alert-success">
							<strong>Success!</strong> Du er nu registreret, og du kan kan nu logge ind p&aring; login siden. Find den i menuen eller klik <a href="https://www.thomasamby.dk/Gymnalyse/login.php">her</a>.
						</div>
					</div>
					<div class="col-md-5 col-md-pull-7">
						<img class="featurette-image img-responce center-block" style="width:100%" src="images/breakthrough.jpg" alt="success">
					</div>
				</div><!-- ROW FEATURETTE END -->
			</section> <!-- SECTION END -->
		</div> <!-- CONTAINER END -->
	</body>
</html>
