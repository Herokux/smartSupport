<?php 
	echo $this->Html->css('homepage/how_it_works');
?>
	<div id="section1" class="section">
		<div class="row">
			<div id="header" class="row">
				<h3>How it works</h3>
				<br>

				<h7>Creating Content at White panda is as simple as 1 > 2 > 3. Quite a lofty promise isn't it ? Here's how we manage to pull it off.</h7>

			</div>
			<div class="col s4">
				<i class="large material-icons">receipt</i>
				<h6>1. Give us your Content needs</h6>
			</div>
			<div id="col2" class="col s4">
				<i class="large material-icons">perm_identity</i>
				<h6>2. White Panda Writers claim your job</h6>
			</div>
			<div class="col s4">
				<i class="large material-icons">offline_pin</i>
				<h6>3. Receive tailor-made content in 5 business days</h6>
			</div>
			<br>
			<div id="order_now" class="row">
				<?php echo $this->Html->link("Order a Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'class'=> 'waves-effect waves-light btn-large mybtn')); ?>
			</div>
		</div>
	</div>

	<div class="image-text-box odd">
		<div class="row">
			<div class="col s12 m12 l6 mytext">
				<h4>No bidding, no negotiation</h4>
				<br>
				<h6>Long gone are the days where you have to roll up your sleeves, sift through a hundred quotations by writers, shortlist the ones who aren't half bad, choose a writer and thrash out the payment details.<br>
				Simply choose a content plan at flat rates, give us your content requirements and lean back on your chair. Take a sip of that coffee after a job well done.</h6>
			</div>
			<div class="col s12 m12 l6">
				<div class="image-container">
					<?php echo $this->Html->image('how_it_works/stripe1.png'); ?>
				</div>
			</div>
		</div>
	</div>



	<div class="image-text-box">
		<div class="row">
			<div class="col s12 m12 l6 hide-on-med-and-down">
				<div class="image-container">
					<?php echo $this->Html->image('how_it_works/stripe2.png'); ?>
				</div>
			</div>
			<div class="col s12 m12 l6 mytext">
				<h4>Writer Screening</h4>
				<br>
				<h6>You must be wondering who exactly does the dirty work then. The simple answer is  - our platform does.<br>
				Every Writer is assessed on their skill as a story-teller and knowledge of the industry. Only the finest qualify as White Panda writers. Talk about high standards</h6>
			</div>
			<div class="col s12 m12 l6 hide-on-large-only">
				<div class="image-container">
					<?php echo $this->Html->image('how_it_works/stripe2.png'); ?>
				</div>
			</div>
		</div>
	</div>


	<div class="image-text-box odd">
		<div class="row">
			<div class="col s12 m12 l6 mytext">
				<h4>Editing and Quality Control</h4>
				<br>
				<h6>We just wouldn’t be able to breathe easy unless we personally ensured that the content you receive meets your expectations. Every piece of content created at White Panda is proof-read, checked for plagiarism and streamlined so that it comes out oh-so-perfect, ready to gobbled up by your readers.</h6>
			</div>
			<div class="col s12 m12 l6">
				<div class="image-container">
					<?php echo $this->Html->image('how_it_works/correction.png'); ?>
				</div>
			</div>
		</div>
	</div>


	<div class="image-text-box">
		<div class="row">
			<div class="col s12 m12 l6 hide-on-med-and-down">
				<div class="image-container fix">
					<?php echo $this->Html->image('how_it_works/stripe4.png'); ?>
				</div>
			</div>
			<div class="col s12 m12 l6 mytext">
				<h4>Revision period for clients</h4>
				<br>
				<h6>On the off chance that the content you receive doesn’t meet your requirements, you can request as many revisions as you like within 72 hours of receiving your content. Our editors will personally make the changes you request, because we're just as committed to your cause.</h6>
			</div>
			<div class="col s12 m12 l6 hide-on-large-only">
				<div class="image-container fix">
					<?php echo $this->Html->image('how_it_works/stripe4.png'); ?>
				</div>
			</div>
		</div>
	</div>



	<div class="image-text-box odd">
		<div class="row">
			<div class="col s12 m12 l6 mytext">
				<h4>Editing and Quality Control</h4>
				<br>
				<h6>We just wouldn’t be able to breathe easy unless we personally ensured that the content you receive meets your expectations. Every piece of content created at White Panda is proof-read, checked for plagiarism and streamlined so that it comes out oh-so-perfect, ready to gobbled up by your readers.</h6>
			</div>
			<div class="col s12 m12 l6">
				<div class="image-container">
					<?php echo $this->Html->image('how_it_works/stripe5.png'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="some-line-section">
		<h4 class="white-text">Sounds great, doesn’t it ?</h4>
		<div class="gap50"></div>
		<?php echo $this->Html->link("Try it out now",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'class'=>'waves-effect waves-dark btn-large inverse-btn')); ?>
	</div>

	<div class="last-section">
		<div class="row">
			<div class="col s12 m6 l6 zip">
				<div class="boxes right">
					<?php echo $this->Html->image('how_it_works/work%20from%20anywhere.png'); ?>
					<h6>Work from anywhere</h6>
				</div>
			</div>

			<div class="col s12 m6 l6 zip">
				<div class="boxes left">
					<?php echo $this->Html->image('how_it_works/check.png'); ?>
					<h6>Guaranteed Payment</h6>
				</div>
			</div>
		</div>

		<div class="row shrink">
			<div class="col s12 m6 l6 zip">
				<div class="boxes right">
					<?php echo $this->Html->image('how_it_works/writn%20white.png'); ?>
					<h6>Write in your industry</h6>
				</div>
			</div>

			<div class="col s12 m6 l6 zip">
				<div class="boxes left">
					<?php echo $this->Html->image('how_it_works/calender%20-%20white.png'); ?>
					<h6>Make your own schedule</h6>
				</div>
			</div>
		</div>
		<div class="center">
       		<?php echo $this->Html->link("Start Writing",array('controller'=>'Writers','action'=>'signup'),array('escape' => false, 'id'=>'signup', 'class'=>'waves-effect waves-light btn-large')); ?>
       	</div>
	</div>
