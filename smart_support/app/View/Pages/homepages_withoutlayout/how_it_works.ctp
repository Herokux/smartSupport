<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>White Panda | How It Works</title>
	<?php echo $this->Html->meta('icon','img/webicon.png');?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
		<!-- stylesheet for demo and examples -->

		<?php
		
            echo $this->Html->css('homepage/jquery.mCustomScrollbar');
            echo $this->Html->css('homepage/materialize');
            echo $this->Html->css('homepage/scrollbar_style');
            echo $this->Html->css('homepage/style');
            echo $this->Html->css('homepage/how_it_works');
            echo $this->fetch('css');
		
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('homepage/jquery.mCustomScrollbar.concat.min.js');
            echo $this->Html->script('homepage/materialize.js');
            echo $this->Html->script('homepage/init.js');
            echo $this->Html->script('homepage/custom.js');
			
	?>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

			<!-- custom scrollbar stylesheet -->


</head>

<body class="content">
	<nav id="mynavbar" class="black" role="navigation">
		<div class="nav-wrapper container">
			<?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false,'class'=>'brand-logo','id'=>'logo-container')); ?>
				<ul id="pages" class="left hide-on-med-and-down myhovereffect">
					<li class="waves-effect waves-light"><a href="#">Products & Pricing</a></li>
					<li class="waves-effect waves-light">
						<?php echo $this->Html->link("How It Works",array('controller'=>'Pages','action'=>'howItWorks'),array('escape' => false)); ?>
					</li>
					<li class="waves-effect waves-light"><a href="../blog/">Blog</a></li>
					<li class="waves-effect waves-light"><a href="#">About Us</a></li>
				</ul>
				<ul id="loginSignup" class="right hide-on-med-and-down">
					<li><a id="signup" class="waves-effect waves-light btn">Sign Up</a></li>
					<li><a id="login" class="waves-effect waves-dark btn">Login</a></li>
				</ul>

				<ul id="nav-mobile" class="side-nav">
					<li><a href="#">Navbar Link</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<div id="section1" class="section">
		<div class="row">
			<div id="header" class="row">
				<h4>Into of how it works in 1 line</h4>
				<br>
				<h7>Find the right person for the job here on Freelancer.com! With millions of talented experts from all around the world, you can get help with your business within minutes of posting your project!</h7>
			</div>
			<div class="col s4">
				<i class="large material-icons">receipt</i>
				<h6>1. Post Complete Content Requirements</h6>
			</div>
			<div id="col2" class="col s4">
				<i class="large material-icons">perm_identity</i>
				<h6>2. White Panda writers claim your work and start writing
</h6>
			</div>
			<div class="col s4">
				<i class="large material-icons">offline_pin</i>
				<h6>3. Receive original content tailor made just for you</h6>
			</div>
			<br>
			<div id="order_now" class="row">
				<?php echo $this->Html->link("Order a Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'class'=> 'waves-effect waves-light btn-large mybtn')); ?>
			</div>
		</div>
	</div>

	<div class="section mysequencedtiles">
		<div class="row">
			<div class="col s6 mytext">
				<h4>No bidding, no negotiation</h4>
				<br>
				<h6>Graphics indicating how easy it is for clients to order content. No searching or vetting writers needed, just order and relax.
</h6>
			</div>
			<div class="col s6 myimage">
				<?php echo $this->Html->image('how_it_works/spell%20checker%20update.png'); ?>
			</div>
		</div>
	</div>

	<div class="section mysequencedtiles">
		<div class="row">

			<div class="col s6 myimage">
				<?php echo $this->Html->image('how_it_works/spell%20checker%20update.png'); ?>
			</div>
			<div class="col s6 mytext">
				<h4>Writer Screening</h4>
				<br>
				<h6>Only 50 % acceptance rate for writers. Graphics indicating the tests writers have to go through. 
</h6>
			</div>
		</div>
	</div>

	<div class="section mysequencedtiles">
		<div class="row">
			<div class="col s6 mytext">
				<h4>Editing and Quality Control</h4>
				<br>
				<h6>Consciousness 10 percent acceptance rate for editors.
</h6>
			</div>
			<div class="col s6 myimage">
				<?php echo $this->Html->image('how_it_works/security%20update.png'); ?>
			</div>
		</div>
	</div>

	<div class="section mysequencedtiles">
		<div class="row">

			<div class="col s6 myimage">
				<?php echo $this->Html->image('how_it_works/chat%20update.png'); ?>
			</div>
			<div class="col s6 mytext">
				<h4>Revision period for clients</h4>
				<br>
				<h6>No text for this tile. Fill it. 
</h6>
			</div>
		</div>
	</div>

	<div class="section mysequencedtiles">
		<div class="row">
			<div class="col s6 mytext">
				<h4>Security/ Safety</h4>
				<br>
				<h6>No content for this tile. Fill it.
</h6>
			</div>
			<div class="col s6 myimage">
				<?php echo $this->Html->image('how_it_works/security%20update.png'); ?>
			</div>
		</div>
	</div>

	<div id="section_last" class="section">
		<div class="container">
			<h4>Easy enough? Order Content now!</h4>
			<br>
			<?php echo $this->Html->link("Way to Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'class'=>'waves-effect waves-dark btn-large inverse-btn')); ?>
		</div>
	</div>

	<div id="lastgrids" class="section">
		<div class="row">
			<div class="col s6">
				<?php echo $this->Html->image('how_it_works/work%20from%20anywhere.png'); ?>
					<h6>Work from anywhere</h6>
			</div>
			<div class="col s6">
				<?php echo $this->Html->image('how_it_works/check.png'); ?>
					<h6>Gurantee Payment</h6>
			</div>
			<div class="col s6">
				<?php echo $this->Html->image('how_it_works/writn%20white.png'); ?>
					<h6>Write in your area of expertise</h6>
			</div>
			<div class="col s6">
				<?php echo $this->Html->image('how_it_works/calender%20-%20white.png'); ?>
					<h6>Make your own schedule</h6>
			</div>

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