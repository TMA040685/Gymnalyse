<div class="container-fluid">
    	<!-- Brand and Toggle Grouped for better mobile display -->
	<div class="navbar-header">
    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#GymnalyseNav">
        		<span class="sr-only">Toggle navigation</span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
		</button>
        	<a class="navbar-brand" href="#">Gym<span class="text-muted">nalyse</span></a>
     	</div>
	<div class="collapse navbar-collapse" id="GymnalyseNav">
        	<ul class="nav navbar-nav">
                	<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
 			<li><a href="about.php"><span class="glyphicon glyphicon-lamp"></span> Om Gymnalyse</a></li>		
			<?php
				if ($level == 'admin') {
					echo '<li><a href="mklasse1.php"><span class="glyphicon glyphicon-dashboard"></span> Ny klasse </a></li>';	
					echo '<li><a href="spejl.php"><span class="glyphicon glyphicon-blackboard"></span> Klassespejl </a></li>';
				}
			?>
		</ul>
	<?php 
		if ($logged == 'ind') {
			echo '<ul class="nav navbar-nav navbar-right">
				<li><a href="questions1.php"><span class="glyphicon glyphicon-pencil"></span> Sp&oslash;rgeskema</a></li>
				<li><a href="members.php"><span class="glyphicon glyphicon-lock"></span> Medlemsside</a></li>
				<li><a href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> log ud</a></li>
			      </ul>';
		} else {
			echo '<ul class="nav navbar-nav navbar-right">
				<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Ny Bruger</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log ind</a></li>
                	     </ul>';
		}
	?>
	</div>
</div> <!-- container-fluid -->
