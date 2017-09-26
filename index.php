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
		    	<div class="nav-wrapper" style='background-color: #245776 !important'>
		      		<a href="#" class="brand-logo"></a>
		      		<div id="nav-mobile" class="left">
		      			<a href="#"><img class='navlogo' src='img/logo.svg'></a>
		      		</div>
		      		<div class='left navtext' style='padding-top: 3px'>AUDIT SUMMARY</div>
			    </div>
			</nav>
		</header>
		<br>
		<div style='padding: 10px;'>
			<div style='padding-left: 10px;'>
				<h5>Auditing Templates</h5>
			</div>
			<div class="divider"></div>
			<div class='row' style='padding-top: 15px;'>
				<?php
					include_once('php/api.php');
					$api_templates_callback = api_call('https://api.safetyculture.io/templates/search?owner=me');

					foreach ($api_templates_callback->templates as $template) {
						echo("
						<div class='col m4'>
			        		<div class='card blue-grey darken-1 hoverable'>
			          			<div class='card-content white-text'>
				            		<span class='card-title truncate'>" . $template->name . "</span>
				            		<p><strong>Created At: </strong>" . date('Y/m/d h:i A', strtotime($template->created_at)) . "</p>
				            		<p><strong>Last Modified: </strong>" . date('Y/m/d h:i A', strtotime($template->created_at)) . "</p>
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