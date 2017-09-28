<?php include_once('../_php/init.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summaries</title>
		<?php init_head('../'); ?>
	</head>
	<body>
		<?php init_nav('../'); ?>
		<br>
		<div id='content'>
			<div class='body'>
				<?php
					if(!isset($_GET['t'])){

					}else{
						include_once('../_php/api.php');

						$modified = '';
						if(isset($_GET['f'])){
							$modified = '&modified_after=' . $_GET['f'];
						}

						$out = api_call('https://api.safetyculture.io/audits/search?owner=me&completed=true&template=' . $_GET['t'] . $modified);
						$first = true;

						$date_week = date("Y-m-d\TH:i:s.000\Z", strtotime("-1 week"));
						$date_month = date("Y-m-d\TH:i:s.000\Z", strtotime("-1 month"));

						if($out->count == 0){
							echo("
									<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
										<h5 style='text-align: center;'>No audits have been made with this template within this time period.</h5>
										<div class='back' style='margin-left: 50%; transform: translateX(-50%);'>
											<div style='float: left'>
												<a class='btn-floating waves-effect waves-light orange accent-2' href='../'><i class='material-icons'>arrow_back</i></a>
											</div>
											<div style='float: left'>
												<a class='waves-effect waves-light btn modal-trigger' href='' onclick=\"$('#selectmodal').modal('open');\">Select From</a>
											</div>
										</div>
									</div>
								 	<div id='selectmodal' class='modal'>
										<div class='modal-content'>
											<h4>Order Audits By</h4>
											<div><a onclick=\"$('#selectmodal').modal('close');\"  href=\"../audits/?t=" . $_GET['t'] . "&f=" . $date_week . "\" class='center-align waves-effect waves-light btn'>the past week</a></div>
											<div><a onclick=\"$('#selectmodal').modal('close');\"  href=\"../audits/?t=" . $_GET['t'] . "&f=" . $date_month . "\" class='center-align waves-effect waves-light btn'>the past week</a></div>
											<div><a onclick=\"$('#selectmodal').modal('close');\" href=\"../audits/?t=" . $_GET['t'] . "\" class='center-align waves-effect waves-light btn'>all time</a></div>
										</div>
									</div>
									<script>
										$(function(){
											$('.modal').modal();
										});
									</script>
								");
							return;
						}

						foreach($out->audits as $audit){
							$api_audit = api_call('https://api.safetyculture.io/audits/' . $audit->audit_id);

							if($first){
								$first = false;

								echo("
									<div>
										<a class='btn-floating waves-effect waves-light orange accent-2 left' href='../'><i class='material-icons'>arrow_back</i></a>
										<div style='margin-left: 60px'>
											<a class='dropdown-button btn right' data-activates='droptime'>Select From</a>
											<!-- Dropdown Structure -->
											<ul id='droptime' class='dropdown-content'>
												<li><a href=\"../audits/?t=" . $_GET['t'] . "&f=" . $date_week . "\">the past week</a></li>
												<li><a href=\"../audits/?t=" . $_GET['t'] . "&f=" . $date_month . "\">the past month</a></li>
												<li><a href=\"../audits/?t=" . $_GET['t'] . "\">all time</a></li>
											</ul>
										</div>
										<div style='padding-top: 50px;'><h4 style='margin-bottom: 0px;'>" . $api_audit->template_data->metadata->name . "</h4></div>
									</div>
									<p style='margin-top: 10px; margin-bottom: 15px; opacity: 0.7; font-size: 16px;'>" . $api_audit->template_data->metadata->description . "</p>
									<div class='divider'></div>
									<script>  $('.dropdown-button').dropdown(); </script>
								");
							}

							$status_text = "Undefined";
							$status_colour = "#000000";
							$perc_raw = $api_audit->audit_data->score_percentage;
							$percentage = $perc_raw / 100;

							if($perc_raw > 80){
								$status_text = "Good";
								$status_colour = "#8bc34a";
							}
							elseif($perc_raw >= 50){
								$status_text = "Needs Attention";
								$status_colour = "#ffca28";
							}elseif($perc_raw < 50){
								$status_text = "Critical";
								$status_colour = "#e53935";
							}

							echo("
								<div class='audit'>
									<div id='" . $api_audit->audit_id . "' class='auditperc left'></div>
									<div class='left auditinfo'>
										<h4>" . $status_text . "</h4>
										<p><strong>Audited By: </strong></p><p style='opacity: 0.8'>" . $api_audit->audit_data->authorship->owner . "</p>
										<p><strong>Score Performance: </strong></p><p style='opacity: 0.8'>" . $api_audit->audit_data->score . "/" . $api_audit->audit_data->total_score . "</p>
										<p><strong>Date Completed: </strong></p><p style='opacity: 0.8'>" . date('Y/m/d h:i A', strtotime($api_audit->audit_data->date_completed)) . "</p>
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
										from: { color: '" . $status_colour . "', width: 3 },
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