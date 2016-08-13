'use Strict';
var app = angular.module('editorApp', ['toaster', 'angularFileUpload']);
app.controller('editorsController', function($scope, $http, $sce, $timeout, toaster, FileUploader) {

		//Content Editing page call
		$scope.contentEditing = function()
		{
			$scope.welcomeHide = true;//hiding welcome note

			$scope.tabShowfx = false;
			$scope.getTab = function () {
				return '../Editors/contentEditing';
			}//Loading the respective page

			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif

			$http.get("../Editors/orderedContentData.json").success(function(response){
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







		//Paygrade assign page call
		$scope.contentSamples = function()
		{
			$scope.sampleReviewStatus = {};  //Initiating content sample review button for dynamic rejection or approval

			$scope.welcomeHide = true;//hiding welcome note
			$scope.tabShowfx = false;
			$scope.getTab = function () {
				return '../Editors/contentSamples';
			}//Loading the respective page

			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif

			$http.get("../Editors/contentSamplesData.json").success(function(response){
				$scope.contentsamples=response.ContentSamples;
				$scope.username=response.userID_username;
				$scope.area=response.contentID_areaname;
				$scope.paygrade=response.writer_paygrade;


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
    	};//Paygrade assign function end



	//GET string composer
	var param = function(data) {
		var returnString = '';
		for (d in data){
			if (data.hasOwnProperty(d))
				returnString += d + '=' + data[d] + '&';
		}
		// Remove last ampersand and return
		return returnString.slice( 0, returnString.length - 1 );
	};//GET string composer end



	//ContentSamples  comment function
	$scope.commentUpdate = function (comments, writerID, areaID)
	{
		var mydata = {'writer_id': writerID, 'area_id':areaID, 'editor_comments':comments};
		$http({
			method : 'POST',
			url : '../Editors/editorCommentUpdate',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
		})
			.success(function (response) {


			toaster.pop('success', "Update Successful", "");
			//success response part not working


		});
		toaster.pop('note', "Updating your data...", "");

	};//ContentSamples comment update function ends





	//Paygrade radio button controller
	window.selectedPaygrade = 'NotSet';
	$scope.checkedPaygrade = function(paygrade){
		window.selectedPaygrade = paygrade;
	};//Paygrade radio button fxn end



	//Paygrade update function
	$scope.updatePaygrade = function (writerID, areaName, index, sampleID)
	{


		if (selectedPaygrade == 'NotSet'){
			toaster.pop('error', "Choose a new paygrade", "");
		}
		else{
			var mydata = {'writer_id': writerID, 'area':areaName, 'level':selectedPaygrade, 'sample_id': sampleID};
			$http({
			method : 'POST',
			url : '../Editors/paygradeWriterUpdate',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");

				$scope.sampleReviewStatus[index] = true; //Disabling editor option button
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");
		}

	};//Paygrade comment update function ends





	/*************************************************/
	/*          WRITER REJECT CALL                   */
	/*************************************************/
	$scope.rejectWriter = function (writerID, orderID)
	{


		var mydata = {'writer_id': writerID, 'order_id':orderID};
		$http({
			method : 'POST',
			url : '../Editors/rejectWriter',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");


	};//Witer reject function end


	/*************************************************/
	/*          WRITER  CORRECTION  POINTS           */
	/*************************************************/
	$scope.correctionPoints = {}   //Variable defined for text content
	$scope.askingCorrection = function (index, calimedID)
	{

		var correctionMessage = $scope.correctionPoints[index];
		var mydata = {'correction_guidelines': correctionMessage , 'claimed_id': calimedID};
		$http({
			method : 'POST',
			url : '../Editors/contentCorrection',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");


	};//Writer correction function end






	/*************************************************/
	/*          WRITER CONTENT APPROVAL              */
	/*************************************************/
	$scope.writerContentApproval = function(orderId, calimedID) {
		var mydata = {'order_id': orderId , 'claimed_id': calimedID};
		$http({
			method : 'POST',
			url : '../Editors/contentApproval',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");

	};//Writer content approval function end











	/*===========================================================*/
	/*                EDITOR RESPONSES                           */
	/*            ANGULAR FILE UPLOAD MODULE INITIATION          */
	/*===========================================================*/
	$scope.editorSubmissionInit = function(orderID, calimedID) {
		mycustomFileUploader(orderID, calimedID);
		// var uploadTab = angular.element(document.querySelector('#uploadPage'));
		// uploadTab.empty();
		// $templateCache.remove("../Editors/fileUpload");
		var updateTime = Date.now();
		$scope.fileuploadpage = function () {
				return '../Editors/fileUpload?updated=' + updateTime;
			};//Loading the respective page

		$scope.orderID = orderID;
	}





	/*===========================================================*/
	/*                ANGULAR FILE UPLOAD MODULE                 */
	/*===========================================================*/
	var mycustomFileUploader = function(orderID, calimedID){
		var uploader = $scope.uploader = new FileUploader({
            url: '../Editors/uploadFileEditor/' + orderID + '/' + calimedID
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
	/*          SUBMIT CONTENT TO CLIENTS                              */
	/*******************************************************************/
	$scope.clientSubmission = function(orderID){
		var mydata = {'order_id': orderID};
		$http({
			method : 'POST',
			url : '../Editors/clienContentSubmission',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");
	}





	/*******************************************************************/
	/*          SUBMIT CONTENT TO CLIENTS                              */
	/*******************************************************************/
	$scope.evaluteWriterXpFromRating = function(calimedID){
		var mydata = {'claimed_id': calimedID};
		$http({
			method : 'POST',
			url : '../Editors/writerCreditsEvaluation',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");
				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");
	}





	/*******************************************************************/
	/*         WRITER CONTENT SAMPLE REJECTION                         */
	/*******************************************************************/
	$scope.rejectContentSample = function(sampleID, index){
		var mydata = {'sample_id': sampleID};
		$http({
			method : 'POST',
			url : '../Editors/contentSampleRejection',
			data : param(mydata), // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
			})
			.success(function (response) {
				toaster.pop('success', "Update Successful", "");

				$scope.sampleReviewStatus[index] = true;

				//success response part not working
			});
		toaster.pop('note', "Updating your data...", "");
	};









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
