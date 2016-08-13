<div class="col s12" style="margin-top:11%;">
    <div class="row">
        <div id="form" class="col s8 offset-s2">
            <form class="login-form z-depth-4 card-panel">
                <div class="row">
                    <div class="input-field col s12 center">
                        <?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
                            <h5 class="center login-form-text">Business</h5>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12 center">
                        <h5>Your account has been created successfully. Thank you for choosing White Panda as your source for awesome content.</h5>
                    </div>
                </div>
               
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small">
                            <?php echo $this->Html->link("Continue to login page!", array('controller'=>'Users','action'=>'business_login')); ?>
                        </p>
                    </div>


                </div>


            </form>
        </div>


    </div>
</div>