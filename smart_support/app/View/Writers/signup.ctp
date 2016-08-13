<div class="contain">
    <div class="row">
        <?php echo $this->Form->create('Writer', array('controller'=>'Writers','action'=>'signup', 'id'=> 'login', 'onsubmit'=>"return (validate())")); ?>
            <div class="gap30"></div>
            <div class="center">
                <?php echo $this->Html->link($this->Html->image('full_logo_light2.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false, 'id'=>'icon')); ?>
            </div>
            <h5 class="center form-type">Writers</h5>
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
                <i class="prefix material-icons down">info</i>
                <?php
                echo $this->Form->input('experience', array(
                    'label'=>false,
                    'div'=>false,
                    'placeholder'=>'Experience',
                    'id'=>'selectedExperience',
                    'class'=>'textbox validate',
                    'options'=>array(
                        array( 
                            'name' => 'Your Experience',
                            'value' => '',
                            'disabled' => TRUE,
                            'selected' => TRUE
                        ),
                        array(
                            'name' => 'Starter',
                            'value' => 'Starter',
                        ),
                        array(
                            'name' => 'Part-Time',
                            'value' => 'Part-Time',
                        ),
                        array(
                            'name' => 'Professional',
                            'value' => 'Professional',
                        ))        
                ));
                ?>
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
                    <?php echo $this->Html->link("Terms of Use",array('controller'=>'Pages', 'action'=>'termsUse'),array('escape' => false, 'target' => '_blank')); ?>
                </label>
            </div>
            <div class="input-field col s12 m12 l12"></div>
            <div class="input-field col s12 m12 l12">
                <?php echo $this->Form->input('Sign Up',array('type'=>'submit','div'=>false,'
                    id'=>'login-submit-btn','label'=>false, 'class'=> 'btn waves-effect waves-light col s12')); ?>
            </div>
            <div class="input-field col s12 m12 l12">
                <p class="margin right-align medium-small">
                <?php echo $this->Html->link("Already registered ? Login now!", array('controller'=>'Users','action'=>'writer_login')); ?>
                </p>
            </div>
        </form>
    </div>
</div>

<script>
    function passwordmatch() {
        //Store the password field objects into variables ...
        var mypass = document.getElementById('pass1').value;
        var confirminput = document.getElementById('pass2');
        confirminput.setAttribute('pattern', mypass);
    }

    // (?=.*\d)
    // Validate form
    function validate() {
        var terms_agree = document.getElementById('terms-agree').checked;
        var experience = document.getElementById('selectedExperience').value;
        if (experience == "") {
            Materialize.toast('Choose an experience level', 2000);
            return false;
        }
        if (terms_agree == false) {
            Materialize.toast("You haven't agreed to the terms and conditions", 2000);
            return false;
        }
        return (true);
    }
</script>