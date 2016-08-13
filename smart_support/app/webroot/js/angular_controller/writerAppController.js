var app= angular.module('myApp', ['toaster', 'angularFileUpload']);
app.controller('writerdatabase', function($scope, $http, $sce, $timeout, toaster, FileUploader){
		

		
		/************************************************************************/
		/*      Jobsearch page call                                             */
		/************************************************************************/
		$scope.jobsearch = function() 
		{
			$scope.tabShowfx = false;
			$scope.getTab = function () {
				return '../Writers/jobsearch';
			}//Loading the respective page
			
			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif
			
			$http.get("../order_details/jobsearch.json").success(function(response){
				
				
				$scope.myfeeds = response.OrderDetails;
				
    			
    
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
			
				
    	};//Job search tab click fxn end
	
	
	




		/************************************************************************/
		/*      Job details table call                                          */
		/************************************************************************/
		$scope.jobDetails = function(index) 
		{
			$scope.tabShowfx = false;
		
			$scope.selected_job_topic = index; // Set the selected order key
		
			$scope.getTab = function () {
				return '../Writers/jobDetails';
			}//Loading the respective page
			
			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif
			$http.get("../order_details/jobsearch.json").success(function(response){
				
				
				$scope.job_detail_list = response.OrderDetails;
				
    			
    
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
			
			
    	};//Job detail tab click fxn end
	
	








		/************************************************************************/
		/*      Payment tab click function                                      */
		/************************************************************************/
		$scope.payment = function()
		{
			$scope.tabShowfx = false;
		
			$scope.getTab = function () {
				return '../Writers/payment';
			}//Loading the respective page
			
			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif
			$http.get("../WriterBankdetails/balanceBankinfo.json").success(function(response){
				
				$scope.balanceBankDetail = response.BankAndBalanceInfo;
				
				
    			
    
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
			
			
    	}//payment tab end
		
	
	
	//Profile function
	$scope.profile = function()
		{
			$scope.tabShowfx = false;
		
			$scope.getTab = function () {
				return '../Writers/profile';
			}//Loading the respective page
			
			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif
			
			$http.get("../Writers/writerPersonalDetails").success(function(personalDetails){
				
				$scope.writerDetails = personalDetails.Writer;
			});
		
			$http.get("../WriterCredits/credit.json").success(function(response){
				
				$scope.user_credits = response.WriterCredit;
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
			
			
    	}//Profile tab end
	
	
		//Claimed project page call list
		$scope.claimedProjects = function() 
		{
			$scope.tabShowfx = false;
			$scope.getTab = function () {
				return '../Writers/claimedProjects';
			}//Loading the respective page
			
			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif
			
			$http.get("../WriterClaims/recentClaims.json").success(function(response){
				
				
				$scope.claimedProjectStatus = response.claimedProjects;
				$scope.claimedProjectDetails = response.ProjectDetails;
				
    			
    
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
			
				
    	};//Claimed projects list tab click fxn end
	
	
	
	
	
		//Content sample submit for skill upgrade
		$scope.contentSampleSubmit = function() 
		{
			$scope.tabShowfx = false;
			$scope.loading = true;
			$scope.skillUpgradeLoad = function () {
				return '../Writers/contentSample';
			};//Loading the respective page
			$scope.tabShowfx = true;
			$scope.loading = false;
			// $scope.conn_error=false; //Error message
			// $scope.loading = true;  //Loading gif
			
			// $http.get("../WriterClaims/recentClaims.json").success(function(response){
				
				
			// 	$scope.claimedProjectStatus = response.claimedProjects;
			// 	$scope.claimedProjectDetails = response.ProjectDetails;
				
    			
    
			// })
			// 	.catch(function (err) {
			// 		$scope.loading = false;
   //    				$scope.conn_error=true;
			// 	})
				
			// 	.finally(function () {
			// 		// Hide loading spinner whether our call
			// 		$scope.loading = false;
			// 		$scope.tabShowfx = true;
					
			// 	});
			
				
    	};//Content sample submit for skill upgrade
	
	
	
	//Project submission page call
	$scope.projectSubmission = function(orderID, claimedID) 
		{
			$scope.tabShowfx = false;
			var updateTime = Date.now();
			// $scope.selected_job_topic = index; // Set the selected order key
		
			$scope.getTab = function () {
				return '../Writers/projectSubmission?updated='+updateTime;
			}//Loading the respective page
			
			$scope.conn_error=false; //Error message
			$scope.loading = true;  //Loading gif
			$http.get("../WriterClaims/selectedProjectDetails/"+orderID+"/"+claimedID).success(function(response){
				
				
				$scope.job_detail_list = response.OrderDetails;
				$scope.job_status = response.claimedProjects;
				$scope.writer_uploads = response.writerUploads;
				$scope.writer_corrections = response.WriterCorrection;
				$scope.projectDeadline = response.submission;

				$scope.myrange = function(inputArray, maxL) {
					var mylist = [];
					for (var i = 0; i < maxL; i++) {
    					mylist.push(i);
					}
					return mylist;
				}
				
				
								
		/*=========================================*/
		/*       CALLING UPLOAD PLUGIN FINCTION    */
		/*=========================================*/
		
				mycustomFileUploader(orderID);
    
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
			
			
    	};//Project submission function end






    	/*****************************************************************/
    	/*                    Orderdetails empty field check             */
    	/*****************************************************************/
    	$scope.fieldEmptyCheck = function(fieldValue){
    		if (fieldValue == ""){
    			return "----";
    		}
    		return fieldValue;
    	}
	
	
	
	
	//submitting form initialize
	$scope.submission = false;
	// Updated code thanks to Yotam
	var param = function(data) {
		var returnString = '';
		for (d in data){
			if (data.hasOwnProperty(d))
				returnString += d + '=' + data[d] + '&';
		}
		// Remove last ampersand and return
		return returnString.slice( 0, returnString.length - 1 );
	};
	
	//initialize end
	
	
	
	//function for different simple update forms
	function form_names(passvar)
	{
		switch (passvar)
			{
				case ('reference'):
					{
						window.dataVar = param($scope.writerDetails);
						return '../Writers/referencesUpdate';
						break;
				
					}
				case ('personalInfo'):
					{
						window.dataVar = param($scope.writerDetails);
						return '../Writers/personalInfoUpdate';
						break;
					}
				case ('balanceBankDetails'):
					{
						window.dataVar = param($scope.balanceBankDetail);
						return '../WriterBankdetails/bankdetailsUpdate';
						break;
					}
			}
	}//update switch end
	
	
	
	
	
	//form update code
	$scope.myformUpdate = function (formNamePass)
	{	
		toaster.clear();
		$http({
			method : 'POST',
			url : form_names(formNamePass),
			data : dataVar, // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
		})
			.success(function (response) {
			
			toaster.clear();    
			toaster.pop('success', "Update Successful", "");
			//success response part not working
		
			
		});
		toaster.pop('note', "Updating your data...", "");
		
	}//simple form update function ends
		
	
	
	
	//Function for claiming projects
	$scope.claimProject = function (projectID, paygrade, area)
	{
		toaster.clear();
		$http({
			method : 'POST',
			url : '../WriterClaims/claimProject',
			data : 'order_id='+projectID+'&paygrade='+paygrade+'&area='+area, // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 		// set the headers so angular passing info as form data (not request payload)
		})
			.success(function (response) {
//			alert(response.status);
			toaster.clear();
			toaster.pop(response.status, response.message, "");
			//success response part not working
		
			
		});
		toaster.pop('note', "Processing...", "");
	}//claiming function end
	
	
	
	
	//Skill upgrade area sample submit form load
	$scope.sampleSubmissionSelectArea = function(areaID){
		
		$scope.loading2 = true;
		$scope.loadAreasampleTopic = function () {
				return '../Writers/contentSampleTopics?areaID='+areaID;
			}
		$scope.area_id =  areaID;

	}//skill page load end
	
	

	$scope.NoOptionChecked = false;
	$scope.topicSelected = function(topic){
		$scope.NoOptionChecked = true;
		$scope.topic_id = topic;
	}
	
	//Sample text submit
	$scope.submitAreaSample = function (sample)
	{
		toaster.clear();
		if ($scope.NoOptionChecked){
			toaster.pop('note', "Processing...", "");
			$http({
				method : 'POST',
				url : '../Writers/submitAreaSample',
				data : 'area_id='+$scope.area_id +'&topic_id='+$scope.topic_id +'&sample='+sample, // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 				// set the headers so angular passing info as form data (not request payload)
			})
				.success(function (response) {
				//alert(response.status);
				toaster.clear();
				toaster.pop(response.status, response.message, "");
				//success response part not working
			});
		}
		
		else{
			
			toaster.pop("error", "Select a topic first", "");
		}
	
		
		
		
		
	};//sample submit function end
	
	
	
	/*===========================================================*/
	/*                ANGULAR FILE UPLOAD MODULE                 */
	/*            FUNCTION USED IN CLAIMED DETAILS PAGE CALL     */
	/*===========================================================*/
	
	
	var mycustomFileUploader = function(orderID){
		var uploader = $scope.uploader = new FileUploader({
            url: '../Writers/uploadFileWriter/' + orderID
        });

        // FILTERS

	
		uploader.filters.push({
			name: 'customFilter',
			fn: function(item /*{File|FileLikeObject}*/, options) {
				return this.queue.length < 1;
			}
		});
	};

 


	/*===========================================================*/
	/*                DATE FUNCTION                              */
	/*            FUNCTION USED ORDER REMAINING TIME             */
	/*===========================================================*/
	$scope.mydateDifference = function(currentTime, inputTime){
		var today = new Date(currentTime);
 		var orderedDay = new Date(inputTime);
 		var submitTimeMS = 96*60*60*1000; 
 		var diffMs = (orderedDay - today) + (96 * 60 * 60 *1000);



 		function convertMS(ms) {
  			var d, h, m, s;
  			s = Math.floor(ms / 1000);
  			m = Math.floor(s / 60);
  			s = s % 60;
  			h = Math.floor(m / 60);
  			m = m % 60;
  			d = Math.floor(h / 24);
  			h = h % 24;
  			return (d + " day, " + h + " hours, " + m + " minutes");
		};
 		
 		var requiredCutoffTimeMS = (36 * 60 * 60 * 1000);
 		if (diffMs < 0){
 			return 'Timeout';
 		} 
 		if (diffMs < requiredCutoffTimeMS) {
 			return convertMS(diffMs);
 		}
 		else{
 			return '36 hours';
 		}
 		
		
	}





	
	
	
	
	/*
		
		
		$scope.datarenew = function (sample)
	{
			$http.get("../Writers/writeradd.json").success(function(response){
				
				
				var x = response;
				
    
			
			
			for (var i = 0; i < x.length; i++){
				
//				alert(1);
//				alert(x[i].email);
			
		
			$http({
				method : 'POST',
				url : '../Writers/addnow',
				data : 'firstname='+x[i].firstName +'&lastname='+x[i].lastName +'&mobile='+x[i].mobile  +'&username='+x[i].email +'&password='+x[i].password_user +'&experience='+x[i].experience +'&email_activation='+x[i].email_activation , // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 				// set the headers so angular passing info as form data (not request payload)
			})
				.success(function (response) {
				//alert(response.status);
				toaster.pop(response.status, response.message, "");
				//success response part not working
			});
		
			}
		
		
		});
		
		
	}//sample submit function end
		
		
		
		*/
		
		
		
		
		
		
		
		
		
             
                                                       
});
/*

app.directive('myDirective', function(){
  return {
    restrict: 'AE',
    compile: function(element, attrs){
      //here your all jQuery code will lie to ensure binding
      element.load('http://localhost:8080/Gitlab/WPcollaboration/whitepanda_webapp/Writers/dashboard', function (data) {
        console.log(data);
      });
    }
  }
});
*/


	    
	





