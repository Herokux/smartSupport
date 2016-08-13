(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    // $('#blog-carousel').carousel();
    $('.carousel').carousel();
 	


  }); // end of document ready
})(jQuery); // end of jQuery name space



/********************************************************************************/
/*                   TALK TO US FORM VALIDATION                                 */
/********************************************************************************/

$(document).ready(function() {
	$('#other').change(function() {
		$('.afterselect').removeClass('hide');
	});
	$('#writer, #business').change(function() {
		$('.afterselect').addClass('hide');
	});
	function validate() {
		var name = $('#person_name').val();
		var email = $('#person_email').val();
		var profession = $('input[type=radio]:checked').size();
		var professionValue = $('input[type=radio]:checked').val(); 
		var otherFeild = $('#other_feild').val();
		var number = $('#person_number').val();
		var subject = $('#message_subject').val();
		var message = $('#person_message').val();
		if( name == "") {
			Materialize.toast('Name field is empty!', 2000);
			return false;
		}
		if(!email.match(/[A-Za-z0-9_]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/)) {
			Materialize.toast('Email is incorrect!', 2000);
			return false;
		}
		if( profession == 0) {
			Materialize.toast('Please choose you profession!', 2000);
			return false;
		}
		if(profession > 0 ) {
			if( professionValue == "Other") {
				if(otherFeild == "") {
					Materialize.toast('Please specify other profession!', 2000);
					return false;
				}
			}
		}
		if(!number.match(/^(\+91|)[0-9]{10}/)) {
			Materialize.toast('Number is incorrect!', 2000);
			return false;
		}
		if(subject == "") {
			Materialize.toast('Subject field is empty!', 2000);
			return false;
		}
		if(message == "") {
			Materialize.toast('Message field is empty!', 2000);
			return false;
		}
		return true;
	}


	$('#talktousform').click(function(){
		if (validate()) {
			Materialize.toast('Sending data back to server!', 2000);

			var name = $('#person_name').val();
			var email = $('#person_email').val();
			var professionValue = $('input[type=radio]:checked').val(); 
			var otherFeild = $('#other_feild').val();
			var number = $('#person_number').val();
			var subject = $('#message_subject').val();
			var message = $('#person_message').val();
		  	
			if(professionValue == "Other") {
				professionValue = otherFeild;
			}
			$.post("../Home/talktou",{
	           	'name': name,
	           	'email': email,
	           	'profession': professionValue,
	           	'number': number,
	           	'subject': subject,
	           	'message': message
	      	},
	        	function(data,status){
	        		if (status == 'success') {	
	        			Materialize.toast('Form has been submitted successfully!', 3000);
	        		} else {
	        			Materialize.toast('Something went please try again!', 3000);
	        		}
			});
            

		}
	});
});




/********************************************************************************/
/*                   	WRITER INTERN ENTRY + VALIDATION                        */
/********************************************************************************/

function internFormValidate() {
	var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var email = document.getElementById('email').value;
	var number = document.getElementById('number').value;
	var course = document.getElementById('course').value;
	var college_name = document.getElementById('college_name').value;
	var city = document.getElementById('city').value;
	if( first_name == "") {
		Materialize.toast('First name field is empty!', 2000);
		return false;
	}
	if(last_name == "") {
		Materialize.toast('Last name field is empty!', 2000);
		return false;
	}
	if(!email.match(/[A-Za-z0-9_]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/)) {
		Materialize.toast('Email is incorrect!', 2000);
		return false;
	}
	if(!number.match(/^(\+91|)[0-9]{10}/)) {
		Materialize.toast('Number is incorrect!', 2000);
		return false;
	}
	if(course == "") {
		Materialize.toast('Course feild is empty!', 2000);
		return false;
	}
	if(college_name == "") {
		Materialize.toast('College name feild is empty!', 2000);
		return false;
	}
	if(city == "") {
		Materialize.toast('City feild is empty!', 2000);
		return false;
	}
	return (true);
}
$(document).ready(function() {
	$('.form-section').hide();
	$(".tlinks").click(function (e) {
		e.preventDefault();
		$('.form-section').slideToggle();
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top - 40;
		$('body,html').animate( { scrollTop: destination }, 700 );
		return false;
	});

	$('.one').hover(function() {
		$('.one-circle').toggleClass('hide');
		$('.one-magic').toggleClass('hide');
	});
	$('.two').hover(function() {
		$('.two-circle').toggleClass('hide');
		$('.two-magic').toggleClass('hide');
	});
	$('.three').hover(function() {
		$('.three-circle').toggleClass('hide');
		$('.three-magic').toggleClass('hide');
	});

	$('#submitInternForm').click(function() {
		if(internFormValidate()) {
			Materialize.toast('Sending data back to server!', 2000);
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var email = $('#email').val();
			var number = $('#number').val();
			var course = $('#course').val();
			var college_name = $('#college_name').val();
			var city = $('#city').val();
		
			$.post("../Home/internEntry",
	            {
	                'first_name': first_name,
	                'last_name': last_name,
	                'email': email,
	                'number': number,
	                'course': course,
	                'college_name': college_name,
	                'city': city
	            },
	            function(data,status) {
	                if (status == 'success') {	
	        			Materialize.toast('Form has been submitted successfully!', 3000);
	        		} else {
	        			Materialize.toast('Something went please try again!', 3000);
	        		}
	            });
			}
	});
});





/********************************************************************************/
/*                  FREQUENTLY ASKED QUESTION [FAQs]                            */
/********************************************************************************/

$(document).ready(function() {
	$('.good').click(function(){
		$('.fa-thumbs-down').css({'color': '#999'});
		$('.fa-thumbs-up').css({'color': '#11A339'});
		Materialize.toast('Thanks for your response!', 1000);
	});
	$('.ok').click(function(){
		$('.fa-thumbs-up').css({'color': '#999'});
		$('.fa-thumbs-down').css({'color': '#11A339'});
		Materialize.toast('Thanks for your response!', 1000);
	});
	$('#hidden-message-faq').click(function(){
		$('#hidden-message-faq').css({'display': 'none'});
		$('.after-click-faq').css({'display' : 'block'});
		$('#show-message-faq').css({'display' : 'block'});
	});
	$('#show-message-faq').click(function(){
		$('#show-message-faq').css({'display': 'none'});
		$('.after-click-faq').css({'display' : 'none'});
		$('#hidden-message-faq').css({'display' : 'block'});
	});
	$('#hidden-message-faq-two').click(function(){
		$('#hidden-message-faq-two').css({'display': 'none'});
		$('.after-click-faq-two').css({'display' : 'block'});
		$('#show-message-faq-two').css({'display' : 'block'});
	});
	$('#show-message-faq-two').click(function(){
		$('#show-message-faq-two').css({'display': 'none'});
		$('.after-click-faq-two').css({'display' : 'none'});
		$('#hidden-message-faq-two').css({'display' : 'block'});
	});
});
$(document).ready(function(){
	$('.modal-trigger').leanModal();

	
	function questionModal() {
	  var message = $('#question_message').val();
	  var email = $('#question_email').val();

	  if(!email.match(/[A-Za-z0-9_]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/)) {
	    Materialize.toast('Email is incorrect!', 2000);
	    return false;
	  }
	  if( message == "") {
	    Materialize.toast('Question field is empty!', 2000);
	    return false;
	  }
	  return true;
	}
	
	$('#submitquestionModal').click(function(){
		if (questionModal()) {
			Materialize.toast('Sending data back to server!', 2000);
			var message = $('#question_message').val();
	  		var email = $('#question_email').val();
		  
			$.post("../Home/talktou",{
	           	'name': "",
	           	'email': email,
	           	'profession': "",
	           	'number': "",
	           	'subject': "Question Request",
	           	'message': message
	      	},
	        	function(data,status){
	        		if (status == 'success') {	
	        			Materialize.toast('Form has been submitted successfully!', 3000);
	        		} else {
	        			Materialize.toast('Something went please try again!', 3000);
	        		}
			});
		}
	});

});






/********************************************************************************/
/*                   PRODUCT AND PRICING FORM [PAPF]                            */
/********************************************************************************/

$(document).ready(function(){
	$('.formplan').hide();
	$('#startup').click(function(){
		document.getElementById('formplan-heading').innerHTML = 'Startup Plan';
		$('.formplan').slideToggle();
		destination = $('.formplan').offset().top - 40;
		$('body,html').animate( { scrollTop: destination }, 700 );
		document.getElementById('whichform').innerHTML = "startup";
		document.getElementById('sunplan_header').innerHTML = "The startup plan has been activated. An account manager will get in touch with you shortly."
		+ "<br> <br> "+" Please note: The cashback will be added to your account once the total order value exceeds INR 15000 in a 30 day period.";
	});

	$('#enterprise').click(function(){
		document.getElementById('formplan-heading').innerHTML = 'Enterprise Plan';
		$('.formplan').slideToggle();
		destination = $('.formplan').offset().top - 40;
		$('body,html').animate( { scrollTop: destination }, 700 );
		document.getElementById('whichform').innerHTML = "enterprise";
		document.getElementById('sunplan_header').innerHTML = "The Enterprise plan has been activated. An account manager will get in touch with you shortly.";
	});

	function planRequest() {
		var name = $('#plan_name').val();
	  	var email = $('#plan_email').val();
	  	var number = $('#plan_number').val();
	  	var company = $('#plan_company').val();
	  	var website = $('#plan_website').val();

	  	if( name == "") {
	    	Materialize.toast('Name field is empty!', 2000);
	    	return false;
	  	}
	  	if(!email.match(/[A-Za-z0-9_]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/)) {
	    	Materialize.toast('Email is incorrect!', 2000);
	    	return false;
	  	}
	  	if(!number.match(/^(\+91|)[0-9]{10}/)) {
			Materialize.toast('Number is incorrect!', 2000);
			return false;
		}
		if( company == "") {
	    	Materialize.toast('Company field is empty!', 2000);
	    	return false;
	  	}
	  	return true;
	}
	
	$('#bigPlanRequest').click(function(){
		if (planRequest()) {
			var name = $('#plan_name').val();
		  	var email = $('#plan_email').val();
		  	var number = $('#plan_number').val();
		  	var company = $('#plan_company').val();
		  	var website = $('#plan_website').val();	
		  	var plan = document.getElementById('whichform').innerHTML;

			$.post("../Home/pricingplan",{
	           	'name': name,
	           	'email': email,
	           	'number': number,
	           	'plan': plan,
	           	'company': company,
	           	'website' : website 
	      	},
	        	function(data,status){
	        		if (status == 'success') {	
	        			document.getElementById("activatemessage").click();
	        		} else {
	        			Materialize.toast('Something went please try again!', 3000);
	        		}
			});
		}
	});
});