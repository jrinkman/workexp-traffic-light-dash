<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summary</title>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

		<style>
			.horizontal {
		        display: -webkit-flex;
		        display: -ms-flexbox;
		        display: flex;
		    }
		</style>
	</head>
	<body>
		<?php
			include_once('php/api.php');
			$api_templates_callback = scApi('https://api.safetyculture.io/templates/search?owner=me');

			foreach ($api_templates_callback->templates as $template) {
				echo("
					<div class='row'>
				      <div class='col s6 m3'>
				        <div class='card horizontal blue-grey darken-1'>
				          <div class='card-content white-text'>
				            <span class='card-title'>" . $template->name . "</span>
				            <p>I am a very simple card. I am good at containing small bits of information.
				            I am convenient becaus</p>
				          </div>
				          <div class='card-action white-text'>
				          	SAFEEEEE
				            <!--<a href='#''>This is a link</a>
				            <a href='#'>This is a link</a>-->
				          </div>
				        </div>
				      </div>
				    </div>
					");

			}
		?>
	</body>
</html>