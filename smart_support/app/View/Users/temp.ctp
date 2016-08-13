


        <div class="bus_login">
            <br/>
            <br/>
            <h1>Business</h1>
            <h2>Welcome Back</h2>
            
            
            <?php echo $this->Form->create('User', array('controller'=>'Users','action'=>'login','class' => 'f1')); ?>
                <fieldset>
                <legend ><h3>Let's get you signed in.</h3></legend>
                    <?php
                    echo $this->Form->input('username', array('label' => false,'div'=>false,'placeholder'=>'Your Email ID','id'=>'other','class'=>'textbox','title'=>'Your email id','required','type'=>'email'));
                    ?><br>
                    <?php
                    echo $this->Form->input('password', array('label' => false,'div'=>false,'placeholder'=>'Password','id'=>'other','class'=>'textbox','title'=>'First Name','required','type'=>'password'));
                    echo $this->Form->input('type',array('type'=>'hidden','value'=>'Business'));
                    ?>
					

                    <br>                    
                    <input  type="checkbox" name="remember" value="remember_me"> Remember me  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
                    <a id="forgot" href="#passwd" >Forgot password?</a>
                    <br>
                    
                    <?php echo $this->Form->input('Login',array('type'=>'submit','div'=>false,'id'=>'create','label'=>false)); ?><br/>
                    
                </fieldset>
                
           
           
<!--
            <form class='forgot_pass' action="forgotPassword/forgotBusiness.php" method="post" id="passwd">
                <h3>Enter your email id below and we will<br> send you a link to reset your password</h3>
                <input required id='other' class='textbox' type="email" name="email" placeholder='Your Email ID' ><br>
				<input name="action" type="hidden" value="password" />
                <button id='create' type="submit" >Send Password Reset Instructions</button>
                
            </form>
-->
        </div>
  