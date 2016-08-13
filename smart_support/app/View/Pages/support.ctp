<!DOCTYPE html>
<html>
<head>
	<title>Coustmer Template</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
	<link rel="stylesheet" href="/project/smart_support/smart_support/css/pages/index.css">
</head>
<body>
	<div class="formbox">
		<div class="headpart">Contact customer support</div>
	        <form action="">
				<div class="input-field col s12">
					<input id="name" type="text" placeholder="Name" class="validate">
				</div>
				<div class="input-field col s12">
					<input id="email" placeholder="Email" type="email" class="validate">
				</div>
				<div id="client" class="input-field col s12 hidden">
					<?php echo $number; ?>
				</div>
				<select id="child_selection" class="browser-default">
				</select>
				<div class="gap60"></div>
				<a id="submitdetails" class="waves-effect waves-light btn">Request support</a>
	        </form>
      </div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="/project/smart_support/smart_support/js/pages/script.js" type="text/javascript"></script>
</body>
</html>