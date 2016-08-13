var app = angular.module('businessApp', ['toaster', 'angularFileUpload']);
app.controller('businessController', function ($scope, $http, $sce, $timeout, toaster, FileUploader) {


	//Jobsearch page call
	$scope.myTxnID;
	$scope.orderNow = function () {
		// $scope.loading = true;
		var pageVar = "../Businesses/orderNow";
		// async: true
		$scope.tabShowfx = false;
		$scope.getTab = function () {
				return pageVar;
			} //Loading the respective page
		$scope.conn_error = false; //Error message
		$scope.loading = true; //Loading gif
		$http.get(pageVar).success(function (response) {

				//Do nothing
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

		//Initiate uploader with TXNID
		mycustomFileUploader();


	}; //Job search tab click fxn end







	/******************************************************************/
	/*					CLIENT HELP MESSAGE SUBMISSSION               */
	/******************************************************************/
	$scope.clientHelp = null; //initialing message text area
	window.clientHelpvar = $scope.clientHelp;
	$scope.needHelpSubmit = function() {
		alert(clientHelpvar);
		// var clientMessage = $scope.needHelpMessage;


	}










	$scope.orderStepsHeader = 'What Type Of Content Do You Need';
	//Select order Type function
	$scope.orderType = function (selectedType) {
		$scope.orderStepsHeader = 'What Type Of Content Do You Need';

		//INITIALING UPLEADER URL WITH transaction ID
		var mytxnID = angular.element('#mysaltmerchantTxId').val();
		$scope.uploader.url += mytxnID;

		if (selectedType != 'Custom Content'){
			$http.get("../Businesses/ordernowStep2Data/"+selectedType).success(function(response){
				$scope.pricelist = ((response.OrderType).price_list).split(',');
				$scope.planlist = ['Bronze', 'Silver', 'Gold', 'Platinum'];
				$scope.specificationList = [['Novice Writer', 'SEO', 'Plagiarism Check'], ['Writer Journeyman', 'SEO', 'Proof-Reading One-step', 'Performance Analysis'], ['Writer Veteran', 'SEO', 'Plagiarism Check', 'Proof-Reading One-step', 'Performance Analysis'], ['Writer Expert', 'SEO', 'Plagiarism Check', 'Proof-Reading Two-step', 'Performance Analysis']];
				window.selectedOrderType = (response.OrderType).type;
				window.selectedOrderTypeID = (response.OrderType).id;
				$scope.ContentType = (response.OrderType).type;
				$scope.Time = (response.OrderType).delivery_timeperiod_days + " Business Days";
				var orderType = (response.OrderType).type;

				if (orderType =='Social Media'){
					$scope.order_step2 = function () {
						return "../Businesses/ordernowStep2Sample2";
					};
				}
				else{
					$scope.order_step2 = function () {
						return "../Businesses/ordernowStep2Sample1";
					};
				}
			})
				.catch(function (err) {

				})

				.finally(function () {

				});



		}

		// window.selectedOrderType = selectedType;
	};



















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






	$scope.template = {'imagedescription2' : false, 'goal1' : false, 'goal3' : false, 'goal4' : false, 'style_of_writing1':false, 'style_of_writing2': false, 'style_of_writing3' : false, 'style_of_writing5' : false, 'point_of_view2' : false, 'content_structure1' : false, 'content_structure2': false};
	$scope.templateCall = function (template){
		// $scope.template = {'imagedescription2' : false, 'goal1' : false, 'goal3' : false, 'goal4' : false, 'style_of_writing1':false, 'style_of_writing2': false, 'style_of_writing3' : false, 'style_of_writing5' : false, 'point_of_view2' : false, 'content_structure1' : false, 'content_structure2': false};
		// $scope.orderDetails = {'target_audience' : "" , 'avoid': ''};
		$scope.checkbox.goal = {};
		$scope.checkbox.style_of_writing = {};
		$scope.orderDetails.point_view = '';
		$scope.checkbox.content_structure = {};
		$scope.orderDetails.image_include = '';

		switch (template){
			case ('Casual'):
				$scope.template = {'imagedescription2' : true, 'goal1' : true, 'goal3' : false, 'goal4' : true, 'style_of_writing1':true, 'style_of_writing2': false, 'style_of_writing3' : true, 'style_of_writing5' : true, 'point_of_view2' : true, 'content_structure1' : true, 'content_structure2': true};
				$scope.checkbox.goal = {'box1': 'Generate clicks / SEO', 'box4': 'Educate / provide instructions'};
				$scope.checkbox.style_of_writing = {'box1': 'Authoritative / Informed', 'box3': 'Advice / Instructional', 'box5': 'Casual / Conversational'};
				$scope.orderDetails.point_view = '2nd person - you';
				$scope.checkbox.content_structure = {'box1': 'Paragraphs', 'box2': 'Subheads'};
				$scope.orderDetails.image_include = 'No';
				$scope.orderDetails.target_audience = "Existing Customer base";
				$scope.orderDetails.avoid = "Competitors";
				break;

			case ('Formal'):
				$scope.template = {'imagedescription2' : true, 'goal1' : true	, 'goal3' : true, 'goal4' : true, 'style_of_writing1':true, 'style_of_writing2': true, 'style_of_writing3' : false, 'style_of_writing5' : false, 'point_of_view2' : true, 'content_structure1' : true, 'content_structure2': true};
				$scope.checkbox.goal = {'box1': 'Generate clicks / SEO', 'box3': 'Thought leadership' , 'box4': 'Educate / provide instructions'};
				$scope.checkbox.style_of_writing = {'box1': 'Authoritative / Informed', 'box2': 'Serious / Formal'};
				$scope.orderDetails.point_view = '2nd person - you';
				$scope.checkbox.content_structure = {'box1': 'Paragraphs', 'box2': 'Subheads'};
				$scope.orderDetails.image_include = 'No';
				$scope.orderDetails.target_audience = "Professionals in our Industry";
				$scope.orderDetails.avoid = "Competitors";
				break;

			case ('Custom'):
				$scope.template = {'imagedescription2' : false, 'goal1' : false, 'goal3' : false, 'goal4' : false, 'style_of_writing1':false, 'style_of_writing2': false, 'style_of_writing3' : false, 'style_of_writing5' : false, 'point_of_view2' : false, 'content_structure1' : false, 'content_structure2': false};
				break;
		}

	}




	/****************************************************************************************/
	/*                             PRICE AND DELIERY TIME VARS                              */
	/****************************************************************************************/
	$scope.setContentPaygrade = function (amount, paygrade, orderTime){

		//Next step query
		$('.phase-two').addClass('hide');
        $('.phase-three').removeClass('hide');

		$scope.orderDetails.paygrade = paygrade;
		$scope.orderDetails.stipend = (amount - (amount/5));
		$scope.orderDetails.amount = amount;
		$scope.orderDetails.delivery_time = orderTime;
		$scope.orderStepsHeader = 'What Type Of Content Do You Need';
		// var currentButton = angular.element(document.getElementById('mybutton-nextstep'));
  //   	$timeout(function () {
  //     		currentButton.triggerHandler("click");
  //   	});
    	// currentButton.triggerHandler("click");

	};
	$scope.setContentPaygradeSocialMedia = function (orderType, paygrade, amount, orderTime) {

		//Next step query
		$('.phase-two').addClass('hide');
        $('.phase-three').removeClass('hide');


		$scope.orderDetails.paygrade = paygrade;
		$scope.orderDetails.stipend = (amount - (amount/5));
		$scope.orderDetails.amount = amount;
		$scope.orderDetails.delivery_time = orderTime;
		window.selectedOrderType = orderType;
		$scope.orderStepsHeader = 'What Type Of Content Do You Need';
	}







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


	//reveived orders function tab trigger
	$scope.receivedOrders = function () {
		$scope.tabShowfx = false;
		var updateTime = Date.now();
		$scope.getTab = function () {
				return '../Businesses/receivedOrders?updated='+updateTime;
			} //Loading the respective page

		$scope.conn_error = false; //Error message
		$scope.loading = true; //Loading gif

		$http.get("../Businesses/receiveOrderData.json").success(function (response) {


				$scope.receivedOrderDetails = response.receivedOrderDetails;
				$scope.receivedOrderFilename = response.receivedOrderFilename;
				$scope.OrderRatings = response.OrderRating;
				$scope.OrderStatus	 = response.OrderStatus;



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


		$scope.selectedReceivedItemDescription = function(index){
            $scope.receivedOrderIndex = index;

            $("#received_order_info").show(300);
            $("#received_order_list").hide(300);

        };



	}; //Reveived order fxn end


	$scope.optionDisableID = "";

	$scope.clientApproveContent = function(orderID, claimedID) {
		$scope.optionDisableID = orderID;
		var postedData = {
			'order_id': orderID,
			'claimed_id': claimedID
		}
		var orderPostData = param(postedData);
		$http({
				method: 'POST',
				url: "../Businesses/clientContentApproval",
				data: orderPostData, // pass in data as strings
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				} // set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {


				toaster.pop('success', "Update Successful", "");
				//success response part not working


			});
		toaster.pop('note', "Updating your data...", "");
	};





	/*****************************************************************/
    /*                    Orderdetails empty field check             */
    /*****************************************************************/
    $scope.fieldEmptyCheck = function(fieldValue){
    		if (fieldValue == ""){
    			return "----";
    		}
    		return fieldValue;
    	}







    /*************************************************/
	/*          Client  CORRECTION  POINTS           */
	/*************************************************/
	$scope.correctionPoints = {}   //Variable defined for text content
	$scope.askingCorrection = function (index, orderID)
	{

		var correctionMessage = $scope.correctionPoints[index];
		var mydata = {'expected_changes': correctionMessage , 'id': orderID};
		$http({
			method : 'POST',
			url : '../Businesses/clientRevisionRequest',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");


	};//Writer correction function end


	/*===========================================================*/
	/*                ANGULAR FILE UPLOAD MODULE                 */
	/*            FUNCTION USED IN CLAIMED DETAILS PAGE CALL     */
	/*===========================================================*/
	var mycustomFileUploader = function(){
		var uploader = $scope.uploader = new FileUploader({
            url: '../Businesses/clientAttachmentUpload/'
        });

        // FILTERS
		uploader.filters.push({
			name: 'customFilter',
			fn: function(item /*{File|FileLikeObject}*/, options) {
				return this.queue.length < 1;
			}
		});
	};

	/*******************************************************************/
	/*					CLIENT ORDER DERAILS RE - EDIT  OPTION         */
	/*******************************************************************/
	$scope.orderEditMode = function() {
		$scope.order_edit_mode = true;
		$scope.order_view_mode = false;
	};

	$scope.orderEditDone = function(orderIndex) {
		$scope.order_edit_mode = false;
		$scope.order_view_mode = true;

		toaster.clear();

		var postedData = {
			'order_id': $scope.myOrderDetails[orderIndex].id,
			'topic': $scope.myOrderDetails[orderIndex].topic,
			'target_audience': $scope.myOrderDetails[orderIndex].target_audience,
			'keypoints': $scope.myOrderDetails[orderIndex].keypoints,
			'keywords': $scope.myOrderDetails[orderIndex].keywords,
			'avoid': $scope.myOrderDetails[orderIndex].avoid,
			'instructions': $scope.myOrderDetails[orderIndex].instructions,
			'sample': $scope.myOrderDetails[orderIndex].sample,
			'link_to_sources': $scope.myOrderDetails[orderIndex].link_to_sources

		}
		var OrderUpdateData = param(postedData);
		$http({
				method: 'POST',
				url: "../Businesses/clientUpdateOrderDetails",
				data: OrderUpdateData, // pass in data as strings
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				} // set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {

				toaster.clear();
				toaster.pop('success', "Update Successful", "");
				//success response part not working


			});
		toaster.pop('note', "Updating your data...", "");


		//Query to update order data
	};





	/*******************************************************************/
	/*			           NOTIFICATIONS                               */
	/*******************************************************************/
	$scope.notification = function(){
		// $scope.loading = true;
		var pageVar = "../Businesses/notifications";
		// async: true

		$scope.tabShowfx = false;
		$scope.getTab = function () {
				return pageVar;
			}; //Loading the respective page

		$scope.conn_error = false; //Error message
		$scope.loading = true; //Loading gif

		$http.get("../Businesses/notificationData").success(function (response) {

				$scope.notifications = response.notifications;
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

	}

	$scope.notificationDetails = function(index){
		$("#notification_list").hide(300);
        $("#notification_info").show(300);
        $scope.notificationIndex = index;
	}


	/******************************************************************/
	/*					CLIENT HELP MESSAGE SUBMISSSION               */
	/******************************************************************/
	// $scope.clientHelp = ''; //initialing message text area
	// $scope.needHelpSubmit = function() {
	// 	console.log($scope.clientHelp);
		// var clientMessage = $scope.needHelpMessage;


		// toaster.clear();
		// if (clientMessage == '') {
		// 	toaster.pop('note', "Enter a message", "");
		// }

		// {
		// 	var postedData = {
		// 		'message': clientMessage
		// 	}
		// 	var clientHelpMessage = param(postedData);
		// 	$http({
		// 			method: 'POST',
		// 			url: "../Businesses/clientHelpMessage",
		// 			data: clientHelpMessage, // pass in data as strings
		// 			headers: {
		// 				'Content-Type': 'application/x-www-form-urlencoded'
		// 			} // set the headers so angular passing info as form data (not request payload)
		// 		})
		// 		.success(function (response) {

		// 			toaster.clear();
		// 			toaster.pop('success', "Submitted", "");
		// 			//success response part not working


		// 		});
		// 	toaster.pop('note', "Submitting your data...", "");
		// }

	// }




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
