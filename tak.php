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

                $prep_stmt = "SELECT `level` FROM `GSL_Members` WHERE `username` = ?";
		$inits = $mysqli->stmt_init();
		$stmt = $mysqli->prepare($prep_stmt);
		if ( $stmt ) {
			$stmt->bind_param("s", $una);
			$stmt->execute();
			$stmt->bind_result($level);
			$stmt->fetch();
                }
	}

        // RESTORE PASSED X AND Y FOR DETERMINATION OF THE MOTIVATION TYPE
        $x = $_GET['x'];
        $y = $_GET['y'];

	// CREATE JSON FROM X AND Y.
	//$obj->label="Din Motivation";
	$json =   array(array($x,$y));
	//$json = json_encode($obj, JSON_NUMERIC_CHECK);

        // 1. KVADRANT I FIGUREN
        $str1 = "Du vil gerne arbejde i grupper, men det er ikke afg&oslash;rende for dig. Du l&aelig;rer bedst, n&aring;r I fungerer godt sammen i klassen.<br> Ind i mellem kan det motivere dig at f&aring; karakterer, men du beh&oslash;ver ikke n&oslash;dvendigvis at have et klart m&aring;l for det du l&aelig;rer eller for din uddannelse.";

        $str2 = "Du vil gerne arbejde i grupper, men det er ikke afg&oslash;rende for dig. Du l&aelig;rer bedst, n&aring;r I fungerer godt sammen i klassen.<br> Det motiverer dig at f&aring; karakterer og at have et klart m&aring;l for det, du l&aelig;rer og for din uddannelse generelt.";

        $str3 = "Det er vigtigt for dig at arbejde sammen med andre og du har en opfattelse af, at n&aring;r klassen l&aelig;rer, l&aelig;rer du ogs&aring;.<br>Ind i mellem kan det motivere dig at f&aring; karakterer, men du beh&oslash;ver ikke n&oslash;dvendigvis at have et klart m&aring;l for det du l&aelig;rer eller for din uddannelse.";

        $str4 = "Det er vigtigt for dig at arbejde sammen med andre og du har en opfattelse af, at n&aring;r klassen l&aelig;rer, l&aelig;rer du ogs&aring;.<br>Det motiverer dig at f&aring; karakterer og at have et klart m&aring;l for det, du l&aelig;rer og for din uddannelse generelt.";

	// 2. KVADRANT I FIGUREN
        $str5 = "Du arbejder oftest bedst alene og bliver for det meste motiveret, n&aring;r undervisningen rammer dine personlige interesser.<br>Ind i mellem kan det motivere dig at f&aring; karakterer, men du beh&oslash;ver ikke n&oslash;dvendigvis at have et klart m&aring;l for det du l&aelig;rer eller for din uddannelse.";

        $str6 = "Du arbejder oftest bedst alene og bliver for det meste motiveret, n&aring;r undervisningen rammer dine personlige interesser.<br>Det motiverer dig at f&aring; karakterer og at have et klart m&aring;l for det, du l&aelig;rer og for din uddannelse generelt.";

        $str7 = "Du vil allerhelst arbejde alene og for din egen l&aelig;rings skyld.<br>Ind i mellem kan det motivere dig at f&aring; karakterer, men du beh&oslash;ver ikke n&oslash;dvendigvis at have et klart m&aring;l for du l&aelig;rer eller for din uddannelse.";

        $str8 = "Du vil allerhelst arbejde alene og for din egen l&aelig;rings skyld<br>Det motiverer dig at f&aring; karakterer og at have et klart m&aring;l for det, du l&aelig;rer og for din uddannelse generelt.";

        // 3. KVADRANT I FIGUREN
        $str9 = "Du arbejder oftest bedst alene og bliver for det meste motiveret, n&aring;r undervisningen rammer dine personlige interesser.<br>Du beh&oslash;ver ikke at f&aring; en karakter for det, du laver, men kan med emner der interesser dig godt lidt at g&aring; i dybden med stoffet";

        $str10 = "Du arbejder oftest bedst alene og bliver for det meste motiveret, n&aring;r undervisningen rammer dine personlige interesser.<br>Du kan godt lide at g&aring; i dybden med stoffet ogs&aring; selvom du ikke ved, hvad det konkret skal bruges til. Du g&aring;r ikke s&aelig;rligt meget op i karakterer.";

        $str11 = "Du vil allerhelst arbejde alene og for din egen l&aelig;rings skyld.<br>Du beh&oslash;ver ikke at f&aring; en karakter for det du laver, men kan med emner der interesserer dig godt lide at g&aring; i dybden med stoffet.";

        $str12 = "Du vil allerhelst arbejde alene og for din egen l&aelig;rings skyld.<br>Du kan godt lide at g&aring; i dybden med stoffet ogs&aring; selvom du ikke ved, hvad det konkret skal bruges til.Du g&aring;r ikke særlig meget op i karakteerr.";

        // 4. KVADRANT I FIGUREN
        $str13 = "Du vil gerne arbejde i grupper, men det er ikke altafg&oslash;rende for dig. Du l&aelig;rer bedst, n&aring;r I fungerer godt sammen i klassen.<br>Du beh&oslash;ver ikke at f&aring; en karakter for det, du laver, men kan med emner der interesser dig godt lidt at g&aring; i dybden med stoffet.";

        $str14 = "Du vil gerne arbejde i grupper, men det er ikke afg&oslash;rende for dig. Du l&aelig;rer bedst, n&aring;r I fungerer godt sammen i klassen.<br>Du kan godt lide at g&aring; i dybden med stoffet ogs&aring; selvom du ikke ved, hvad det konkret skal bruges til. Du g&aring;r ikke s&aelig;rligt meget op i karakterer.";

        $str15 = "Det er vigtigt for dig at arbejde sammen med andre og du har en opfattelse af, at n&aring;r klassen l&aelig;rer, l&aelig;rer du og/aelig;.<br>Du beh&oslash;ver ikke at f&oslash; en karakter for det, du laver, men kan med emner der interesser dig godt lidt at g&aring; i dybden med stoffet.";

        $str16 = "Det er vigtigt for dig at arbejde sammen med andre og du har en opfattelse af, at n&aring;r klassen l&aelig;rer, l&aelig;rer du ogs&aring;.<br>Du kan godt lide at g&aring; i dybden med stoffet ogs&aring; selvom du ikke ved, hvad det konkret skal bruges til. Du g&aring;r ikke s&aelig;rligt meget op i karakterer.";
?>
<!doctype html>
<html>
        <head>
        	<?php include "includes/overhead.php"; ?>
		
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
					<?php if($logged == "ind") :?>
					<div class="col-md-8 col-md-push-2">
                				<h2 class="featurette-heading"> Tak for din besvarelse af <span class="text-muted">Gymnalyse</span>  sp&oslash;rgeskemaet.</h2>
						<p class="small">
							<span class="text-muted">Udgivet den: </span> <?php echo date('d.m.Y');?></br>
							<span class="text-muted">Af: </span><span class="text-primary">Gymnalyse</span>
						</p>
                				<p class="lead">
							Din motivation er nu m&aring;lt og gemt til videre brug. Herunder kan du l&aelig;se lidt om din motivations profil, og se 
							en grafisk repr&aelig;sentation af hvordan du placeres i modellen.
                				</p> 
					</div>
			<div class="col-md-12">
			<hr class="featurette-divider">
			</div>
                <?php
		echo '<div class="col-md-7">';
                echo '<h2 class="featurette-heading">Din <span class="text-muted">motivation</span> kan beskrives som</h2>';
                echo '<p class="small">';
                echo 	'<span class="text-muted">Udgivet den: </span>'. date('d.m.Y') .'</br>';
                echo 	'<span class="text-muted">Af: </span><span class="text-primary">Gymnalyse</span>';
                echo '</p>';
		if ( $x >= 0 && $x <= 5) {
                        if ( $y >= 0 && $y <=5 ) {
                                echo '<p class="lead">'.$str1.'</p>';
                        } elseif ( $y > 5 && $y <= 10 ) {
                                echo '<p class="lead">'.$str2.'</p>';
                        } elseif ($y >=-5 && $y < 0) {
                                echo '<p class="lead">'.$str13.'</p>';
                        } elseif ($y >=-10 && $y < -5) {
                                echo '<p class="lead">'.$str14.'</p>';
                        }
                } elseif ( $x > 5 && $x <=10 ) {
                        if ($y >= 0 && $y <= 5 ) {
                                echo '<p class="lead">'.$str3.'</p>';
                        } elseif ($y > 5 && $y <= 10) {
                                echo '<p class="lead">'.$str4.'</p>';
                        } elseif ($y >=-5 && $y < 0) {
                                echo '<p class="lead">'.$str15.'</p>';
                        } elseif ($y >=-10 && $y < -5) {
                                echo '<p class="lead">'.$str16.'</p>';
                        }
                } elseif ( $x >=-5 && $x < 0) {
			if ($y >= 0 && $y <= 5) {
                                echo '<p class="lead">'.$str5.'</p>';
                        } elseif ($y > 5 && $y <= 10) {
                                echo '<p class="lead">'.$str6.'</p>';
                        } elseif ($y >=-5 && $y < 0) {
                                echo '<p class="lead">'.$str9.'</p>';
                        } elseif ($y >=-10 && $y <-5) {
                                echo '<p class="lead">'.$str10.'</p>';
                        }
                } elseif ( $x >= -10 && $x <-5 ) {
                        if ($y >=0 && $y <= 5 ) {
                                echo '<p class="lead">'.$str7.'</p>';
                        } elseif ($y >5 && $y <=10) {
                                echo '<p class="lead">'.$str8.'</p>';
                        } elseif ($y >=-5 && $y < 0) {
                                echo '<p class="lead">'.$str11.'</p>';
                        } elseif ($y >=-10 && $y <-5) {
                                echo '<p class="lead">'.$str12.'</p>';
                        }
                }
		echo '</div>';
		echo '<div class="col-md-5">';
		echo '<div id="chart_div" style="width:90; height: 400px; margin-right:1%; margin-top:40px;"></div>';
                echo '</div>';
		?>
                <?php else : ?>
                <h1>Der er sket en fejl...</h1>
                <p><span class="error">Du er ikke logget ind og kan derfor ikke se siden.</span></p>
                <?php endif;?>
				</div> <!-- ROW FEATURETTE -->
                	</section>
        	</div> <!-- CONTAINER -->
	</body>
</html>
