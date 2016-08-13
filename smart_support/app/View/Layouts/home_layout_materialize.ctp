<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml"

xmlns:og="http://ogp.me/ns#"

xmlns:fb="http://www.facebook.com/2008/fbml"><!--formatted-->

<html lang="en">
<!--<![endif]-->


<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="google-site-verification" content="1BQr8PkQV2zID4MLTMpOAJ8ckv6Qzg-98Kcq8uikfLU" />
    <link rel="canonical" href="http://whitepanda.in/" />
	<title>
		<?php echo $title_for_layout; ?>
	</title>

	<?php echo $this->Html->meta ('favicon.ico', 'img/_webicon.png', array (
    'type' => 'icon', 'rel'=> 'icon'
	));?>

	<!-- Facebook Graph -->
	<meta property="og:title" content="White Panda" />

	<meta property="og:type" content="website" />

	<meta property="og:image" content="http://whitepanda.in/img/logo_comp.png"/>

	<meta property="og:url" content="http://whitepanda.in/" />

	<meta property="og:site_name" content="White Panda | One stop shop for all your content needs" /><!--formatted-->

    <meta property="fb:pages" content="273881599487987" />



	<link rel=”image_src” href=”/img/_webicon.png”/>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
		<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
		<!-- Hotjar Tracking Code for whitepanda.in -->
    
    
    <!-- Azure css server  ONLINE -->
    <link rel="stylesheet" type="text/css" href="http://whitepanda-lib.azurewebsites.net/White-Panda/css_frameworks/materialize/css/materialize.min.css">
    
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
		<?php

            //Local css script
//            echo $this->Html->css('lib/materialize.min');
    
    
            echo $this->Html->css('homepage/style');
            echo $this->fetch('css');

          ?>
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>

			<meta name="description" content="White Panda is a Content Development platform connecting businesses in need of content to talented freelance writers." />
			<meta name="keywords" content="White, Panda, White Panda, Content, Writing, Content Writing, content writing jobs, Freelancer,   Marketing, Content Marketing, Freelance, Writer, Freelance Writer, India, Asia, Local, Blog, Article, Website Content, Want Content Writer, Content Writer India, Freelance writer India, Order Content, Order, Copy, Copywriting, Hire Content Writer, Hire Writer, Indian, How to write blog, How to do Content Marketing, I want to work as a content writer, Work from home, Cheap Content, Low Cost content, Reasonable Prices, How to get Content, Buy Content, Where can I buy content, Where can I order content, Why should i do content marketing, Hire writer, Appoint writer, Outsource writer, Curate Content, IIT, Indian Institute of Technology, Gandhinagar, Startup" />
			<meta name="robots" content="index, follow" />
			<meta name="revisit-after" content="1 days" />




			<!--Start of Zopim Live Chat Script-->

			<!--  SCRIPT SHIFTED TO homepage/custom.js -->
			<!--End of Zopim Live Chat Script-->


</head>

<body >
	<nav id="mynavbar" class="black" role="navigation">
		<div class="nav-wrapper container">
			<?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false,'class'=>'brand-logo','id'=>'logo-container')); ?>
				<ul id="pages" class="left hide-on-med-and-down myhovereffect">
					<li class="waves-effect waves-light">
						<?php echo $this->Html->link("Products & Pricing",array('controller'=>'Pages','action'=>'productsAndPricing'),array('escape' => false)); ?>
					</li>
					<li class="waves-effect waves-light">
						<?php echo $this->Html->link("How It Works",array('controller'=>'Pages','action'=>'howItWorks'),array('escape' => false)); ?>
					</li>
					<li class="waves-effect waves-light"><a href="../blog/">Blog</a></li>
					<li class="waves-effect waves-light">
						<?php echo $this->Html->link("About Us",array('controller'=>'Pages','action'=>'aboutus'),array('escape' => false)); ?>
					</li>
				</ul>
				<ul id="loginSignup" class="right hide-on-med-and-down">
					<li>
						<a id="signup" class="waves-effect waves-light dropdown-button btn" data-activates='signup_a'>Sign Up</a>
						<!-- Dropdown Structure -->
						<ul id='signup_a' class='dropdown-content mydropdown brand-color'>
							<li>
								<?php echo $this->Html->link("Business",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false)); ?>
							</li>
							<li class="divider"></li>
							<li>
								<?php echo $this->Html->link("Writers",array('controller'=>'Writers','action'=>'signup'),array('escape' => false)); ?>
							</li>
						</ul>
					</li>

					<li>
						<a id="login" class="waves-effect waves-dark dropdown-button btn" data-activates='login_a'>Login</a>
						<!-- Dropdown Structure -->
						<ul id='login_a' class='dropdown-content mydropdown'>
							<li>
								<?php echo $this->Html->link("Business",array('controller'=>'Users','action'=>'business_login'),array('escape' => false)); ?>
							</li>
							<li class="divider"></li>
							<li>
								<?php echo $this->Html->link("Writers",array('controller'=>'Users','action'=>'writer_login'),array('escape' => false)); ?>
							</li>
						</ul>
					</li>
				</ul>

				<ul id="nav-mobile" class="side-nav collapsible collapsible-accordion">
					<li class="bold">
						<a href="#!" class="collapsible-header waves-effect waves-teal bold">Sign Up</a>
						<!-- Dropdown Structure -->
						<div class='collapsible-body'>
							<ul>
								<li>
									<?php echo $this->Html->link("Business",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false)); ?>
								</li>
								<li class="divider"></li>
								<li>
									<?php echo $this->Html->link("Writers",array('controller'=>'Writers','action'=>'signup'),array('escape' => false)); ?>
								</li>
							</ul>
						</div>
					</li>
					<li class="bold">
						<a href="#!" class="collapsible-header waves-effect waves-teal bold">Login</a>
						<!-- Dropdown Structure -->
						<div class='collapsible-body'>
							<ul>
								<li>
									<?php echo $this->Html->link("Business",array('controller'=>'Users','action'=>'business_login'),array('escape' => false)); ?>
								</li>
								<li class="divider"></li>
								<li>
									<?php echo $this->Html->link("Writers",array('controller'=>'Users','action'=>'writer_login'),array('escape' => false)); ?>
								</li>
							</ul>
						</div>
					</li>

					<li class="waves-effect waves-teal bold">
						<?php echo $this->Html->link("Products & Pricing",array('controller'=>'Pages','action'=>'productsAndPricing'),array('escape' => false)); ?>
					</li>
					<li class="waves-effect waves-teal bold">
						<?php echo $this->Html->link("How It Works",array('controller'=>'Pages','action'=>'howItWorks'),array('escape' => false)); ?>
					</li>
					<li class="waves-effect waves-teal bold"><a href="../blog/">Blog</a></li>
					<li class="waves-effect waves-teal bold">
						<?php echo $this->Html->link("About Us",array('controller'=>'Pages','action'=>'aboutus'),array('escape' => false)); ?>
					</li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>
	<div class="wp-alert">
		<?php
                echo $this->Session->flash('success');
                echo $this->Session->flash('error');
                echo $this->Session->flash('auth', array('params'=>array('class'=>'alert-box radius alert')));
            ?>
	</div>
	<?php echo $content_for_layout; ?>
		<footer class="page-footer">
			<div class="container">
				<div class="row">
					<div class="col l4 m12 s12">
						<h5 class="grey-text"><?php echo $this->Html->image('homepage/logo.png'); ?></h5>
						<p class="grey-text text-lighten-4">The one stop shop for all your content needs</p>
					</div>
					<div class="col l2 m3 s12">
						<!--						<h5 class="white-text">Links</h5>-->
						<ul>
							<li><?php echo $this->Html->link("How it Works", array('controller'=>'Pages', 'action'=>'howItWorks'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Products and Pricing",array('controller'=>'Pages','action'=>'productsAndPricing'),array('escape' => false, 'class' =>'grey-text')); ?></li>

							<li><a class='grey-text' href="../blog/">Blog</a></li>
							<li><?php echo $this->Html->link("About Us",array('controller'=>'Pages','action'=>'aboutus'),array('escape' => false, 'class' =>'grey-text')); ?></li>

							<li><?php echo $this->Html->link("WP Writing Internship Programme",array('controller'=>'Pages','action'=>'WritingInternshipProgramme'),array('escape' => false, 'class' =>'grey-text')); ?></li>
							<!-- <li><?php echo $this->Html->link("WP Ambassador Programme",array('controller'=>'Pages','action'=>'wpAmbassadorProgramme'),array('escape' => false, 'class' =>'grey-text')); ?></li> -->
						</ul>
					</div>
					<div class="col l2 m3 s12">
						<!--						<h5 class="white-text">Links</h5>-->
						<ul>
							<li><?php echo $this->Html->link("Talk to Us", array('controller'=>'Pages', 'action'=>'talktous'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Press", array('controller'=>'Pages', 'action'=>'press'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Careers", array('controller'=>'Pages', 'action'=>'careers'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Partnerships and Affiliates", array('controller'=>'Pages', 'action'=>'partner'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Writer Service Agreement", array('controller'=>'Pages', 'action'=>'writersAgreement'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Terms of Service", array('controller'=>'Pages', 'action'=>'termsUse'), array('escape' => false, 'class' =>'grey-text')); ?></li>
							<li><?php echo $this->Html->link("Privacy Policy", array('controller'=>'Pages', 'action'=>'privacy'), array('escape' => false, 'class' =>'grey-text')); ?></li>
						</ul>
					</div>





					<div class="col l4 m6 s12 grey-text">
						<div class="row">
							<p>Sign up for the White Panda newsletter to get the latest and the greatest from the content marketing industry.</p>
							<div>
								<div style="width: 80%;">
									<!-- <div class="input-field col s8">
										<input type="email" id="newsletter_email" class="validate">
										<label for="newsletter_email">&nbsp;Your work email</label>
									</div>
									<div class="input-field col s4">
										<button id="newsletter_email_submit" style="margin-top:10px;" class="waves-effect waves-light btn brand">Subscribe</button>
									</div> -->

									<form  action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=WhitePandaBlog', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
										<div class="input-field col s8">
											<input type="email" id="newsletter_email_x" class="validate" name="email">
											<label for="newsletter_email_x">&nbsp;Your work email</label>
										</div>
										<input type="hidden" value="WhitePandaBlog" name="uri"/>
										<input type="hidden" name="loc" value="en_US"/>
										<div class="input-field col s4">
											<input style="margin-top:10px;" class="waves-effect waves-light btn brand" type="submit" value="Subscribe" />
										</div>
									</form>
								</div>
							</div>
						</div>
						<div id="footerlinks">
								<p>Follow us on social media</p>
								<a href="https://www.facebook.com/whitepanda.in" target="_blank" class="fa fa-facebook"></a>
								<a href="https://twitter.com/WhitePanda_in" target="_blank" class="fa fa-twitter"></a>
								<a href="https://www.linkedin.com/company/6473035" target="_blank" class="fa fa-linkedin"></a>
								<a href="https://plus.google.com/+WhitepandaIn7" target="_blank" class="fa fa-google-plus"></a>
						</div>
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
<?php
    echo $this->Html->script('lib/jquery.min.js');
    echo $this->Html->script('lib/materialize.min.js');
    echo $this->Html->script('homepage/init.js');
    echo $this->Html->script('homepage/custom.js');
    
?>
<!-- echo $this->Html->script('https://code.jquery.com/ui/1.12.0/jquery-ui.js'); -->
<meta name="keywords" content="content writing jobs, content writing meaning, content writing courses, content writing services, content writing jobs in bangalore, content writing jobs in kolkata, content writing jobs in mumbai, content writing jobs from home, content writing jobs in pune, content writing internships, content writing tips, content writing agency, content writing assignments, content writing articles, content writing assignments india, content writing as a profession, content writing as a career, content writing at home, content writing ahmedabad, content writing at dafso, content writing application, start a content writing business, what is a content writing, what is a content writing job, example of a content writing, what is a content writing business, writing a content analysis, writing a content strategy, writing a content analysis paper, how to get a content writing job, writing a content plan, content writing business, content writing bangalore, content writing books, content writing blogs, content writing basics, content writing business model, content writing best practices, content writing bangalore jobs, content writing books pdf, content writing business plan, content writing companies, content writing courses in chennai, content writing courses in delhi, content writing companies in india, content writing charges, content writing companies in bangalore, content writing courses in pune, content writing courses in ignou, content writing courses in india, content writing definition, content writing demo, content writing delhi, content writing description, content writing diploma, content writing dubai, content writing degree, content writing define, content writing dos and don'ts, content writing designations, content writing examples, content writing exercises, content writing essentials, content writing experience, content writing english, content writing earn money, content writing ebook, content writing eligibility, content writing elance, content writing experts, e-commerce content writing, e learning content writing tips, e-learning content writing, content writing for websites, content writing freelance, content writing format, content writing from home, content writing for seo, content writing free online courses, content writing freelance jobs india, content writing firms, content writing freelancing jobs, content writing for websites tips, content writing guidelines, content writing guide pdf, content writing generator, content writing gigs, content writing glossary, content writing google, content writing goa, content writing gurgaon, content writing group, content writing guest post
"/>



</html>
