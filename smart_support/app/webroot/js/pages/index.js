var currentLocation =  document.URL;
var res = currentLocation.split("://");
var resfinal  = res[1].split("/");
var client_id = resfinal[resfinal.length-1];
var customer_id = resfinal[resfinal.length-2];
var urlxml = 'http://localhost:8080/project/smart_support/smart_support/clients/customer_message?client_id='+client_id+'&customer_id='+customer_id;
var xmlhttp = new XMLHttpRequest(),json;

var getalldata = 'http://localhost:8080/project/smart_support/smart_support/clients/customerstatus/'+customer_id;
var time = 1000;

var refreshIntervalId = setInterval(function(){
	xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	      	json = JSON.parse(xmlhttp.responseText);
	      	if(json[0].CustomerDetail.assigned != "none") {
	      		clearInterval(refreshIntervalId);
				$('#messagesend').click(function(){
					var message = $('#post').val();
					$('#messages').append('<li>'+message+'</li>');
					if(message != "") {
						$.post("../../Clients/insertmessage",{
					       	'customer_token_id': customer_id,
					       	'clientside_token_id': json[0].CustomerDetail.assigned,
					       	'message': message,
					       	'sender': "customer"
					  	},
						function(data,status){
							if (status == 'success') {
								alert('send');
							} else {
								alert('Something went please try again!');
							}
						});
					}
				});  		
			} else {
				console.log('qq');
			}
	    }
	}
	xmlhttp.open('GET', getalldata, true);
	xmlhttp.send();
},time);