<?php
    App::uses('CakeEmail', 'Network/Email');
    class CustomersController extends AppController{

        // public $uses=array('PricingPlan');

		public function beforeFilter(){
            $this->Auth->allow('chatview', 'customerIncomingMessages', 'customerSendMessage', 'customerLang', 'customerSendMessageClientSave');
        }



        public function chatview($id, $client_id) {
        	$this->layout = 'ajax';
        	$assignedClientSession = $this->Customer->findClientSession($id, $client_id);
        	$this->set('assignedClientSession', $assignedClientSession['assigned']);
        	$this->set('customerID', $assignedClientSession['id']);
        }	

        public function customerIncomingMessages($customerID, $sessionID){
        	$this->autoRender = false;
        	$clientMessages = $this->Customer->findUnreadMessageClient($customerID, $sessionID);
        	echo json_encode($clientMessages);
        }



        public function customerSendMessage() {
        	$this->autoRender = false;
        	if($this->request->is('post')){

        		$mydata = $this->request->data;
        		$this->Customer->customerSendMessage($mydata);
     			
        	}
        }

        public function customerSendMessageClientSave() {
            $this->autoRender = false;
            if($this->request->is('post')){

                $mydata = $this->request->data;
                $this->Customer->customerSendMessageClientSave($mydata);
                
            }
        }



        public function customerLang($userID) {
            $this->autoRender = false;
            $this->Customer->getCustomerLang($userID);
        }





	}		
?>
