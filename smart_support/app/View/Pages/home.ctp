<!DOCTYPE html>
<html>
<head>
  <title>Smart Support</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <?php echo $this->Html->css('style.css'); ?>
</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'client_login'));  ?></li>
        <li class="divider"></li>
        <li><?php echo $this->Html->link('Sign up', array('controller' => 'clients', 'action' => 'signup'));  ?></li>
    </ul>
    <nav>
        <div class="nav-wrapper container">
            <a href="#!" class="brand-logo">Smart Support</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a class="dropdown-button" href="#" data-activates="dropdown1">Connect<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <div class="valign-wrapper center-align">
        <h5 class="valign">SmartSupport</h5>
    </div>
    <div class="section">
        <h2>Section</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, omnis modi explicabo enim quam temporibus, delectus ullam voluptatibus, cum, quis quo pariatur. Maxime illum, libero sint hic dolorum fugit consequatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. In sapiente impedit inventore, incidunt error perferendis dolorum molestias quod nemo similique eum ut maiores. Eos ullam, excepturi quam eligendi quos accusantium! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora mollitia distinctio, aliquam unde. Ducimus aut quisquam, a reprehenderit. Magni natus libero, numquam ullam quos distinctio non corporis aspernatur rerum, consequatur!</p>
    </div>
    <div class="supportBox">
        <div class="empty">
            <button class="waves-effect waves-light btn">Need Customer Support</button>
        </div>
    </div>
    <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.parallax').parallax();
            $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                constrain_width: false, 
                hover: true, 
                gutter: 0, 
                belowOrigin: false, 
                alignment: 'left' 
            });
        });
    </script>
</body>
</html>