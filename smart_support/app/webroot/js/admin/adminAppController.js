var app= angular.module('Admin', ['toaster']);
app.controller('AdminViewController', function($scope, $http, $sce, $timeout, toaster){


	/************************************************************************/
	/*                      WRITER LIST CALL                                */
	/************************************************************************/
	$scope.writerProfiles =function() {
		$scope.tabShowfx = false;
		$scope.getTab = function () {
			return '../Admins/writerProfiles';
		}//Loading the respective page
		$scope.conn_error=false; //Error message
		$scope.loading = true;  //Loading gif
		$scope.queryLimitEnd = false;  //SHOW MORE WRITER LIST OPTIONS
		//LIST KIMIT PER PAGE
		window.queryLimit = 100;
		$http.get("../Admins/writerProfileData/" + queryLimit + "/0").success(function(response){
			$scope.writerList = response.WriterProfileData;
			$scope.writerUsername = response.writerUsername;
			window.queryOffset = response.nextOffset;
		})
			.catch(function (err) {
				$scope.loading = false;
  				$scope.conn_error=true;
			})
			.finally(function () {
				// Hide loading spinner whether our call
				$timeout(function(){
					$scope.loading = false;
					$scope.tabShowfx = true;
				}, 300);
			});
	};




	/************************************************************************/
	/*                      WRITER LIST MORE                                */
	/************************************************************************/
	$scope.writerProfileListMore =function() {
		$http.get("../Admins/writerProfileData/" + queryLimit + '/' + queryOffset).success(function(response){
			var oldList = $scope.writerList;
			$scope.writerList = oldList.concat(response.WriterProfileData);
			angular.extend($scope.writerUsername, $scope.writerUsername, response.writerUsername);
			window.queryOffset = response.nextOffset;
			$scope.queryLimitEnd = response.QueryEnd;
		})
			.catch(function (err) {
				$scope.loading = false;
  				$scope.conn_error=true;
			})
			.finally(function () {
				// Hide loading spinner whether our call
				$scope.loading = false;
			});
	};





	/************************************************************************/
	/*                      WRITER PAYGRADES                                */
	/************************************************************************/
    $scope.writerPaygrade = function(writerID){
    	$http.get("../Admins/writerPaygrade/" + writerID).success(function(response){
			$scope.paygrades = response.WriterPaygrade;
		})
			.catch(function (err) {
				$scope.loading = false;
  				$scope.conn_error=true;
			})
			.finally(function () {
				// Hide loading spinner whether our call
				$scope.loading = false;
				$scope.tabShowfx = true;
				$('#paygrades').openModal();
			});
    };





    /************************************************************************/
	/*                      FIND WRITER BY EMAILID                          */
	/************************************************************************/
    $scope.findWriterByEmail = function(writerEmailID){

    	$http.get("../Admins/findWriterByEmail/" + writerEmailID).success(function(response){
			$scope.filteredWriter = response.Writer;
			$scope.mywritersQuery = response;
		})
			.catch(function (err) {
				$scope.loading = false;
  				$scope.conn_error=true;
			})
			.finally(function () {
				// Hide loading spinner whether our call
				$scope.loading = false;
				$scope.tabShowfx = true;
				if ($scope.mywritersQuery == 'error'){
					$scope.findWriterByEmailView = false;
					$scope.UserNotExist = true;
				}
				else {
					$scope.findWriterByEmailView = true;
					$scope.UserNotExist = false;
				}
			});
    	};

	/************************************************************************/
	/*                      ADMIN ORDER FORM PAGE                           */
	/************************************************************************/
    $scope.orderNow = function () {
		// $scope.loading = true;
		var pageVar = "../Admins/orderNow";
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
		// mycustomFileUploader();
	}; //Job search tab click fxn end












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














		//Select order Type function
	$scope.orderType = function (selectedType) {
		$scope.orderStepsHeader = 'What Type Of Content Do You Need';

		//INITIALING UPLEADER URL WITH transaction ID
		// var mytxnID = angular.element('#mysaltmerchantTxId').val();
		// $scope.uploader.url += mytxnID;

		if (selectedType != 'Custom Content'){
			$http.get("../Admins/ordernowStep2Data/"+selectedType).success(function(response){
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
						return "../Admins/ordernowStep2Sample2";
					};
				}
				else{
					$scope.order_step2 = function () {
						return "../Admins/ordernowStep2Sample1";
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

	/*===========================================================*/
	/*                ANGULAR FILE UPLOAD MODULE                 */
	/*            FUNCTION USED IN CLAIMED DETAILS PAGE CALL     */
	/*===========================================================*/
	// var mycustomFileUploader = function(){
	// 	var uploader = $scope.uploader = new FileUploader({
 	//            url: '../Admins/clientAttachmentUpload/'
 	//        });

 	//        // FILTERS
	// 	uploader.filters.push({
	// 		name: 'customFilter',
	// 		fn: function(item /*{File|FileLikeObject}*/, options) {
	// 			return this.queue.length < 1;
	// 		}
	// 	});
	// };


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
	/*                             ORDER POST FUNCTION                                      */
	/****************************************************************************************/
	//Payment gateway redirect and jobdetails entry
	$scope.orderPayment = function () {

		var orderPostData = param($scope.orderDetails);
		orderPostData += '&content_quality='+ selectedOrderType + '&ordertype_id=' + selectedOrderTypeID + '&' + paramCheckbox($scope.checkbox);
		alert(orderPostData);

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


			});
		toaster.pop('note', "Updating your data...", "");

		//trigger form submit
		angular.element('#pgExecuteButton').trigger('click');


	}; //PG and jobdetail entry fxn end







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












	/******************************************************************/
	/*         PROJECTS                                               */
	/******************************************************************/
		$scope.projects = function()
		{
			$scope.welcomeHide = true;//hiding welcome note

			$scope.tabShowfx = false;
			var updateTime = Date.now();
			$scope.getTab = function () {
				return '../Admins/projects?updated=' + updateTime;
			}//Loading the respective page

			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif

			$http.get("../Admins/projectData.json").success(function(response){
				$scope.detail=response.Details;
				$scope.status=response.Status;
				$scope.fileName=response.UploadedFilenames;
				$scope.calimedDetails=response.ClaimedIds;
				$scope.WriterEmails=response.WriterEmails;
				$scope.ClientRevisions=response.ClientRevisions;
				// mycustomFileUploader("741111-5888");
			})
				.catch(function (err) {
					$scope.loading = false;
      				$scope.conn_error=true;
				})
				.finally(function () {
					// Hide loading spinner whether our call
					$scope.loading = false;
					$scope.tabShowfx = true;
				});
    	};//Content editing function end





    /******************************************************************/
	/*                           OPEN MODALS                          */
	/******************************************************************/
	$scope.openMyModal = function(name, index) {
		var modalName = '#' + name + index;
		$(modalName).openModal();
	}








	/*===========================================================*/
	/*                DATE FUNCTION                              */
	/*       FUNCTION USED for COMPUTING  REMAINING TIME         */
	/*===========================================================*/
	$scope.mydateDifference = function(currentTime, inputTime, cutoffTime){
		var today = new Date(currentTime);
 		var targetedDay = new Date(inputTime);
 		var submitTimeMS = cutoffTime *60*60*1000;
 		var diffMs = (targetedDay - today) + (cutoffTime * 60 * 60 *1000);


 		function convertMS(ms) {
  			var d, h, m, s;
  			s = Math.floor(ms / 1000);
  			m = Math.floor(s / 60);
  			s = s % 60;
  			h = Math.floor(m / 60);
  			m = m % 60;
  			d = Math.floor(h / 24);
  			h = h % 24;
  			// return (d + " day, " + h + " hours, " + m + " minutes");

  			switch (true) {
  				case (d==0):
  					var myhours = h + " hours";
  				case (h==0):
  					var myhours = m + " minutes";
  					break;
  				default:
  					var myhours = d + " days";

  			}
  			return myhours;

		};

 		if (diffMs < 0){
 			return 'Timeout';
 		}
 		else{
 			return convertMS(diffMs);
 		}


	}


});
