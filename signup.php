<?php
	include_once 'includes/signup.inc.php';
	include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/overhead.php'; ?>
    	</head>
    	<body>
		<div class="container">
			<div class="heading">
				<!-- PAGE HEADER -->
			</div>
			<nav class="navbar navbar-inverse">
				<?php include('includes/menu.php'); ?>
			</nav>
			<section>
        			<!-- Registration form to be output if the POST variables are not
        				set or if the registration script caused an error. -->
        			<div class="row featurette">
					<div class="col-md-7 col-md-push-3">
					<h2 class="featurette-heading"><span class="text-muted">Gymnalyse</span> brugerregistrering.</h2>
					<?php
						if ( !empty($error_msg)) {
							echo $error_msg;
						}
					?>
					<p class="lead">
						For at registrere dig som bruger af systemet skal du udfylde nedest&aring;ende formular, hvorefter
						du vil kunne logge ind i systemtet.
					</p>
					<style type="text/css">
						#SignUp .selecContainer .form-control-feedback {
							right: -15px;
						}
					</style>
					<form id="registration_form" 
						class="form-horizontal" 
						action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
						method="post" 
						name="registration_form"
						onkeydown="if (event.keyCode == 13) document.getElementById('register').click()">
						<div class="form-group">
							<label class="control-label col-xs-4"><span class="glyphicon glyphicon-user"></span> Brugernavn:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" name="username" id="username"
									placeholder="Angiv et brugernavn" size="30" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" name="email" id="email"
									placeholder="Angiv din email adresse" size="30" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4"><span class="glyphicon glyphicon-envelope"></span> Bekr&aelig;ft email:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" name="chemail" id="chemail"
									placeholder="Gentag din email adresse" size="30" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4"><span class="glyphicon glyphicon-blackboard"></span> Skole:</label>
							<div class="col-xs-7 selectContainer">
								<select class="form-control" name="skole" id="skole" reuired>
									<option value="" selected> - V&aelig;lg din skole - </option>
									<option value="BG">Bornholms Gymnasium</option>
									<option value="FG">Frederiksberg Gymnasium</option>
									<option value="OK">Odense Katedralskole</option>
									<option value="MG">Marselisborg Gymnasium</option>
									<option value="OTH">Andet</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4"><span class="glyphicon glyphicon-lock"></span> Password:</label>
							<div class="col-xs-7">
								<input type="password" class="form-control" name="pwd" id="pwd"
									placeholder="Angiv et password" size="30" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4"><span class="glyphicon glyphicon-lock"></span> Bekr&aelig;ft password: </label>
							<div class="col-xs-7">
								<input type="password" class="form-control" name="cpwd" id="cpwd"
									placeholder="Gentag password" size="30" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" id="captchaOperation"></label>
							<div class="col-xs-7">
								<div class="g-recaptcha" name="captcha" id="captcha" data-sitekey="6LcxrSATAAAAAEJ5qSrSms7ZFJiFz-hc1gKIsLtr"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-xs-push-4">
								<input type="button" id="register"
									class="btn btn-primary" value="Registrer"
									onclick="return regformhash(this.form,
										this.form.username,
										this.form.email,
										this.form.pwd,
										this.form.cpwd);">
					</form>
					<script type="text/javascript">
						$(document).ready(function() {
							$('#registration_form').formValidation ({
								framework: 'bootstrap',
								icon: {
									valid:	'glyphicon glyphicon-ok',
									invalid:  'glyphicon glyphicon-remove',
									validating:  'glyphicon glyphicon-refresh'
								},
								fields: {
									username: {
										validators: {
											notEmpty: {
												message: 'Du skal angive et brugernavn.'
											},
											stringLength: {
												min: 6,
												max: 30,
												message: 'Brugernavnet skal v&aelig;re mellem 6 og 30 karakterer langt.'
											},
											regexp: {
												regexp: /^[0-9a-zA-Z_]+$/,
												message: 'Brugernavnet kan kun indeholde 0-9, a-z, A-Z og underscore.'
											}
										}
									},
									email: {
										validators: {
											notEmpty: {
												message: 'Du skal angive en email adresse.'
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
									chemail: {
										validators: {
											notEmpty: {
												message: 'Du skal angive din email adresse igen.'
											},
											identical: {
												field: 'email',
												message: 'De to email adresser er ikke identiske.'
											}
										}
									},
									skole: {
										validators: {
											notEmpty: {
												message: 'V&aelig;lg et en skole p&aring; listen, fremg&aring;r din skole ikke s&aring; v&aelig;lg Andet'
											},
											choise: {
												min: 1,
												max: 1,
												message: 'Du skal v&aelig;lge en skole fra listen.'
											}
										}
									},
									pwd: {
										validators: {
											notEmpty: {
												message: 'Du skal angive et password.'
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
									},
									cpwd: {
										validators: {
											notEmpty: {
												message: 'Du skal anvive dit password igen.'
											},
											identical: {
												field: 'pwd',
												message: 'SKAL v&aelig;re identisk med dit password.'
											}
										}
									}
								}
							});
						});
					</script> 
        			<p>Return to the <a href="index.php">login page</a>.</p>
			</div>
		</section>
	</div><!-- CONTAINER -->
    </body>
</html>
