<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>White Panda - The One Stop Shop for all your Content needs</title>

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Hotjar Tracking Code for whitepanda.in -->
        <link rel="stylesheet" type="text/css" href="http://whitepanda-lib.azurewebsites.net/White-Panda/css_frameworks/materialize/css/materialize.min.css">
        <?php
            echo $this->Html->css('login_signup/style');		
			echo $this->fetch('css');
			//echo $this->Html->script('custom.js');
			echo $this->Html->script('lib/jquery.min.js');
            echo $this->Html->script('lib/materialize.js');
            echo $this->Html->script('login-signup/init.js');
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo $this->Html->meta('icon','img/webicon.png');?>
		
	</head>
	<body>
		
		<div class="wp-alert">
            <?php
                echo $this->Session->flash('success');
                echo $this->Session->flash('error');
                echo $this->Session->flash('auth', array('params'=>array('class'=>'alert-box radius alert')));
            ?>
        </div>
			<?php echo $content_for_layout; ?>
	</body>
	
</html>