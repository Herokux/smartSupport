
 	<div id="section-one" class="row">
    <div class="gap50 hide-on-med-and-up"></div>
      <div class="content-box">
        <h2>Smart Content for Smart Businesses</h2>
  			<h5>With the Personal touch of writers who love telling stories, the perfect cocktail for the modern business</h5>
  			<br>
  			<br>
        <div class="action-buttons">
          <div class="buttons" style="display:none">
              <?php echo $this->Html->link("Order Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'id'=>'signup', 'class'=>'waves-effect waves-light btn-large fixing')); ?>
          </div>

          <div class="buttons">
              <?php echo $this->Html->link("Order Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false, 'id'=>'signup', 'class'=>'waves-effect waves-light btn-large fixing')); ?>
          </div>
          <div class="buttons">
              <?php echo $this->Html->link("Start Writing",array('controller'=>'Writers','action'=>'signup'),array('escape' => false, 'id'=>'mybutton-inverse', 'class'=>'waves-effect waves-light btn-large kip')); ?>
          </div>
        </div>
      </div>
 	</div>

  <div class="section-two">
    <div class="section-two-content">
       <h4>Quality original content written by the top freelance writers.</h4>
       <div class="gap30 hide-on-med-and-up"></div>
       <h4>Ready to be published, being proof-read and optimized to your needs.</h4>
   </div>
  </div>



	<div id="stripes" class="section">

		<div id="stripe-one" class="stripe hide-on-med-and-up">
			<div class="center blur text-part">
				Content Creation could never be easier! Simply type in your requirements, and we’ll take care of the rest.
			</div>
		</div>

		<div id="stripe-two" class="stripe hide-on-med-and-up">
			<div class="center blur text-part">
				Your content will be on your table within 5 week days. Don’t like your content? Request as many revisions you like within 72 hours.
			</div>
		</div>

		<div id="stripe-three" class="stripe hide-on-med-and-up">
			<div class="center blur text-part">
				Think of us as a “black box”. You don’t really care what happens with what you put in, because what comes out is just so damn good!
			</div>
		</div>
    	<div id="stripe1" class="row hide-on-small-only">
			<div class="col s12 m6 l6 offset-l6 offset-m6" >
				<h6>Content Creation could never be easier!
					Simply type in your requirements,
					and we’ll take care of the rest.
				</h6>
			</div>
		</div>


		<div id="stripe2" class="row hide-on-small-only">
			<div class="col s12 m6 l6">
				<h6>Your content will be on your table within 5
					week days. Don’t like your content? Request
					as many revisions you like within 72 hours.
				</h6>
			</div>
		</div>


	    <div id="stripe3" class="row hide-on-small-only">
			<div class="col s12 m6 l6 offset-l6 offset-m6">
				<h6>Think of us as a “black box”. You don’t really care what
					happens with what you put in, because what comes out
					is just so damn good!
				</h6>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="mymarquee">
			<ul id="marquee_1">
				<li>
					<?php echo $this->Html->image('homepage/clients/fourdea.png', array('alt'=>'4Dea')); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/bhukkads.png', array('alt' => 'Bhukkads')); ?>
				</li>

				<li>
					<?php echo $this->Html->image('homepage/clients/german.png', array('alt' => 'German Palace')); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/nri.png', array('alt' => 'NRI')); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/rigel.png', array('alt' => 'Rigel')); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/vsd.png', array('alt' => 'VSD')); ?>
				</li>
				<li>
					<?php echo $this->Html->image('homepage/clients/cretif.png', array('alt' => 'Cretif')); ?>
				</li>

			</ul>
		</div>
	</div>
	<div class="gap30"></div>

  <div id="section4">
		<h4>In its mission to clean up the world of online content,</h4>
		<h4>White Panda offers customized solutions to every business.</h4>
		<br>
		<h5 style="color: #3C3C3C;">Let's talk about how the right content can help our business grow.</h5>
    <div class="section-four-buttons">
        <div class="user-int">
          <?php echo $this->Html->link("Talk to Us", array('controller'=>'Pages', 'action'=>'talktous'), array('escape' => false, 'class' =>'waves-effect waves-light btn-large mybtn move', 'id' => 'talk')); ?>
        </div>
        <div class="gap20 hide-on-large-only"></div>
        <div class="user-int">
          <a id="faq" class="waves-effect waves-dark btn-large inverse-btn move" href="../faqs">FAQs</a>
        </div>
    </div>
    <div class="gap30"></div>
	</div>
