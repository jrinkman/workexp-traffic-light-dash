<?php include_once('../_php/init.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summary</title>
		<?php init_head('../'); ?>
	</head>
	<body>
		<?php init_nav('../'); ?>
		<br>
		<div id='content'>
			<div style='padding: 10px'>
				<?php
					if(!isset($_GET['t'])){

					}else{
						include_once('../_php/api.php');
						$out = api_call('https://api.safetyculture.io/audits/search?owner=me&template=' . $_GET['t']);

						foreach($out->audits as $audit){
							$api_audit = api_call('https://api.safetyculture.io/audits/' . $audit->audit_id);

						}
					}
				?>
				
			</div>
		</div>
	</body>
</html>