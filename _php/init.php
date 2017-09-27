<?php
	function init_head($dir){
		echo("
			<script
	  		src='https://code.jquery.com/jquery-3.2.1.min.js'
	  		integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4='
	  		crossorigin='anonymous'>
	  		</script>

			<!-- Compiled and minified CSS -->
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css'>

			<!-- Compiled and minified JavaScript -->
			<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js'></script>

			<!--Let browser know website is optimized for mobile-->
	      	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>

	      	<!--Google Material Icons-->
	      	<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>

	      	<!--Include page navigation script-->
			<script src='" . $dir . "_js/pjax.js'></script>

			<!--NProgress JS-->
			<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

			<!--NProgress CSS (referenced locally so we can use our custom style)-->
			<link rel='stylesheet' href='" . $dir . "_css/nprog.css'/>

			<!--Include mobile optimisations-->
			<link rel='stylesheet' href='" . $dir . "_css/mobile.css'>

			<!--Audit percentage CSS-->
			<link rel='stylesheet' href='" . $dir . "_css/audit.css'>

			<!--ProgressJS-->
			<script src='" . $dir . "_js/prog.js'></script>

	      	<script>
	      		pjax.connect({
					'container': 'content',
					'beforeSend': function(e){ NProgress.start(); },
					'complete': function(e){ NProgress.done(); $('#content').fadeIn('fast'); },
				});
	      	</script>
		");
	}

	function init_nav($dir){
		echo("
			<header>
				<div class='navbar-fixed'>
					<nav>
				    	<div class='nav-wrapper' style='background-color: #245776 !important'>
				      		<a href='#' class='brand-logo'></a>
				      		<div id='nav-mobile' class='left'>
				      			<a href='/'><img class='navlogo' src='" . $dir . "_img/logo.svg'></a>
				      		</div>
				      		<div class='left navtext' style='padding-top: 3px'>AUDIT SUMMARY</div>
					    </div>
					</nav>
				</div>
			</header>
		");
	}
?>