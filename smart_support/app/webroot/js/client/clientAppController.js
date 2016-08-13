var app = angular.module('clientApp', ['toaster']);
app.controller('clientController', function ($scope, $http, $sce, $timeout, $interval, toaster) {


	

	//Recent orders page call


	var getCustomerWaiting = function() {
		$http.get("../Clients/findWaitingWriters").success(function (response) {
				$scope.CustomerDetails = response.CustomerDetails;

				})
			.catch(function (err) {
			
				})

			.finally(function () {
				// Hide loading spinner whether our call
			

		});
	};


	var xx = function () {
		$http.get("../Clients/clientIncomingMessages").success(function (response) {
				$scope.clientMessages = response.Messages;

				})
			.catch(function (err) {
			
				})

			.finally(function () {
				// Hide loading spinner whether our call

		});
	};


	getCustomerWaiting();



	$scope.startchat = function(customerID) {
		window.currentCustomerID = customerID;
			orderPostData += '&content_quality='+ selectedOrderType + '&ordertype_id=' + selectedOrderTypeID + '&attachment=' + myattachment + '&' + paramCheckbox($scope.checkbox);
			// alert(orderPostData);

			$http({
					method: 'POST',
					url: "../Businesses/saveOrderedContent",
					data: orderPostData, // pass in data as strings
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					} // set the headers so angular passing info as form data (not request payload)
				})
				.success(function (response) {


					toaster.pop('success', "Update Successful", "");
					//success response part not working

					//trigger form submit
					angular.element('#pgExecuteButton').trigger('click');


			});

	};









	// getMessagesRealtime();
	$interval(function() {

		// getMessagesRealtime();
	}, 800);

	




















	//Uploading data format function
	var param = function (data) {
		var returnString = '';
		for (d in data) {
			if (data.hasOwnProperty(d))
				returnString += d + '=' + data[d] + '&';
		}
		// Remove last ampersand and return
		return returnString.slice(0, returnString.length - 1);
	}; //fxnend

	//checkbox to uploading data get string converter
	var paramCheckbox = function (data) {
		var returnString = '';
		for (d in data) {
			var returnInnerCheckbox = '';
			for (x in data[d]) {
				if (data[d][x] != false) {
					if (returnInnerCheckbox != '') {
						returnInnerCheckbox += ', ';
					}
					returnInnerCheckbox += data[d][x];
				}
			}
			if (data.hasOwnProperty(d))
				returnString += d + '=' + returnInnerCheckbox + '&';
		}
		// Remove last ampersand and return
		return returnString.slice(0, returnString.length - 1);
	}; //converter end
	//get string initialize end







	/****************************************************************************************/
	/*                             ORDER TEMPLATES                                          */
	/****************************************************************************************/
	$scope.orderDetails = {}; //INITIATION OF VARS
	$scope.checkbox = {};     //INITIATION OF VARS
	//defining object for form variables END









	/****************************************************************************************/
	/*                             ORDER POST FUNCTION                                      */
	/****************************************************************************************/
	//Payment gateway redirect and jobdetails entry
	$scope.orderPayment = function () {

		toaster.pop('note', "Updating your data...", "");


		//RUUNNING UPLOAD TO THE ATTACHED File
		if (angular.isDefined($scope.uploader)) {
			if ($scope.uploader.queue.length > 0) {

				$scope.uploader.queue[0].upload();
				var myattachment = 'uploaded';





				$scope.$watch(
					function () {
						return $scope.uploader.queue[0].isSuccess;
					},

					function(val){
				    	if(val){
					       //I will run next line of codes
					       postDataToSave();
				    	}
					}, true);






			}

			else {
				postDataToSave();
			}
		}
		else {
				postDataToSave();
			}




		function postDataToSave(){


			//ORDER ALGO STARTS
			var orderPostData = param($scope.orderDetails);
			orderPostData += '&content_quality='+ selectedOrderType + '&ordertype_id=' + selectedOrderTypeID + '&attachment=' + myattachment + '&' + paramCheckbox($scope.checkbox);
			// alert(orderPostData);

			$http({
					method: 'POST',
					url: "../Businesses/saveOrderedContent",
					data: orderPostData, // pass in data as strings
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					} // set the headers so angular passing info as form data (not request payload)
				})
				.success(function (response) {


					toaster.pop('success', "Update Successful", "");
					//success response part not working

					//trigger form submit
					angular.element('#pgExecuteButton').trigger('click');


				});


		}


	}; //PG and jobdetail entry fxn end

















	//Recent orders page call
	$scope.myRecentOrders = function () {
		$scope.tabShowfx = false;

		$scope.order_view_mode = true;
		$scope.order_edit_mode =false;

		$scope.getTab = function () {
				return '../Businesses/myRecentOrders';
			} //Loading the respective page

		$scope.conn_error = false; //Error message
		$scope.loading = true; //Loading gif

		$http.get("../Businesses/myRecentOrderData").success(function (response) {


				$scope.myOrders = response.Orders;
				$scope.myOrderDetails = response.OrderDetails;



			})
			.catch(function (err) {
				$scope.loading = false;
				$scope.conn_error = true;
			})

		.finally(function () {
			// Hide loading spinner whether our call
			$timeout(function(){
				$scope.loading = false;
				$scope.tabShowfx = true;
			}, 300);

		});

		$scope.selectedItemDescription = function(index){
            $scope.orderIndex = index;

            $("#order_info").show(300);
            $("#order_list").hide(300);

        };

        window.lastSelectedButton = '';//isitiating disabled status bar
		$scope.itemStatus = function(index, orderID){
            $scope.itemIndex = index;

            var progressID = '#progress' + orderID;

            if (lastSelectedButton == progressID){
            	$('.show-progress').hide(200);
            	$('.show-progress .inside').hide(200);
            	window.lastSelectedButton = '';
            }

            else {
            	$('.show-progress').hide(200);
            	$('.show-progress .inside').hide(200);
            	$(progressID).toggle(400);
        		$(progressID +' .inside').toggle(200);
        		window.lastSelectedButton = progressID;
            }


        };


	}; //recent orders tab click fxn end


	

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
