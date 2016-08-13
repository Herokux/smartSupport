<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->meta('icon','img/webicon.png');?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
	<!-- stylesheet for demo and examples -->


	<!-- custom scrollbar stylesheet -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php
		
            echo $this->Html->css('homepage/jquery.mCustomScrollbar');
            echo $this->Html->css('homepage/materialize');
            echo $this->Html->css('homepage/scrollbar_style');
            echo $this->Html->css('homepage/style');
            echo $this->fetch('css');
		
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('homepage/jquery.mCustomScrollbar.concat.min.js');
            echo $this->Html->script('homepage/materialize.js');
            echo $this->Html->script('homepage/init.js');
            echo $this->Html->script('homepage/custom.js');
			
	?>
	
</head>

<body class="content">
	<nav id="mynavbar" class="black" role="navigation">
		<div class="nav-wrapper container">
			<?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false,'class'=>'brand-logo','id'=>'logo-container')); ?>
				<ul id="pages" class="left hide-on-med-and-down myhovereffect">
					<li class="waves-effect waves-light">
						<li class="waves-effect waves-light">
							<?php echo $this->Html->link("Products & Pricing",array('controller'=>'Pages','action'=>'home'),array('escape' => false)); ?>
						</li>
						<li class="waves-effect waves-light">
							<?php echo $this->Html->link("How It Works",array('controller'=>'Pages','action'=>'howItWorks'),array('escape' => false)); ?>
						</li>
						<li class="waves-effect waves-light"><a href="../blog/">Blog</a></li>
						<li class="waves-effect waves-light"><a href="#">About Us</a></li>
				</ul>
				<ul id="loginSignup" class="right hide-on-med-and-down">
					<li>
						<a id="signup" class="waves-effect waves-light dropdown-button btn" data-activates='signup_a'>Sign Up</a>
						<!-- Dropdown Structure -->
						<ul id='signup_a' class='dropdown-content mydropdown'>
							<li><?php echo $this->Html->link("Business",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false)); ?></li>
							<li class="divider"></li>
							<li><?php echo $this->Html->link("Writers",array('controller'=>'Writers','action'=>'signup'),array('escape' => false)); ?></li>
						</ul>
					</li>

					<li>
						<a id="login" class="waves-effect waves-dark dropdown-button btn" data-activates='login_a'>Login</a>
						<!-- Dropdown Structure -->
						<ul id='login_a' class='dropdown-content mydropdown'>
							<li><?php echo $this->Html->link("Business",array('controller'=>'Users','action'=>'business_login'),array('escape' => false)); ?></li>
							<li class="divider"></li>
							<li><?php echo $this->Html->link("Writers",array('controller'=>'Users','action'=>'writer_login'),array('escape' => false)); ?></li>
						</ul>
					</li>
				</ul>

				<ul id="nav-mobile" class="side-nav">
					<li><a href="#">Navbar Link</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<div id="section1" class="row">
		<div id="intro" class="col s6">
			<h2>Our tagline will go here in two lines</h2>
			<h5>Child notation in lines</h5>
			<br>
			<br>
			<div class="row">
				<div class="col s6">
					<?php echo $this->Html->link("Order Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'id'=>'signup', 'class'=>'waves-effect waves-light btn-large')); ?>
				</div>
				<div class="col s6">
					<?php echo $this->Html->link("Start Writing",array('controller'=>'Writers','action'=>'signup'),array('escape' => false, 'id'=>'mybutton-inverse', 'class'=>'waves-effect waves-dark btn-large')); ?>
				</div>
			</div>
		</div>

	</div>

	<div id="section2" class="section" style="color: black; text-align:center">


		<br>
		<br>
		<br>

		<h1>Intro stripe</h1>
		<br>
		<br>
	</div>


	<div id="stripes" class="section">
		<div id="stripe1" class="row">
			<div class="col s6">
				<h3>SIMPLE</h3>
				<h6>Content Creation could never be easier!
Simply type in your requirements,
and we’ll take care of the rest.</h6>
			</div>
		</div>
		<div id="stripe2" class="row">
			<div class="col s6">
				<h3>PROFESSIONAL</h3>
				<h6>Your content will be on your table within 5 
week days. Don’t like your content? Request
as many revisions you like within 72 hours.</h6>
			</div>
		</div>
		<div id="stripe3" class="row">
			<div class="col s6">
				<h3>SMART</h3>
				<h6>Think of us as a “black box”. You don’t really care what
happens with what you put in, because what comes out
is just so darn good!</h6>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="mymarquee">
			<ul id="marquee_1">
				<li>
					<?php echo $this->Html->image('homepage/clients/image.png'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/logo%20(1).png'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/logo%20(2).png'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/logo%20(3).png'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/logo%20(4).png'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/logo.png'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/vsd-logo.jpg'); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/cretif.png'); ?>
				</li>


			</ul>
		</div>
	</div>
	<br>
	<br>
	<br>

	<div id="section4" class="row center-align">
		<h4>In its mision to clean up the world of online content,</h4>
		<h4>White Panda offers customized solutions to every business.</h4>
		<br>
		<h5>Let's talk about how the right content can help our business grow.</h5>
		<br>
		<div class="row">
			<div class="col s6"><a id="talk" class="waves-effect waves-light btn-large mybtn">Talk to us</a></div>
			<div class="col s6"><a id="faq" class="waves-effect waves-dark btn-large inverse-btn" href="../faqs">FAQs</a></div>
		</div>
	</div>




	<br>
	<br>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="grey-text"><?php echo $this->Html->image('homepage/logo.png'); ?></h5>
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
				Copyright © 2015 whitepanda.in. All rights reserved.
			</div>
		</div>
	</footer>







	
</body>

</html>