<!DOCTYPE html>
<html>
	<head>
		<title>Audit Summary</title>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	</head>
	<body>
		<?php
			//include_once('php/api.php');
			$curl_handle=curl_init();

			//Set the request headers
			curl_setopt($curl_handle, CURLOPT_URL, 'https://api.safetyculture.io/templates/search?owner=me');
			curl_setopt($curl_handle, CURLOPT_HTTPHEADER, Array('Authorization: Bearer bc7285c55f83815975d7182d2103f815a7f9c347ce8c692e2bd92882d5877f7d'));
			curl_setopt($curl_handle, CURLOPT_USERAGENT, 'SC API CLIENT');
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
			
			//Execute the cURL request
			$query = curl_exec($curl_handle);
			curl_close($curl_handle);

			echo($query);
		?>
    <div class="row">
      <div class="col s6 m3">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Card Title</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient becaus</p>
          </div>
          <div class="card-action white-text">
          	SAFEEEEE
            <!--<a href="#">This is a link</a>
            <a href="#">This is a link</a>-->
          </div>
        </div>
      </div>
    </div>
	</body>
</html>