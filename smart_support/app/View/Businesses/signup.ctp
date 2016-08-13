<div class="contain">
    <div class="row">
        <?php echo $this->Form->create('Business', array('controller'=>'Businesses','action'=>'signup', 'id'=> 'login', 'onsubmit'=>"return (validate())")); ?>
            <div class="gap30"></div>
            <div class="center">
                <?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
            </div>
            <h5 class="center form-type">Business</h5>
            <div class="gap20"></div>
            <div class="input-field col s12 m6 l6">
                <i class="prefix material-icons down">perm_identity</i>
                <?php
                    echo $this->Form->input('firstname', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate'));
                    ?>
                <label for="firstname">First Name</label>
            </div>
            <div class="input-field col s12 m6 l6 resp">
                <?php
                    echo $this->Form->input('lastname', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate'));
                    ?>
                <label for="lastname">Last Name</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <i class="prefix material-icons down">work</i>
                <?php
                    echo $this->Form->input('company', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate'));
                    ?>
                <label for="company">Name of your Company</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <i class="prefix material-icons down">stay_current_portrait</i>
                <?php
                    echo $this->Form->input('mobile', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate', 'pattern'=>"[789][0-9]{9}", 'title'=>'Enter a valid phone number'));
                ?>
                <label for="mobile">Contact Number</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <i class="prefix material-icons down">email</i>
                <?php
                    echo $this->Form->input('username', array('label' => false,'div'=>false, 'required','type'=>'email', 'class'=>'validate'));
                    ?>
                <label for="username">Your Email ID</label>
            </div>

            <div class="input-field col s12 m12 l12">
                <i class="prefix material-icons down">lock_outline</i>
                <?php
                    echo $this->Form->input('password', array('label' => false,'div'=>false, 'required','type'=>'password', 'class'=>'validate', 'id'=>'pass1', 'pattern'=>'(?=.*[a-z-A-Z]).{6,}', 'title'=>'Password must contain at least 8 alphanumeric characters'));
                    ?>
                <label for="password">Your Password</label>
            </div>

            <div class="input-field col s12 m12 l12">
                <i class="prefix material-icons down">spellcheck</i>
                <?php
                    echo $this->Form->input('cpassword', array('label' => false,'div'=>false, 'required','type'=>'password', 'class'=>'validate', 'id'=>'pass2', 'onchange' => "passwordmatch()", 'title'=>'Please enter the same Password as above'));
                ?>
                <label for="cpassword">Confirm Password</label>
            </div>


            <div class="input-field col s12 m12 l12">
                <?php
                    echo $this->Form->checkbox('termsofuse', array(
                        'value' => 1,
                        'hiddenField' => 0,
                        'default'=>0,
                        'id'=> 'terms-agree',
                        'class'=>'validate',
                        'title'=> "You haven't agreed to the policy"
                ));
                ?>
                <label for="terms-agree">By registering, you agree to our
                    <?php echo $this->Html->link("Terms of Use",array('controller'=>'Pages', 'action'=>'termsUse'),array('escape' => false, 'target' => '_blank','class'=>'brand-text')); ?>
                </label>
            </div>
            <div class="input-field col s12 m12 l12"></div>
            <div class="input-field col s12 m12 l12">
                <?php echo $this->Form->input('Sign Up',array('type'=>'submit','div'=>false,'
                id'=>'login-submit-btn','label'=>false, 'class'=> 'btn waves-effect waves-light col s12 brand-color')); ?>
            </div>
            <div class="input-field col s12 m12 l12">
                <p class="margin right-align medium-small">
                    <?php echo $this->Html->link("Already registered ? Login now!", array('controller'=>'Users','action'=>'business_login')); ?>
                </p>
            </div>
        </form>
    </div>
</div>













<!-- <div class="row form-cover">
    <div class="col s10 offset-s1">
        <div class="row" id="signup">
            <div id="form" class="col s8 offset-s2">
                <?php echo $this->Form->create('Business', array('controller'=>'Businesses','action'=>'signup','class' => 'login-form z-depth-4 card-panel', 'id'=> 'login', 'onsubmit'=>"return (validate())")); ?>
                    <div class="row">
                        <div class="input-field col s12 center">
                            <?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
                                <h5 class="center login-form-text">Business</h5>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s6">
                            <i class="prefix material-icons">perm_identity</i>
                            <?php
                    echo $this->Form->input('firstname', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate'));
                    ?>
                                <label for="firstname" class="center-align">First Name</label>
                        </div>

                        <div class="input-field col s6">
                            <?php
                    echo $this->Form->input('lastname', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate'));
                    ?>
                                <label for="lastname" class="center-align">Last Name</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="prefix material-icons">work</i>
                            <?php
                    echo $this->Form->input('company', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate'));
                    ?>
                                <label for="company" class="center-align">Name of your Company</label>
                        </div>
                    </div>


                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="prefix material-icons">stay_current_portrait</i>
                            <?php
                    echo $this->Form->input('mobile', array('label' => false,'div'=>false, 'required','type'=>'text', 'class'=>'validate', 'pattern'=>"[789][0-9]{9}", 'title'=>'Enter a valid phone number'));
                    ?>
                                <label for="mobile" class="center-align">Contact Number</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="prefix material-icons">email</i>
                            <?php
                    echo $this->Form->input('username', array('label' => false,'div'=>false, 'required','type'=>'email', 'class'=>'validate'));
                    ?>
                                <label for="username" class="center-align">Your Email ID</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="prefix material-icons">lock_outline</i>
                            <?php
                    echo $this->Form->input('password', array('label' => false,'div'=>false, 'required','type'=>'password', 'class'=>'validate', 'id'=>'pass1', 'pattern'=>'(?=.*\d)(?=.*[a-z-A-Z]).{6,}', 'title'=>'Password must contain at least 8 alphanumeric characters'));
                    ?>
                                <label for="password" class="center-align">Your Password</label>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="prefix material-icons">spellcheck</i>
                            <?php
                    echo $this->Form->input('cpassword', array('label' => false,'div'=>false, 'required','type'=>'password', 'class'=>'validate', 'id'=>'pass2', 'onchange' => "passwordmatch()", 'title'=>'Please enter the same Password as above'));
                    ?>
                                <label for="cpassword" class="center-align">Confirm Password</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12 login-text">

                    <?php
                        echo $this->Form->checkbox('termsofuse', array(
                            'value' => 1,
                            'hiddenField' => 0,
                            'default'=>0,
                            'id'=> 'terms-agree',
                            'class'=>'validate',
                            'title'=> "You haven't agreed to the policy"
                        ));
                        ?>
                                <label for="terms-agree">By registering, you agree to our
                                    <?php echo $this->Html->link("Terms of Use",array('controller'=>'Pages', 'action'=>'termsUse'),array('escape' => false, 'target' => '_blank')); ?>
                                </label>
                        </div>
                    </div>
                    <div c lass="row">
                        <div class="input-field col s12">
                            <?php echo $this->Form->input('Sign Up',array('type'=>'submit','div'=>false,'
                id'=>'login-submit-btn','label'=>false, 'class'=> 'btn waves-effect waves-light col s12')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small">
                                <?php echo $this->Html->link("Already registered ? Login now!", array('controller'=>'Users','action'=>'business_login')); ?>
                            </p>
                        </div>


                    </div>


                </form>
            </div>


        </div>
    </div>
</div> -->
<script>
    function passwordmatch() {
        //Store the password field objects into variables ...
        var mypass = document.getElementById('pass1').value;
        var confirminput = document.getElementById('pass2');
        confirminput.setAttribute('pattern', mypass);
    }


    // Validate form
    function validate() {
        var terms_agree = document.getElementById('terms-agree').checked;
        if (terms_agree == false) {
            Materialize.toast("You haven't agreed to the terms and conditions", 2000);
            return false;
        }
        return (true);
    }
</script>