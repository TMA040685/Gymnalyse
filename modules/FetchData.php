<!doctype html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Medlems sider - Gymnalyse </title>
                <script type="text/JavaScript" src="./js/sha512.js"></script>
                <script type="text/JavaScript" src="./js/forms.js"></script>
                <meta name="description" content="Analyse system for PIP-skolerne">
                <link href='http://fonts.googleapis.com/css?family=Amatic+SC:700|Dosis|Josefin+Sans|Poiret+One' rel='stylesheet' type='text/css'>
                <link type="text/css" rel="stylesheet" href="./styles/main.css">
        
		<!-- LOAD THE AJAX API -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
                <script type="text/javascript">
                        $(document).ready(function () {

                                var options = {
                                        chart: {
                                                renderTo: 'container',
                                                type: 'scatter',
                                                zoomType: 'xy',
						style: {fontFamily: '"Dosis"', fontSize: '12px'}
					},
                                        title: {
                                                text: 'Motivations model for hold: '
                                        },
                                        yAxis: {
                                                title: { text: 'Lyst - Nytte' },
						gridLineWidth: 1,
						max: 10,
						min: -10,
						tickInterval: 5,
						minorTickInterval: 1
                                        },
					xAxis: {
                                                title: {
                                                        enabled: true,
                                                        text: 'Individ - Fælles'
                                                        },
                                                gridLineWidth: 1,
						max: 10,
						min: -10,
						tickInterval: 5,
						minorTickInterval: 1
                                        },
                                        series: [{
                                                name: 'Hold: ',
                                                data: null                                        }]
                                };

                                        var chart = new Highcharts.Chart(options);
				});
		</script>
	</head>
        <body>
                <!-- REG-form to be output if the POST varaiables 
                        are not set of if the registration script caused an error. -->
                <div id="wrapper">
                        <header>
                                <h1>Velkommen til Gymnalyse</h1>
                                <p> - En analyse platform - </p>
                                <nav>
                                	<ul>
	<li><a rel="external" href="http://www.sovedyr.dk/Gymnalyse/">Forside</a></li>
	</ul>
				</nav>
                        </header>
                        <div id="core" class="clearfix">
                                <section id="left">
										<h1>Der er sket en fejl...</h1>
					<p><span class="error">Du er ikke logget ind og kan derfor ikke se siden.</span></p>
									</section>
				<section id="right">
                                        <div id="about">
						<h1>Om Gymnalyse</h1>
<p>
	Gymnalyse startede som f&oslash;lge af et m&oslash;de i p&aelig;dagogik i praksis (PIP) der er et samarbejde mellem fire gymnaier som er fordelt ud over det danske land. Gymnalyse er en platform hvor man kan analysere klassers motivation.
</p>
					</div>
					<hr>
					<div id="login">
						<h1>Login</h1>

<form action="./includes/process_login.php"
	method="post"
	name="login_form">
		<p>Email:<br>
			<input type="email" name="email" id="email" size="25" required/>
		</p><br>
		<p>Password:<br>
			<input type="password" size="25" name="password" id="password" required />
		</p><br>
		<p><input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /></p>
</form>
<br>
						<p> Hvis du er f&aelig;rdig s&aring; <a href="includes/logout.php">log ud</a>.</p>
                        	 		 <p> Du er pt. logget <strong>ud</strong>.</p>
					</div>       
					<hr>
					<div id="contact">
						
<h1>Kontakt os</h1>
<p>Att: Thomas M. Amby<br>
	Marselisborg Gymnasium<br>
	Birketinget 9<br>
	8000 Aarhus C<br>
	<br>
        <iframe width="225" height="169" frameborder="0"
        	style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=Birktinget%209%2C%208000%20Aarhus&key=AIzaSyD_rIwwatK3yXwzWo7t3pN2qE4ThrNDMRE"></iframe>
</p>
					</div>
				</section>
                        </div>

                        <footer>
                                <p>2014 Copyright &copy; Thomas Mellergaard Amby</p>
                        </footer>
	</body>
</html>
