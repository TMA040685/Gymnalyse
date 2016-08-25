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
