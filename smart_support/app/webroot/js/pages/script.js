$(document).ready(function() {
	var language = [
    {display: "Spanish", value: "es" },
    {display: "English", value: "en" },
    {display: "Hindi", value: "hi" },
    {display: "Arabic", value: "ar" },
    {display: "Portuguese", value: "pt" },
    {display: "Bengali", value: "bn" },
    {display: "Russian", value: "ru" },
    {display: "Japanese", value: "ja" },
    {display: "Punjabi", value: "pa" },
    {display: "German", value: "de" }];

	$("#child_selection").html('<option value="" disabled selected>Choose your language</option>');	
	$(language).each(function (i) 
	{ 
		$("#child_selection").append("<option value=\""+language[i].value+"\">"+language[i].display+"</option>");
	});
	function validate() {
		var name = $('#name').val();
		var email = $('#email').val();
		var selectedlang = $('#child_selection').val();

		if(name == "") {
			alert('First name field is empty!', 2000);
			return false;
		}
		if(!email.match(/[A-Za-z0-9_]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/)) {
			alert('Email is incorrect!', 2000);
			return false;
		}
		return (true);
	}

	$('#submitdetails').click(function() {		
		if(validate()) {
			$('#myloader').css({'display' : 'block'});
			$('#createCustomerContactForm').css({'display' : 'none'});


			var id = Math.round(new Date().getTime()/1000);
			var name = $('#name').val();
			var email = $('#email').val();
			var client_id = document.getElementById('client').value;
			console.log(client_id);
			var selectedlang = $('#child_selection').val();
			$.post("../../Clients/coustmerdetails",{
	           	'id': id,
	           	'client_id': client_id,
	           	'name': name,
	           	'email': email,
	           	'language': selectedlang
	      	},
        	function(data,status){


        		if (status == 'success') {
        			$('#myloader').css({'display' : 'none'});
					$('#connected').css({'display' : 'block'});

        			var url = '../../Customers/chatview/'+id+'/'+client_id;	
        			window.open(url, '_blank', 'toolbar=0,location=0,menubar=0,height=500,width=500');
        		} else {
        			alert('Something went please try again!');
        		}
			});
		}
	});
});