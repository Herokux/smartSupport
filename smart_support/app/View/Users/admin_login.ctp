
<div class="form-cover">
		<div class="form-login">
			<?php echo $this->Form->create('User', array('controller'=>'Users','action'=>'login','class' => 'login-form z-depth-4 card-panel', 'id'=> 'login')); ?>



				<div class="row">
					<div class="input-field center">
						<?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
							<h5 class="center login-form-text">Admins</h5>
						<h6 style="color:red">
						<?php
							if (isset($this->request->query['errorkey'])){
								if($this->request->query['errorkey'] == 1){
									echo "Incorrect username or password";
								}
							}
						?>
						</h6>

                        <h6 style="color:red">
 						<?php
 							if (isset($this->request->query['errorkey'])){
 								if($this->request->query['errorkey'] == 2){
 									echo "You are not registered under this section";
 								}
 							}
 						?>
 						</h6>

                        <h6 style="color:#11A339">
						<?php
							if (isset($this->request->query['userExist'])){
								if($this->request->query['userExist'] == 1){
									echo "Looks like you are already registered!";
								}
							}
						?>
						</h6>
                        <h6 style="color:#11A339">
						<?php
							if (isset($this->request->query['emailConfirmed'])){
								if($this->request->query['emailConfirmed'] == 1){
									echo "Your account has been successfully activated!";
								}
							}
						?>
						</h6>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field">
						<i class="prefix material-icons">perm_identity</i>
						<?php
                    echo $this->Form->input('username', array('label' => false,'div'=>false, 'required','type'=>'email', 'class'=>'validate'));
                    ?>

						<label for="username">Enter your Email</label>

					</div>
				</div>





				<div class="row margin">
					<div class="input-field">
						<i class="prefix material-icons">lock_outline</i>
						<?php
                    echo $this->Form->input('password', array('label' => false,'div'=>false, 'required','type'=>'password', 'class'=>'validate'));
                    echo $this->Form->input('type',array('type'=>'hidden','value'=>'Admin'));
                    ?>
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m12 l12  login-text">
						<input type="checkbox" id="remember-me" />
						<label for="remember-me">Remember me</label>
					</div>
				</div>

						<?php echo $this->Form->input('Login',array('type'=>'submit','div'=>false,'id'=>'login-submit-btn', 'class'=> 'brand-color btn waves-effect waves-light full-space' , 'label'=>false)); ?>
				<div class="row">
					<div class="input-field col s6 m6 l6">
						<p class="margin medium-small weight"><?php echo $this->Html->link("Register !", array('controller'=>'Writers','action'=>'signup'),array('class'=>'brand-text weight')); ?></p>
					</div>
					<div class="input-field col s6 m6 l6">
						<p class="margin right-align medium-small weight"><?php echo $this->Html->link("Forgot password ?", array('controller'=>'Users','action'=>'forgot_password'),array('class'=>'brand-text weight')); ?></p>
					</div>


				</div>


			</form>
		</div>


	</div>
