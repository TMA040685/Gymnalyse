<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="description" content="Analyse system til PIP-skolerne">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<meta name="author" content="Thomas Mellergaard Amby">

	<title> Gymnalyse </title>

<!-- INCLUDE BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" 
		integrety="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="dist/css/formValidation.css">
	<link rel="stylesheet" href="includes/css/featurette.css">

<!-- INCLUDE THE BOOTSTRAP JS -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
                integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	<script type="text/javascript" src="dist/js/formValidation.js"></script>
	<script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>

<!-- INCLUDE THE COOKIE CONSENT

	<script src="js/jquery-2.1.3.min.js"></script>
	<link rel=stylesheet" type="text/css" href="./includes/css/jquery-eu-cookie-law-popup.css"/>
	<script src="js/jquery-eu-cookie-law-popup.js"></script>
-->
<!-- Include the sha and form scripts -->
	<script type="text/javascript" src="js/sha512.js"></script>
	<script type="text/javascript" src="js/forms.js"></script>

<!-- LOAD THE GOOGLE RECAPTCHA TOOL -->
	<script src="https://www.google.com/recaptcha/api.js"></script>

<!-- LOAD THE GOOGLE CHARTS -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	     	var data;
	     	var chart;

		// Load the Visualization API and the piechart package.
	     	google.charts.load('current', {'packages':['corechart']});

		// Set a callback to run when the Google Visualization API is loaded.
      		google.charts.setOnLoadCallback(drawChart);

      		// Callback that creates and populates a data table,
      		// instantiates the pie chart, passes in the data and
      		// draws it.
      		function drawChart() {
			

        		// Create our data table.
        		var data = new google.visualization.DataTable();
			data.addColumn('number', 'Individ - FÃlles');
			data.addColumn('number', 'Lyst - Nytte');

			data.addRows(
				<?php echo json_encode($json, JSON_NUMERIC_CHECK); ?>
			);

        		// Set chart options
        		var options = {
                       		width:495,
                       		height:350,
				hAxis:{title: 'Individ - FÃ¦lles', minValue: -10, maxValue: 10},
				vAxis:{title: 'Lyst - Nytte', minValue: -10, maxValue: 10},
				legend: 'none',
				animation: {duration:1000, ease: 'in'}};

        		// Instantiate and draw our chart, passing in some options.
        		chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        		google.visualization.events.addListener(chart, 'select', selectHandler);
        		chart.draw(data, options);

      		}

      		function selectHandler() {
        		var selectedItem = chart.getSelection()[0];
			var value = data.getValue(selectedItem.row, 0);
        		alert('The user selected ' + value);
      		}

    </script>
