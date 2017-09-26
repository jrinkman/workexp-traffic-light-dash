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

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="css/mobile.css">

		<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<header>
			<nav>
		    	<div class="nav-wrapper">
		      		<a href="#" class="brand-logo">.</a>
		      		<ul id="nav-mobile" class="right hide-on-med-and-down">

		      		</ul>
			    </div>
			</nav>
		</header>
		<div style='padding: 10px;'>
			<h4>My Templates</h4>
			<div class='row'>
				<?php
					include_once('php/api.php');
					$api_templates_callback = api_call('https://api.safetyculture.io/templates/search?owner=me');

					foreach ($api_templates_callback->templates as $template) {
						$ext = '';
						$strmax = 28;

						if(strlen($template->name) > $strmax){ $ext = '...'; }

						echo("
						<div class='col m4'>
			        		<div class='card blue-grey darken-1'>
			          			<div class='card-content white-text'>
				            		<span class='card-title truncate'>" . substr($template->name, 0, $strmax) . $ext . "</span>
				            		<h1 style='padding-top: 0; padding-botom: 0;'>2%</h1>
			            		</div>
					          	<div class='card-action white-text'>
					            	<a href='#'>View Audits</a>
					          	</div>
				          	</div>
				    	</div>
						");
					}
				?>
			</div>
		</div>
	</body>
</html>