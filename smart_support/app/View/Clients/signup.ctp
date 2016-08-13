<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="background:url(../img/homepage/testimonial-bg.jpg)">
<br><br>
    <div class="contain">
        <div class="row" style="width: 60%; margin-left: 20%; background:#fff; padding: 2% 3%;">
            <?php echo $this->Form->create('Client', array('controller'=>'Client','action'=>'signup', 'id'=> 'login')); ?>
                <div class="gap30"></div>
                <h5 class="center form-type">Clients</h5>
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
                    <label for="terms-agree">By registering, you agree to our.
                    </label>
                </div>
                <div class="input-field col s12 m12 l12"></div>
                <div class="input-field col s12 m12 l12">
                    <?php echo $this->Form->input('Sign Up',array('type'=>'submit','div'=>false,'
                    id'=>'login-submit-btn','label'=>false, 'class'=> 'btn waves-effect waves-light col s12 brand-color')); ?>
                </div>
            
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

</body>
</html>







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