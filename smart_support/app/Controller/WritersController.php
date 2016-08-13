<?php
    App::uses('CakeEmail', 'Network/Email');

    class WritersController extends AppController{

    public $uses=array('Writer','User', 'WriterSpecializations', 'WriterSamplecontentTopic', 'WriterContentSample', 'WriterBankdetail', 'WriterAccountbalance', 'WriterUploads', 'WriterNotification');


		public $components = array('RequestHandler', 'Session');
        public function beforeFilter(){
            $this->Auth->allow('login','signup', 'mymailtest');
            $this->set('isLoggedIn',$this->Auth->loggedIn());
            $this->set('activeUser',$this->Session->read('Auth'));
            $userDetails = $this->Session->read('Auth');
            $loginCheck = $this->Auth->loggedIn();
            if ($loginCheck == "1") {
            	$this->set('userName', $this->User->currentUserName($userDetails['User']['id'], $userDetails['User']['type']));
            }
        }
    	public function signup(){
    		$this->layout='signup_layout_materialize';
            if($this->request->is('post')){
                $user = $this->request->data;
                $findUser = $this->User->findByUsername($this->data['Writer']['username']);

                if($findUser != null){
                    $this->redirect(array('controller'=>'Users','action'=>'writer_login', '?' => array(
        'userExist' => '1')
                    ));
                }

                else{
                    $data['User']['username']=$this->request->data['Writer']['username'];
                    $data['User']['password']=$this->request->data['Writer']['password'];
                    $data['User']['type']="Writer";
                    $this->User->save($data);
                    $writerid=$this->User->getInsertId();
                    $value['Writer']['id']=$writerid;
                    $value['Writer']['firstname']=$this->request->data['Writer']['firstname'];
                    $value['Writer']['lastname']=$this->request->data['Writer']['lastname'];
                    $value['Writer']['mobile']=$this->request->data['Writer']['mobile'];
                    $value['Writer']['experience']=$this->request->data['Writer']['experience'];
                    $this->Writer->save($value);

					$bankDetail['WriterBankdetail']['id']=$writerid;
					$this->WriterBankdetail->save($bankDetail);

					$bankBal['WriterAccountbalance']['id']=$writerid;
					$this->WriterAccountbalance->save($bankBal);

					/*************************************************/
					/*   Mail the writer for account activation      */
					/*************************************************/
					$fields=array('writerid'=>$writerid,
             			'value'=>$value['Writer']['firstname']);
					$this->Writer->genrateTextMail($this->request->data['Writer']['username'],'Welcome aboard','writer_welcome_mail',$fields);



					/*************************************************/
					/*   GENERATE WELCOME NOTIFICATION               */
					/*************************************************/
                    $writerID = $writerid;
        			$_header = "Welcome!";
        			$_body = "Welcome to your dashboard. We welcome you to White Panda's Writer community. You can now start accepting jobs by submitting samples in the 'Add Industry' Tab. You can start accepting jobs after we assess them and assign you a pay-grade.";
        			$this->WriterNotification->addnotification($writerID, $_header, $_body);





                    $this->redirect(array('controller'=>'Users', 'action'=>'verificationLinkGenerated'));

                }
 			}
 		}


 		public function mymailtest(){
 			

			// $myvar = "this is a var";
			// $myvar2 = "this is a var";
			// $Email = new CakeEmail($MailTemp);
			// $Email->emailFormat('html')
			// 	// ->from(array('ashim.raj@iitgn.ac.in'=>'White Panda'))
			// 	->to('hardik9035181138@gmail.com')
			// 	->subject('Welcome aboard')
			// 	->template('default', '')
			// 	->viewVars(compact('myvar', 'myvar2'));
			// $Email->send();
			// $this->autoRender = false;

			// $this->Writer->tempfx(); // M2M communication
// Regards,
// Team White Panda";
			
			$this->autoRender = false;
 			$orderDetails=array('KEY1'=>'Value1',
 				'KEY2'=>'Value2',
 				'KEY3'=>'Value3',
 				'KEY4'=>'Value4');
			$fields=array('clientName'=>'Pk',
				'orderId'=>'1234',
				'orderType'=>'Test');
 			$this->Writer->genrateHtmlMail('hardik9035181138@gmail.com','Order Placed','promo',$fields,$orderDetails);
 		}



  		public function dashboard(){
			$currentUser = $this->Auth->user('id');
			$selectionQuery = $this->Writer->writerSelectionQuery($currentUser);
			if($selectionQuery == 0){
				$this->redirect(array('controller'=>'Writers','action'=>'selectionTest'));
			}
			else{
				$this->layout='writer_dashboard_layout';
			}
			//$this->set('activeUser',$this->Session->read('Auth'));
        }

		public function jobsearch(){

			$this->layout='ajax';
			//$this->layout='writer_tabs_layout';
			//$this->set('activeUser',$this->Session->read('Auth'));
        }

		public function jobDetails(){
			$this->layout='ajax';

        }

		public function payment(){
			$this->layout = 'ajax';
		}

		public function profile(){
			$this->layout = 'ajax';
		}



		public function notifications(){
			$this->layout='ajax';
		}




		public function notificationData(){
			if($this->Auth->user('type')=='Writer'){
				$this->autoRender=false;
				$notifications =  $this->WriterNotification->fetchNotifications($this->Auth->user('id'));
				echo json_encode($notifications);
			}
		}



		public function specilizationfeild() {
			if($this->Auth->user('type')=='Writer'){
				$this->layout='ajax';
				$specilizations = $this->Writer->specilization();
				die(json_encode($specilizations, JSON_PRETTY_PRINT));
			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}
		}

	    public function sendspecilization() {
	      	if($this->request->is('post')){
	      		$this->autoRender = false;
				$postedData =  $this->request->data;
	        	$postedData['writer_id'] = $this->Auth->user('id');
	        	
		   		if ($this->WriterSpecializations->save($postedData)) {
		   			die("success");
		   		} 
		   		else {
		   				die("failure");
		   		}

		   		
				
			}
	    }

		public function writerPersonalDetails()
		{

			if($this->Auth->user('type')=='Writer'){
				$this->header('Content-Type: application/json');
				$this->layout='ajax';
				$this->set('WriterPersonalDetails', $this->Writer->find('first', array('conditions'=>array('Writer.id' => $this->Auth->user('id')))));

			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}
		}

		public function claimedProjects(){
			$this->layout = 'ajax';
		}

		public function projectSubmission(){
			$this->layout = 'ajax';
		}


		public function referencesUpdate(){
			if($this->Auth->user('type')=='Writer'){

				if ($this->request->is('post')){
					$this->autoRender = false;
					$this->Writer->id = $this->Auth->user('id');
					$this->Writer->save($this->request->data , false, array('reference'));
				}
			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}

			// $this->set('_serialize', array('posts'));
		}

		public function personalInfoUpdate(){
			if($this->Auth->user('type')=='Writer'){

				if ($this->request->is('post')){
					$this->autoRender = false;
					$this->Writer->id = $this->Auth->user('id');
					$this->Writer->save($this->request->data , false, array('address', 'city', 'state', 'pincode', 'website'));
				}
			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}

			// $this->set('_serialize', array('posts'));
		}


		public function fileUpload(){



		}

		public function contentSample(){

			$this->layout = 'ajax';
		}

		public function contentSampleTopics(){

			if (array_key_exists('areaID', $this->params['url'])){
				$areaID =$this->params['url']['areaID'];
				$loadAreaTopics = $this->WriterSamplecontentTopic->contentSampleTopics($areaID);
				$this->set('ShuffledContentTopics', $loadAreaTopics);
				$this->layout = 'ajax';
			}
			else{
				$this->redirect(array('controller'=>'Pages','action'=>'home'));
			}



		}

		public function submitAreaSample(){
			if($this->Auth->user('type')=='Writer'){

				if ($this->request->is('post')){

					//save recent updates
//					$this->WriterSamplecontentTopic->id = $this->Auth->user('id');
					$postedData = $this->request->data;
					$postedData['writer_id'] = $this->Auth->user('id');
					// $this->WriterContentSample->save($postedData);

					$postedData['username'] = $this->User->currentUserName($postedData['writer_id'], 'Writer');
 					$postedData['email'] = $this->Auth->user('username');

 					$sampleAuthorization = $this->Writer->checkSampleSubmissionValidations($postedData);     //Authorize the writer to submit samples based on 24 hour limit rule


 					if ($sampleAuthorization) {
 						if($this->WriterContentSample->writerSampleSubmission($postedData)){
 							$this->Writer->mailForSample($postedData);
							$message = array('status'=> 'success', 'message'=> 'Sample Uploaded');
							echo json_encode($message);
						}
						else{
							$message = array('status'=> 'error', 'message'=> 'Uploading Failed');
							echo json_encode($message);
						}

 					}
 					else{
 						$message = array('status'=> 'error', 'message'=> 'Subsequent sample submission is not allowed between a time interval of 24 hours. Please try again later.');
						echo json_encode($message);
 					}

				}
				$this->autoRender = false;
			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
				//error page
			}

		}

		public function selectionTest(){
			if($this->Auth->user('type')=='Writer'){
				$this->layout = 'ajax';
				$questions = $this->Writer->selectionTestQuestions();
				$this->set('questions', $questions);
			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}
		}

		public function selectionTestResults(){
			if($this->Auth->user('type')=='Writer'){

				if ($this->request->is('post')){
					$this->layout = 'signup_layout_materialize';
					$postedData = $this->request->data;
					$currentUser = $this->Auth->user('id');
					$x = $this->Writer->selectionTestAnswerCheck($postedData, $currentUser);

					if ($x =='1'){
						$this->set("testMessage", "You have successfully passed the test.<br>You can access our features now.");
						$this->set("testStatus", "success");
					}
					else{
						$this->set("testMessage", "Your score is below the threshold value.<br>Brush up your skills and try to login later.");
						$this->set("testStatus", "failure");
					}
				}

			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}

		}






		//Writer content upload ajax fucntion
		public function uploadFileWriter($orderID){
			if($this->Auth->user('type')=='Writer'){
				$this->autoRender=false;
				if ($this->request->is('post')) {
					$tempPath = $_FILES['file'][ 'tmp_name' ];
					$currentUser = $this->Auth->user('id');
					$fileExt = pathinfo($_FILES[ 'file' ]['name'], PATHINFO_EXTENSION);
					$fileName = $currentUser.'.'.$fileExt;
					$uploadPath = "../webroot/files/writer_uploads/".$orderID;
					if (!is_dir($uploadPath)){
						mkdir($uploadPath);
					}
					$uploadPath .= "/".$currentUser;
					if (!is_dir($uploadPath)){
						mkdir($uploadPath);
					}else{
						$files = glob($uploadPath . '/*');
						foreach ($files as $file) {
							is_dir($file) ? removeDirectory($file) : unlink($file);
						}
						rmdir($uploadPath);
						mkdir($uploadPath);
					}

					$finalPath = $uploadPath."/".$fileName;

					if(move_uploaded_file($tempPath, $finalPath)){

						$this->Writer->writerUploadConfirmChanges($orderID, $currentUser, $fileName);
						echo "success";
					}
					else{
						echo "failure";
					}
				}
			}
			else{
				$this->Session->setFlash('Sorry You are not Authorized to Access this Section','default',array('class'=>'alert-box alert radius'),'error');
			}
		}


		/*======================================*/
		/*    FUNCTION FOR DOCS PREVIEW         */
		/*======================================*/

		public function viewUploadedFiles($orderID, $writerID, $filename){

			$path = 'webroot/files/writer_uploads/'.$orderID. '/'.$writerID;

			$this->viewClass = 'Media';
			$params = array(
				'id'        => $filename,
				'name'      => $writerID,
				'extension' => 'docx',
				'mimeType'  => array(
				'docx' => 'application/vnd.openxmlformats-officedocument' .
                '.wordprocessingml.document'
				),
				'path'      => $path .DS
			);
			$this->set($params);

		}






		/**************************************************************************************************************************/
		/*                                     DANGER ZONE -> DONOT CROSS THIS LINE                                               */
		/**************************************************************************************************************************/




		//Database backup functions --------------------


		public function writeradd(){
			$this->autoRender = false;
			$result = $this->Writer->entrynew();
			echo json_encode($result);



//			foreach($result as $perentry){
//				$mynewUser['type'] = 'Writer';
//				$mynewUser['username'] = $perentry['email'];
//				$mynewUser['password'] = $perentry['password_user'];
//				$mynewUser['active'] = $perentry['email_activation'];
//				$mynewUser['firstname'] = $perentry['firstName'];
//				$mynewUser['lastname'] = $perentry['lastName'];
//				$mynewUser['mobile'] = $perentry['mobile'];
//				$mynewUser['experience'] = $perentry['experience'];
//
//				$myvarrrr['Writer'] = $mynewUser;
//                $user = $myvarrrr;
//                $findUser = $this->User->findByUsername($perentry['email']);
//
//                if($findUser != null){
//
//                }
//
//                else{
//                    $data['User']['username']=$mynewUser['username'];
//                    $data['User']['password']=$mynewUser['password'];
//                    $data['User']['type']="Writer";
//                    $data['User']['active']=$mynewUser['active'];
//                    $this->User->save($data);
//                    $writerid=$this->User->getInsertId();
//                    $value['Writer']['id']=$writerid;
//                    $value['Writer']['firstname']=$mynewUser['firstname'];
//                    $value['Writer']['lastname']=$mynewUser['lastname'];
//                    $value['Writer']['mobile']=$mynewUser['mobile'];
//                    $value['Writer']['experience']=$mynewUser['experience'];
//                    $this->Writer->save($value);
//
//					$bankDetail['WriterBankdetail']['id']=$writerid;
//					$this->WriterBankdetail->save($bankDetail);
////					echo $writerid;
//					$bankBal['WriterAccountbalance']['id']=$writerid;
//					$this->WriterAccountbalance->save($bankBal);
//
//					//Mail the writer for account activation
////					$Email = new CakeEmail();
////					$Email->template('welcome')
////						->emailFormat('html')
////						->to($this->request->data['Writer']['username'])
////						->from('noreply@whitepanda.in')
////						->sender('White Panda')
////						->send();
////
//
//                }
// 			}
		}

		public function addnow(){
			$this->autoRender = false;
			$perentry = $this->request->data;;
//			echo json_encode($result);



//			foreach($result as $perentry)
			{
				$mynewUser['type'] = 'Writer';
				$mynewUser['username'] = $perentry['username'];
				$mynewUser['password'] = $perentry['password'];
				$mynewUser['active'] = $perentry['email_activation'];
				$mynewUser['firstname'] = $perentry['firstname'];
				$mynewUser['lastname'] = $perentry['lastname'];
				$mynewUser['mobile'] = $perentry['mobile'];
				$mynewUser['experience'] = $perentry['experience'];

				$myvarrrr['Writer'] = $mynewUser;
                $user = $myvarrrr;
                $findUser = $this->User->findByUsername($perentry['username']);

                if($findUser != null){

                }

                else{
                    $data['User']['username']=$mynewUser['username'];
                    $data['User']['password']=$mynewUser['password'];
                    $data['User']['type']="Writer";
                    $data['User']['active']=$mynewUser['active'];
                    $this->User->save($data);
                    $writerid=$this->User->getInsertId();
                    $value['Writer']['id']=$writerid;
                    $value['Writer']['firstname']=$mynewUser['firstname'];
                    $value['Writer']['lastname']=$mynewUser['lastname'];
                    $value['Writer']['mobile']=$mynewUser['mobile'];
                    $value['Writer']['experience']=$mynewUser['experience'];
                    $this->Writer->save($value);

					$bankDetail['WriterBankdetail']['id']=$writerid;
					$this->WriterBankdetail->save($bankDetail);
//					echo $writerid;
					$bankBal['WriterAccountbalance']['id']=$writerid;
					$this->WriterAccountbalance->save($bankBal);

					//Mail the writer for account activation
//					$Email = new CakeEmail();
//					$Email->template('welcome')
//						->emailFormat('html')
//						->to($this->request->data['Writer']['username'])
//						->from('noreply@whitepanda.in')
//						->sender('White Panda')
//						->send();
//

                }
 			}
		}



		public function skillTestBackup(){
			$this->Writer->userTestPass();
			$this->autoRender = false;
		}
		public function creditbackup(){
			$this->Writer->userCreditEntry();
			$this->autoRender = false;
		}





}
 ?>
