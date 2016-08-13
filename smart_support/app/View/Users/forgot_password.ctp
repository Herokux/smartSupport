<br>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="col s12">
	<div class="row">
		<div id="form" class="col s8 offset-s2">
			<?php echo $this->Form->create('User', array('controller'=>'Users','action'=>'forgot_password_mail_generate','class' => 'login-form z-depth-4 card-panel', 'id'=> 'login')); ?>
				<div class="row">
					<div class="input-field col s12 center">
						<?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
							<h6 class="center login-form-text">Password reset link will be sent to your mail id if it exists in our system.</h6>
					</div>
				</div>
			
				<div class="row margin">
					<div class="input-field col s12">
						<i class="prefix material-icons">perm_identity</i>
						<?php
						echo $this->Form->input('username', array('label' => false,'div'=>false, 'required','type'=>'email'));
						?>
						<label for="username" class="center-align">Enter your email</label>
					</div>
				</div>
				<div class="row margin" style="margin-left: 4%;">
					<div class="g-recaptcha" data-sitekey="6LfMchwTAAAAAKD-2OWyG4KkaiUwKQ7G1uXs30Fl" data-callback="captchaConfirmed"></div>
				</div>
				<div class="row" id="submitbutton">
					<div class="input-field col s12">
						
						<?php echo $this->Form->input('Send reset link',array('type'=>'submit','div'=>false,'id'=>'login-submit-btn', 'class'=> 'btn waves-effect waves-light col s12' , 'label'=>false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m6 l6">
						<p><?php echo $this->Html->link("Back to homepage", array('controller'=>'Pages','action'=>'home')); ?></p>
					</div>

				</div>


			</form>
			
		</div>


	</div>
</div>
<script>
	document.getElementById("submitbutton").style.display = "none";
	function captchaConfirmed(){
    document.getElementById("submitbutton").style.display = "block";
   }
</script>