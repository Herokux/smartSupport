<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>White Panda - The One Stop Shop for all your Content needs</title>

        <!-- Hotjar Tracking Code for whitepanda.in -->
        <?php
            echo $this->Html->css('reset');
            
            echo $this->Html->css('businessSignUp');
            echo $this->Html->css('Login');
			echo $this->fetch('css');
			//echo $this->Html->script('custom.js');
			echo $this->Html->script('jquery-1.11.1.js');
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo $this->Html->meta('icon','img/webicon.png');?>
		<script type="text/javascript">
		setTimeout(function(){
			$('.alert-box').fadeOut(800);
		},2000);
		</script>
	</head>
	<body >
		<div class="wp_logo">
			<?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false)); ?>
		</div>
		<div class="wp-alert">
            <?php
                echo $this->Session->flash('success');
                echo $this->Session->flash('error');
                echo $this->Session->flash('auth', array('params'=>array('class'=>'alert-box radius alert')));
            ?>
        </div>
		<div class="row" id="main-content">
		<?php echo $content_for_layout; ?>
		</div>
	</body>
	
</html>