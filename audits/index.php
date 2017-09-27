<?php include_once('../_php/init.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summary</title>
		<?php init_head('../'); ?>

		<!--Audit percentage CSS-->
		<link rel='stylesheet' href='../_css/audit.css'>
	</head>
	<body>
		<?php init_nav('../'); ?>
		<br>
		<div id='content'>
			<div style='padding: 0px 25px 15px 40px;'>
				<?php
					if(!isset($_GET['t'])){

					}else{
						include_once('../_php/api.php');
						$out = api_call('https://api.safetyculture.io/audits/search?owner=me&template=' . $_GET['t']);
						$first = true;

						foreach($out->audits as $audit){
							$api_audit = api_call('https://api.safetyculture.io/audits/' . $audit->audit_id);

							if($first){
								$first = false;
								echo("
									<h2 style='margin-bottom: 0px;'>" . $api_audit->template_data->metadata->name . "</h2>
									<h5 style='margin-top: 10px; margin-bottom: 15px; opacity: 0.7'>" . $api_audit->template_data->metadata->description . "</h5>
									<div class='divider'></div>
								");
							}

							$status_text = "Undefined";
							$status_colour = "#000000";
							$perc_raw = $api_audit->audit_data->score_percentage;
							$percentage = $perc_raw / 100;

							if($perc_raw < 50){
								$status_text = "Critical";
								$status_colour = "#e53935";
							} elseif($perc_raw >= 50){
								$status_text = "Needs Attention";
								$status_colour = "#ffca28";
							} elseif($perc_raw > 80){
								$status_text = "Good";
								$status_colour = "#8bc34a";
							}

							echo("
								<div class='audit'>
									<div id='" . $api_audit->audit_id . "' class='auditperc left'></div>
									<div class='left auditinfo'>
										<h4>" . $status_text . "</h4>
										<h5>Audited By</h5>
										<h5>Testing</h5>
									</div>
								</div>
								<script>
									var bar = new ProgressBar.Circle('#" . $api_audit->audit_id . "', {
										color: '" . $status_colour . "',
										// This has to be the same size as the maximum width to
										// prevent clipping
										strokeWidth: 3,
										trailWidth: 3,
										easing: 'easeInOut',
										duration: 1500,
										text: {
											autoStyleContainer: true
										},
										from: { color: '#aaa', width: 3 },
										to: { color: '" . $status_colour . "', width: 3 },
										// Set default step function for all animate calls
										step: function(state, circle) {
											circle.path.setAttribute('stroke', state.color);
											circle.path.setAttribute('stroke-width', state.width);

											var value = Math.round(circle.value() * 100);
											if (value === 0) {
												circle.setText('');
											}
											else {
												circle.setText(value + '%');
											}
										}
									});

									bar.text.style.fontFamily = 'Roboto';
									bar.text.style.fontSize = '2rem';

									bar.animate(" . $percentage . ");  // Number from 0.0 to 1.0
								</script>

								<div class='divider'></div>
							");
						}
					}
				?>
			</div>
		</div>
	</body>
</html>