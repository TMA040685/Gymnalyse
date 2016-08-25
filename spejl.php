<?php
	include_once 'includes/db-connect.php';
	include_once 'includes/functions.php';

	sec_session_start();
	
	if (login_check($mysqli) == true) {
		$logged = 'ind';
	} else {
		$logged = 'ud';
	}

	// FUNKTIONS CHEKHER
	if (isset( $_SESSION['username'], $_SESSION['login_string'])) {
                $log = $_SESSION['login_string'];
                $una = $_SESSION['username'];

                // GET THE USER AGENT
                $user_browser = $_SERVER['HTTP_USER_AGENT'];

                $prep_stmt = "SELECT level, school FROM GSL_Members WHERE username = ?";
                $inits = $mysqli->stmt_init();
                $stmt = $mysqli->prepare($prep_stmt);
                if ( $stmt ) {
                        $stmt->bind_param("s", $una);
                        $stmt->execute();
                        $stmt->bind_result($level,$school);
                        $stmt->fetch();
                }
        }

	session_start();
?>
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
                                <?php include_once './includes/menu.php'; ?>
                        </nav>
			<section>
                                <div class="row featurette">
                                        <?php if( $logged == "ind") : ?>
                                        <div class="col-md-7 col-md-push-3">
                                                <h2 class="featurette-heading"><span class="text-muted">Gymnalyse</span><br/>  Sp&oslash;rgeskema del 1/7.</h2>
                                                <p class="small">
                                                        <span class="text-muted">Udgivet den: </span> <?php echo date('d.m.Y'); ?><br/>
                                                        <span class="text-muted">Af: </span> <span class="text-primary">Gymnalyse</span>
                                                </p>
                                                <p class="lead">
                                                        V&aelig;lg hvilken skole du g&aring;r p&aring;.
                                                </p>

                                                <style type="text/css">
                                                        #School .selectContainer .form-control-feedback {
                                                                right: -15px;
                                                        }
                                                </style>
                                                <form id="spejl"  
                                                        class="form-horizontal" 
                                                        action="klspejl.php" 
                                                        name="spejl" 
                                                        method="post" 
                                                        onkeydown="if (event.keyCode == 13) document.getElementById('next').click()" novalidate="novalidate">
                                                <div class="form-group">
                                                        <label class="control-label col-xs-3" for="skole">V&aelig;lg din skole: <span class="text-danger">*</span></label>
                                                        <div class="col-xs-5 selectContainer">
                                                        <select class="form-control"  name="skole" id="skole" required>
                                                                <option value=""   <?php if ($school == 'OTH'){ echo "selected";} ?>> - V&aelig;lg en skole - </option>
                                                                <option value="BG" <?php if ($school == 'BG') { echo "selected";} ?>>Bornholms Gymnasium</option>
                                                                <option value="FG" <?php if ($school == 'FG') { echo "selected";} ?>>Frederiksberg Gymnasium</option>
                                                                <option value="OK" <?php if ($school == 'OK') { echo "selected";} ?>>Odense Katedralskole</option>
                                                                <option value="MG" <?php if ($school == "MG") { echo "selected";} ?>>Marselisborg Gymnasium</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                        <div class="form-group">
								<div class="col-xs-9 col-xs-offset-3">
                                                                <button class="btn btn-primary" type="submit" id="next" >N&aelig;ste</button>
                                                        </div>
                                                </div>
					</form>
                                                </div>
                                        <script type="text/javascript">
                                                $(document).ready(function() {
                                                        $('#School').formValidation( {
                                                                framework: 'bootstrap',
                                                                message: 'V&aelig;rdien er ugyldig.',
                                                                icon: {
                                                                        valid: 'glyphicon glyphicon-ok',
                                                                        invalid: 'glyphicon glyphicon-remove',
                                                                        validating: 'glyphicon glyphicon-refresh'
                                                                },
                                                                fields: {
                                                                        skole: {
                                                                                validators: {
                                                                                        notEmpty: {
                                                                                                message: 'Du skal angive din skole.'                                                                            }
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
