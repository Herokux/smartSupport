<!DOCTYPE html>
<html>
<head>
	<title>SignUp Success</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
	<link rel="stylesheet" href="../css/client/signup.css">
</head>
<body>
	<div class="row">
		<div class="col s12 s6 offset-s3">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<span class="card-title">Congratulations</span>
					<p>
						You have successfully claimed you API key : <a href="">http://localhost/project/smart_support/smart_support/pages/support/<?php
						echo $activeUser['User']['id']; ?></a></p>
				</div>
				<div class="card-action">
					<a href="./dashboard">DashBoard</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>