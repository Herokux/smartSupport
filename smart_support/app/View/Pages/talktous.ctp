<?php
	echo $this->Html->css('homepage/talktous');
?>



<div class="row main">
	<div class="col s12 m12 l6 leftx">

	<section class="twox">
		<div class="row">
	        <div class="col s12 m6 mod">
	          	<div class="card blue-grey darken-1">
	           		<div class="card-content white-text">
	              		<span class="card-title"><b>White Panda</b></span>
	            		<p><i class="fa fa-phone-square" aria-hidden="true"></i> +91 7600953553 <br>
	            			<i class="fa fa-envelope" aria-hidden="true"></i> <a style="color:#000" href="mailto:contact@whitepanda.in">contact@whitepanda.in</a><br><br>
	            			302, B 30, IIT Gandhinagar, Palaj Village Simkheda, Gandhinagar, Gujarat 382355
	            		</p>
	            	</div>
	          	</div>
	        </div>
    	</div>
	</section>

    	<section class="two">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.906607804303!2d72.68750731449218!3d23.21007391511968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2ae08b30ca81%3A0xcf9b54fe892171ab!2sWhite+Panda!5e0!3m2!1sen!2sin!4v1468434810781" style="width:100%;height:100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>

	</div>
	<div class="col s12 m12 l6 rightx">
		<section class="one">
			<div class="form-container">
				<div class="row">
					<div class="col s12 heading">Contact us</div>
					<form class="col s12">


						<div class="row">
					        <div class="input-field col s12">
		                        <input type="text" name="name" id="person_name" class="validate"/>
						        <label for="person_name">Name</label>
					        </div>
				      	</div>
				     

				      	<div class="row md">
					        <div class="input-field col s12">
		                        <input type="email" class="validate" id="person_email"/>
						        <label for="person_email">Email</label>
					        </div>
				      	</div>
				     

				      	<div class="row md odd">
					        <div class="input-heading">Profession</div>
					        <div class="row odd-xx">
					        	<div class="col s12 m4 l4">
					        		<p>
										<input class="with-gap" name="person_profession" value="Writer" type="radio" id="writer" />
										<label for="writer">Writer</label>
									</p>
					        	</div>
					        	<div class="col s12 m4 l4">
					        		<p>
										<input class="with-gap" name="person_profession" value="Business" type="radio" id="business" />
										<label for="business">Business</label>
									</p>
					        	</div>
					        	<div class="col s12 m4 l4">
					        		<p>
										<input class="with-gap" name="person_profession" value="Other" type="radio" id="other" />
										<label for="other">Other</label>
									</p>
					        	</div>
					        </div>
				      	</div>


						<div class="row hide afterselect mdx">
					        <div class="input-field col s12">
		                        <input id="other_feild" class="validate" type="text"/>
						        <label for="other_feild">Specify Other</label>
					        </div>
				      	</div>		      


					    <div class="row mdx">
					        <div class="input-field col s12">
		                        <input id="person_number" class="validate" type="text"/>
						        <label for="person_number">Phone No.</label>
					        </div>
				      	</div>
				      


				      	<div class="row md">
				        	<div class="input-field col s12">
		                        <input id="message_subject" class="validate" type="text"/>
				          		<label for="message_subject">Subject</label>
				        	</div>
				      	</div>
				      
				      	<div class="row md">
					        <div class="input-field col s12">
					        	<textarea id="person_message" class="materialize-textarea"></textarea>
					        	<label for="person_message">Message</label>
					        </div>
					    </div>


				      	<div class="row">
				       		<div class="col s12">
				       			<div class="gap10"></div>
				       		</div>
				       	</div>
				      

				       	<div class="row">
				       		<div class="col s12 center">
								<a id="talktousform" class="btn waves-effect waves-light form-button">Submit</a>
				       		</div>
				       	</div>

		            </form>
				</div>
			</div>
		</section>		
	</div>
</div>