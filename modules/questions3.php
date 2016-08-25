
Warning: extract() expects parameter 1 to be array, null given in /customers/e/2/c/sovedyr.dk/httpd.www/Gymnalyse/modules/questions3.php on line 34
<!doctype html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Medlems sider - Gymnalyse </title>
        	<script type="text/JavaScript" src="../js/sha512.js"></script>
                <script type="text/JavaScript" src="../js/forms.js"></script>
                <meta name="description" content="Analyse system for PIP-skolerne">
                <link href='http://fonts.googleapis.com/css?family=Amatic+SC:700|Dosis|Josefin+Sans|Poiret+One' rel='stylesheet' type='text/css'>
                <link type="text/css" rel="stylesheet" href="../styles/main.css">
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
		<h1> Sp&oslash;rgeskema del 3</h1>
		<p>
			Herunder f&oslash;lger der 22 udsagn. Du skal vurdere hver enkelt 
			udsagn på en skala fra 1 til 10. Hvor 10 betyder <em>Helt enig</em>
			og 1 betyder <em>Helt uenig</em>. 
		</p><br>
		<form action="calc.php" name="klasse" method="post">
			<input type="hidden" name="skole" value="">
			<input type="hidden" name="year" value="">
			<input type="hidden" name="klasse" value="">
			<input type="hidden" name="student" value="">
			<p>1. Jeg arbejder bedst alene: <span>*</span><br><input type='radio' name='Q1' value='1'>1&nbsp;<input type='radio' name='Q1' value='2'>2&nbsp;<input type='radio' name='Q1' value='3'>3&nbsp;<input type='radio' name='Q1' value='4'>4&nbsp;<input type='radio' name='Q1' value='5'>5&nbsp;<input type='radio' name='Q1' value='6'>6&nbsp;<input type='radio' name='Q1' value='7'>7&nbsp;<input type='radio' name='Q1' value='8'>8&nbsp;<input type='radio' name='Q1' value='9'>9&nbsp;<input type='radio' name='Q1' value='10'>10&nbsp;</p><br><p>2. Jeg synes, tavlenoterne er det vigtigste udbytte fra timerne:<span>*</span><br><input type='radio' name='Q2' value='1'>1&nbsp;<input type='radio' name='Q2' value='2'>2&nbsp;<input type='radio' name='Q2' value='3'>3&nbsp;<input type='radio' name='Q2' value='4'>4&nbsp;<input type='radio' name='Q2' value='5'>5&nbsp;<input type='radio' name='Q2' value='6'>6&nbsp;<input type='radio' name='Q2' value='7'>7&nbsp;<input type='radio' name='Q2' value='8'>8&nbsp;<input type='radio' name='Q2' value='9'>9&nbsp;<input type='radio' name='Q2' value='10'>10&nbsp;</p><br><p>3. Det er vigtigt for mig, at undervisningen rammer mine personlige interesser:<span>*</span><br><input type='radio' name='Q3' value='1'>1&nbsp;<input type='radio' name='Q3' value='2'>2&nbsp;<input type='radio' name='Q3' value='3'>3&nbsp;<input type='radio' name='Q3' value='4'>4&nbsp;<input type='radio' name='Q3' value='5'>5&nbsp;<input type='radio' name='Q3' value='6'>6&nbsp;<input type='radio' name='Q3' value='7'>7&nbsp;<input type='radio' name='Q3' value='8'>8&nbsp;<input type='radio' name='Q3' value='9'>9&nbsp;<input type='radio' name='Q3' value='10'>10&nbsp;</p><br><p>4. For mig er det faglige vigtigere end det sociale i gymnasiet:<span>*</span><br><input type='radio' name='Q4' value='1'>1&nbsp;<input type='radio' name='Q4' value='2'>2&nbsp;<input type='radio' name='Q4' value='3'>3&nbsp;<input type='radio' name='Q4' value='4'>4&nbsp;<input type='radio' name='Q4' value='5'>5&nbsp;<input type='radio' name='Q4' value='6'>6&nbsp;<input type='radio' name='Q4' value='7'>7&nbsp;<input type='radio' name='Q4' value='8'>8&nbsp;<input type='radio' name='Q4' value='9'>9&nbsp;<input type='radio' name='Q4' value='10'>10&nbsp;</p><br><p>5. F&aelig;llestimer og aktiviteter p&aring; tv&aelig;rs af klasserne er 
						meget vigtige for mig:<span>*</span><br><input type='radio' name='Q5' value='1'>1&nbsp;<input type='radio' name='Q5' value='2'>2&nbsp;<input type='radio' name='Q5' value='3'>3&nbsp;<input type='radio' name='Q5' value='4'>4&nbsp;<input type='radio' name='Q5' value='5'>5&nbsp;<input type='radio' name='Q5' value='6'>6&nbsp;<input type='radio' name='Q5' value='7'>7&nbsp;<input type='radio' name='Q5' value='8'>8&nbsp;<input type='radio' name='Q5' value='9'>9&nbsp;<input type='radio' name='Q5' value='10'>10&nbsp;</p><br><p>6. Det, at vi har det godt sammen i klassem har stor betydning for mit faglige udbytte:<span>*</span><br><input type='radio' name='Q6' value='1'>1&nbsp;<input type='radio' name='Q6' value='2'>2&nbsp;<input type='radio' name='Q6' value='3'>3&nbsp;<input type='radio' name='Q6' value='4'>4&nbsp;<input type='radio' name='Q6' value='5'>5&nbsp;<input type='radio' name='Q6' value='6'>6&nbsp;<input type='radio' name='Q6' value='7'>7&nbsp;<input type='radio' name='Q6' value='8'>8&nbsp;<input type='radio' name='Q6' value='9'>9&nbsp;<input type='radio' name='Q6' value='10'>10&nbsp;</p><br><p>7. De venner, jeg har på gymnasiet, er afgørende for, at jeg kommer i skole:<span>*</span><br><input type='radio' name='Q7' value='1'>1&nbsp;<input type='radio' name='Q7' value='2'>2&nbsp;<input type='radio' name='Q7' value='3'>3&nbsp;<input type='radio' name='Q7' value='4'>4&nbsp;<input type='radio' name='Q7' value='5'>5&nbsp;<input type='radio' name='Q7' value='6'>6&nbsp;<input type='radio' name='Q7' value='7'>7&nbsp;<input type='radio' name='Q7' value='8'>8&nbsp;<input type='radio' name='Q7' value='9'>9&nbsp;<input type='radio' name='Q7' value='10'>10&nbsp;</p><br><p>8. Jeg forbereder mig meget ofte sammen med andre:<span>*</span><br><input type='radio' name='Q8' value='1'>1&nbsp;<input type='radio' name='Q8' value='2'>2&nbsp;<input type='radio' name='Q8' value='3'>3&nbsp;<input type='radio' name='Q8' value='4'>4&nbsp;<input type='radio' name='Q8' value='5'>5&nbsp;<input type='radio' name='Q8' value='6'>6&nbsp;<input type='radio' name='Q8' value='7'>7&nbsp;<input type='radio' name='Q8' value='8'>8&nbsp;<input type='radio' name='Q8' value='9'>9&nbsp;<input type='radio' name='Q8' value='10'>10&nbsp;</p><br><p>9. Jeg synes, jeg svigter mine kammerater, hvis jeg er dårligt forberedt til timerne<span>*</span>:<br><input type='radio' name='Q9' value='1'>1&nbsp;<input type='radio' name='Q9' value='2'>2&nbsp;<input type='radio' name='Q9' value='3'>3&nbsp;<input type='radio' name='Q9' value='4'>4&nbsp;<input type='radio' name='Q9' value='5'>5&nbsp;<input type='radio' name='Q9' value='6'>6&nbsp;<input type='radio' name='Q9' value='7'>7&nbsp;<input type='radio' name='Q9' value='8'>8&nbsp;<input type='radio' name='Q9' value='9'>9&nbsp;<input type='radio' name='Q9' value='10'>10&nbsp;</p><br><p>10. Jeg er selv ansvarlig for, hvor meget jeg f&aring;r ud af undervisningen:<span>*</span><br><input type='radio' name='Q10' value='1'>1&nbsp;<input type='radio' name='Q10' value='2'>2&nbsp;<input type='radio' name='Q10' value='3'>3&nbsp;<input type='radio' name='Q10' value='4'>4&nbsp;<input type='radio' name='Q10' value='5'>5&nbsp;<input type='radio' name='Q10' value='6'>6&nbsp;<input type='radio' name='Q10' value='7'>7&nbsp;<input type='radio' name='Q10' value='8'>8&nbsp;<input type='radio' name='Q10' value='9'>9&nbsp;<input type='radio' name='Q10' value='10'>10&nbsp;</p><br><p>11. Jeg kan kun arbejde sammen med nogen p&aring; mit eget faglige niveau:<span>*</span><br><input type='radio' name='Q11' value='1'>1&nbsp;<input type='radio' name='Q11' value='2'>2&nbsp;<input type='radio' name='Q11' value='3'>3&nbsp;<input type='radio' name='Q11' value='4'>4&nbsp;<input type='radio' name='Q11' value='5'>5&nbsp;<input type='radio' name='Q11' value='6'>6&nbsp;<input type='radio' name='Q11' value='7'>7&nbsp;<input type='radio' name='Q11' value='8'>8&nbsp;<input type='radio' name='Q11' value='9'>9&nbsp;<input type='radio' name='Q11' value='10'>10&nbsp;</p><br><p>12. Det er meget vigtigt for mig, at hele klassen f&aring;r noget ud af undervisningen:<span>*</span><br><input type='radio' name='Q12' value='1'>1&nbsp;<input type='radio' name='Q12' value='2'>2&nbsp;<input type='radio' name='Q12' value='3'>3&nbsp;<input type='radio' name='Q12' value='4'>4&nbsp;<input type='radio' name='Q12' value='5'>5&nbsp;<input type='radio' name='Q12' value='6'>6&nbsp;<input type='radio' name='Q12' value='7'>7&nbsp;<input type='radio' name='Q12' value='8'>8&nbsp;<input type='radio' name='Q12' value='9'>9&nbsp;<input type='radio' name='Q12' value='10'>10&nbsp;</p><br><p>13. For mig er det vigtigt, at vi f&aring;r karakterer l&oslash;bende:<span>*</span><br><input type='radio' name='Q13' value='1'>1&nbsp;<input type='radio' name='Q13' value='2'>2&nbsp;<input type='radio' name='Q13' value='3'>3&nbsp;<input type='radio' name='Q13' value='4'>4&nbsp;<input type='radio' name='Q13' value='5'>5&nbsp;<input type='radio' name='Q13' value='6'>6&nbsp;<input type='radio' name='Q13' value='7'>7&nbsp;<input type='radio' name='Q13' value='8'>8&nbsp;<input type='radio' name='Q13' value='9'>9&nbsp;<input type='radio' name='Q13' value='10'>10&nbsp;</p><br><p>14. Jeg synes, det er godt med pr&oslash;ver, s&aring; jeg ved, hvor jeg ligger fagligt:<span>*</span><br><input type='radio' name='Q14' value='1'>1&nbsp;<input type='radio' name='Q14' value='2'>2&nbsp;<input type='radio' name='Q14' value='3'>3&nbsp;<input type='radio' name='Q14' value='4'>4&nbsp;<input type='radio' name='Q14' value='5'>5&nbsp;<input type='radio' name='Q14' value='6'>6&nbsp;<input type='radio' name='Q14' value='7'>7&nbsp;<input type='radio' name='Q14' value='8'>8&nbsp;<input type='radio' name='Q14' value='9'>9&nbsp;<input type='radio' name='Q14' value='10'>10&nbsp;</p><br><p>15. Det er meget vigtigt for mig, at jeg kan bruge det, jeg l&aelig;rer, i virkeligheden:<span>*</span><br><input type='radio' name='Q15' value='1'>1&nbsp;<input type='radio' name='Q15' value='2'>2&nbsp;<input type='radio' name='Q15' value='3'>3&nbsp;<input type='radio' name='Q15' value='4'>4&nbsp;<input type='radio' name='Q15' value='5'>5&nbsp;<input type='radio' name='Q15' value='6'>6&nbsp;<input type='radio' name='Q15' value='7'>7&nbsp;<input type='radio' name='Q15' value='8'>8&nbsp;<input type='radio' name='Q15' value='9'>9&nbsp;<input type='radio' name='Q15' value='10'>10&nbsp;</p><br><p>16. Jeg foretr&aelig;kker selvst&aelig;ndigt projektarbejde:<span>*</span><br><input type='radio' name='Q16' value='1'>1&nbsp;<input type='radio' name='Q16' value='2'>2&nbsp;<input type='radio' name='Q16' value='3'>3&nbsp;<input type='radio' name='Q16' value='4'>4&nbsp;<input type='radio' name='Q16' value='5'>5&nbsp;<input type='radio' name='Q16' value='6'>6&nbsp;<input type='radio' name='Q16' value='7'>7&nbsp;<input type='radio' name='Q16' value='8'>8&nbsp;<input type='radio' name='Q16' value='9'>9&nbsp;<input type='radio' name='Q16' value='10'>10&nbsp;</p><br><p>17. Jeg g&aring;r <em>kun</em> i gymnasiet for at komme ind p&aring; en bestemt uddannelse bagefter:<span>*</span><br><input type='radio' name='Q17' value='1'>1&nbsp;<input type='radio' name='Q17' value='2'>2&nbsp;<input type='radio' name='Q17' value='3'>3&nbsp;<input type='radio' name='Q17' value='4'>4&nbsp;<input type='radio' name='Q17' value='5'>5&nbsp;<input type='radio' name='Q17' value='6'>6&nbsp;<input type='radio' name='Q17' value='7'>7&nbsp;<input type='radio' name='Q17' value='8'>8&nbsp;<input type='radio' name='Q17' value='9'>9&nbsp;<input type='radio' name='Q17' value='10'>10&nbsp;</p><br><p>18. Det er vigtigt for mig at vide pr&aelig;cis, hvad det, vi laver, skal bruges til:<span>*</span><br><input type='radio' name='Q18' value='1'>1&nbsp;<input type='radio' name='Q18' value='2'>2&nbsp;<input type='radio' name='Q18' value='3'>3&nbsp;<input type='radio' name='Q18' value='4'>4&nbsp;<input type='radio' name='Q18' value='5'>5&nbsp;<input type='radio' name='Q18' value='6'>6&nbsp;<input type='radio' name='Q18' value='7'>7&nbsp;<input type='radio' name='Q18' value='8'>8&nbsp;<input type='radio' name='Q18' value='9'>9&nbsp;<input type='radio' name='Q18' value='10'>10&nbsp;</p><br><p>19. Jeg synes, det er rigtig sjovt at l&aelig;re noget nyt, ogs&aring; selvom jeg ikke lige ved, hvad jeg skal bruge det til:<span>*</span><br><input type='radio' name='Q19' value='1'>1&nbsp;<input type='radio' name='Q19' value='2'>2&nbsp;<input type='radio' name='Q19' value='3'>3&nbsp;<input type='radio' name='Q19' value='4'>4&nbsp;<input type='radio' name='Q19' value='5'>5&nbsp;<input type='radio' name='Q19' value='6'>6&nbsp;<input type='radio' name='Q19' value='7'>7&nbsp;<input type='radio' name='Q19' value='8'>8&nbsp;<input type='radio' name='Q19' value='9'>9&nbsp;<input type='radio' name='Q19' value='10'>10&nbsp;</p><br><p>20. Jeg kan lide at komme i dybden med stoffet:<span>*</span><br><input type='radio' name='Q20' value='1'>1&nbsp;<input type='radio' name='Q20' value='2'>2&nbsp;<input type='radio' name='Q20' value='3'>3&nbsp;<input type='radio' name='Q20' value='4'>4&nbsp;<input type='radio' name='Q20' value='5'>5&nbsp;<input type='radio' name='Q20' value='6'>6&nbsp;<input type='radio' name='Q20' value='7'>7&nbsp;<input type='radio' name='Q20' value='8'>8&nbsp;<input type='radio' name='Q20' value='9'>9&nbsp;<input type='radio' name='Q20' value='10'>10&nbsp;</p><br><p>21. Jeg kan godt li' at lave lektier, og jeg g&oslash;r det ikke kun for karakteren:<span>*</span><br><input type='radio' name='Q21' value='1'>1&nbsp;<input type='radio' name='Q21' value='2'>2&nbsp;<input type='radio' name='Q21' value='3'>3&nbsp;<input type='radio' name='Q21' value='4'>4&nbsp;<input type='radio' name='Q21' value='5'>5&nbsp;<input type='radio' name='Q21' value='6'>6&nbsp;<input type='radio' name='Q21' value='7'>7&nbsp;<input type='radio' name='Q21' value='8'>8&nbsp;<input type='radio' name='Q21' value='9'>9&nbsp;<input type='radio' name='Q21' value='10'>10&nbsp;</p><br><p>22. Jeg synes, kommentarerne er vigtigere end karakteren i mine skriftlige opgaver:<span>*</span><br><input type='radio' name='Q22' value='1'>1&nbsp;<input type='radio' name='Q22' value='2'>2&nbsp;<input type='radio' name='Q22' value='3'>3&nbsp;<input type='radio' name='Q22' value='4'>4&nbsp;<input type='radio' name='Q22' value='5'>5&nbsp;<input type='radio' name='Q22' value='6'>6&nbsp;<input type='radio' name='Q22' value='7'>7&nbsp;<input type='radio' name='Q22' value='8'>8&nbsp;<input type='radio' name='Q22' value='9'>9&nbsp;<input type='radio' name='Q22' value='10'>10&nbsp;</p><br>			<p><input type="submit" name="submit" value="Send"></p>
		</form>
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
                                                <p> Du er pt. logget <strong>ud</strong>. Med tilladelser svarende til <strong></strong></p>
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
