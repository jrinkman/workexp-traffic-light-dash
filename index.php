<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summary</title>
		<?php include_once('php/head.php'); ?>

		<!--Include mobile optimisations-->
		<link rel="stylesheet" href="css/mobile.css">
	</head>
	<body>
		<?php include_once('php/nav.php'); ?>
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
				            		<p><strong>Created At: </strong></p><p style='opacity: 0.6'>" . date('Y/m/d h:i A', strtotime($template->created_at)) . "</p>
				            		<p><strong>Last Modified: </strong></p><p style='opacity: 0.6'>" . date('Y/m/d h:i A', strtotime($template->modified_at)) . "</p>
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