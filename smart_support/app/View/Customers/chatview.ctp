<!DOCTYPE html>
<html>
<head>
	<title>Customer Support Window</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <?php echo $this->Html->meta('icon','img/_webicon.png');?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
    <?php 	 
    	// echo $this->Html->css('pages/chatview');

    ?>
    <?php echo $this->Html->css("client/dashboard"); ?>
</head>



<body ng-app="customerApp" ng-controller="customerController">
	<div class="contain">
		<br>
		<h4 class="center-align">Smart Service</h4>
		<br>
		<div class="row">
			<div class="col s6 offset-s3">

				<div ng-init="ClientsessionID = '<?php echo $assignedClientSession; ?>'"></div>
				<div ng-init="customerSessionID = '<?php echo $customerID; ?>'"></div>

				<div class="card blue-grey darken-1">
		            <div class="card-content white-text" style="height: 400px; overflow-y: scroll;">
		                <ul ng-hide = "viewMessagebox">
		                <div class="chatinit">New Chat Initialised</div>
                            <div class="chatmessage" ng-class="{'right': z.sender == 'customer'}"  ng-repeat="z in clientMessages">{{z.message}} <br> </div>
		                </ul>

		            </div>
		        </div>
		        <form ng-submit="clientSendMessageTrigger(currentMessage)">
		            <div class="input-field row">
		                <input ng-model="currentMessage" type="tel" class="validate" placeholder="Type">
		            </div>
		        </form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>


	<!-- <script type="text/javascript" src="/project/smart_support/smart_support/js/pages/index.js"></script> -->

	<?php
        echo $this->Html->script('lib/angular.min.js');
        echo $this->Html->script('lib/toaster.js');    
        echo $this->Html->script('customer/customerAppController.js');
        // echo $this->Html->script('client/script.js');
    ?>
</body>
</html>