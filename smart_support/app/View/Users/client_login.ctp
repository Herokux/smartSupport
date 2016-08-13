<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body style="background:url(../img/homepage/testimonial-bg.jpg)">
<br><br><br><br><br><br><br>
    <div class="contain">
        <div class="row" style="width: 60%; margin-left: 20%;">
            <div class="form-cover">
					<div class="form-login">
							<?php echo $this->Form->create('User', array('controller'=>'Users','action'=>'login','class' => 'login-form z-depth-4 card-panel', 'id'=> 'login')); ?>
							<div class="row">
								<div class="input-field center">
									<h5 class="center login-form-text">Clients</h5>
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
											if (isset($this->request->query['registered'])){
												if($this->request->query['registered'] == 1){
													echo "You are successfully registered. Try login now!";
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

									<label for="username">Enter your email</label>

								</div>
							</div>
							<div class="row margin">
								<div class="input-field">
									<i class="prefix material-icons">lock_outline</i>
									<?php
			                    echo $this->Form->input('password', array('label' => false,'div'=>false, 'required','type'=>'password', 'class'=>'validate'));
			                    echo $this->Form->input('type',array('type'=>'hidden','value'=>'Client'));
			                    ?>
									<label for="password">Password</label>
								</div>
							</div>
				
							<?php echo $this->Form->input('Login',array('type'=>'submit','div'=>false,'id'=>'login-submit-btn', 'class'=> 'btn waves-effect waves-light full-space' , 'label'=>false)); ?>
			
						</form>
					</div>
			</div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

</body>
</html>





















