<?php
    App::uses('CakeEmail', 'Network/Email');
    class HomeController extends AppController{

        public $uses=array('Intern','Subscriber', 'Ambassador', 'Partner', 'Talkto', 'PricingPlan');

		public function beforeFilter(){
            $this->Auth->allow('internEntry', 'ambassadorEntry', 'newsletterSubscribe', 'partnerEntry','talktou', 'pricingplan');
        }
		
		public function internEntry(){
			if($this->request->is('post')){
				$postedData =  $this->request->data;
	   			if ($this->Intern->save($postedData)) {
	   				die("success");
	   			   // return $this->redirect(['action' => 'press']);
	   			} else {
	   				die("failure");
	   			    // return $this->redirect(['action' => 'termsUse']);
	   			}
			}
		}

		public function ambassadorEntry(){	
			if ($this->request->is('post')) {
				$this->autoRender = false;
				$postedData = $this->request->data;
				$this->Ambassador->save($postedData);
				$this->redirect(array('controller'=>'Pages','action'=>'wpAmbassadorProgramme'));
			}
			else{
				$this->redirect(array('controller'=>'Pages','action'=>'home'));
			}
			
		}


		public function newsletterSubscribe(){
			if ($this->request->is('post')) {
				$this->autoRender = false;
				$postedData = $this->request->data;
				$this->Subscriber->save($postedData);
				$this->redirect(array('controller'=>'Pages','action'=>'home'));
			}
			else{
				$this->redirect(array('controller'=>'Pages','action'=>'home'));
			}
		}




		public function partnerEntry(){
			if($this->request->is('post')){
				$postedData =  $this->request->data;
	   			if ($this->Partner->save($postedData)) {
	   				die("success");
	   			   // return $this->redirect(['action' => 'press']);
	   			} else {
	   				die("failure");
	   			    // return $this->redirect(['action' => 'termsUse']);
	   			}
			}
		}




		public function talktou(){
			if($this->request->is('post')){
				$postedData =  $this->request->data;
	   			if ($this->Talkto->save($postedData)) {
	   				$Email = new CakeEmail();
					$Email->from(array('noreply@whitepanda.in' => 'Whitepanda.in'));
					$Email->to('roshan@whitepanda.in');
					$Email->subject('Talk to us | Message');
					$Email->send($postedData);
	   			   	die("success");
	   			} else {
	   				die("failure");
	   			}
			}
		}


		public function pricingplan(){
			if($this->request->is('post')){
				$postedData =  $this->request->data;
	   			if ($this->PricingPlan->save($postedData)) {
	   				$Email = new CakeEmail();
					$Email->from(array('noreply@whitepanda.in' => 'Whitepanda.in'));
					$Email->to('roshan@whitepanda.in');
					$Email->subject('Talk to us | Message');
					$Email->send($postedData);
	   			   	die("success");
	   			} else {
	   				die("failure");
	   			}
			}
		}

		

	}		
?>
