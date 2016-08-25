<?php
	include_once 'includes/db-connect.php';
	include_once 'includes/functions.php';
	
	sec_session_start();

	if ( login_check($mysqli) == true ) {
		$logged = 'ind';
	} else {
		$logged = 'ud';
	}

	include_once 'modules/getLevel.php';
?>
<!doctype html>
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
						<?php
							if ($school == "MG") {
								$skole = "Marselisborg Gymnasium";
							} elseif ( $school == "FG") {
								$skole = "Frederiksberg Gymnasium";
							} elseif ( $school == "BG") {
								$skole = "Bornholms Gymnasium";
							} elseif ( $school == "OK") {
								$skole = "Odense Katedralskole";
							};
						?>
						<div class="col-md-12">
							<h2 class="featurette-heading">Klasse administrations side for <span class="text-muted"><?php echo $skole; ?></span>.</h2>
							<p class="small">
								<span class="text-muted">Udgivet den:</span> <?php echo date("d.m.Y"); ?></br>
								<span class="text-muted">Af:</span> <span class="text-primary">Gymnalyse</span>
							</p>
							<p class="lead">
								P&aring; <?php echo $skole;?> har I pt. f&oslash;lgende studieretninger.</p><br>
								<?php $cyr = date("Y");?>

								<table class="table table-hover">
									<?php
										echo '<thead>';
										$prep_stmt = "SELECT DISTINCT year, SUBSTRING(year,3,2) FROM GSL_Class WHERE `skole`= '".$school."'";
										$result = $mysqli->query($prep_stmt);
										$nn = $result->num_rows;
										echo '<tr>';
										echo '<td>&Aring;rgang</td>';
										echo '<td colspan='.$nn.'>Registrerede klasser</td>';
										echo '</thead>';
										echo '<tbody>';
										if ( $result -> num_rows >= "1") {
											while( $row=$result->fetch_assoc() ) {
											$aar = $cyr - $row["year"]+1;
											if ($school == "MG") {
												if ( $aar <= "3") {
													echo '<tr>';
													echo '<th scope="row">'.$aar.'.g </th>';
													$stmt2 =" SELECT `klasse` FROM GSL_Class WHERE `skole` = '".$school."' && `year` = '".$row["year"]."' ORDER BY `klasse`";
                                                                					$res2 = $mysqli->query($stmt2);
                                                                					while($row2=$res2->fetch_assoc()) {
                                                                        					echo "<td>".$row2["klasse"]."</td>";
                                                                					}
                                                               						echo "</tr>";
												} elseif ( $aar == "4") {
													echo '<tr>';
													echo '<th scpoe="row">4.g</th>';
													echo '<td>td</td>';
													echo '</tr>';
												}
											} else {
												if ( $aar <= "3") {
													echo '<tr>';
													echo '<th scope="row">'.$aar.'.g </th>';
													$stmt2 = "SELECT klasse FROM GSL_Class WHERE `skole` = '".$school."' && `year` = '".$row["year"]."' ORDER BY `klasse`";
													$res2 = $mysqli->query($stmt2);
													while( $row2 = $res2->fetch_assoc()) {
														echo '<td>'.$row2["klasse"].'</td>';
													}
													echo '</tr>';
												}
											}
										}
									}
									echo '</tbody>';
									?>
								</table>
							</p>
						</div> 
						
						<hr class="featurette-divider">
			
						<div class="col-md-8 col-md-push-2">
							<h2 class="featurette-heading"><span class="text-muted glyphicon glyphicon-pencil"></span> Opret ny klasse </h2>
							<style type="text/css">
								#klasse .selecContainer .form-control-feedback {
									right: -15px;
								}
							</style>
							<form id="Klasse"
								class="from-horizontal"
								action="modules/nclass.php" 
								name="Klasse" method="post"
								onkeydown = "if (event.keyCode == 13) document.getElementiById('opret').click()">
								
									<div class="form-group">
										<label class="control-label col-xs-4">Angiv &aring;rgang for klassen:</label>
										<div class="col-xs-7">
											<input type="text" name="year" maxlength="10" placeholder="f.eks. 2016" id="year" required />
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-xs-4">Angiv studieretningen:</label>
										<div class="col-xs-7">
											<input type="text" name="klasse" id ="klasse" maxlength="10" placeholder="f.eks. es el. x" required />
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-10 col-xs-push-4">
											<input type="button" id="opret" class="btn btn-primary" value="Opret">		
									</div>
							</form>
						</div>
					<?php endif; ?>
				</div> <!-- ROW FEATURETTE -->
			</section>
		</div> <!-- CONTAINER -->
	</body>
</html>
