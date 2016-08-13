<div class="col s12" style="margin-top:6%;">
    <div class="row">
        <div id="form" class="col s8 offset-s2">
            <form class="login-form z-depth-4 card-panel">
                <div class="row">
                    <div class="input-field col s12 center">
                        <?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
                            <h5 class="center login-form-text">Writers</h5>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12 center">
                        <h5>Please click on the verification link sent to your email account. If not received, check your spam folder or try generating anothing link.</h5>
                    </div>
                </div>
               
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small">
                            <?php echo $this->Html->link("Continue to login page!", array('controller'=>'Users','action'=>'writer_login')); ?>
                        </p>
                    </div>


                </div>


            </form>
        </div>


    </div>
</div>