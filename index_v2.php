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
	</head>
	<body>
		<header>
			<nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo">.</a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		      	<a class='dropdown-button btn' data-activates='mydrop'>Drop Me!</a>

					  <!-- Dropdown Structure -->
					  <ul id='mydrop' class='dropdown-content'>
					    
					  
					  
					  <?php
						include_once('php/api.php');
						$api_templates_callback = scApi('https://api.safetyculture.io/templates/search?owner=me');
						
						foreach ($api_templates_callback->templates as $template){
								print("<li><a href='index.php?temp=" . $template->template_id ."'>".$template->name . "</a></li>");
						}
						
					  ?>
					  
		      </ul>
		    </div>
		  </nav>
		</header>
<<<<<<< HEAD:index_audit.php
		<?php
		include_once('php/api.php');

			if(!isset($_GET['temp'])){
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
			}
			
			if(isset($_GET['temp'])){
				$temp = $_GET['temp'];
				$api_audits_callback = scApi('https://api.safetyculture.io/audits/search?owner=me');
			foreach ($api_audits_callback->audits as $audits) {
				echo("
					<div class='row'>
				      <div class='col s6 m3'>
				        <div class='card blue-grey darken-1'>
				          <div class='card-content white-text'>
				            <span class='card-title'>" . $audits->name . "</span>
				            <h1>" . $audits->score_percentage ."</h1>
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
			}
		?>
=======
			<div class='row'>
				<?php
					include_once('php/api.php');
					$api_templates_callback = scApi('https://api.safetyculture.io/templates/search?owner=me');

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
					            <a href='#'>View Audits From Template</a>
					            <a href='#'>This is a link</a>
					          </div>
					        </div>
						    </div>
							");
					}
				?>
		</div>
>>>>>>> 22cb54e1af0f2ded1480efb65b4c855453534890:index.php
	</body>
</html>