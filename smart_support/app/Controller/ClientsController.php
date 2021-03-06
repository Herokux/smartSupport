<?php
    App::uses('CakeEmail', 'Network/Email');
    class ClientsController extends AppController{
        public $uses=array('Client','User','ClientMessage','CustomerDetail');
        public function beforeFilter(){
            $this->Auth->allow('login','signup', 'signupSuccess','customer_message','customerdetails','customerstatus', 'checkforClientApproval', 'customerLang');
            $this->set('isLoggedIn',$this->Auth->loggedIn());
            $this->set('activeUser',$this->Session->read('Auth'));
            $userDetails = $this->Session->read('Auth');
            $loginCheck = $this->Auth->loggedIn();
            if ($loginCheck == "1") {
    	           $this->set('userName', $this->Client->currentUserName($userDetails['User']['id'], $userDetails['User']['type']));
            }
        }
        
        public function customerdetails() {
            if($this->request->is('post')){
                $postedData =  $this->request->data;
                if ($this->CustomerDetail->save($postedData)) {
                    die("success");
                } else {
                    die("failure");
                }
            }
        }

        public function customerstatus($customer_id) {
            $this->layout='ajax';
            $conditions = array(
                    'CustomerDetail.id' => $customer_id
                );
            $status = $this->CustomerDetail->find('all', array(
                        'conditions' => $conditions
                    )
                );
            die(json_encode($status, JSON_PRETTY_PRINT));
        }

        public function insertmessage() {
            if($this->request->is('post')){
                $postedData =  $this->request->data;
                if ($this->ClientMessage->save($postedData)) {
                    die("success");
                } else {
                    die("failure");
                }
            }

        }

        public function customer_message($client_id, $customer_id) {
            $this->layout='ajax';
            $conditions = array(
                    'ClientMessage.customer_token_id' => $client_id
                );
            $message = $this->ClientMessage->find('all', array(
                        'conditions' => $conditions
                    )
                );
            die(json_encode($message, JSON_PRETTY_PRINT));
        }

        
    	public function signup(){
			$this->layout='ajax';
            if($this->request->is('post')){
                $findUser = $this->User->findByUsername($this->data['Client']['username']);
                if($findUser != null){
                    $this->redirect(array('controller'=>'Users','action'=>'client_login', '?' => array(
                        'userExist' => '1')
                    ));
                }
                else{
                    $data['User']['username']=$this->request->data['Client']['username'];
                    $data['User']['password']=$this->request->data['Client']['password'];
                    $data['User']['type']="Client";
                    $data['User']['active']="1";
                    $this->User->save($data);
                    $businessid=$this->User->getInsertId();
                    $value['Client']['id']=$businessid;
                    $value['Client']['firstname']=$this->request->data['Client']['firstname'];
                    $value['Client']['lastname']=$this->request->data['Client']['lastname'];
                    $value['Client']['company']=$this->request->data['Client']['company'];
                    $this->Client->save($value);
                    
                    $this->redirect(array('controller'=>'Clients','action'=>'signupSuccess'));
                    }
                }
 		}
 		public function signupSuccess(){
 			$this->layout='ajax';

 		}
        public function dashboard(){
            $this->layout='ajax';
            $sessionID = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            $this->set('sessionID', $sessionID);

        }
        public function clientIncomingMessages($customerID, $sessionID){
        	$this->autoRender = false;
        	$clientMessages = $this->Client->findUnreadMessageClient($customerID, $sessionID);
        	echo json_encode($clientMessages);
        }


        public function clientSendMessage() {
        	$this->autoRender = false;
        	if($this->request->is('post')){

        		$mydata = $this->request->data;
        		$this->Client->clientSendMessage($mydata);
     			
        	}
        }

        public function clientSendMessageCustomerSave() {
            $this->autoRender = false;
            if($this->request->is('post')){

                $mydata = $this->request->data;
                $this->Client->clientSendMessageCustomerSave($mydata);
                
            }
        }


        public function findWaitingWriters() {
        	$this->autoRender = false;
            $ClientID = $this->Auth->user('id');
        	$postedData = $this->Client->findWaitingWriters($ClientID);
        	echo json_encode($postedData);
        }


        public function setClientCustomerLink() {
        	$this->autoRender = false;
        	if($this->request->is('post')){

        		$mydata = $this->request->data;
        		$mydata['client_id'] = $this->Auth->user('id');
        		$this->Client->setClientCustomerLink($mydata);
     			
        	}
        	
        }

        public function checkforClientApproval($userTokenID) {
            $this->autoRender = false;
            $this->Client->checkforClientApproval($userTokenID);
        }

        public function customerLang($userID) {
            $this->autoRender = false;
            $this->Client->getCustomerLang($userID);
        }
    }
?>
