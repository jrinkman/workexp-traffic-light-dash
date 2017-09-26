<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summary</title>

		<script
  		src="https://code.jquery.com/jquery-3.2.1.min.js"
  		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  		crossorigin="anonymous">
  	</script>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

		<script>
			$(function(){
				 $('.dropdown-button').dropdown();
			});
		</script>
	</head>
	<body>
		<header>
			<nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo">.</a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		      	<a class='dropdown-button btn' onclick='' data-activates='mydrop'>Drop Me!</a>

					  <!-- Dropdown Structure -->
					  <ul id='mydrop' class='dropdown-content'>
					    <li><a href="#!">one</a></li>
					    <li><a href="#!">two</a></li>
					  </ul>
		      </ul>
		    </div>
		  </nav>
		</header>
		<?php
			include_once('php/api.php');
			$api_templates_callback = scApi('https://api.safetyculture.io/templates/search?owner=me');

			foreach ($api_templates_callback->templates as $template) {
				echo("
					<div class='row'>
				      <div class='col s6 m3'>
				        <div class='card blue-grey darken-1'>
				          <div class='card-content white-text'>
				            <span class='card-title'>" . $template->name . "</span>
				            <h1>2%</h1>
				          </div>
				          <div class='card-action white-text'>
				            <a href='#'>View Audits From Template</a>
				            <a href='#'>This is a link</a>
				          </div>
				        </div>
				      </div>
				    </div>
					");

			}
		?>
	</body>
</html>