<?php include_once('_php/init.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>My iAuditor Templates</title>
		<?php init_head(''); ?>
	</head>
	<body>
		<?php init_nav(''); ?>
		<br>
		<div id='content'>
			<div style='padding: 10px;'>
				<div style='padding-left: 10px;'>
					<h5>Auditing Templates</h5>
				</div>
				<div class="divider"></div>
				<div class='row' style='padding-top: 15px;'>
					<?php
						include_once('_php/api.php');
						$api_templates_callback = api_call('https://api.safetyculture.io/templates/search?owner=me');

						$date = date("Y-m-d\TH:i:s.000\Z", strtotime("-1 week"));

						foreach ($api_templates_callback->templates as $template) {
							echo("
							<div class='col m4'>
				        		<div class='card blue-grey darken-1 hoverable'>
				          			<div class='card-content white-text'>
					            		<span class='card-title truncate'>" . $template->name . "</span>
					            		<p><strong>Created At: </strong></p><p style='opacity: 0.7'>" . date('Y/m/d h:i A', strtotime($template->created_at)) . "</p>
					            		<p><strong>Last Modified: </strong></p><p style='opacity: 0.7'>" . date('Y/m/d h:i A', strtotime($template->modified_at)) . "</p>
				            		</div>
						          	<div class='card-action white-text'>
						            	<a href=\"audits/?t=" . $template->template_id . "&f=" . $date . "\">View Audits</a>
						          	</div>
					          	</div>
					    	</div>
							");
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>