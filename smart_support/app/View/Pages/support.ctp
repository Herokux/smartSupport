<!DOCTYPE html>
<html>
<head>
	<title>Coustmer Template</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
	<?php echo $this->Html->css('pages/index'); ?>
</head>
<body>
	<div class="formbox">

		<div class="headpart">Contact customer support</div>
			<div class="row center-align" style="padding-top: 96px; display:none;">
				<div id='myloader' class="preloader-wrapper active">
				    <div class="spinner-layer spinner-red-only">
				      <div class="circle-clipper left">
				        <div class="circle"></div>
				      </div><div class="gap-patch">
				        <div class="circle"></div>
				      </div><div class="circle-clipper right">
				        <div class="circle"></div>
				      </div>
				    </div>
				</div>

				<div id="connected" style="display: none;">
					<i class="large material-icons">email</i>
				</div>
			</div>

	        <form action="" id="createCustomerContactForm">
				<div class="input-field col s12">
					<input id="name" type="text" placeholder="Name" class="validate">
				</div>
				<div class="input-field col s12">
					<input id="email" placeholder="Email" type="email" class="validate">
				</div>
				<div class="input-field col s12 hidden">
					<input id="client" type="hidden" value="<?php echo $number; ?>">
				</div>
				<select id="child_selection" class="browser-default">
				</select>
				<div class="gap60"></div>
				<a id="submitdetails" class="waves-effect waves-light btn">Request support</a>
	        </form>

      </div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<?php echo $this->Html->script('pages/script.js'); ?>
</body>
</html>