<br><br><br>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="col s12">
	<div class="row">
		<div id="form" class="col s8 offset-s2">
			<div class="login-form z-depth-4 card-panel" id='login'>
				<div class="row">
					<div class="input-field col s12 center">
						<?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
						<br><br>
							<h5 style="font-size:19px" class="center login-form-text">Reset link sent to your mail id. Please follow the mentioned steps to reset your password.<br><br>If you have not received the reset link in your mail, kindly check your spam folder</h5>
					</div>
				</div>
			
				<div class="row">
					<div class="input-field col s6 m6 l6">
						<p class="margin medium-small"><?php echo $this->Html->link("Back to homepage", array('controller'=>'Pages','action'=>'home')); ?></p>
					</div>

				</div>


			</div>			
		</div>


	</div>
</div>
<script>
	document.getElementById("submitbutton").style.display = "none";
	function captchaConfirmed(){
    document.getElementById("submitbutton").style.display = "block";
   }
</script>