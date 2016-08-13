<?php
    App::uses('CakeEmail', 'Network/Email');
    class BusinessesController extends AppController{

        public $uses=array('Business','User', 'OrderRating', 'OrderType', 'ClientNotification');


        public function beforeFilter(){
            $this->Auth->allow('login','signup', 'signupSuccess');
            $this->set('isLoggedIn',$this->Auth->loggedIn());
            $this->set('activeUser',$this->Session->read('Auth'));
            $userDetails = $this->Session->read('Auth');
            // echo $userDetails['User']['id'];
            // echo json_encode($this->Session->read('Auth'));
            $loginCheck = $this->Auth->loggedIn();
            if ($loginCheck == "1") {
 	           $this->set('userName', $this->Business->currentUserName($userDetails['User']['id'], $userDetails['User']['type']));
            }
        }



    	public function signup(){
			$this->layout='signup_layout_materialize';

            if($this->request->is('post')){

                $findUser = $this->User->findByUsername($this->data['Business']['username']);

                if($findUser != null){
                    $this->redirect(array('controller'=>'Users','action'=>'business_login', '?' => array(
        'userExist' => '1')
                    ));
                }

                else{
                    $data['User']['username']=$this->request->data['Business']['username'];
                    $data['User']['password']=$this->request->data['Business']['password'];
                    $data['User']['type']="Business";
                    $data['User']['active']="1";
                    $this->User->save($data);
                    $businessid=$this->User->getInsertId();
                    // pr($businessid);
                    // die();
                    $value['Business']['user_id']=$businessid;
                    $value['Business']['firstname']=$this->request->data['Business']['firstname'];
                    $value['Business']['lastname']=$this->request->data['Business']['lastname'];
                    $value['Business']['company']=$this->request->data['Business']['company'];
                    $value['Business']['mobile']=$this->request->data['Business']['mobile'];
                    $this->Business->save($value);
                    $fields=array('ClientName'=>$value['Business']['firstname']);
                    $this->Business->genrateTextMail($data['User']['username'],'Welcome Abroad','business_welcome_mail',$fields);



                    //GENERATE WELCOME NOTIFICATION
                    $clientID = $businessid;
        			$_header = "Welcome!";
        			$_body = "Welcome to your dashboard. We are really excited to have you on-board and thank you for choosing to create content with White Panda.";
        			$this->ClientNotification->addnotification($clientID, $_header, $_body);




                    $this->redirect(array('controller'=>'Businesses','action'=>'signupSuccess'));
                    }
                }
 		}
 		public function signupSuccess(){
 			$this->layout='signup_layout_materialize';
 		}
        public function dashboard(){

        	$orderKey = $this->request->query;
        	if (array_key_exists("ordersuccess",$orderKey)) {
        		if ($orderKey['ordersuccess'] == 'D5841301015C65A9E3E43FE79DF712FA') {
        			$clientID = $this->Auth->user('id');
        			$_header = "Incomplete Order";
        			$_body = "You stopped your order midway. Is there anything we can help you with? Give us a call at +91-7600953553.";
        			$this->ClientNotification->addnotification($this->Auth->user('id'), $_header, $_body);
        		}

        		elseif ($orderKey['ordersuccess'] == '1838E13BE467C3EE099455E09FE9580B') {
        			$clientID = $this->Auth->user('id');
        			$_header = "Order Successfully Placed";
        			$_body = "Your order has been placed successfully. Check your 'My Orders' tab to get real-time details.";
        			$this->ClientNotification->addnotification($clientID, $_header, $_body);
        		}
        	}
            $this->layout='business_dashboard_layout';
            $this->set('activeUser',$this->Session->read('Auth'));
        }
		public function orderNow() {

			$userDetails = $this->Business->businessUserDetails($this->Auth->user('id'));
			$this->set('userDetails', $userDetails);

			$txnID = $this->Business->setTransactionID();
			$this->set('txnID', $txnID);


			$this->layout='ajax';
		}




		public function ordernowStep2Sample1(){
			$this->layout='ajax';
		}




		public function ordernowStep2Sample2(){
			$this->layout='ajax';
		}



		public function ordernowStep2Sample3(){
			$this->layout='ajax';
		}




		public function ordernowStep2Data($typeID = null){
			if ($typeID != null) {
				$this->autoRender = false;
				echo $this->OrderType->ordertypeData($typeID);
			}

		}

		public function notifications(){
			$this->layout='ajax';
		}




		public function notificationData(){
			if($this->Auth->user('type')=='Business'){
				$this->autoRender=false;
				$notifications =  $this->ClientNotification->fetchNotifications($this->Auth->user('id'));
				echo json_encode($notifications);
			}
		}






		public function paymentGateway()
		{
			if ($this->request->is('post')){
				$postedData = $this->request->data;
//				echo json_encode($postedData);
				$this->set('postedToGateway', $postedData);
			}


			$this->layout='ajax';
//			echo $this->Business->paymentGatewayRedirect();
//			$this->autoRender = false;
		}

		public function saveOrderedContent(){
			if ($this->request->is('post')){
				$orderDetails = $this->request->data;
				$orderDetails['client_id'] = $this->Auth->user('id');
				$this->Business->saveOrderedContent($orderDetails);
			}
			$this->autoRender = false;
		}

		public function successPayment(){
			if ($this->request->data){
				$this->autoRender = false;
				$successOrderData = $this->request->data;

				if ($this->Business->successPaymentActiveOrder($successOrderData)){
					$this->redirect(array('controller'=>'Businesses','action' => 'dashboard',
										  '?' => array(
											  'ordersuccess' => '1838E13BE467C3EE099455E09FE9580B'
										  )
										 ));
				}
				else {
					$this->redirect(array('controller'=>'Businesses','action' => 'dashboard'));
				}
			}
			else {
				$this->redirect(array('controller'=>'Businesses','action' => 'dashboard'));
			}
		}
		public function failurePayment(){
			$this->redirect(array('controller'=>'Businesses','action' => 'dashboard',
										  '?' => array(
											  'ordersuccess' => 'D5841301015C65A9E3E43FE79DF712FA'
										  )
			 ));
		}


		public function myRecentOrders(){
			$this->layout = 'ajax';
		}

		public function myRecentOrderData(){
			$clientID = $this->Auth->user('id');
			$this->Business->recentOrderData($clientID);
			$this->autoRender = false;
		}

		public function receivedOrders(){
			$this->layout = 'ajax';
		}

		public function receiveOrderData(){
			$clientID = $this->Auth->user('id');
			$this->autoRender = false;
			$postedData = $this->Business->clientReceivedContentDetails($clientID);
			echo json_encode($postedData);
		}







		/*======================================*/
		/*    FUNCTION FOR DOCS PREVIEW         */
		/*======================================*/

		public function viewUploadedFiles($orderID, $filename){

			$path = 'webroot/files/editor_uploads/'.$orderID;

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


		/*======================================*/
		/*    CLIENT RATING UPDATE              */
		/*======================================*/
		public function clientRatingUpdate() {
			if ($this->request->is('post')){
				$postedData = $this->request->data;
				$postedData['client_id'] = $this->Auth->user('id');
				$this->OrderRating->clientRatingEntry($postedData);
				$this->Business->rateWriter($postedData['claimed_id']);

			}
			$this->autoRender = false;
		}



		/*****************************************/
		/*       CLIENT CONTENT APPROVAL         */
		/*****************************************/
		public function clientContentApproval(){
			if ($this->request->is('post')){
				$postedData = $this->request->data;
				$postedData['client_id'] = $this->Auth->user('id');
				$this->Business->clientContentApproval($postedData);

			}
			$this->autoRender = false;
		}



		/*****************************************/
		/*       CLIENT REVISION REQUEST         */
		/*****************************************/
		public function clientRevisionRequest(){
			if ($this->request->is('post')){
				$postedData = $this->request->data;
				$this->Business->clientRevisionRequestQuery($postedData);
			}
			$this->autoRender = false;
		}






		/*======================================*/
		/*    FUNCTION FOR SAMPLE DOCS PREVIEW  */
		/*======================================*/
		public function contentsamples($contentType, $filename){

			$path = 'webroot/files/content_samples/'.$contentType;

			$filename .= '.pdf';
			$this->viewClass = 'Media';
			$params = array(
				'id'        => $filename,
				'name'      => $filename,
				'extension' => 'docx',
				'mimeType'  => array(
				'docx' => 'application/vnd.openxmlformats-officedocument' .
                '.wordprocessingml.document'
				),
				'path'      => $path .DS
			);
			$this->set($params);

		}














		/*======================================*/
		/*    ATTACHMENT UPLOAD FUNCTION        */
		/*======================================*/
		public function clientAttachmentUpload($txnID){
			if($this->Auth->user('type')=='Business'){
				$this->autoRender=false;
				if ($this->request->is('post')) {
					$tempPath = $_FILES['file'][ 'tmp_name' ];
					$currentUser = $this->Auth->user('id');
					$fileExt = pathinfo($_FILES[ 'file' ]['name'], PATHINFO_EXTENSION);
					$fileName = $txnID.'.'.$fileExt;
					$uploadPath = "../webroot/files/client_attachments/".$txnID;
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
		/*    FUNCTION FOR SAMPLE DOCS PREVIEW  */
		/*======================================*/
		public function clientAttachments($txnID, $filename){

			$path = 'webroot/files/client_attachments/'.$txnID;

			$this->viewClass = 'Media';
			$params = array(
				'id'        => $filename,
				'name'      => $filename,
				'extension' => 'docx',
				'mimeType'  => array(
				'docx' => 'application/vnd.openxmlformats-officedocument' .
                '.wordprocessingml.document'
				),
				'path'      => $path .DS
			);
			$this->set($params);

		}





		/******************************************************************/
		/*           CLIENT ORDER EDIT MODE DATA UPDATE                   */
		/******************************************************************/
		public function clientUpdateOrderDetails(){
			if($this->Auth->user('type')=='Business'){
				$this->autoRender=false;
				if ($this->request->is('post')) {
					$postedData = $this->request->data;
					if($this->Business->clientUpdateOrderDetail($postedData)){
						echo "success";
					}
				}
			}
		}






		/******************************************************************/
		/*                 CLIENT HELP MESSAGE ENTRY                      */
		/******************************************************************/
		public function clientHelpMessage() {
			if($this->Auth->user('type')=='Business'){
				$this->autoRender=false;
				$username = $this->Auth->user('username');
				if ($this->request->is('post')) {
					$postedData = $this->request->data;
					$postedData['email'] = $username;
					if($this->Business->clientHelpMessageEntry($postedData)){
						echo "success";
					}
				}
			}
		}




}
 ?>
