<br>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="col s12">
	<div class="row">
		<div id="form" class="col s8 offset-s2">
			<?php echo $this->Form->create('User', array('controller'=>'Users','action'=>'password_reset_success','class' => 'login-form z-depth-4 card-panel', 'id'=> 'login')); ?>
				<div class="row">
					<div class="input-field col s12 center">
						<?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
							<h6 class="center login-form-text">Account verified successfully.<br> Please reset your password.</h6>
					</div>
				</div>
			
				<div class="row margin">
					<div class="input-field col s12">
						<i class="prefix material-icons">perm_identity</i>
						<?php
						 echo $this->Form->input('password', array('label' => false,'div'=>false,'title'=>'Password must contain at least 6 alphanumeric characters','required','type'=>'password','pattern'=>'(?=.*\d)(?=.*[a-z-A-Z]).{6,}',  'class'=>'validate'));
						
						?>
						<label for="username" class="center-align">Create a password</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="prefix material-icons">perm_identity</i>
						<?php
						 echo $this->Form->input('cpassword', array('label' => false,'div'=>false,'id'=>'pass2','class'=>'textbox mypass','title'=>'Please enter the same Password as above','required','type'=>'password'));
						
						echo $this->Form->input('id',array('type'=>'hidden','value'=>$userInfo['id']));
						echo $this->Form->input('type',array('type'=>'hidden','value'=>$userInfo['type']));
						
						?>
						<label for="username" class="center-align">Confirm Password</label>
					</div>
				</div>
				<div class="row margin" style="margin-left: 4%;">
					<div class="g-recaptcha" data-sitekey="6LfMchwTAAAAAKD-2OWyG4KkaiUwKQ7G1uXs30Fl" data-callback="captchaConfirmed"></div>
				</div>
				<div class="row" id="submitbutton">
					<div class="input-field col s12">
						
						<?php echo $this->Form->input('Change password',array('type'=>'submit','div'=>false,'id'=>'login-submit-btn', 'class'=> 'btn waves-effect waves-light col s12' , 'label'=>false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m6 l6">
						<p class="margin medium-small"><?php echo $this->Html->link("Back to homepage", array('controller'=>'Pages','action'=>'home')); ?></p>
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
	
	function passwordmatch(){      
        //Store the password field objects into variables ...
        var mypass = document.getElementById('pass1').value;
        var confirminput= document.getElementById('pass2');
        confirminput.setAttribute('pattern', mypass);
    } 
            
</script>