var app = angular.module('customerApp', ['toaster']);
app.controller('customerController', function ($scope, $http, $sce, $timeout, $interval, toaster) {


	

	
	$timeout(function() {
		window.clientSession = $scope.ClientsessionID;
		window.customerSession = $scope.customerSessionID;


		chatRealtime(customerSession, clientSession);  
	}, 1000);





	var chatRealtime = function (customerID, clientSession) {
		$interval(function() {

			console.log(customerID);

			console.log(clientSession);
		
			$http.get("http://localhost:8080/smart_support/smart_support/Customers/customerIncomingMessages/" + customerID + '/' + clientSession).success(function (response) {
					$scope.clientMessages = response.Messages;

					})
				.catch(function (err) {
				
					})

				.finally(function () {
					// Hide loading spinner whether our call

			});
		}, 800);

		clientSendMessage(customerID, clientSession);
	};



	




	var clientSendMessage = function(customerID, sessionID) {

		$scope.clientSendMessageTrigger = function(currentMessage){
			
			var myData = 'customer_token_id='+ customerID + '&clientside_token_id=' + sessionID + '&message=' + currentMessage + '&sender=customer';

			$http({
					    method: 'POST',
						url: "http://localhost:8080/smart_support/smart_support/Customers/customerSendMessage",
						data: myData, // pass in data as strings
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						} // set the headers so angular passing info as form data (not request payload)
					})
					.success(function (response) {

						$scope.currentMessage = '';
			});







			//Save customer message

			$http.get("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20160703T222603Z.a2b44ab180b3363e.a23fc5a7aea820b6217fe2efc12029a1b3c2823e&text=" + currentMessage + "&lang=en").success(function (response) {
					window.postMessage = response.text;

					})
				.catch(function (err) {
					})
				.finally(function () {


					var myData = 'customer_token_id='+ customerID + '&clientside_token_id=' + sessionID + '&message=' + postMessage + '&sender=customer';

					$http({
							    method: 'POST',
								url: "http://localhost:8080/smart_support/smart_support/Customers/customerSendMessageClientSave",
								data: myData, // pass in data as strings
								headers: {
									'Content-Type': 'application/x-www-form-urlencoded'
								} // set the headers so angular passing info as form data (not request payload)
							})
							.success(function (response) {

								$scope.currentMessage = '';
					});	

			});	






		}
	}
























	

	/*===========================================================*/
	/*                DATE FUNCTION                              */
	/*            FUNCTION USED REVISION REMAINING TIME          */
	/*===========================================================*/
	$scope.revisionDeadline = function(inputTime, timeAdd){
 		var receivedDate = new Date(inputTime);

 		var receiveDateSec = receivedDate.getTime();

 		var submitTimeMS = timeAdd * 60*60*1000;
 		var deadline = receiveDateSec + submitTimeMS;
 		// console.log(deadline);



 		var mydeadline = new Date(deadline);
 		var dateString = mydeadline.toString(" ");
 		var dateFormatted = dateString.split(" ");

 		return (dateFormatted[0] + " " + dateFormatted[2] + " " + dateFormatted[1] + " " + dateFormatted[3] + " at " + dateFormatted[4]);


	}




	/*===========================================================*/
	/*                DATE FORMAT  notification                 */
	/*===========================================================*/
	$scope.timeAgo = function(inputTime){
		var currentTime = new Date();
 		var mytime = new Date(inputTime);
 		var diffMs = (currentTime - mytime)


 		function convertMS(ms) {
  			var d, h, m, s;
  			s = Math.floor(ms / 1000);
  			m = Math.floor(s / 60);
  			s = s % 60;
  			h = Math.floor(m / 60);
  			m = m % 60;
  			d = Math.floor(h / 24);
  			h = h % 24;

  			switch (true) {
				case (d != 0):
					return d + ' days ago';
				case (h != 0):
					return h + ' hours ago';
				default:
					return m + ' min ago';
			}
		};
 		return convertMS(diffMs);
	}
});
